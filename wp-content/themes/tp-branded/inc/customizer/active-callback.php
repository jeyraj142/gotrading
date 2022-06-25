<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

if ( ! function_exists( 'tp_branded_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since  Tp Branded 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tp_branded_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'tp_branded_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tp_branded_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since  Tp Branded 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tp_branded_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'tp_branded_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Tp Branded 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tp_branded_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'tp_branded_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tp_branded_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Tp Branded 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tp_branded_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'tp_branded_theme_options[pagination_enable]' )->value();
	}
endif;


/**
 * Check if topbar section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[topbar_section_enable]' )->value() );
}

/*==================Services===============*/

/**
 * Check if services section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_our_services_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[our_services_section_enable]' )->value() );
}

/*==================Testimonial===============*/

/**
 * Check if testimonial section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[testimonial_section_enable]' )->value() );
}

/*==================our_partners===============*/

/**
 * Check if our_partners section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_our_partners_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[our_partners_section_enable]' )->value() );
}

/**
 * Check if project section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_project_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[project_section_enable]' )->value() );
}

/*==================Services===============*/

/**
 * Check if service section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_process_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[process_section_enable]' )->value() );
}
/*==================hero banner===============*/

/**
 * Check if hero section is enabled.
 *
 * @since  Tp Branded 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tp_branded_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tp_branded_theme_options[hero_banner_section_enable]' )->value() );
}