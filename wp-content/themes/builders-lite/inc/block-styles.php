<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Builders Lite 1.0
	 *
	 * @return void
	 */
	function builders_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'builders-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'builders-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'builders-lite-border',
				'label' => esc_html__( 'Borders', 'builders-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'builders-lite-border',
				'label' => esc_html__( 'Borders', 'builders-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'builders-lite-border',
				'label' => esc_html__( 'Borders', 'builders-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'builders-lite-image-frame',
				'label' => esc_html__( 'Frame', 'builders-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'builders-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'builders-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'builders-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'builders-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'builders-lite-border',
				'label' => esc_html__( 'Borders', 'builders-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'builders-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'builders-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'builders-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'builders-lite' ),
			)
		);
	}
	add_action( 'init', 'builders_lite_register_block_styles' );
}
