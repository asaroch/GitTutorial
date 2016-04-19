<?php

/**
 * Plugin Name: Badges
 * Description: This plugin add global badges through out the site and clicking on any badge would redirect to external page
 */
class TRUST_BADGES_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'trust_badges_widget',
            'description' => 'Trust Badges widget to display badges',
        );
        parent::__construct('trust_badges_widget', 'TRUST BADGES Widget', $widget_ops);
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
        $badges = $wpdb->get_results("SELECT id,image,external_link,title,image_alt_text FROM wp_badges", ARRAY_A);

        $badgesString = '<ul class="badges-container">';

        foreach ($badges as $badge) {
            $badgesString .= '<li><a href="' . $badge['external_link'] . '" target="_blank" title="' . $badge['title'] . '"><img src="' . $badge['image'] . '" alt="' . $badge['image_alt_text'] . '" /></a></li>';
        }
        $badgesString .= '</ul>';
        echo $badgesString;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance) {
        // processes widget options to be saved
    }

}

// Function to create the DB / Options / Defaults					
function badges_plugin_options_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . "badges";
    $sql = "CREATE TABLE " . $table_name . " ( `id` INT NOT NULL AUTO_INCREMENT ,  `image` VARCHAR(100) NOT NULL ,  `external_link` VARCHAR(100) NOT NULL , `image_alt_text` VARCHAR(255) NOT NULL , `created` DATETIME NOT NULL ,  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// Run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'badges_plugin_options_install');

function badges_add_pages() {

    // The first parameter is the Page name(admin-menu), second is the Menu name(menu-name)
    //and the number(5) is the user level that gets access
    add_menu_page('Badges', 'Badges', 5, 'badges', 'badgesCallbackFunction', '', 5);
    add_submenu_page('badges', 'Add New', 'Add New', 5, 'add_new_badge', 'addNewBadge');
}

// badgesCallbackFunction() displays the page content for the custom Badges menu
function badgesCallbackFunction() {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/badges/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/badges/js/bootstrap.js');
    global $wpdb;
    $url = admin_url();

    $deleteBadgeId = isset($_GET['action']) && $_GET['action'] == 'delete' ? $_GET['badge_id'] : NULL;
    if (isset($deleteBadgeId)) {
        // Using where formatting.
        $wpdb->delete('wp_badges', array('id' => $deleteBadgeId), array('%d'));
    }

    $badges = $wpdb->get_results("SELECT id,image,external_link,image_alt_text FROM wp_badges", ARRAY_A);
    ?>
    <h2>Badges <a href="<?php echo $url; ?>/admin.php?page=add_new_badge" class="page-title-action">Add New</a></h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
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
                        <td><img src="<?php echo $badge['image']; ?>" width="50" height="50" /></td>
                        <td><?php echo $badge['external_link']; ?></td>
                        <td><?php echo $badge['image_alt_text']; ?></td>
                        <td>
                            <a href="<?php echo $url; ?>/admin.php?page=add_new_badge&badge_id=<?php echo $badge['id']; ?>">Edit</a> |
                            <a href="<?php echo $url; ?>/admin.php?page=badges&action=delete&badge_id=<?php echo $badge['id']; ?>">Delete</a>
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

function addNewBadge() {
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
                    'wp_badges', array(
                'image' => $_POST['badgeImage'],
                'external_link' => $_POST['externalLink'],
                'title' => $_POST['title'],
                'image_alt_text' => $_POST['image_alt_text']
                    ), array('ID' => $badge_id), array(
                '%s', // value1
                '%s', // value2
                '%s'
                    ), array('%d')
            );

            $successMsg = "Badge data has been updated successfully";
        } else {  // Insert badge record
            $wpdb->insert(
                    'wp_badges', array(
                'image' => $_POST['badgeImage'],
                'external_link' => $_POST['externalLink'],
                'title' => $_POST['title'],
                'image_alt_text' => $_POST['image_alt_text'],
                'created' => date("Y-m-d H:i:s")
                    ), array(
                '%s',
                '%s',
                '%s',
                '%s'
                    )
            );
            $successMsg = "Badge data has been added successfully";
        }
    }

    // Fetch badge record 
    $badgeData = array();
    $badgeImage = $badegeExternalLink = '';
    if (isset($badge_id)) {
        $badgeData = $wpdb->get_results("SELECT id,image,external_link,title,image_alt_text FROM wp_badges WHERE id = " . $badge_id, ARRAY_A);
        $badgeImage = $badgeData[0]['image'];
        $badegeExternalLink = $badgeData[0]['external_link'];
        $image_alt_text = $badgeData[0]['image_alt_text'];
        $badegeTitle = $badgeData[0]['title'];
    }
    ?>
    <h2><?php echo isset($badge_id) ? 'Update' : 'Add New' ?> Badge</h2>
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
                    <label for="email">External Link:</label>
                    <input type="text" class="form-control" id="externalLink" placeholder="External Link" name="externalLink" required value="<?php echo $badegeExternalLink; ?>" />
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" required value="<?php echo $badegeTitle; ?>" />
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
                <div class="form-group">
                    <label for="title">Image Alt Text:</label>
                    <input type="text" class="form-control" id="image_alt_text" placeholder="Alt text" name="image_alt_text" required value="<?php echo $image_alt_text; ?>" />
                </div>
                <button type="submit" class="btn btn-primary" name="saveBadge">Submit</button>
            </form>
        </div>
    </div>
    <?php
}

add_action('widgets_init', function() {
    register_widget('TRUST_BADGES_Widget');
});
add_action('admin_menu', 'badges_add_pages');
