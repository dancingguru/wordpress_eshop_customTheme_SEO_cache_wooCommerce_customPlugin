<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime Interior Designer
 */

/**
 *
 * @hooked prime_interior_designer_footer_start
 */
do_action( 'prime_interior_designer_action_before_footer' );

/**
 * Hooked - prime_interior_designer_footer_top_section -10
 * Hooked - prime_interior_designer_footer_section -20
 */
do_action( 'prime_interior_designer_action_footer' );

/**
 * Hooked - prime_interior_designer_footer_end. 
 */
do_action( 'prime_interior_designer_action_after_footer' );

wp_footer(); ?>

</body>  
</html>