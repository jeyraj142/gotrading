<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'tp_branded_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'tp-branded' ),
		'priority'   			=> 900,
		'panel'      			=> 'tp_branded_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'tp_branded_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'tp_branded_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);

$wp_customize->add_control( 'tp_branded_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'tp-branded' ),
		'section'    			=> 'tp_branded_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[copyright_text]',
		array(
			'selector'            => '.site-info .wrapper',
			'settings'            => 'tp_branded_theme_options[copyright_text]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'tp_branded_copyright_text_partial',
		)
	);
}
        
// scroll top visible
$wp_customize->add_setting( 'tp_branded_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'tp_branded_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
	'tp_branded_theme_options[scroll_top_visible]',
		array(
			'label'      		=> esc_html__( 'Display Scroll Top Button', 'tp-branded' ),
			'section'    		=> 'tp_branded_section_footer',
			'on_off_label' 		=> tp_branded_switch_options(),
		)
	)
);
