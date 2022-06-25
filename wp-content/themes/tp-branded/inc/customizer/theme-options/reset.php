<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'tp_branded_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','tp-branded'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'tp-branded' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'tp_branded_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'tp-branded' ),
		'section'           => 'tp_branded_reset_section',
		'type'              => 'checkbox',
	)
);
