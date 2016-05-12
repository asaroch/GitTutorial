<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentysixteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own twentysixteen_setup() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function twentysixteen_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentysixteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentysixteen'),
            'social' => __('Social Links Menu', 'twentysixteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', twentysixteen_fonts_url()));
    }

endif; // twentysixteen_setup
add_action('after_setup_theme', 'twentysixteen_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
    $GLOBALS['content_width'] = apply_filters('twentysixteen_content_width', 840);
}

add_action('after_setup_theme', 'twentysixteen_content_width', 0);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'twentysixteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 1', 'twentysixteen'),
        'id' => 'sidebar-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 2', 'twentysixteen'),
        'id' => 'sidebar-3',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Financial Products', 'twentysixteen'),
        'id' => 'financial-product',
        'description' => __('Appears on the center of the pages where its required to display financial products.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Trust Badges', 'twentysixteen'),
        'id' => 'trust-badge',
        'description' => __('Appears on the center of the pages where its required to display trust badges.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Testimonials', 'twentysixteen'),
        'id' => 'testimonial',
        'description' => __('Appears on the center of the pages where its required to display testimonials.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Resources right sidebar', 'can'),
        'id' => 'resources_right_sidebar',
        'description' => __('Appears on the right sidebar of all resources page', 'can'),
        'before_widget' => '<div class="row sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="section-heading">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('ApplyNow', 'twentysixteen'),
        'id' => 'applynow',
        'description' => __('Appears on the center of the pages where its required to display apply now button.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Member Benefits', 'twentysixteen'),
        'id' => 'memberbenefit',
        'description' => __('Appears on the center of the pages where its required to display member benefits.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Can capital comparison chart', 'can'),
        'id' => 'can_capital_comparison_chart',
        'description' => __('Appears can capital details', 'can'),
            //'before_widget' => '<section id="%1$s" class="widget %2$s">',
            //'after_widget'  => '</section>',
            //'before_title'  => '<h2 class="widget-title">',
            //'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('video_testimonial', 'can'),
        'id' => 'can_capital_video_testimonial',
        'description' => __('Appears merchant testimonials.', 'can'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section></div></section>',
        'before_title' => '<section id="success_community">
        <div class="container"><h2 class="section-heading">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('social_share', 'can'),
        'id' => 'can-social-share',
        'description' => __('Displayes shocial share icons', 'can'),
            //'before_widget' => '<section id="%1$s" class="widget %2$s">',
            //'after_widget'  => '</section></div></section>',
            //'before_title'  => '<section id="success_community">
            //  <div class="container"><h2 class="section-heading">',
            //'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'twentysixteen_widgets_init');

if (!function_exists('twentysixteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own twentysixteen_fonts_url() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentysixteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Merriweather font: on or off', 'twentysixteen')) {
            $fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'twentysixteen')) {
            $fonts[] = 'Montserrat:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentysixteen')) {
            $fonts[] = 'Inconsolata:400';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentysixteen_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function can_scripts() {
    // Theme stylesheet.
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('owl.theme', get_template_directory_uri() . '/css/owl.theme.css');
    wp_enqueue_style('can-style', get_stylesheet_uri());
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('custom-dev', get_template_directory_uri() . '/css/theme.css');

    // Theme scripts
    wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js');
    wp_enqueue_script('validate', get_template_directory_uri() . '/js/validate.js');
    wp_enqueue_script('jquery.maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
    wp_enqueue_script('custom-dev', get_template_directory_uri() . '/js/custom-dev.js');
    wp_enqueue_script('html5lightbox', get_template_directory_uri() . '/js/html5lightbox.js');
    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value

    $search = $financialProductSlider = $testimonialSlider = $heroSliderTestimonial = $infoGraphSlider = $sliderNav = FALSE;
    $count_financial_product = wp_count_posts('financial_product');

    $count_news_press = wp_count_posts('news')->publish + wp_count_posts('press-releases')->publish;
    $count_video_testimonial = wp_count_posts('video-testimonial');
    $count_funding_graph = wp_count_posts('business-funding-gra');
    $count_getting_funds = wp_count_posts('how_getting_fund');
   
    if (is_front_page()) {
        if ($count_financial_product->publish > 3) {
            $financialProductSlider = TRUE;
        }
    } elseif (is_page('about-us')) {
        if ($count_news_press > 3) {
            $financialProductSlider = TRUE;
        }
    } elseif (is_page('small-business-funding')) {
        $heroSliderTestimonial = TRUE;
        $infoGraphSlider = TRUE;
        if($count_funding_graph->publish > 1){
            $sliderNav = true;
        }
    }elseif (is_page('how-it-works')) {
        if($count_getting_funds->publish > 1){
            $sliderNav = true;
        }
    }
    if ($count_video_testimonial->publish > 2) {
        $testimonialSlider = TRUE;
    }
    if (isset($_GET['search'])) {
        $search = TRUE;
    }

    // Fetch partner lead validation error messages
    $validationsErrs = get_option('partners_lead_generations_validations_error_msg');
    

    // Fetch Quick Quote validation error messages
    $quickQuotevalidationsErrs = get_option('quick_quote_generations_validations_error_msg');
    //Fetch quick quote field option values
    $fieldOptionValue = get_option('quick_quote_field_options');

    //Fetch contact us form validation Error messgaes
    $contact_us_validations_error_msg = get_option('contact_us_validations_error_msg');


    global $post;
    // Search parameters of resource
    $resourceFilteredParameters = array();
    $resourceFilteredParameters['searchKeyword'] = ( isset($_GET['keyword']) && $_GET['keyword'] != '' ) ? $_GET['keyword'] : FALSE;
    $resourceFilteredParameters['businessTypes'] = ( isset($_GET['business-type']) && $_GET['business-type'] != '' ) ? $_GET['business-type'] : FALSE;
    $resourceFilteredParameters['filteredTopics'] = ( isset($_GET['topics']) ) ? $_GET['topics'] : FALSE;

    wp_localize_script('custom-dev', 'var_object', array('ajax_url' => admin_url('admin-ajax.php'),
        'show_more_limit' => get_option('posts_per_page'),
        'image_url' => get_template_directory_uri(),
        'search' => $search,
        'financialProductSlider' => $financialProductSlider,
        'testimonialSlider' => $testimonialSlider,
        'heroSliderTestimonial' => $heroSliderTestimonial,
        'infoGraphSlider' => $infoGraphSlider,
        'sliderNav' => $sliderNav,
        'validationsErrs' => $validationsErrs,
        'resourceFilteredParameters' => $resourceFilteredParameters,
        'quickQuotevalidationsErrs' => $quickQuotevalidationsErrs,
        'fieldOptionValue' => $fieldOptionValue,
        'contact_us_validations_error_msg' => $contact_us_validations_error_msg,
        'resourceURL' => get_permalink($post->ID)
    ));
}

add_action('wp_enqueue_scripts', 'can_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes($classes) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'twentysixteen_body_classes');

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb($color) {
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array('red' => $r, 'green' => $g, 'blue' => $b);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr($sizes, $size) {
    $width = $size[0];

    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3);

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args($args) {
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    return $args;
}

add_filter('widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args');

function load_me_on_header() {
    // do something here ... like show error message.
}

add_action('wp_head', 'load_me_on_header');

/**
 * Creates a widget to display History of Funding Slider Component 
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for widget name and its class name.
 * @return array A new modified arguments.
 */
class HISTORY_FUNDING_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'history_funding_widget',
            'description' => 'Description for history of funding Slider component.',
        );
        parent::__construct('history_funding_widget', 'HISTORY FUNDING Widget', $widget_ops);
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
        $funding_Details = get_post(59);
        echo $funding_Details->post_content;
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

/* * ** Add action for custom widget*** */

add_action('widgets_init', function() {
    register_widget('HISTORY_FUNDING_Widget');
});

/* * *********************************************
 * Adding custom widget for financial products *
 * ******************************************** */

class Financial_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'financial_widget', // Base ID
                'Financial Widget', // Name
                array('description' => __('Displays your financial products with their title and excerpt.'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'financial_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'financial_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        $this->getfinancialListings($numberOfListings);
        echo $after_widget;
    }

    /*     * ****************************************************
     * Function to fetch listing of financial products ****
     * *************************************************** */

    function getfinancialListings($numberOfListings) { //html
        global $post;
        //add_image_size( 'financial_widget_size', 85, 45, false );
        $listings = new WP_Query();
        $listings->query('post_type=financial_product&posts_per_page=' . $numberOfListings . '&orderby=menu_order date&order=ASC');
        if ($listings->found_posts > 0) {
            echo '<div class="container">
				<div id="slider_feature_product" class="owl-carousel owl-theme">';
            while ($listings->have_posts()) {
                $listings->the_post();

                $listItem = '<div class="item">
                                <div class="financial-product-item">';

                if (has_post_thumbnail($post->ID)):
                    $listItem .= '<div class="category-icon">' . get_the_post_thumbnail($post->ID) . '</div>';
                endif;
                $listItem .= ' <h5>' . get_the_title() . '</h5>
                                        <p>' . get_the_excerpt() . '</p>
                                        <a href="' . get_the_permalink() . '" title="Learn more" class="learn-more-btn"> Learn more <i class="glyphicon glyphicon-play"></i></a>
                                </div>
					</div>';
                //$listItem .= '<span>Added ' . get_the_date() . '</span></li>';
                echo $listItem;
            }
            echo '</div></div>';
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }

}

//end class Realty_Widget
register_widget('Financial_Widget');


/* * *********************************************
 * Adding custom widget for Testimonials*
 * ******************************************** */

class Testimonial_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'testimonial_widget', // Base ID
                'Testimonial Widget', // Name
                array('description' => __('Displays your testimonials with their title and excerpt.'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        $instance['type'] = strip_tags($new_instance['type']);
        return $instance;
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
            $type = esc_attr($instance['type']);
        } else {
            $title = '';
            $numberOfListings = '';
            $type = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'financial_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'financial_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type of Testimonial:', 'testimonial_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('type'); ?>"  name="<?php echo $this->get_field_name('type'); ?>">
                <option <?php echo "" == $type ? 'selected="selected"' : ''; ?> value="">All</option>
                <option <?php echo "merchant" == $type ? 'selected="selected"' : ''; ?> value="merchant">Merchant</option>
                <option <?php echo "partner" == $type ? 'selected="selected"' : ''; ?> value="partner">Partner</option>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        $type = $instance['type'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        $this->gettestimonialListings($numberOfListings, $type);
        echo $after_widget;
    }

    /*     * *********************************************************
     * Function to fetch listing of testimonials 
     * Parameters : $numberOfListings, $type(Type of testimonial)
     * Return : Html view with listing of items.
     * ********************************************************* */

    function gettestimonialListings($numberOfListings, $type) { //html
        global $post;
        //add_image_size( 'financial_widget_size', 85, 45, false );
        $listings = new WP_Query();
        if ($post->post_type == 'partner-type') {
            $type = 'partner';
        }

        $listings->query('post_type=testimonial&testimonial-category=' . $type . '&posts_per_page=' . $numberOfListings . '&orderby=menu_order date&order=ASC');
        $total_items = $listings->found_posts;
        if ($total_items > 0) {
            echo '<section  id="testimonial">
			<div class="tranp-div-two"></div>
			<div class="tranp-div gradient-one"></div>
			<div class="container">
				<div id="slider_testimonial" class="owl-carousel owl-theme">';
            while ($listings->have_posts()) {
                $listings->the_post();
                if (has_post_thumbnail($post->ID)):
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                endif;
                $listItem = '<div class="item">
								<div class="row">	
									<div class="col-sm-4">';
                if (has_post_thumbnail($post->ID)):
                    $listItem .= '<div class="user-icon">' . get_the_post_thumbnail($post->ID, 'single-post-thumbnail', array('class' => 'img-responsive')) . '</div>';
                endif;

                $listItem .= '</div>
									<div class="col-sm-8">
										<div class="testimonial-content">
											<h3 class="testimonial-heading">' . get_the_content() . '</h3>
											<h3 class="customer-info">- ' . get_the_title() . ', ' . get_post_meta($post->ID, 'wpcf-business_name', true) . '</h3>
										</div>
									</div>
								</div>
							</div>';
                echo $listItem;
            }
            echo '</div><div class="row slider-nav-control customNavigation">';
            //var_dump($listings->found_posts()); die;
            if ($total_items > 1) {
                echo '<div class="col-md-4">
                        <a title="prev" class=" prev"><i class="glyphicon glyphicon-menu-left"></i></a>
                        <span class="current-slider"> 1 </span>
                        <span class="slider-ratio">/</span> 
                        <span class="total-slider"> ' . $total_items . ' </span>
                        <a title="next" class=" next active"><i class="glyphicon glyphicon-menu-right"></i></a>
                </div>';
            }

            echo '</div></div></section>';
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }

}

//end class Realty_Widget
register_widget('Testimonial_Widget');


/* * *********************************************************
 * Widget to display global block for apply now button
 * Parameters : $title, URL for the button
 * Return : $title and URL
 * *************************************************** */

class ApplyNow_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'applyNow_widget', // Base ID
                'ApplyNow Widget', // Name
                array('description' => __('Apply now button to open a global link provided by admin.'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        return $instance;
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $url = esc_attr($instance['url']);
        } else {
            $title = 'APPLY NOW';
            $url = '#';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'applyNow_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL:', 'applyNow_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $url = $instance['url'];
        echo $before_widget;
        if ($title) {
            //echo $before_title . $title . $after_title;
        }
        $this->getUrlforApplyNow($url, $title);
        echo $after_widget;
    }

    /*     * *********************************************************
     * Function to generate a button with dynamic title
     * Parameters : $url, $title
     * Return : Html view with title and url to be opened.
     * *************************************************** */

    function getUrlforApplyNow($url, $title) { //html
        echo '<a href="' . $url . '" title="' . $title . '" class="btn btn-blue-bg"> ' . $title . ' <i class="glyphicon glyphicon-play"></i></a>';
    }

}

//end class Realty_Widget
register_widget('ApplyNow_Widget');

/* * ****************************************************
  Description : Hook to add data toggle attributes if menu item has children
  Params      : $atts, $item, $args
  return      : $atts (Returns the updated attributes of an anchor)
 * *************************************************** */
add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
    if (in_array('menu-item-has-children', $item->classes) && wp_is_mobile()) {
        $atts['data-toggle'] = 'dropdown';
        $atts['class'] = 'dropdown-toggle';
    }
    return $atts;
}, 10, 3);

/* * ****************************************************
  Description : Hook to change class of submenu in header navigation
  Params      : $menu
  return      : $menu
 * *************************************************** */

function change_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu"/', '/ class="dropdown-menu" /', $menu);
    return $menu;
}

add_filter('wp_nav_menu', 'change_submenu_class');

// Add custom image size
add_image_size('trending-resources', 70, 100);
add_image_size('partners-expertise', 92, 92);
add_image_size('selected-partners', 280, 85);
add_image_size('awards', 140, 130);
add_image_size('related-articles', 360, 155);

add_action('admin_init', 'admin_init');

function admin_init() {
    $post_types = get_post_types(array(
        '_builtin' => false,
            ), 'names', 'or');

    $post_types['post'] = 'post';
    $post_types['page'] = 'page';
    ksort($post_types);

    foreach ($post_types as $key => $val) {
        add_filter('manage_edit-' . $key . '_columns', 'manage_posts_columns');
        add_action('manage_' . $key . '_posts_custom_column', 'manage_posts_custom_column', 10, 2);
    }
    return $screen;
}

function manage_posts_columns($columns) {
    $columns['menu_order'] = __('Order', 'menu_order');
    return $columns;
}

function manage_posts_custom_column($column_name, $post) {

    global $post;
    switch ($column_name) {
        case 'menu_order' :
            $order = $post->menu_order;
            echo $order;
            break;
    }
}

function excerpt_count_js() {

    if ('page' != get_post_type()) {

        echo '<script>jQuery(document).ready(function(){
		jQuery("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:12px;right:34px;color:#666;\"><small>Excerpt length: </small><span id=\"excerpt_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 500</span><small><span style=\"font-weight:bold; padding-left:7px;\">character(s).</span></small></div>");
			 jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
			 jQuery("#excerpt").keyup( function() {
				 if(jQuery(this).val().length > 500){
					jQuery(this).val(jQuery(this).val().substr(0, 500));
    }
			 jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
		   });
		});</script>';
    }
}

add_action('admin_head-post.php', 'excerpt_count_js');
add_action('admin_head-post-new.php', 'excerpt_count_js');

// ajax hooks
add_action('wp_ajax_nopriv_resource_filter_callback', 'resource_filter_callback');

function resource_filter_callback() {
    global $wpdb; // this is how you get access to the database

    $whatever = intval($_POST['whatever']);

    $whatever += 10;

    echo $whatever;

    wp_die(); // this is required to terminate immediately and return a proper response
}

/* * *********************************************
 * Adding custom widget for Member Benefits*
 * ******************************************** */

class MemberBenefit_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'memberBenefit_widget', // Base ID
                'Member Benefits Widget', // Name
                array('description' => __('Displays your member benefits with their title and excerpt.'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'financial_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'financial_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        $type = $instance['type'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        $this->getmemberBenefitListings($numberOfListings, $type);
        echo $after_widget;
    }

    /*     * *********************************************************
     * Function to fetch listing of member benefits 
     * Parameters : $numberOfListings
     * Return : Html view with listing of items.
     * ********************************************************* */

    function getmemberBenefitListings($numberOfListings, $type) { //html
        global $post;
        //add_image_size( 'financial_widget_size', 85, 45, false );
        $listings = new WP_Query();
        $args = array(
            'post_type' => 'member-benefit',
            'post_status' => 'publish',
            'posts_per_page' => $numberOfListings,
            'meta_query' => array(array(
                    'key' => '_is_featured',
                    'value' => 'yes'
                )),
            'orderby' => 'menu_order date',
            'order' => 'ASC'
        );
        //$featured_resources = query_posts($args);
        $listings->query($args);
        if ($listings->found_posts > 0) {
            echo '<section id="member_benefit">
    <div class="container">';
            while ($listings->have_posts()) {
                $listings->the_post();
                if (has_post_thumbnail($post->ID)):
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                endif;
                $listItem = ' <div class="col-md-4 col-sm-4 benefits">
            <div class="category-icon"> <img src="' . $image[0] . '"> </div>
									 <p class="benefit-name">' . get_the_title() . '</p>
            <p class="success-description">' . get_the_content() . '</p>					
        </div>';
                echo $listItem;
            }
            echo '</div></section>';
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }

}

//end class Realty_Widget
register_widget('MemberBenefit_Widget');

// printing array.
function prx($array) {
    echo "<pre>";
    print_r($array);
    die("=========Array ends========");
}

/* * *********************************************
 * Adding custom widget for can capital comparison chart
 * ******************************************** */

class CanCapitalComparison_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'can_capital_comparsion_chart', // Base ID
                'Can Comparison Chart', // Name
                array('description' => __('Display comparsion chart for CAN'))
        );
    }

    function widget($args, $instance) {
        $this->get_can_comparison_chart_data();
        //  echo $after_widget;
    }

    /*     * *********************************************************
     * Function to fetch listing of member benefits 
     * Parameters : $numberOfListings
     * Return : Html view with listing of items.
     * ********************************************************* */

    function get_can_comparison_chart_data() { //html
        // How it work direct deposit queries The Query
        $args = array('post_status' => 'publish',
            'post_type' => 'can-comparison-chart',
            'orderby' => 'menu_order date',
            'order' => 'ASC'
        );
        $can_capital_chart = new WP_Query($args);
        //prx($can_capital_chart);

        $data = get_terms('comparison-chart');
        $logo = array();
        $name = array();

        foreach ($data as $key => $value) {
            $name[$key] = $data[$key]->name;
            $logo[$key] = get_term_meta($data[$key]->term_id, 'wpcf-logo', true);
        }
        $return = '<section id="funding-option">
			<div class="container">
                            <h2 class="section-heading">Experience a better funding option</h2>
				<div class="divtable accordion-xs gradient-one">';
        $return .= '    		<div class="tr headings">
                                            <div class="th firstname"><span></span></div>
                                            <div class="th term-laon"><span>';
        if ($logo[1] != "") {
            $return .= '                        <img alt="" src="' . $logo[1] . '" width="140" height="20">';
        } else {
            $return .= $name[1];
        }
        $return .= '</span></div>';
        if ($logo[0] == "") {
            $return .= '<div class="th trak-laon"><span>' . $name[0] . '</span></div>';
        } else {
            $return .= '<div class="th trak-laon"><span><img alt="" src="' . $logo[0] . '" width="140" height="20"></span></div>';
        }
        if ($logo[2] == "") {
            $return .= '<div class="th installment-loan"><span>' . $name[2] . '</span></div>';
        } else {
            $return .= '<div class="th trak-laon"><span><img alt="" src="' . $logo[2] . '" width="140" height="20"></span></div>';
        }
        $return .= '</div>';
        
        if ($can_capital_chart->have_posts()) :
            
        //echo "<pre>";
            while ($can_capital_chart->have_posts()) : $can_capital_chart->the_post();
                $data = array();
                $chart_topics = wp_get_post_terms(get_the_ID(), 'comparison-chart', array("fields" => "all"));
                foreach($chart_topics as $key => $value){
                    $data[] = $value->term_id;
                    
                }



//print_r($data);
                $return .= '			<div class="tr seprate-block">
						<div class="td firstname accordion-xs-toggle"><span>' . get_the_title() . '</span></div>
						<div class="accordion-xs-collapse" aria-expanded="false">
							<div class="inner">
								<div class="td term-laon"><span>';
                if (($data[0] == 17) || ($data[1] == 17) || ($data[2] == 17)) {
                    $return .= '<img src="' . get_template_directory_uri() . '/images/termsloan/check_bullet.png" alt="TRUSTe link" />';
                }
                $return .= '</span></div>
<div class="td trak-laon"><span>';
                if (($data[0] == 18) || ($data[1] == 18) || ($data[2] == 18)) {
                    $return .= '<img src="' . get_template_directory_uri() . '/images/termsloan/check_bullet.png" alt="TRUSTe link" />';
                }
                $return .= '</span></div>
<div class="td installment-loan"><span>';
                if (($data[0] == 19) || ($data[1] == 19) || ($data[2] == 19)) {
                    $return .= '<img src="' . get_template_directory_uri() . '/images/termsloan/check_bullet.png" alt="TRUSTe link" />';
                }
                $return .= '</span></div>								
								
							</div>
						</div>
					</div>';
            endwhile;
        endif;
        $return .= ' 		</div>
			</div>
		</section>';
        echo $return;
    }

}

