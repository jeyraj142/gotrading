<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 * @return array An array of default values
 */

function tp_branded_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$branded_default_options = array(
		// Color Options
		'header_title_color'			    => '#000',
		'header_tagline_color'			    => '#000',
		'header_txt_logo_extra'			    => 'show-all',
		'colorscheme_hue'				    => '#d87b4d',
		'colorscheme'					    => 'default',
		'theme_version'						=> 'lite-version',
		'home_layout'						=> 'default-design',

		// typography Options
		'theme_typography' 				    => 'default',
		'body_theme_typography' 		    => 'default',
		
		// loader
		'loader_enable'         		    => (bool) false,
		'loader_icon'         			    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',
		'menu_sticky'					    => (bool) false,
		'search_icon_in_primary_menu_enable'=> (bool) true,

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'tp-branded' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable
		'all_sortable' 						=> 'hero_banner,our_services,project,process,testimonial,our_partners',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'tp-branded' ),
		'hide_archive_post_image'		    => false,		
		'hide_archive_title'			    => false,
		'hide_category'			   			=> (bool) false,
		'hide_archive_date'			   		=> (bool) false,
		'hide_archive_content'			   	=> (bool) false,


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,

		/* Front Page */

		// top bar
		'topbar_section_enable'			=> (bool) false,
		'primary_search_enable'			=> (bool) true,
		'social_menu_enable'			=> (bool) true,

		// hero banner
		'hero_banner_section_enable'   => (bool) false,
		'hero_banner_section_title'    => esc_html__('Get ready for The New Taste in Design','tp-branded'),
		'biography_title'              => esc_html__('Biography','tp-branded'),
		'biography_description'        => esc_html__('I’m a web designer with over ten years of experience based on Nepal','tp-branded'),
		'contact_title'                => esc_html__('Contact','tp-branded'),
		'contact_address'              => esc_html__('Kathmandu, Nepal','tp-branded'),
		'contact_information_no'       => esc_html__('+977 - 01 423 7564','tp-branded'),
		'contact_email'                => esc_html__('hello@themepalace.com','tp-branded'),
		'hero_banner_service_title'    => esc_html__('Services','tp-branded'),



		// Services
		'our_services_section_enable'		    => (bool) false,
		'our_services_section_title'			=> esc_html__( 'Our Services', 'tp-branded' ),


		// testimonial
		'testimonial_section_enable'	    => (bool) false,
		'testimonial_title'	                => esc_html__( 'Client Stories', 'tp-branded' ),
		
		// our partner
		'our_partners_section_enable'	=> (bool) false,

		// project
		'project_section_enable'		   => (bool) false,
		'project_title'    			       => esc_html__('Perfect Projects','tp-branded'),
		'project_read_more_btn_label'      => esc_html__('Read More','tp-branded'),
		'project_view_all_btn_label'       => esc_html__('View Our All Projects','tp-branded'),


		// process
		'process_section_enable'		=> (bool) false,
		'process_title'                 => esc_html__('Our Process','tp-branded'),


	);

	$output = apply_filters( 'tp_branded_default_theme_options', $branded_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}