<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function tp_branded_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tp-branded' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function tp_branded_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tp-branded' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}


/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function tp_branded_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tp-branded' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


if ( ! function_exists( 'tp_branded_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function tp_branded_site_layout() {
        $tp_branded_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'tp_branded_site_layout', $tp_branded_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'tp_branded_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function tp_branded_selected_sidebar() {
        $tp_branded_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'tp-branded' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'tp-branded' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'tp-branded' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'tp-branded' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'tp-branded' ),
        );

        $output = apply_filters( 'tp_branded_selected_sidebar', $tp_branded_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'tp_branded_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function tp_branded_global_sidebar_position() {
        $tp_branded_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'tp_branded_global_sidebar_position', $tp_branded_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'tp_branded_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function tp_branded_sidebar_position() {
        $tp_branded_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar-content'    => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'tp_branded_sidebar_position', $tp_branded_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'tp_branded_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function tp_branded_pagination_options() {
        $tp_branded_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'tp-branded' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'tp-branded' ),
        );

        $output = apply_filters( 'tp_branded_pagination_options', $tp_branded_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'tp_branded_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tp_branded_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'tp-branded' ),
            'off'       => esc_html__( 'Disable', 'tp-branded' )
        );
        return apply_filters( 'tp_branded_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'tp_branded_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tp_branded_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'tp-branded' ),
            'off'       => esc_html__( 'No', 'tp-branded' )
        );
        return apply_filters( 'tp_branded_hide_options', $arr );
    }
endif;