//end class Realty_Widget
register_widget('CanCapitalComparison_Widget');

add_filter('walker_nav_menu_start_el', 'wpse_add_arrow', 10, 4);

function wpse_add_arrow($item_output, $item, $depth, $args) {
    if (in_array('menu-item-has-children', $item->classes)) {
        $item_output .='<span class="glyphicon glyphicon-menu-down dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></span>';
    }
    //Only add class to 'top level' items on the 'primary' menu.

    return $item_output;
}

/**
 * Save post metadata when a post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
function save_award_meta($post_id, $post, $update) {

    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
    $slug = 'industry_recognition';

    // If this isn't a 'book' post, don't update it.
    if ($slug != $post->post_type) {
        return;
    }

    // - Update the post's metadata.
    if (isset($_REQUEST['resource_id'])) {
        update_post_meta($post_id, 'resource_id', sanitize_text_field($_REQUEST['resource_id']));
    }
}

add_action('save_post', 'save_award_meta', 10, 3);

/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box('award-resource-mapping', __('Select resource', 'textdomain'), 'award_resource_mapping', 'industry_recognition');
}

add_action('add_meta_boxes', 'wpdocs_register_meta_boxes');

/**
 * Meta box display callback.
 *
 */
function award_resource_mapping($post) {

    // The Query
    $args = array(
        'post_type' => 'resource',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => array(array(
                'key' => 'wpcf-is-resource-award',
                'value' => 1
            )),
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    );
    $award_resources = new WP_Query($args);

    $selected_id = get_post_meta($post->ID, 'resource_id', true);
    $selected = '';
    if ($award_resources->have_posts()) :
        $return = '<select name=resource_id><option value="">Select resource</option>';
        while ($award_resources->have_posts()) : $award_resources->the_post();
            if ($selected_id == get_the_ID()) :
                $selected = 'selected';
            endif;
            $return .= '<option ' . $selected . ' value=' . get_the_ID() . '>' . get_the_title() . '</option>';
        endwhile;
        $return .= '</select>';
    endif;
    echo $return;
}

