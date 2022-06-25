<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Tp Branded
* @since  Tp Branded 1.0.0
*/

// blog btn title
if ( ! function_exists( 'tp_branded_copyright_text_partial' ) ) :
    function tp_branded_copyright_text_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// project_title selective refresh
if ( ! function_exists( 'tp_branded_project_title_partial' ) ) :
    function tp_branded_project_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['project_title'] );
    }
endif;

// project_read_more_btn_label selective refresh
if ( ! function_exists( 'tp_branded_project_read_more_btn_label_partial' ) ) :
    function tp_branded_project_read_more_btn_label_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['project_read_more_btn_label'] );
    }
endif;

// project_view_all_btn_label selective refresh
if ( ! function_exists( 'tp_branded_project_view_all_btn_label_partial' ) ) :
    function tp_branded_project_view_all_btn_label_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['project_view_all_btn_label'] );
    }
endif;

//process section title selective refresh
if ( ! function_exists( 'tp_branded_process_title_partial' ) ) :
    function tp_branded_process_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['process_title'] );
    }
endif;


// testimonial_title
if ( ! function_exists( 'tp_branded_testimonial_title_partial' ) ) :
    function tp_branded_testimonial_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

// hero_banner_section_title
if ( ! function_exists( 'tp_branded_hero_banner_section_title_partial' ) ) :
    function tp_branded_hero_banner_section_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['hero_banner_section_title'] );
    }
endif;

// biography_title
if ( ! function_exists( 'tp_branded_biography_title_partial' ) ) :
    function tp_branded_biography_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['biography_title'] );
    }
endif;

// biography_description
if ( ! function_exists( 'tp_branded_biography_description_partial' ) ) :
    function tp_branded_biography_description_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['biography_description'] );
    }
endif;

// contact_information_no
if ( ! function_exists( 'tp_branded_contact_information_no_partial' ) ) :
    function tp_branded_contact_information_no_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['contact_information_no'] );
    }
endif;

// contact_email
if ( ! function_exists( 'tp_branded_contact_email_partial' ) ) :
    function tp_branded_contact_email_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['contact_email'] );
    }
endif;

// hero_banner_service_title
if ( ! function_exists( 'tp_branded_hero_banner_service_title_partial' ) ) :
    function tp_branded_hero_banner_service_title_partial() {
        $options = tp_branded_get_theme_options();
        return esc_html( $options['hero_banner_service_title'] );
    }
endif;