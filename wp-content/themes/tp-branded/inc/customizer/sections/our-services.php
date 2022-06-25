<?php
/**
 * Services Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Services section
$wp_customize->add_section( 'tp_branded_our_services_section', array(
	'title'             => esc_html__( 'Services','tp-branded' ),
	'description'       => esc_html__( 'Services Section options.', 'tp-branded' ),
	'panel'             => 'tp_branded_front_page_panel',
) );

// Services content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[our_services_section_enable]', array(
	'default'			=> 	$options['our_services_section_enable'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[our_services_section_enable]', array(
	'label'             => esc_html__( 'Services Section Enable', 'tp-branded' ),
	'section'           => 'tp_branded_our_services_section',
	'on_off_label' 		=> tp_branded_switch_options(),
) ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[our_services_section_enable]', array(
		'selector'      => '#tp_branded_our_services_section .tooltiptext',
		'settings'      => 'tp_branded_theme_options[our_services_section_enable]',
    ) );
}

// Service section title control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[our_services_section_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['our_services_section_title'],
		
	) 
);

$wp_customize->add_control('tp_branded_theme_options[our_services_section_title]', 
	array(
		'label'             => esc_html__( 'Section Title', 'tp-branded' ),
		'section'           => 'tp_branded_our_services_section',
		'type'              =>'text',
		'active_callback'	=> 'tp_branded_is_our_services_section_enable',
	)
);
$wp_customize->selective_refresh->add_partial(
    'tp_branded_theme_options[our_services_section_title]',
    array(
        'selector'            => '#tp_branded_our_services_section .section-title',
        'render_callback'     => 'tp_branded_our_services_section_partial_title',
    )
);

for ( $i = 1; $i <= 3; $i++ ) :

	// services note control and setting
	$wp_customize->add_setting( 'tp_branded_theme_options[our_services_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Tp_Branded_Icon_Picker( $wp_customize, 'tp_branded_theme_options[our_services_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'tp-branded' ), $i ),
		'section'           => 'tp_branded_our_services_section',
		'active_callback'	=> 'tp_branded_is_our_services_section_enable',
	) ) );

	// services pages drop down chooser control and setting
	$wp_customize->add_setting( 'tp_branded_theme_options[our_services_content_page_' . $i . ']', array(
		'sanitize_callback' => 'tp_branded_sanitize_page',
	) );

	$wp_customize->add_control( new Tp_Branded_Dropdown_Chooser( $wp_customize, 'tp_branded_theme_options[our_services_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'tp-branded' ), $i ),
		'section'           => 'tp_branded_our_services_section',
		'choices'			=> tp_branded_page_choices(),
		'active_callback'	=> 'tp_branded_is_our_services_section_enable',
	) ) );


	// services hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[our_services_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[our_services_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_our_services_section',
			'active_callback' => 'tp_branded_is_our_services_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;