/* * *********************************************
 * Adding custom widget for video testimonials*
 * ******************************************** */

class VideoTestimonials_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'VideoTestimonials_Widget', // Base ID
                'Video testimonial Widget', // Name
                array('description' => __('Displays your merchant testimonial with their title.'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'financial_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>        
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $type = $instance['type'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        $this->getVideoTestimonialListings($type);
        echo $after_widget;
    }

    /*     * *********************************************************
     * Function to fetch listing of member benefits 
     * Parameters : $numberOfListings
     * Return : Html view with listing of items.
     * ********************************************************* */

    function getVideoTestimonialListings($type) { //html
        global $post;
        //add_image_size( 'financial_widget_size', 85, 45, false );
        $listings = new WP_Query();
        $args = array(
            'post_type' => 'video-testimonial',
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'menu_order date'
        );

        //$featured_resources = query_posts($args);
        $listings->query($args);

        if ($listings->found_posts > 0) {
            $return = '
            <div class="owl-carousel owl-theme">
                <!--Display testimonials for merchants-->';

            if ($listings->found_posts > 0) {
                while ($listings->have_posts()) {

                    $listings->the_post();


                    $return .= '<div class="item">
                            <div class="video-player">' . get_the_post_thumbnail($post->ID) . '
                            </div>
                            <p class="marchent-name">' . get_the_title() . ' </p>
                            <p class="business-label">' . get_post_meta($post->ID, 'wpcf-business', true) . '</p>
                            <p class="business-name">' . get_post_meta($post->ID, 'wpcf-video_topic', true) . ' </p>
                            <p class="success-description">' . get_the_content() . ' </p>					
                        </div>';
                }
            }
            $return .= '     
            </div>            
        </div>			
    </section>';
            echo $return;
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }

}

//end class Realty_Widget
register_widget('VideoTestimonials_Widget');

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function can_how_it_works_add_pages() {
    add_menu_page('How It Works', 'How it works', '6', 'edit.php?post_type=how-it-work-effortle', '', '', 6);
    add_submenu_page('edit.php?post_type=how-it-work-effortle', 'Effortless Applications', 'Effortless Applications', 5, 'edit.php?post_type=how-it-work-effortle');
    add_submenu_page('edit.php?post_type=how-it-work-effortle', 'Hero process', 'Hero process', 5, 'edit.php?post_type=how-it-work-process');
    add_submenu_page('edit.php?post_type=how-it-work-effortle', 'Gathers Before Start', 'Gathers Before Start', 5, 'edit.php?post_type=how-it-work-gather');
    add_submenu_page('edit.php?post_type=how-it-work-effortle', 'Getting Funds', 'Getting Funds', 5, 'edit.php?post_type=how_getting_fund');
}

/*
 * Adding menus for How it works section admin panel
 */

add_action('admin_menu', 'can_how_it_works_add_pages');

function can_small_business_fundng_add_pages() {
    add_menu_page('Small Business Funding', 'Small Business Funding', '6', 'edit.php?post_type=hero-banner-slider', '', '', 6);
    add_submenu_page('edit.php?post_type=hero-banner-slider', 'Hero Slider', 'Hero Slider', 5, 'edit.php?post_type=hero-banner-slider');
    add_submenu_page('edit.php?post_type=hero-banner-slider', 'Business Funding Charts', 'Business Funding Charts', 5, 'edit.php?post_type=business-funding-cha');
    add_submenu_page('edit.php?post_type=hero-banner-slider', 'Business Funding Headings', 'Business Funding Heading', 5, 'edit-tags.php?taxonomy=business-funding-hea&post_type=business-funding-cha');
    add_submenu_page('edit.php?post_type=hero-banner-slider', 'Business Funding Graphs', 'Business Funding Graphs', 5, 'edit.php?post_type=business-funding-gra');
}

/*
 * Adding menus for How it works section admin panel
 */

add_action('admin_menu', 'can_small_business_fundng_add_pages');

function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style]';

    // Add to extended_valid_elements if it alreay exists
    if (isset($init['extended_valid_elements'])) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}

