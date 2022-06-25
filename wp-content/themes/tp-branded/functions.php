<?php
/**
 * Theme Palace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

if ( ! function_exists( 'tp_branded_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tp_branded_setup() {
        $options = tp_branded_get_theme_options();
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Palace, use a find and replace
		 * to change 'tp-branded' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tp-branded' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'register_block_pattern' );
		add_theme_support( 'register_block_style' );
		add_theme_support( "responsive-embeds" );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 5 );

		add_theme_support( "responsive-embeds" );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widgets.php' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 600, 450, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'tp-branded' ),
			'social' 	=> esc_html__( 'Social', 'tp-branded' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tp_branded_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( '/assets/css/editor-style' . tp_branded_min() . '.css', tp_branded_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'tp-branded' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'tp-branded' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'tp-branded' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'tp-branded' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'tp-branded' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'tp-branded' ),
		       	'shortName' => esc_html__( 'S', 'tp-branded' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'tp-branded' ),
		       	'shortName' => esc_html__( 'M', 'tp-branded' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'tp-branded' ),
		       	'shortName' => esc_html__( 'L', 'tp-branded' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'tp-branded' ),
		       	'shortName' => esc_html__( 'XL', 'tp-branded' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'tp_branded_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tp_branded_content_width() {

	$content_width = $GLOBALS['content_width'];


	$sidebar_position = tp_branded_layout();
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'left-sidebar':
	  case 'right-sidebar':
	    $content_width = 819;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter  Branded content width of the theme.
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'tp_branded_content_width', $content_width );
}
add_action( 'template_redirect', 'tp_branded_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tp_branded_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tp-branded' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tp-branded' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Most Recent Posts Section Sidebar', 'tp-branded' ),
		'id'            => 'most-recent-posts-section-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'tp-branded' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Optional Sidebar %d', 'tp-branded' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'tp-branded' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tp_branded_widgets_init' );


if ( ! function_exists( 'tp_branded_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function tp_branded_fonts_url() {
	$options = tp_branded_get_theme_options();
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Khand, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Arima Madurai: on or off', 'tp-branded' ) ) {
		$fonts[] = 'Arima Madurai:500,700,900&display=swap';
	}
	
	if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'tp-branded' ) ) {
		$fonts[] = 'Oxygen:&display=swap';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since  Tp Branded 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function tp_branded_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'tp-branded-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => esc_url('https://fonts.gstatic.com'),			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'tp_branded_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function tp_branded_scripts() {
	$options = tp_branded_get_theme_options();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'tp-branded-fonts', tp_branded_fonts_url(), array(), null );

	// slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick'. '.css' );

	// slick theme
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme'. '.css' );
	
	// font awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome'. tp_branded_min() . '.css' );

	// all
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/css/all'. tp_branded_min() . '.css', array( 'font-awesome' ), '4.7.0', true );
	
	// blocks
	wp_enqueue_style( 'tp-branded-blocks', get_template_directory_uri() . '/assets/css/blocks' . tp_branded_min() . '.css' );

	wp_enqueue_style( 'tp-branded-style', get_stylesheet_uri() );

	
	// Load the html5 shiv.
	wp_enqueue_script( 'tp-branded-html5', get_template_directory_uri() . '/assets/js/html5' . tp_branded_min() . '.js', array(), '3.7.3' );

	wp_script_add_data( 'tp-branded-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'tp-branded-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . tp_branded_min() . '.js', array(), '20160412', true );
	
	wp_enqueue_script( 'tp-branded-navigation', get_template_directory_uri() . '/assets/js/navigation' . tp_branded_min() . '.js', array(), '20151215', true );
	
	$tp_branded_l10n = array(
		'quote'          => tp_branded_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'tp-branded' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'tp-branded' ),
		'icon'           => tp_branded_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'tp-branded-navigation', 'tp_branded_l10n', $tp_branded_l10n );

	wp_enqueue_script( 'imagesloaded' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick'. tp_branded_min() . '.js','', '1.6.0', true );

	
	wp_enqueue_script( 'packery-pkgd', get_template_directory_uri() . '/assets/js/packery.pkgd'. tp_branded_min() . '.js', array( 'jquery' ), '2.1.2', true );
	
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight'. tp_branded_min() . '.js', array( 'jquery' ), '2.1.2', true );

	wp_enqueue_script( 'tp-branded-custom', get_template_directory_uri() . '/assets/js/custom'. tp_branded_min() .'.js', array( 'jquery' ), '20151215', true );
	
	wp_localize_script( 'tp-branded-custom', 'tp_branded', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'tp_branded_scripts');


/**
 * Enqueue editor styles for Gutenberg
 *
 * @since  Tp Branded 1.0.0
 */
function tp_branded_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'tp-branded-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . tp_branded_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'tp-branded-fonts', tp_branded_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'tp_branded_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';
