<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'tp_branded_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','tp-branded' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'tp-branded' ),
	'panel'             => 'tp_branded_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'tp-branded' ),
	'section'           => 'tp_branded_testimonial_section',
	'on_off_label' 		=> tp_branded_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[testimonial_section_enable]', array(
		'selector'            => '#tp_branded_testimonial_section .tooltiptext',
		'settings'            => 'tp_branded_theme_options[testimonial_section_enable]',
    ) );
}

$wp_customize->add_control( 'tp_branded_theme_options[testimonial_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'tp-branded' ),
        'section'           => 'tp_branded_testimonial_section',
        'active_callback'   => 'tp_branded_is_testimonial_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[testimonial_title]',
        array(
            'selector'            => '#tp_branded_testimonial_section .section-header h2',
            'settings'            => 'tp_branded_theme_options[testimonial_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'tp_branded_testimonial_title_partial',
        )
    );
}



for ( $i = 1; $i <= 3; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'tp_branded_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'tp_branded_sanitize_page',
	) );

	$wp_customize->add_control( new Tp_Branded_Dropdown_Chooser( $wp_customize, 'tp_branded_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'tp-branded' ), $i ),
		'section'           => 'tp_branded_testimonial_section',
		'choices'			=> tp_branded_page_choices(),
		'active_callback'	=> 'tp_branded_is_testimonial_section_enable',
	) ) );

	// testimonial position setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'tp_branded_theme_options[testimonial_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Position %d', 'tp-branded' ), $i ),
		'section'        	=> 'tp_branded_testimonial_section',
		'active_callback' 	=> 'tp_branded_is_testimonial_section_enable',
		'type'				=> 'text',
	) );

	// testimonial hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[testimonial_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[testimonial_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_testimonial_section',
			'active_callback' => 'tp_branded_is_testimonial_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