add_filter('tiny_mce_before_init', 'myextensionTinyMCE');


add_action('wp_ajax_nopriv_ajax_resources_pagination', 'ajax_resources_pagination');
add_action('wp_ajax_ajax_resources_pagination', 'ajax_resources_pagination');


/* * ****************************************************************************
 * Callback function of ajax hook to add ajax pagination on resource search page
 * ********************************************************* ******************** */

function ajax_resources_pagination() {
    global $post;
    $filteredParameters = $_POST['resourceFilteredParameters'];
    $prevOffset = $_POST['offset'];
    $itemsPerPage = get_option('posts_per_page');
    $offset = ($prevOffset - 1) * $itemsPerPage;
    
    if ( $_POST['currentTab'] == 'Most Popular' ) {
        $most_popular_args = array(
            'post_status'         => 'publish',
            'meta_key'            => '_count-views_all', 
            'meta_value_num'      => '0',
            'meta_compare'        => '>',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
            'offset'              => $offset,
            'showposts'           => $itemsPerPage,
            'post_type'           => 'resource'
        );
    }
    else {
         $args = array(
            'post_type'   => 'resource',
            'post_status' => 'publish',
            'offset'      => $offset,
            'showposts'   => $itemsPerPage,
            'orderby'     => 'menu_order date',
            'order'       => 'DESC'
         );
    }
    
   

    if ($filteredParameters['searchKeyword']) {
        $most_popular_args['s'] = $args['s'] = $filteredParameters['searchKeyword'];
    }

    // If only business type selected
    if ($filteredParameters['businessTypes'] != 'false') {
        $most_popular_args['tax_query'] = $args['tax_query'] = array(array(
                'taxonomy' => 'business-type',
                'field' => 'id',
                'terms' => $filteredParameters['businessTypes']
        ));
    }

    // If only topics are selected	
    if ($filteredParameters['filteredTopics'] != 'false') {
        $most_popular_args['tax_query'] = $args['tax_query'] = array(array(
                'taxonomy' => 'resource-topic',
                'field' => 'id',
                'terms' => $filteredParameters['filteredTopics']
        ));
    }

    if ($filteredParameters['businessTypes'] != 'false' && $filteredParameters['filteredTopics'] != 'false') {
        $most_popular_args['tax_query'] = $args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'business-type',
                'field' => 'id',
                'terms' => $filteredParameters['businessTypes']
            ),
            array(
                'taxonomy' => 'resource-topic',
                'field' => 'id',
                'terms' => $filteredParameters['filteredTopics']
            )
        );
    }

    if ( $_POST['currentTab'] == 'Most Popular' ) {
        $resources = new WP_Query($most_popular_args);
    }
    else {
        $resources = new WP_Query($args);
    }
  
    $return = '';

     //create a object to show estimated reading time for a post.
    $estimated_time = new EstimatedPostReadingTime();
    if ($resources->have_posts()) {
        $response['status'] = 'success';
        while ($resources->have_posts()) : $resources->the_post();
            $return .= search_sort_resources_array( $post );
        endwhile;
    } else {
        $response['status'] = 'error';
        $return = '<div class="row"><div class="col-sm-12 resource-list"><h3 class="section-heading">No more Resource found!</h3></div></div>';
    }

    $response['data'] = $return;
    echo json_encode($response);
    die();
}

