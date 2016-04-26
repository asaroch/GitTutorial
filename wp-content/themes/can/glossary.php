<?php
/*
  Template Name: glossary
 */
get_header();


// Resources

$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$resources = new WP_Query( $args );
$glossary = array();
if ( $resources->have_posts() ) :
  while ($resources->have_posts()) : $resources->the_post();

        $glossary[preg_match("/^[a-zA-Z]+$/",substr(strtoupper(get_the_title()), 0, 1))?substr(strtoupper(get_the_title()), 0, 1):"#"][] = get_the_title();
  endwhile;
endif;
ksort($glossary);
prx($glossary);

get_footer();
