<?php
ob_start();
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({appId: '982908548413887', status: true, cookie: true,
                xfbml: true});
        };
        (function () {
            var e = document.createElement('script');
            e.async = true;
            e.src = document.location.protocol +
                    '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
    </script>

</head>
<body <?php body_class(); ?>>
    <?php
    global $show_more_limit;
    $show_more_limit = get_option('posts_per_page');
    ?>
    <div class="wrapper">
        <?php
        if (is_front_page() || is_page('partners') || is_page('how-it-works')) {
            ?>
            <div class="water-mark-image"></div>
            <?php
        }
        ?>
        <nav class="navbar" role="navigation">
            <div class="utility-navigation hidden-xs">
                <div class="container">
                    <div class="collapse navbar-collapse2">		    	
                        <?php
                        // Call utility header
                        $args = array('menu' => 'Utility Navigation', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                        wp_nav_menu($args);
                        ?>	
                    </div>
                </div>  
            </div>
            <div id="main_navigationbar" class="primary-nav">
                <div class="container">
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="navbar-brand" title="CAN CAPITAL"><img src="<?php echo get_header_image(); ?>" alt="CAN CAPITAL" /></a>
                    </div>
                    <div class="collapse navbar-collapse mob-main-menu">
                        <div class='responsive-bg'> 
                            <ul class="nav navbar-nav navbar-right">
                                <div class="row visible-xs">
                                    <div class="col-xs-12 mob-style">
                                        <div class="col-xs-6">
                                            <div class="row">
                                                <p class='label-main-menu'>Main Menu</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="row">
                                                <button class="btn-close-menu pull-right"  data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>	

                                <?php
                                // Call header main menu
                                $args = array(
                                    'menu' => 'Main Navigation',
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'container' => '',
                                    'container_class' => false,
                                    'items_wrap' => '%3$s',
                                    'theme_location' => 'primary',
                                    'submenu_class' => 'dropdown-menu');
                                wp_nav_menu($args);
                                ?>
                            </ul>
                        </div>
                        <div class="nav-cover visible-xs" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">


                        </div>


                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
            <?php
            $top_headline = get_post_meta($post->ID, 'wpcf-page-headline-title', true);
            ?>
            <div class="container">
                <div class="head-titles">
                    <?php
                    if (!is_front_page() && !is_page('resources') && $post->post_type != 'resource' && !is_author($post->post_author)) {
                        ?>
                        <p><?php echo get_the_title($post->ID); ?></p>
                        <?php
                    }
                    ?>
                    <h1><?php
                        echo $top_headline;


                        if (is_page('resources') || is_page('search')) {
                            ?>
                            <button class="glyphicon glyphicon-search search-btn visible-xs"></button>  
                            <?php
                        }
                        ?>
                    </h1>
                    <?php
                    if (is_page('resources') || is_front_page() || is_page('become-a-partner') || is_page('search') || $post->post_type == 'resource' || is_author($post->post_author) || is_page('glossary')) {
                        ?>

                        <?php } elseif (is_page('partners') || is_page('how-it-works') || is_page('small-business-funding')) {
                        ?>
                        <span class="down-arrow inner-page-arrow xs-border"></span>
                    <?php } else { ?>
                        <span class="down-arrow inner-page-arrow"></span>
<?php } ?>
                </div>
            </div>
            <!-- /.container-fluid -->		  
        </nav>
        <?php
        if (!is_front_page() && !is_page('partners') && !is_page('become-a-partner') && $post->post_type != "your desired post type") {
            ?>
            <div id="get_quote">
                <div id="form_box" class="gradient-one get-Quote-form">
            <?php echo get_template_part('get-quick-quote'); ?> 
                </div>
            </div>
            <?php
        }
        ?>
        <!-- BoldChat Live Chat Button HTML v5.00 (Type=Web,ChatButton=Global Chat Button - UAT,Website=CAN Capital UAT) -->
        <div class="boldchat" style="text-align: center; white-space: nowrap;">
            <script type="text/javascript">
                var bccbId = Math.random();
                document.write(unescape('%3Cdiv id=' + bccbId + '%3E%3C/div%3E'));
                var _bcvma = _bcvma || [];
                _bcvma.push(["setAccountID", "810998960199709661"]);
                _bcvma.push(["setParameter", "WebsiteDefID", "243659808238134524"])
                _bcvma.push(["setParameter", "CustomUrl", ""])
                _bcvma.push(["setParameter", "WindowParameters", "vr=&vi=&ve=&vp=&vn=&lc="])
                _bcvma.push(["addStatic", {type: "chat", bdid: "4356481026210030757", id: bccbId}]);
                var bcLoad = function () {
                    if (window.bcLoaded)
                        return;
                    window.bcLoaded = true;
                    var vms = document.createElement("script");
                    vms.type = "text/javascript";
                    vms.async = true;
                    vms.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + "vmss.boldchat.com/aid/810998960199709661/bc.vms4/vms.js";
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(vms, s);
                };
                if (window.pageViewer && pageViewer.load)
                    pageViewer.load();
                else if (window.addEventListener)
                    window.addEventListener('load', bcLoad, false);
                else
                    window.attachEvent('onload', bcLoad);
            </script>
        </div>
        <!-- /BoldChat Live Chat Button HTML v5.00 -->
    <!--    <style>
            .boldchat {      
                left: 44%;
                position: absolute;
                text-align: center;
                top: 41.9%;
                white-space: nowrap;
            }
            .boldchat .bcStatic a {
                display: inline-block;
                height: 50px;
                width: 150px;
            }
            .boldchat .bcStatic a img { display: none}
        </style> -->