/* * ****************************************************************************
 * Callback function of shortcode to be used in resource detail page
 * ********************************************************* ******************** */

function resource_detail_copy_text() {
    global $post;
    //  prx($post);
    // Fetch heading
    $heading = get_post_meta($post->ID, 'wpcf-copy-text-heading', true);

    // Fetch person name
    $person_name = get_post_meta($post->ID, 'wpcf-person-name', true);

    // Fetch business name
    $business_name = get_post_meta($post->ID, 'wpcf-business-name', true);
    $return = '';

    if ($heading != '' || $person_name != '' || $business_name != '') {
        $return = '<div class="testimonial-content">';
        if ($heading != '') {
            $return .= '  <h3 class="testimonial-heading">"' . $heading . '"</h3>';
        }
        $return .= '<h3 class="customer-info">– ' . $person_name;
        if ($business_name != '') {
            $return .= ', ' . $business_name;
        }
        $return .= '</h3></div>';
    }
    return $return;
}

add_shortcode('resource-detail-copy-text', 'resource_detail_copy_text');

add_action('wp_ajax_nopriv_newsletter_subscribe', 'newsletter_subscribe');
add_action('wp_ajax_newsletter_subscribe', 'newsletter_subscribe');

/* * ****************************************************************************
 * Callback function of ajax hook to subscibe on newsletter
 * ********************************************************* ******************** */

