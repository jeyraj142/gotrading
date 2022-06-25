<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'tp_branded_hero_banner_section', array(
	'title'             => esc_html__( 'Hero Banner','tp-branded' ),
	'description'       => esc_html__( 'Hero Banner Section options.', 'tp-branded' ),
	'panel'             => 'tp_branded_front_page_panel',
) );

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_section_enable]', array(
	'default'			=> 	$options['hero_banner_section_enable'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[hero_banner_section_enable]', array(
	'label'             => esc_html__( 'Hero Banner Section Enable', 'tp-branded' ),
	'section'           => 'tp_branded_hero_banner_section',
	'on_off_label' 		=> tp_branded_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[hero_banner_section_enable]', array(
		'selector'            => '#tp_branded_hero_banner_section .tooltiptext',
		'settings'            => 'tp_branded_theme_options[hero_banner_section_enable]',
    ) );
}

// biography title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_section_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[hero_banner_section_title]', array(
	'label'           	=> esc_html__( 'Title', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[hero_banner_section_title]', array(
		'selector'            => '#tp_branded_hero_banner_section .section-title',
		'settings'            => 'tp_branded_theme_options[hero_banner_section_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tp_branded_hero_banner_section_title_partial',
    ) );
}

// biography title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[biography_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['biography_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[biography_title]', array(
	'label'           	=> esc_html__( 'Title', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[biography_title]', array(
		'selector'            => '#tp_branded_hero_banner_section .entry-content',
		'settings'            => 'tp_branded_theme_options[biography_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tp_branded_biography_title_partial',
    ) );
}

// biography description setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[biography_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['biography_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[biography_description]', array(
	'label'           	=> esc_html__( 'Description', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[biography_description]', array(
		'selector'            => '#tp_branded_biography_section .entry-content',
		'settings'            => 'tp_branded_theme_options[biography_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tp_branded_biography_description_partial',
    ) );
}

	// service hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[contact_hr]', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[contact_hr]',
		array(
			'section'         => 'tp_branded_hero_banner_section',
			'active_callback' => 'tp_branded_is_hero_banner_section_enable',
			'type'			  => 'hr'
	) ) );

	// biography title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[contact_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[contact_title]', array(
	'label'           	=> esc_html__( 'Title', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'text',
) );


// biography title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[contact_address]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_address'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[contact_address]', array(
	'label'           	=> esc_html__( 'Contact Address', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// team sub_title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[contact_information_no]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['contact_information_no'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[contact_information_no]', array(
    'label'             => esc_html__( 'Contact Number', 'tp-branded' ),
    'section'           => 'tp_branded_hero_banner_section',
    'type'              => 'text',
    'active_callback'   => function( $control ) {
        return ( 
            tp_branded_is_hero_banner_section_enable( $control )
        );
    },
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[contact_information_no]', array(
        'selector'            => '#top-bar li.number',
        'settings'            => 'tp_branded_theme_options[contact_information_no]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'tp_branded_contact_information_no_partial',
    ) );
}

// team sub_title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[contact_email]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['contact_email'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[contact_email]', array(
    'label'             => esc_html__( 'Contact Number', 'tp-branded' ),
    'section'           => 'tp_branded_hero_banner_section',
    'type'              => 'text',
    'active_callback'   => function( $control ) {
        return ( 
            tp_branded_is_hero_banner_section_enable( $control )
        );
    },
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[contact_email]', array(
        'selector'            => '#top-bar li.number',
        'settings'            => 'tp_branded_theme_options[contact_email]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'tp_branded_contact_email_partial',
    ) );
}


	// service hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_service_hr]', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[hero_banner_service_hr]',
		array(
			'section'         => 'tp_branded_hero_banner_section',
			'active_callback' => 'tp_branded_is_hero_banner_section_enable',
			'type'			  => 'hr'
	) ) );

	// biography title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tp_branded_theme_options[hero_banner_service_title]', array(
	'label'           	=> esc_html__( 'Title', 'tp-branded' ),
	'section'        	=> 'tp_branded_hero_banner_section',
	'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[hero_banner_service_title]', array(
        'selector'            => '#top-bar li.number',
        'settings'            => 'tp_branded_theme_options[hero_banner_service_title]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'tp_branded_hero_banner_service_title_partial',
    ) );
}



for ( $i = 1; $i <= 3; $i++ ) :

	// services posts drop down chooser control and setting
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_service_content_post_' . $i . ']', array(
		'sanitize_callback' => 'tp_branded_sanitize_page',
	) );

	$wp_customize->add_control( new Tp_Branded_Dropdown_Chooser( $wp_customize, 'tp_branded_theme_options[hero_banner_service_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'tp-branded' ), $i ),
		'section'           => 'tp_branded_hero_banner_section',
		'choices'			=> tp_branded_post_choices(),
		'active_callback'	=> 'tp_branded_is_hero_banner_section_enable',
	) ) );

	// services hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[hero_banner_service_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_hero_banner_section',
			'active_callback' => 'tp_branded_is_hero_banner_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;

// Partner image setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_image]', array(
    'sanitize_callback' => 'tp_branded_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tp_branded_theme_options[hero_banner_image]',
    array(
        'label'             => esc_html__( 'Center Image', 'tp-branded' ),
        'section'           => 'tp_branded_hero_banner_section',
        'active_callback'   => 'tp_branded_is_hero_banner_section_enable',
    ) ) );


	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_counter_hr]', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[hero_banner_counter_hr]',
		array(
			'section'         => 'tp_branded_hero_banner_section',
			'active_callback' => 'tp_branded_is_hero_banner_section_enable',
			'type'			  => 'hr'
	) ) );


for ( $i = 1; $i <= 3; $i++ ) :

	// counter title setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'tp_branded_theme_options[hero_banner_counter_value_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Value %d', 'tp-branded' ), $i ),
		'section'        	=> 'tp_branded_hero_banner_section',
		'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
		'type'				=> 'text',
	) );

	// counter position setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_counter_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'tp_branded_theme_options[hero_banner_counter_label_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Label %d', 'tp-branded' ), $i ),
		'section'        	=> 'tp_branded_hero_banner_section',
		'active_callback' 	=> 'tp_branded_is_hero_banner_section_enable',
		'type'				=> 'text',
	) );

	// counter hr setting and control
	$wp_customize->add_setting( 'tp_branded_theme_options[hero_banner_counter_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tp_Branded_Customize_Horizontal_Line( $wp_customize, 'tp_branded_theme_options[hero_banner_counter_hr_'. $i .']',
		array(
			'section'         => 'tp_branded_hero_banner_section',
			'active_callback' => 'tp_branded_is_hero_banner_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;