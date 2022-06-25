<?php
/**
 * Partner Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Partner section
$wp_customize->add_section( 'tp_branded_our_partners_section', array(
	'title'             => esc_html__( 'Our Partner','tp-branded' ),
	'description'       => esc_html__( 'Partner Section options.', 'tp-branded' ),
	'panel'             => 'tp_branded_front_page_panel',
) );

// Partner content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[our_partners_section_enable]', array(
	'default'			=> 	$options['our_partners_section_enable'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[our_partners_section_enable]', array(
	'label'             => esc_html__( 'Partner Section Enable', 'tp-branded' ),
	'section'           => 'tp_branded_our_partners_section',
	'on_off_label' 		=> tp_branded_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[our_partners_section_enable]', array(
		'selector'            => '#tp_branded_our_partners_section .tooltiptext',
		'settings'            => 'tp_branded_theme_options[our_partners_section_enable]',
    ) );
}


for ( $i = 1; $i <= 6; $i++ ) :

	// Partner image setting and control.
	$wp_customize->add_setting( 'tp_branded_theme_options[our_partners_image_' . $i . ']', array(
		'sanitize_callback' => 'tp_branded_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tp_branded_theme_options[our_partners_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Image %d', 'tp-branded' ), $i),
			'section'     		=> 'tp_branded_our_partners_section',
			'active_callback'	=> 'tp_branded_is_our_partners_section_enable',
	) ) );

	// Partner url setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[our_partners_url_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'tp_branded_theme_options[our_partners_url_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Partner Url %d', 'tp-branded' ), $i),
		'section'        	=> 'tp_branded_our_partners_section',
		'active_callback' 	=> 'tp_branded_is_our_partners_section_enable',
		'type'				=> 'url',
	) );

		// services hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[our_partners_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[our_partners_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_our_partners_section',
			'active_callback' => 'tp_branded_is_our_partners_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;