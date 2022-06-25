<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Tp Branded
	 * @since  Tp Branded 1.0.0
	 */

	/**
	 * tp_branded_doctype hook
	 *
	 * @hooked tp_branded_doctype -  10
	 *
	 */
	do_action( 'tp_branded_doctype' );

?>
<head>
<?php
	/**
	 * tp_branded_before_wp_head hook
	 *
	 * @hooked tp_branded_head -  10
	 *
	 */
	do_action( 'tp_branded_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * tp_branded_page_start_action hook
	 *
	 * @hooked tp_branded_page_start -  10
	 *
	 */
	do_action( 'tp_branded_page_start_action' ); 

	/**
	 * tp_branded_loader_action hook
	 *
	 * @hooked tp_branded_loader -  10
	 *
	 */
	do_action( 'tp_branded_before_header' );

	/**
	 * tp_branded_header_action hook
	 *
	 * @hooked tp_branded_site_branding -  10
	 * @hooked tp_branded_header_start -  20
	 * @hooked tp_branded_site_navigation -  30
	 * @hooked tp_branded_header_end -  50
	 *
	 */
	do_action( 'tp_branded_header_action' );

	/**
	 * tp_branded_content_start_action hook
	 *
	 * @hooked tp_branded_content_start -  10
	 *
	 */
	do_action( 'tp_branded_content_start_action' );

    /**
     * tp_branded_header_image_action hook
     *
     * @hooked tp_branded_header_image -  10
     *
     */
    do_action( 'tp_branded_header_image_action' );
	
