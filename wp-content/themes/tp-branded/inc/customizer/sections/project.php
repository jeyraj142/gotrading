<?php
/**
 * Project Section options
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */

// Add Project section
$wp_customize->add_section( 'tp_branded_project_section',
	array(
		'title'             => esc_html__( 'Project','tp-branded' ),
		'description'       => esc_html__( 'Project Section options.', 'tp-branded' ),
		'panel'             => 'tp_branded_front_page_panel',
    )
);

// Project content enable control and setting
$wp_customize->add_setting( 'tp_branded_theme_options[project_section_enable]',
    array(
        'default'           =>  $options['project_section_enable'],
        'sanitize_callback' => 'tp_branded_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Tp_Branded_Switch_Control( $wp_customize,
    'tp_branded_theme_options[project_section_enable]',
        array(
            'label'             => esc_html__( 'Project Section Enable', 'tp-branded' ),
            'section'           => 'tp_branded_project_section',
            'on_off_label'      => tp_branded_switch_options(),
        ) 
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[project_section_enable]', array(
        'selector'      => '#tp_branded_project_section .tooltiptext',
        'settings'      => 'tp_branded_theme_options[project_section_enable]',
    ) );
}

// Project image setting and control.
$wp_customize->add_setting( 'tp_branded_theme_options[our_project_image]', array(
    'sanitize_callback' => 'tp_branded_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tp_branded_theme_options[our_project_image]',
    array(
        'label'             => esc_html__( 'Background Image', 'tp-branded' ),
        'section'           => 'tp_branded_project_section',
        'active_callback'   => 'tp_branded_is_project_section_enable',
    ) ) );

// project title setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[project_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['project_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'tp_branded_theme_options[project_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'tp-branded' ),
        'section'           => 'tp_branded_project_section',
        'active_callback'   => 'tp_branded_is_project_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[project_title]',
        array(
            'selector'            => '#tp_branded_project_section .section-header h2',
            'settings'            => 'tp_branded_theme_options[project_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'tp_branded_project_title_partial',
        )
    );
}

for ( $i = 1; $i <= 3; $i++ ) :


    // project drop down chooser control and setting
    $wp_customize->add_setting( 'tp_branded_theme_options[project_content_post_' . $i . ']',
        array(
            'sanitize_callback' => 'tp_branded_sanitize_page',
        )
    );

    $wp_customize->add_control( new Tp_Branded_Dropdown_Chooser( $wp_customize,
        'tp_branded_theme_options[project_content_post_' . $i . ']',
            array(
                'label'             => sprintf( esc_html__( 'Select Post %d', 'tp-branded' ), $i ),
                'section'           => 'tp_branded_project_section',
                'choices'           => tp_branded_post_choices(),
                'active_callback'   => 'tp_branded_is_project_section_enable',
            ) 
        )
    );

    //Project separator
    $wp_customize->add_setting('tp_branded_theme_options[project_separator'. $i .']',
        array(
            'sanitize_callback'      => 'tp_branded_sanitize_html',
        )
    );

    $wp_customize->add_control(new Tp_Branded_Customize_Horizontal_Line($wp_customize,
        'tp_branded_theme_options[project_separator'. $i .']',
            array(
                'active_callback'       => 'tp_branded_is_project_section_enable',
                'type'                  =>'hr',
                'section'               =>'tp_branded_project_section',
            )
        )
    );
    
endfor;

// project Read More content setting
$wp_customize->add_setting('tp_branded_theme_options[project_read_more_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['project_read_more_btn_label']

    )
);

$wp_customize->add_control('tp_branded_theme_options[project_read_more_btn_label]',
    array(
        'section'			=> 'tp_branded_project_section',
        'label'				=> esc_html__( 'Read More Button Label', 'tp-branded' ),
        'type'          	=>'text',
        'active_callback'   => function( $control ) {
            return (
                tp_branded_is_project_section_enable( $control )
            );
        },
    )
);


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[project_read_more_btn_label]',
        array(
            'selector'            => '#tp_branded_project_section .read-more .btn',
            'settings'            => 'tp_branded_theme_options[project_read_more_btn_label]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'tp_branded_project_read_more_btn_label_partial',
        ) 
    );
}

// project Read More content setting
$wp_customize->add_setting('tp_branded_theme_options[project_view_all_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
        'default'           => $options['project_view_all_btn_label']

    )
);

$wp_customize->add_control('tp_branded_theme_options[project_view_all_btn_label]',
    array(
        'section'           => 'tp_branded_project_section',
        'label'             => esc_html__( 'View All Button Label', 'tp-branded' ),
        'type'              =>'text',
        'active_callback'   => function( $control ) {
            return (
                tp_branded_is_project_section_enable( $control )
            );
        },
    )
);


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tp_branded_theme_options[project_view_all_btn_label]',
        array(
            'selector'            => '#tp_branded_project_section .view-more .btn',
            'settings'            => 'tp_branded_theme_options[project_view_all_btn_label]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'tp_branded_project_view_all_btn_label_partial',
        ) 
    );
}

// project_btn link setting and control
$wp_customize->add_setting( 'tp_branded_theme_options[project_btn_link]', array(
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'tp_branded_theme_options[project_btn_link]', array(
    'label'             => esc_html__( 'Button Link', 'tp-branded' ),
    'section'           => 'tp_branded_project_section',
    'type'              => 'url',
    'active_callback'   => function( $control ) {
        return (
            tp_branded_is_project_section_enable( $control )
        );
    },
) );