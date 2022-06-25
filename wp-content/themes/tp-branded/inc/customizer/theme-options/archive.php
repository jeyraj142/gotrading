<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'tp_branded_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','tp-branded' ),
		'description'       => esc_html__( 'Archive section options.', 'tp-branded' ),
		'panel'             => 'tp_branded_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'tp-branded' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'tp-branded' ),
		'section'           => 'tp_branded_archive_section',
		'type'				=> 'text',
		'active_callback'	=> function( $control ) {
			return !(
				tp_branded_is_static_homepage_enable( $control )
			);
		}
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[hide_category]',
	array(
		'default'           => $options['hide_category'],
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[hide_category]',
		array(
			'label'             => esc_html__( 'Hide Category', 'tp-branded' ),
			'section'           => 'tp_branded_archive_section',
			'on_off_label' 		=> tp_branded_hide_options(),
		)
	)
);

$wp_customize->add_setting( 'tp_branded_theme_options[hide_archive_post_image]', array(
	'default'           => $options['hide_archive_post_image'],
	'sanitize_callback' => 'tp_branded_sanitize_switch_control',
) );

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize, 'tp_branded_theme_options[hide_archive_post_image]', array(
	'label'             => esc_html__( 'Hide Post Image', 'tp-branded' ),
	'section'           => 'tp_branded_archive_section',
	'on_off_label' 		=> tp_branded_hide_options(),
) ) );