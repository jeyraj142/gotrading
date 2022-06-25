<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Branded
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

/*

/*
 * widgets
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*

/**
 * Register widgets
 */
function tp_branded_register_widgets() {

	register_widget( 'tp_branded_Social_Link' );

}
add_action( 'widgets_init', 'tp_branded_register_widgets' );