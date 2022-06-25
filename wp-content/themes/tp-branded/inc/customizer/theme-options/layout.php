<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tp_branded_layout',
	array(
		'title'               => esc_html__('Layout','tp-branded'),
		'description'         => esc_html__( 'Layout section options.', 'tp-branded' ),
		'panel'               => 'tp_branded_theme_options_panel',
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[site_layout]',
	array(
		'sanitize_callback'   => 'tp_branded_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control(  new Tp_Branded_Custom_Radio_Image_Control ( $wp_customize,
	'tp_branded_theme_options[site_layout]',
		array(
			'label'               => esc_html__( 'Site Layout', 'tp-branded' ),
			'section'             => 'tp_branded_layout',
			'choices'			  => tp_branded_site_layout(),
		)
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[sidebar_position]',
	array(
		'sanitize_callback'   => 'tp_branded_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control(  new Tp_Branded_Custom_Radio_Image_Control ( $wp_customize,
	'tp_branded_theme_options[sidebar_position]',
		array(
			'label'               => esc_html__( 'Global Sidebar Position', 'tp-branded' ),
			'section'             => 'tp_branded_layout',
			'choices'			  => tp_branded_global_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[post_sidebar_position]',
	array(
		'sanitize_callback'   => 'tp_branded_sanitize_select',
		'default'             => $options['post_sidebar_position'],
	)
);

$wp_customize->add_control(  new Tp_Branded_Custom_Radio_Image_Control ( $wp_customize,
	'tp_branded_theme_options[post_sidebar_position]',
		array(
			'label'               => esc_html__( 'Posts Sidebar Position', 'tp-branded' ),
			'section'             => 'tp_branded_layout',
			'choices'			  => tp_branded_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[page_sidebar_position]',
	array(
		'sanitize_callback'   => 'tp_branded_sanitize_select',
		'default'             => $options['page_sidebar_position'],
	)
);

$wp_customize->add_control( new Tp_Branded_Custom_Radio_Image_Control( $wp_customize,
	'tp_branded_theme_options[page_sidebar_position]',
		array(
			'label'               => esc_html__( 'Pages Sidebar Position', 'tp-branded' ),
			'section'             => 'tp_branded_layout',
			'choices'			  => tp_branded_sidebar_position(),
		)
	)
);