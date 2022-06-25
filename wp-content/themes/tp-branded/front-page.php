<?php
/**
 * The template for displaying al pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

get_header(); 
		// Call home if Homepage setting is set to latest posts.

	if ( tp_branded_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( tp_branded_is_frontpage() ) {
		
		$options = tp_branded_get_theme_options();

		$sorted = array();
		if ( ! empty( $options['all_sortable'] ) ) {
			$sorted = explode( ',' , $options['all_sortable'] );
		}
		
		foreach ( $sorted as $section ) {
			
			add_action( 'tp_branded_primary_content', 'tp_branded_add_'. $section .'_section' );
		}
		do_action( 'tp_branded_primary_content' );


		if (true === apply_filters( 'tp_branded_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();