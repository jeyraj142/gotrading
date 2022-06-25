<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'tp_branded_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','tp-branded' ),
		'description'       => esc_html__( 'Excerpt section options.', 'tp-branded' ),
		'panel'             => 'tp_branded_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'tp_branded_sanitize_number_range',
		'validate_callback' => 'tp_branded_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'tp-branded' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'tp-branded' ),
		'section'     		=> 'tp_branded_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);