function newsletter_subscribe() {
    $email = $_POST['email'];
    $emailFormat = get_option('news_letter_data');

    $headers[] = 'From: ' . get_option('admin_email');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    $response = array();
    if (wp_mail($email, $emailFormat['subject'], $emailFormat['body'], $headers)) {
        $reponse['msg'] = 'Sucess';
        $reponse['data'] = '<label class="sucess">Thank you to subscribe. Email has been sent to you.</label>';
    }
    echo json_encode($reponse);
    exit;
}

add_action('wp_ajax_nopriv_ajax_resources_listing_pagination', 'ajax_resources_listing_pagination');
add_action('wp_ajax_ajax_resources_listing_pagination', 'ajax_resources_listing_pagination');

/* * ****************************************************************************
 * Callback function of ajax hook to paginate topic vise resource listing
 * ********************************************************* ******************** */

function ajax_resources_listing_pagination() {
    global $post;
    $itemsPerPage = get_option('posts_per_page');
    $term = $_POST['term'];
    $offset = ($_POST['offset'] - 1) * $itemsPerPage;

    $args = array(
        'post_type' => 'resource',
        'post_status' => 'publish',
        'offset' => $offset,
        'showposts' => $itemsPerPage,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(array(
                'taxonomy' => 'resource-topic',
                'field' => 'id',
                'terms' => $term
            ))
    );

    $resources = new WP_Query($args);

    $response = array();
    $return = '';
    //create a object to show estimated reading time for a post.
    $estimated_time = new EstimatedPostReadingTime();
    if ($resources->have_posts()) {
        $response['status'] = 'success';
        while ($resources->have_posts()) : $resources->the_post();

            // Fetch topic of a resource
            $resource_topics = wp_get_post_terms(get_the_ID(), 'resource-topic', array("fields" => "names"));
            if (!empty($resource_topics)) {
                $topics = 'in ' . implode(", ", $resource_topics);
                $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
            } else {
                $topics = '';
            }

            // Sponsored By
            $sponsored_by = get_post_meta(get_the_ID(), 'wpcf-sponsored-by', true);
            $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;

            // Reading time
            $reading_time = $estimated_time->estimate_time_shortcode($post)." Read";
            $meta         =  get_post_meta($post->ID, '_fvp_video', true);
            if ( is_array($meta) && array_key_exists('id',$meta ) ) {
               $video_attach_data  =  get_post_meta($meta['id'], '_wp_attachment_metadata');
               $reading_time       = $video_attach_data[0]['length_formatted']." minute View";
           }
            
            $title = esc_attr(strlen(get_the_title()) >= 75 ? substr(get_the_title(), 0, 75) . ' ...' : get_the_title());
            $excerpt = strlen(get_the_excerpt()) >= 145 ? substr(get_the_excerpt(), 0, 145) . ' ...' : get_the_excerpt();
            $author_description = get_user_meta(get_the_author_id(), 'description', true);
            $user_title = get_user_meta($post->post_author, 'wpcf-user-title', true);
            $return .= '<div class="row">
                <div class="col-sm-12 resource-list">';

            if (has_post_thumbnail(get_the_ID())) {

                $return .= '<div class="resource-image"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail(get_the_ID()) . '</a></div>';
            }
            $return .= '<div class="resource-content">
                        <p class="read-date">' . get_the_date('F j, Y', get_the_ID()) . '<b> ' . $topics . '</b></p>
                        <p class="featured-title"><a href="' . get_the_permalink(get_the_ID()) . '">' . $title . '</a></p>
                        <p>' . $excerpt . '</p>';
            if ($reading_time) {
                $return .= '<p class="read-time">' . $reading_time . '</p>';
            }

            if ($sponsored_by != '') {
                $return .= '<div class="sponsored">
                            <p>Sponsored By ' . $sponsored_by . '</p>
                            </div>';
            }
            $return .= '</div>
                </div>
                <div class="col-sm-12"> <div class="client-testimonials">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    ' . get_avatar(get_the_author_id(), '50*50') . '
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">' . get_the_author_posts_link() . '</h4><h5>' . $user_title . '</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        endwhile;
    } else {
        $response['status'] = 'error';
        $return = '<div class="row"><div class="col-sm-12 resource-list"><h3 class="section-heading">No Resource found!</h3></div></div>';
    }
    $response['data'] = $return;
    echo json_encode($response);
    exit;
}

