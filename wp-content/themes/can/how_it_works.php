<?php
/*
Template Name: how it works
*/
get_header();
?>
<!--Process for How it Work Section -->

<?php echo get_post_meta( get_the_ID(), 'wpcf-first_process_title', true ); ?>
<?php echo get_post_meta( get_the_ID(), 'wpcf-first_process_descri', true ); ?>

<!--Process ends here-->

<?php get_footer(); ?>

