<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Tp Branded
* @since  Tp Branded 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[enable_frontpage_content]',
	array(
		'sanitize_callback'   => 'tp_branded_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[enable_frontpage_content]',
	array(
		'label'       	=> esc_html__( 'Enable Content', 'tp-branded' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'tp-branded' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		'active_callback' => 'tp_branded_is_static_homepage_enable',
	)
);