add_action('wp_ajax_nopriv_ajax_author_listing_pagination', 'ajax_author_listing_pagination');
add_action('wp_ajax_ajax_author_listing_pagination', 'ajax_author_listing_pagination');

/* * ****************************************************************************
 * Callback function of ajax hook to paginate topic vise resource listing
 * ********************************************************* ******************** */

function ajax_author_listing_pagination() {
    global $post;
    $itemsPerPage = get_option('posts_per_page');
    $author = $_POST['author'];
    $offset = ($_POST['offset'] - 1) * $itemsPerPage;

    $args = array(
        'author' => $author,
        'orderby' => 'post_date',
        'post_type' => 'resource',
        'offset' => $offset,
        'showposts' => $itemsPerPage,
        'post_status' => 'publish',
        'order' => 'DESC',
            //  'posts_per_page' => -1
    );

    $resources = new WP_Query($args);

    $response = array();
    $return = '';
    //create a object to show estimated reading time for a post.
    $estimated_time = new EstimatedPostReadingTime();
    if ($resources->have_posts()) {
        $response['status'] = 'success';
        while ($resources->have_posts()) : $resources->the_post();

            // Fetch topic of a resource
            $resource_topics = wp_get_post_terms(get_the_ID(), 'resource-topic', array("fields" => "names"));
            if (!empty($resource_topics)) {
                $topics = 'in ' . implode(", ", $resource_topics);
                $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
            } else {
                $topics = '';
            }

            // Sponsored By
            $sponsored_by = get_post_meta(get_the_ID(), 'wpcf-sponsored-by', true);
            $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;


            // Reading time
            $reading_time = $estimated_time->estimate_time_shortcode($post)." Read";
            $meta         =  get_post_meta($post->ID, '_fvp_video', true);
            if ( is_array($meta) && array_key_exists('id',$meta ) ) {
               $video_attach_data  =  get_post_meta($meta['id'], '_wp_attachment_metadata');
               $reading_time = $video_attach_data[0]['length_formatted']." minute View";
           }
            $title = esc_attr(strlen(get_the_title()) >= 75 ? substr(get_the_title(), 0, 75) . ' ...' : get_the_title());
            $excerpt = strlen(get_the_excerpt()) >= 145 ? substr(get_the_excerpt(), 0, 145) . ' ...' : get_the_excerpt();
            $author_description = get_user_meta(get_the_author_id(), 'description', true);
            $return .= '<div class="row">
                <div class="col-sm-12 resource-list">';
            if (has_post_thumbnail(get_the_ID())) {

                $return .= '<div class="resource-image"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail(get_the_ID()) . '</a></div>';
            }
            $return .= '<div class="resource-content">
                        <p class="read-date">' . get_the_date('F j, Y', get_the_ID()) . '<b> ' . $topics . '</b></p>
                        <p class="featured-title"><a href="' . get_the_permalink(get_the_ID()) . '">' . $title . '</a></p>
                        <p>' . $excerpt . '</p>';
            if ($reading_time) {
                $return .= '<p class="read-time">' . $reading_time . '</p>';
            }

            if ($sponsored_by != '') {
                $return .= '<div class="sponsored">
                            <p>Sponsored By ' . $sponsored_by . '</p>
                            </div>';
            }
            $return .= '</div>
                </div>
            </div>';
        endwhile;
    } else {
        $response['status'] = 'error';
        $return = '<div class="row"><div class="col-sm-12 resource-list"><h3 class="section-heading">No more Resource found!</h3></div></div>';
    }
    $response['data'] = $return;
    echo json_encode($response);
    exit;
}

// get the steing length

function get_string_length($str, $len = '35') {
    $return = (strlen($str) >= $len) ? substr($str, 0, $len) . ' ...' : $str;
    return $return;
}

/* * *********************************************************
 * Callback function of menu hook 
 * ********************************************************* */

function can_about_us_add_pages() {
    add_menu_page('About Us', 'About Us', '6', 'edit.php?post_type=leading-team', '', '', 6);
    add_submenu_page('edit.php?post_type=leading-team', 'Leading Team', 'Leading Team', 5, 'edit.php?post_type=leading-team');
    add_submenu_page('edit.php?post_type=leading-team', 'News', 'News', 5, 'edit.php?post_type=news');
    add_submenu_page('edit.php?post_type=leading-team', 'Press releases', 'Press releases', 5, 'edit.php?post_type=press-releases');
}

/*
 * Adding menus for How it works section admin panel
 */

add_action('admin_menu', 'can_about_us_add_pages');

add_action('wp_ajax_nopriv_ajax_glossary_pagination', 'ajax_glossary_pagination');
add_action('wp_ajax_ajax_glossary_pagination', 'ajax_glossary_pagination');

/* * ****************************************************************************
 * Callback function of ajax hook to paginate glossary listing
 * ********************************************************* ******************** */

