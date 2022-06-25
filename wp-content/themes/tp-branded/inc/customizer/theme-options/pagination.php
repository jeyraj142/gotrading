<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tp_branded_pagination',
	array(
		'title'               	=> esc_html__('Pagination','tp-branded'),
		'description'         	=> esc_html__( 'Pagination section options.', 'tp-branded' ),
		'panel'               	=> 'tp_branded_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[pagination_enable]',
	array(
		'sanitize_callback' 	=> 'tp_branded_sanitize_switch_control',
		'default'             	=> $options['pagination_enable'],
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[pagination_enable]',
		array(
			'label'               	=> esc_html__( 'Pagination Enable', 'tp-branded' ),
			'section'             	=> 'tp_branded_pagination',
			'on_off_label' 			=> tp_branded_switch_options(),
		)
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[pagination_type]',
	array(
		'sanitize_callback'   	=> 'tp_branded_sanitize_select',
		'default'             	=> $options['pagination_type'],
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[pagination_type]',
	array(
		'label'               	=> esc_html__( 'Pagination Type', 'tp-branded' ),
		'section'             	=> 'tp_branded_pagination',
		'type'                	=> 'select',
		'choices'			  	=> tp_branded_pagination_options(),
		'active_callback'	  	=> 'tp_branded_is_pagination_enable',
	)
);
