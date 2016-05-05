<?php

/*************************************************************************

Plugin Name: Partner Name
Plugin URI: --
Description: Display partner name in post type by calling custom field partner name value in listing.
Version: 4.1.0
Author: Anirudh Sood
Author URI: http://wppress.net

**************************************************************************

Copyright (C) 2010 Sovit Tamrakar(http://ssovit.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/
class Partner_listing
{
    var $db = NULL;
    public $post_types = array();
    
    function __construct() {
        
        add_action('init', array(&$this,
            'init'
        ));
        add_action('admin_init', array(&$this,
            'admin_init'
        ));
    }
    function init() {
        
        add_filter('query_vars', array(&$this,
            'query_vars'
        ));
        add_action('pre_get_posts', array(&$this,
            'pre_get_posts'
        ));
    }
    function admin_init() {
        add_filter('current_screen', array(&$this,
            'my_current_screen'
        ));
       /* 
        add_action('admin_head-edit.php', array(&$this,
            'admin_head'
        ));
        add_filter('pre_get_posts', array(&$this,
            'admin_pre_get_posts'
        ) , 1);
        * 
        */
        $this->post_types = get_post_types(array(
            '_builtin' => false,
        ) , 'names', 'or');
        $this->post_types['post'] = 'post';
        $this->post_types['page'] = 'page';
        ksort($this->post_types);
        foreach ($this->post_types as $key => $val) {
            // add post type slug in array for enabling it on multiple post types.
            $camparr = array('campaign-product');
            if ( in_array($val, $camparr)) {
                add_filter('manage_edit-' . $key . '_columns', array(&$this,
                'manage_posts_columns'
                ));
                add_action('manage_' . $key . '_posts_custom_column', array(&$this,
                    'manage_posts_custom_column'
                ) , 10, 2);
            }
        }
    }
    
//    function total_featured($post_type = "post") {
//        $rowQ = new WP_Query(array(
//            'post_type' => $post_type,
//            'meta_query' => array(
//                array(
//                    'key' => '_is_featured',
//                    'value' => 'yes'
//                )
//            ) ,
//            'posts_per_page' => 1
//        ));
//        wp_reset_postdata();
//        wp_reset_query();
//        $rows = $rowQ->found_posts;
//        unset($rowQ);
//        return $rows;
//    }
    function my_current_screen($screen) {
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return $screen;
        }
        $this->post_types = get_post_types(array(
            '_builtin' => false,
        ) , 'names', 'or');
        $this->post_types['post'] = 'post';
        $this->post_types['page'] = 'page';
        ksort($this->post_types);
//        foreach ($this->post_types as $key => $val) {
//            add_filter('views_edit-' . $key, array(&$this,
//                'add_views_link'
//            ));
//        }
        return $screen;
    }
    function manage_posts_columns($columns) {
        global $current_user;
        get_currentuserinfo();
        if (current_user_can('edit_posts', $user_id)) {
            $columns['partner_name'] = __('Partner Name');
        }
        return $columns;
    }
    function manage_posts_custom_column($column_name, $post_id) {
               //echo "here";
        if ($column_name == 'partner_name') {
            $partner_name = get_post_meta($post_id, 'wpcf-partner-name', true);
            echo $partner_name;
        }
    }
    
   
    function query_vars($public_query_vars) {
       return $public_query_vars;
    }
    function pre_get_posts($query) {       
        return $query;
    }
}
$partner = new Partner_listing();

