<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

$wp_customize->add_section( 'tp_branded_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','tp-branded' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'tp-branded' ),
		'panel'             => 'tp_branded_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'tp-branded' ),
			'section'          	=> 'tp_branded_breadcrumb',
			'on_off_label' 		=> tp_branded_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'tp-branded' ),
		'active_callback' 	=> 'tp_branded_is_breadcrumb_enable',
		'section'          	=> 'tp_branded_breadcrumb',
	)
);
