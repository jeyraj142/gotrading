<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tp_branded_menu',
	array(
		'title'             => esc_html__('Header Menu','tp-branded'),
		'description'       => esc_html__( 'Header Menu options.', 'tp-branded' ),
		'panel'             => 'nav_menus',
	)
);


$wp_customize->add_setting( 'tp_branded_theme_options[primary_search_enable]',
	array(
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
		'default'           => $options['primary_search_enable'],
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[primary_search_enable]',
		array(
			'label'             => esc_html__( 'Show Search Icon', 'tp-branded' ),
			'description'       => esc_html__( 'Show Search Icon in Primary menu', 'tp-branded' ),
			'section'           => 'tp_branded_menu',
			'on_off_label' 		=> tp_branded_switch_options(),
		)
	)
);

// Topbar content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[social_menu_enable]',
	array(
		'default'			=> 	$options['social_menu_enable'],
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
	)
);
 
 $wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[social_menu_enable]',
		array(
			'label'             => esc_html__( 'Social Menu Enable', 'tp-branded' ),
			'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'tp-branded' ), esc_html__( 'Click Here', 'tp-branded' ), esc_html__( 'to create menu', 'tp-branded' ) ),
			'section'           => 'tp_branded_menu',
			'on_off_label' 		=> tp_branded_switch_options(),
		)
	)
);