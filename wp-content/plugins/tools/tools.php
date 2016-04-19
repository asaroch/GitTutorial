<?php

/**
 * Plugin Name: Tools
 * Description: This plugin add tools
 */
class TOOLS_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'tools_widget',
            'description' => 'Display tools on resource right sidebar',
        );
        parent::__construct('tools_widget', 'Tools Widget', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        // outputs the content of the widget
        global $wpdb;

        $tools = $wpdb->get_results("SELECT id,image,external_link,name,image_alt_text FROM wp_tools", ARRAY_A);
        $title = apply_filters('widget_title', $instance['title']);
      
        if (!empty($tools)) :
            $string = '<div class = "col-xs-12 post-section tools-block">
                            <h2 class = "section-heading">'.$title.'</h2>';
            foreach ($tools as $tool) {
                $string .= ' <div class = "col-xs-12 post-information">
                                                <div class = "post-image">
                                                     <img src = "' . $tool['image'] . '" width="66" height="66" alt="' . $tool['image_alt_text'] . '" >
                                                 </div>
                                                 <p class = "featured-title"><a href="' . $tool['external_link'] . '">' . $tool['name'] . '</a></p>
                                            </div>';
            }
            $string .= '</div>';

        endif;
        echo $string;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        // outputs the options form on admin
        if ($instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = 'Tools';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'applyNow_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        return $instance;
    }

}

// Function to create the DB / Options / Defaults					
function tools_plugin_options_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . "tools";
    $sql = "CREATE TABLE " . $table_name . " ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL ,  `image` VARCHAR(100) NOT NULL ,  `external_link` VARCHAR(100) NOT NULL , `image_alt_text` VARCHAR(100) NOT NULL , `created` DATETIME NOT NULL ,  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// Run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'tools_plugin_options_install');

function tools_add_pages() {

    // The first parameter is the Page name(admin-menu), second is the Menu name(menu-name)
    //and the number(5) is the user level that gets access
    add_menu_page('Tools', 'Tools', 5, 'tools', 'toolsCallbackFunction', '', 5);
    add_submenu_page('tools', 'Add New', 'Add New', 5, 'add_new_tool', 'addNewTool');
}

// toolsCallbackFunction() displays the page content for the custom tools menu
function toolsCallbackFunction() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    global $wpdb;
    $url = admin_url();

    $deleteBadgeId = isset($_GET['action']) && $_GET['action'] == 'delete' ? $_GET['tool_id'] : NULL;
    if (isset($deleteBadgeId)) {
        // Using where formatting.
        $wpdb->delete('wp_tools', array('id' => $deleteBadgeId), array('%d'));
    }

    $badges = $wpdb->get_results("SELECT id,image,external_link,name,image_alt_text FROM wp_tools", ARRAY_A);
    ?>
    <h2>Tools <a href="<?php echo $url; ?>/admin.php?page=add_new_tool" class="page-title-action">Add New</a></h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Link</th>
                <th>Image Alt Text</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($badges)) {
                foreach ($badges as $badge) {
                    ?>
                    <tr>
                        <td><?php echo $badge['name']; ?></td>
                        <td><img src="<?php echo $badge['image']; ?>" width="50" height="50" /></td>
                        <td><?php echo $badge['external_link']; ?></td>
                        <td><?php echo $badge['image_alt_text']; ?></td>
                        <td>
                            <a href="<?php echo $url; ?>/admin.php?page=add_new_tool&badge_id=<?php echo $badge['id']; ?>">Edit</a> |
                            <a href="<?php echo $url; ?>/admin.php?page=tools&action=delete&tool_id=<?php echo $badge['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td></td>
                    <td>No record found</td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}

function addNewTool() {
    global $wpdb;
    wp_enqueue_media();
    wp_enqueue_script('media_uploader', '/wp-content/plugins/badges/js/media_uploader.js', array('jquery'));
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');

    $badge_id = isset($_GET['badge_id']) ? $_GET['badge_id'] : NULL;

    // Save badge data
    if (isset($_POST['saveBadge'])) {

        if (isset($badge_id)) { // Update badge record
            $wpdb->update(
                    'wp_tools', array(
                'image' => $_POST['badgeImage'],
                'name' => $_POST['name'],
                'external_link' => $_POST['externalLink'],
                'image_alt_text' => $_POST['image_alt_text'],      
                    ), array('ID' => $badge_id), array(
                '%s', // value1
                '%s' // value2
                    ), array('%d')
            );

            $successMsg = "Badge data has been updated successfully";
        } else {  // Insert badge record
            $wpdb->insert(
                    'wp_tools', array(
                'image' => $_POST['badgeImage'],
                'external_link' => $_POST['externalLink'],
                'name' => $_POST['name'],
                'image_alt_text' => $_POST['image_alt_text'],
                'created' => date("Y-m-d H:i:s")
                    ), array(
                '%s',
                '%s',
                '%s'
                    )
            );
            $successMsg = "Tool has been added successfully";
        }
    }

    // Fetch badge record 
    $badgeData = array();
    $badgeImage = $badegeExternalLink = '';
    if (isset($badge_id)) {
        $badgeData = $wpdb->get_results("SELECT id,image,external_link,name,image_alt_text FROM wp_tools WHERE id = " . $badge_id, ARRAY_A);
        $badgeImage = $badgeData[0]['image'];
        $badegeExternalLink = $badgeData[0]['external_link'];
        $badegeName = $badgeData[0]['name'];
        $image_alt_text = $badgeData[0]['image_alt_text'];
    }
    ?>
    <h2><?php echo isset($badge_id) ? 'Update' : 'Add New' ?> Tool</h2>
    <?php
    if ($wpdb->insert_id) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $successMsg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required value="<?php echo $badegeName; ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Link:</label>
                    <input type="text" class="form-control" id="externalLink" placeholder="External Link" name="externalLink" required value="<?php echo $badegeExternalLink; ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Image Alt Text:</label>
                    <input type="text" class="form-control" id="image_alt_text" placeholder="Image Alt Text" name="image_alt_text" required value="<?php echo $image_alt_text; ?>" />
                </div>
                <div class="form-group image-data">
                    <?php
                    if (isset($badge_id)) {
                        ?><img src="<?php echo $badgeImage; ?>"  width="304" height="236" class="img-thumbnail" /><?php
                    }
                    ?>
                    <input type="hidden" id="imageUrl" name="badgeImage"  value= "<?php echo $badgeImage; ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Upload Image:</label>
                    <input type="file" class="form-control" id="upload_image_button" />
                </div>
                <button type="submit" class="btn btn-primary" name="saveBadge">Submit</button>
            </form>
        </div>
    </div>
    <?php
}

add_action('widgets_init', function() {
    register_widget('TOOLS_Widget');
});

add_action('admin_menu', 'tools_add_pages');
