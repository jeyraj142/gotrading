<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'tp_branded_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','tp-branded' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'tp-branded' ),
		'panel'             => 'tp_branded_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'tp-branded' ),
			'section'           => 'tp_branded_single_post_section',
			'on_off_label' 		=> tp_branded_hide_options(),
		)
	)
);

// Archive author meta setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[single_post_hide_author]',
	array(
		'default'           => $options['single_post_hide_author'],
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[single_post_hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'tp-branded' ),
			'section'           => 'tp_branded_single_post_section',
			'on_off_label' 		=> tp_branded_hide_options(),
		)
	)
);