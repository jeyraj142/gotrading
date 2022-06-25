<?php
/**
 * Builders Lite Theme Customizer
 *
 * @package Builders Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function builders_lite_customize_register( $wp_customize ) {
	function builders_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->builders_lite_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->builders_lite_lite  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-name-desc a',
	    'render_callback' => 'builders_lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-name-desc p',
	    'render_callback' => 'builders_lite_customize_partial_blogdescription',
	) );

	/*========================
	==	Theme Colors Start
	========================*/

	$wp_customize->add_setting('color_scheme', array(
		'default' => '#ffbc13',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','builders-lite'),
			'description'	=> __('Select theme main color from here.','builders-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('color_sub_scheme', array(
		'default' => '#212427',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_sub_scheme',array(
			'description'	=> __('Select theme sub color from here.','builders-lite'),
			'section' => 'colors',
			'settings' => 'color_sub_scheme'
		))
	);

	$wp_customize->add_setting('builders_lite_headerbg-color', array(
		'default' => '#212427',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'builders_lite_headerbg-color',array(
			'label' => __('Header Background Color','builders-lite'),
			'description'	=> __('Select background color for header.','builders-lite'),
			'section' => 'colors',
			'settings' => 'builders_lite_headerbg-color'
		))
	);

	$wp_customize->add_setting('builders_lite_footer-color', array(
		'default' => '#ffbc13',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'builders_lite_footer-color',array(
			'label' => __('Footer Background Color','builders-lite'),
			'description'	=> __('Select background color for footer.','builders-lite'),
			'section' => 'colors',
			'settings' => 'builders_lite_footer-color'
		))
	);

	/*========================
	==	Theme Colors End
	========================*/

	/*========================
	==	Top Header Start
	========================*/
	$wp_customize->add_section(
        'builders_lite_tphead_info',
        array(
            'title' => __('Setup Top Header', 'builders-lite'),
            'priority' => null,
			'description'	=> __('Add top header information here.','builders-lite'),	
        )
    );
	
	$wp_customize->add_setting( 'builders-lite-email-txt', array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('builders-lite-email-txt',array(
		'type'	=> 'text',
		'label'	=> __('Add email address here here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));
	
	$wp_customize->add_setting( 'builders-lite-phn-txt', array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('builders-lite-phn-txt',array(
		'type'	=> 'text',
		'label'	=> __('Add phone number here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('facebook',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('facebook',array(
		'type'	=> 'url',
		'label'	=> __('Add facebook link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('twitter',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('twitter',array(
		'type'	=> 'url',
		'label'	=> __('Add twitter link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('instagram',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('instagram',array(
		'type'	=> 'url',
		'label'	=> __('Add instagram link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('linkedin',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('linkedin',array(
		'type'	=> 'url',
		'label'	=> __('Add linkedin link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('google',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('google',array(
		'type'	=> 'url',
		'label'	=> __('Add google plus link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));
	
	$wp_customize->add_setting('youtube',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('youtube',array(
		'type'	=> 'url',
		'label'	=> __('Add youtube channel link here.','builders-lite'),
		'section'	=> 'builders_lite_tphead_info'
	));

	$wp_customize->add_setting('builders_lite_tophide',array(
		'default' => true,
		'sanitize_callback' => 'builders_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'builders_lite_tophide', array(
	   'settings' => 'builders_lite_tophide',
	   'section'   => 'builders_lite_tphead_info',
	   'label'     => __('Check this to hide Top Header Information.','builders-lite'),
	   'type'      => 'checkbox'
	));
	
	/*========================
	==	Top Header End
	========================*/	
	
	/*========================
	==	Slider Start
	========================*/
	$wp_customize->add_section(
        'builders_lite_theme_slider',
        array(
            'title' => __('Setting Up Theme Slider', 'builders-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','builders-lite'),	
        )
    );

    $wp_customize->add_setting('slidesmlttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slidesmlttl',array(
		'type'	=> 'text',
		'label'	=> __('Add sub title for all slides','builders-lite'),
		'section'	=> 'builders_lite_theme_slider'
	));

	$wp_customize->add_setting('theme-slide1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide one:','builders-lite'),
		'section'	=> 'builders_lite_theme_slider'
	));	

	$wp_customize->add_setting('theme-slide2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide two:','builders-lite'),
		'section'	=> 'builders_lite_theme_slider'
	));	

	$wp_customize->add_setting('theme-slide3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide three:','builders-lite'),
		'section'	=> 'builders_lite_theme_slider'
	));	
	
	$wp_customize->add_setting('slide_read_more',array(
		'default'	=> __('','builders-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_read_more',array(
		'label'	=> __('Add slider link button text.','builders-lite'),
		'section'	=> 'builders_lite_theme_slider',
		'setting'	=> 'slide_read_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_theme_slider',array(
		'default' => true,
		'sanitize_callback' => 'builders_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_theme_slider', array(
	   'settings' => 'hide_theme_slider',
	   'section'   => 'builders_lite_theme_slider',
	   'label'     => __('Check this to hide slider.','builders-lite'),
	   'type'      => 'checkbox'
    ));
	/*========================
	==	Slider End
	========================*/
	
	/*========================
	==	fisrt Section Start
	========================*/

	$wp_customize->add_section(
        'builders_lite_featured_sec',
        array(
            'title' => __('Setting Up Featured Boxes Section', 'builders-lite'),
            'priority' => null,
			'description'	=> __('Select pages for setting up fist / featured section. This section will be displayed only when you select the static front page.','builders-lite'),	
        )
    );

    $wp_customize->add_setting('builders_lite_feat1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_feat1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','builders-lite'),
			'section'	=> 'builders_lite_featured_sec'
	));
	
	$wp_customize->add_setting('builders_lite_feat2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_feat2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','builders-lite'),
			'section'	=> 'builders_lite_featured_sec'
	));
	
	$wp_customize->add_setting('builders_lite_feat3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_feat3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','builders-lite'),
			'section'	=> 'builders_lite_featured_sec'
	));
	
	$wp_customize->add_setting('builders_lite_feat_more',array(
		'default'	=> __('Read More','builders-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('builders_lite_feat_more',array(
		'label'	=> __('Add Read More text here.','builders-lite'),
		'section'	=> 'builders_lite_featured_sec',
		'setting'	=> 'builders_lite_feat_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('builders_lite_feat_hide',array(
			'default' => true,
			'sanitize_callback' => 'builders_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'builders_lite_feat_hide', array(
		   'settings' => 'builders_lite_feat_hide',
    	   'section'   => 'builders_lite_featured_sec',
    	   'label'     => __('Check this to hide section.','builders-lite'),
    	   'type'      => 'checkbox'
     ));

	/*========================
	==	First Section End
	========================*/
	
	/*========================
	==	Second Section Start
	========================*/

	$wp_customize->add_section(
        'builders_lite_service_sec',
        array(
            'title' => __('Setting Up Services Section', 'builders-lite'),
            'priority' => null,
			'description'	=> __('Select pages for setting up second / services section. This section will be displayed only when you select the static front page.','builders-lite'),	
        )
    );

    $wp_customize->add_setting('builders_lite_ser_ttl',array(
		'default'	=> __('','builders-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('builders_lite_ser_ttl',array(
		'label'	=> __('Add section title here','builders-lite'),
		'section'	=> 'builders_lite_service_sec',
		'setting'	=> 'builders_lite_ser_ttl',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('builders_lite_service1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_service1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','builders-lite'),
			'section'	=> 'builders_lite_service_sec'
	));

	$wp_customize->add_setting('builders_lite_service2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_service2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','builders-lite'),
			'section'	=> 'builders_lite_service_sec'
	));
	
	$wp_customize->add_setting('builders_lite_service3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('builders_lite_service3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','builders-lite'),
			'section'	=> 'builders_lite_service_sec'
	));
	
	$wp_customize->add_setting('builders_lite_service_more',array(
		'default'	=> __('Read More','builders-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('builders_lite_service_more',array(
		'label'	=> __('Add Read More text here.','builders-lite'),
		'section'	=> 'builders_lite_service_sec',
		'setting'	=> 'builders_lite_service_more',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('builders_lite_ser_hide',array(
			'default' => true,
			'sanitize_callback' => 'builders_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'builders_lite_ser_hide', array(
		   'settings' => 'builders_lite_ser_hide',
    	   'section'   => 'builders_lite_service_sec',
    	   'label'     => __('Check this to hide section.','builders-lite'),
    	   'type'      => 'checkbox'
     ));

	/*========================
	==	Second Section End
	========================*/
	
}
add_action( 'customize_register', 'builders_lite_customize_register' );	

function builders_lite_css(){
		?>
        <style>
			a, 
			.tm_client strong,
			.postmeta a:hover,
			#sidebar ul li a:hover,
			.blog-post h3.entry-title,
			a.blog-more:hover,
			#commentform input#submit,
			input.search-submit,
			.blog-date .date,
			.sitenav ul li.current_page_item a,
			.sitenav ul li a:hover, 
			.sitenav ul li.current_page_item ul li a:hover,
			.site-name-desc p,
			.top-header-bar ul li:not(:last-child) i,
			.caption-holder h4,
			.caption-holder a.slide-button:hover,
			.top-header-bar a:hover{
				color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffbc13')); ?>;
			}
			.nivo-caption,
			.caption-holder a.slide-button:hover,
			.caption-holder a.slide-button:hover:before,
			.caption-holder a.slide-button:hover:after,
			.nivo-controlNav a.active{
				border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffbc13')); ?>;
			}
			h3.widget-title,
			.nav-links .current,
			.nav-links a:hover,
			p.form-submit input[type="submit"],
			.social a:hover,
			.nivo-controlNav a.active,
			a.nivo-prevNav,
			a.nivo-nextNav,
			.feat-box.even,
			.service-data .service-more,
			.sitenav ul li a::before,
			.sitenav ul li a::after{
				background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffbc13')); ?>;
			}
			.feat-box,
			.service-col{
				background-color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#212427')); ?>;
			}
			h2.section_title,
			.service-data .service-more{
				color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#212427')); ?>;
			}			
			#header,
			.sitenav ul li.menu-item-has-children:hover > ul,
			.sitenav ul li.menu-item-has-children:focus > ul,
			.sitenav ul li.menu-item-has-children.focus > ul{
				background-color:<?php echo esc_attr(get_theme_mod('builders_lite_headerbg-color','#212427')); ?>;
			}
			.copyright-wrapper{
				background-color:<?php echo esc_attr(get_theme_mod('builders_lite_footer-color','#ffbc13')); ?>;
			}
		</style>
	<?php }
add_action('wp_head','builders_lite_css');

function builders_lite_customize_preview_js() {
	wp_enqueue_script( 'builders-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'builders_lite_customize_preview_js' );