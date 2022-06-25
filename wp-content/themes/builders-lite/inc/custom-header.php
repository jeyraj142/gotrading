<?php
/**
 * @package Builders Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses builders_lite_header_style()

 */
function builders_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'builders_lite_custom_header_args', array(
		'default-text-color'     => '212427',
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'builders_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'builders_lite_custom_header_setup' );

if ( ! function_exists( 'builders_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see builders_lite_custom_header_setup().
 */
function builders_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		#header{
			background-image: url(<?php echo esc_url(get_header_image()); ?>);
			background-position: center top;
		}
		.site-name-desc h1 a { color:#<?php echo esc_attr(get_header_textcolor()); ?>;}
	<?php endif; ?>	
	</style>
	<?php
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
    <style type="text/css">
		.site-name {
			margin: 0 auto 0 0;
		}

		.site-name h1,
		.site-name p{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
    </style>
	
    <?php
	
}
endif; // builders_lite_header_style