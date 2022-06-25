<?php
/**
 * Process Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Process section
$wp_customize->add_section( 'tp_branded_process_section', array(
	'title'             => esc_html__( 'Process','tp-branded' ),
	'description'       => esc_html__( 'Process Section options.', 'tp-branded' ),
	'panel'             => 'tp_branded_front_page_panel',
) );

// Process content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[process_section_enable]', array(
	'default'			=> 	$options['process_section_enable'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[process_section_enable]', array(
	'label'             => esc_html__( 'Process Section Enable', 'tp-branded' ),
	'section'           => 'tp_branded_process_section',
	'on_off_label' 		=> tp_branded_switch_options(),
) ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[process_section_enable]', array(
		'selector'      => '#tp_branded_process_section .tooltiptext',
		'settings'      => 'tp_branded_theme_options[process_section_enable]',
    ) );
}

// Partner image setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[process_image]', array(
    'sanitize_callback' => 'tp_branded_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tp_branded_theme_options[process_image]',
    array(
        'label'             => esc_html__( 'Featured Image', 'tp-branded' ),
        'section'           => 'tp_branded_process_section',
        'active_callback'   => 'tp_branded_is_process_section_enable',
    ) ) );


// about title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[process_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['process_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[process_title]', array(
	'label'           	=> esc_html__( 'Title', 'tp-branded' ),
	'section'        	=> 'tp_branded_process_section',
	'type'				=> 'text',
	'active_callback'   => function( $control ) {
		return (
			tp_branded_is_process_section_enable( $control )
		);
	},
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[process_title]', array(
		'selector'            => '#tp_branded_process_section h2.section-title',
		'settings'            => 'tp_branded_theme_options[process_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tp_branded_process_title_partial',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :

	// Process pages drop down chooser control and setting
	$wp_customize->add_setting( 'tp_branded_theme_options[process_content_page_' . $i . ']', array(
		'sanitize_callback' => 'tp_branded_sanitize_page',
	) );

	$wp_customize->add_control( new Tp_Branded_Dropdown_Chooser( $wp_customize, 'tp_branded_theme_options[process_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'tp-branded' ), $i ),
		'section'           => 'tp_branded_process_section',
		'choices'			=> tp_branded_page_choices(),
		'active_callback'	=> 'tp_branded_is_process_section_enable',
	) ) );


	// Process hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[process_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[process_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_process_section',
			'active_callback' => 'tp_branded_is_process_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;