function ajax_glossary_pagination() {
    global $post;
    $itemsPerPage = 20;
    $offset = ($_POST['offset'] - 1) * $itemsPerPage;

    $args = array(
        'post_type' => 'resource',
        'post_status' => 'publish',
        'orderby' => 'post_title',
        'order' => 'asc',
        'offset' => $offset,
        'showposts' => $itemsPerPage,
    );

    $resources = new WP_Query($args);
    $glossary = array();

    if ($resources->have_posts()) :
        while ($resources->have_posts()) : $resources->the_post();
            if (preg_match("/^[a-zA-Z]+$/", substr(strtoupper(get_the_title()), 0, 1))) {
                $glossary[substr(strtoupper(get_the_title()), 0, 1)][] = get_the_title();
            } else {
                $glossary["#"][] = get_the_title();
            }

        endwhile;
    endif;

    if (count($glossary)) {
        $return = '';
        $response['status'] = 'success';
        foreach ($glossary as $key => $value) {
            $return .= '<div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-heading">' . $key . '</h2>';
            foreach ($value as $innrkey => $innervalue) {
                $return .= '<p class="featured-title"><a href="'.get_the_permalink($innervalue->ID).'">' . $innervalue . '</a></p>';
            }

            $return .= '</div>
                </div>';
        }
    } else {
        $response['status'] = 'error';
        $return = '<div class="row"><div class="col-sm-12 resource-list"><h3 class="section-heading">No more Resource found!</h3></div></div>';
    }
    $response['data'] = $return;
    echo json_encode($response);
    exit;
}

add_action('save_post', 'awards_validate_thumbnail');

function awards_validate_thumbnail($post_id) {
    // Only validate post type of post
    if (get_post_type($post_id) != 'industry_recognition')
        return;

    // Check post has a thumbnail
    if (!has_post_thumbnail($post_id)) {
        // Confirm validate thumbnail has failed
        set_transient("awards_validate_thumbnail_failed", "true");

        // Remove this action so we can resave the post as a draft and then reattach the post
        remove_action('save_post', 'awards_validate_thumbnail');
        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
        add_action('save_post', 'awards_validate_thumbnail');
    } else {
        // If the post has a thumbnail delete the transient
        delete_transient("awards_validate_thumbnail_failed");
    }
}

add_action('admin_notices', 'awards_validate_thumbnail_error');

function awards_validate_thumbnail_error() {
    // check if the transient is set, and display the error message
    if (get_transient("awards_validate_thumbnail_failed") == "true") {
        echo "<div id='message' class='error'><p><strong>A post thumbnail must be set before saving the post.</strong></p></div>";
        delete_transient("awards_validate_thumbnail_failed");
    }
}

add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2);

function add_current_nav_class($classes, $item) {

    // Getting the current post details
    global $post;

    // Getting the post type of the current post
    $current_post_type = get_post_type_object(get_post_type($post->ID));
    $current_post_type_slug = $current_post_type->rewrite[slug];

    // Getting the URL of the menu item
    $menu_slug = strtolower(trim($item->url));

    // If the menu item URL contains the current post types slug add the current-menu-item class
    if (strpos($menu_slug, $current_post_type_slug) !== false) {

        $classes[] = 'current-menu-item';
    }

    // Return the corrected set of classes to be added to the menu item
    return $classes;
}

function title_count_js() {

    echo '<script>jQuery(document).ready(function(){
            if(typeof jQuery("#wp-wpcf-page-headline-title-editor-container").html() != "undefined"){
  jQuery("#wp-wpcf-page-headline-title-editor-container #qt_wpcf-page-headline-title_toolbar").after("<div style=\"position:relative;color:#666;\"><small>Title length: </small><span id=\"title_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 60</span><small><span style=\"font-weight:bold; padding-left:7px;\">character(s).</span></small></div>");
    jQuery("span#title_counter").text(jQuery("#wpcf-page-headline-title").val().length);
    jQuery("#wpcf-page-headline-title").keyup( function() {
     if(jQuery(this).val().length > 60){
     jQuery(this).val(jQuery(this).val().substr(0, 60));
    }
    jQuery("span#title_counter").text(jQuery("#wpcf-page-headline-title").val().length);
     });
                }  // run code if defined else not.
  });</script>';
}

add_action('admin_head-post.php', 'title_count_js');
add_action('admin_head-post-new.php', 'title_count_js');


function search_sort_resources_array( $post ) {
    
    //create a object to show estimated reading time for a post.
    $estimated_time = new EstimatedPostReadingTime();
    $return = '';
    $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
    if (!empty($resource_topics)) {
        $topics = 'in ' . implode(", ", $resource_topics);
        $topics = strlen($topics) >= 35 ? substr($topics, 0, 35) . ' ...' : $topics;
    } else {
        $topics = '';
    }
    
    // Sponsored By
    $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
    $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
    
    $title = esc_attr(strlen($post->post_title) >= 75 ? substr($post->post_title, 0, 75) . ' ...' : $post->post_title);

    // Reading time
    $reading_time = $estimated_time->estimate_time_shortcode($post)." Read";
    $meta         =  get_post_meta($post->ID, '_fvp_video', true);
    if ( is_array($meta) && array_key_exists('id',$meta ) ) {
        $video_attach_data  =  get_post_meta($meta['id'], '_wp_attachment_metadata');
        $reading_time       = $video_attach_data[0]['length_formatted']." minute View";
    }
    
    $excerpt = strlen($post->post_content) >= 145 ? substr($post->post_content, 0, 145) . ' ...' : $post->post_content;
    $title   = esc_attr(strlen($post->post_title) >= 75 ? substr($post->post_title, 0, 75) . ' ...' : $post->post_title);
    
    $return .= '<div class="row">
                <div class="col-sm-12 resource-list">';
                if ( has_post_thumbnail( $post->ID) ) {
                    $return .= '<div class="resource-image">'.get_the_post_thumbnail( $post->ID ).'</div>';
                }
             
                $return .=  '<div class="resource-content">
                <p class="read-date">'.get_the_date('F j, Y', $post->ID).' <b>'.$topics.'</b></p>
                <p class="featured-title"><a href="'.get_the_permalink($post->ID).'">'.$title.'</a></p>
                <p>'.$excerpt.'</p>';
                if ( $reading_time ) {
                    $return .= ' <p class="read-time">'.$reading_time.'</p>';
                }
                if ( $sponsored_by != '' ) {
                    $return .= '<div class="sponsored">
                            <p>Sponsored By '.$sponsored_by.'</p>
                        </div>'; 
                }        
                $return .= '</div></div></div>';
    return $return;
}
/* * ************************************************************************
 * Making featured image as a required field for Employee Spotlight section
 * ************************************************************************ */

function featured_image_requirement() {
    global $post;

    if (!has_post_thumbnail() && $post->post_type == 'employee-spotlight') {

        wp_die('You forgot to set the featured image. Click the back button on your browser and set it.');
    }
}

add_action('pre_post_update', 'featured_image_requirement');
