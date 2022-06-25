<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */
$options = tp_branded_get_theme_options();
?>
<article class="hentry">
	<?php if (has_post_thumbnail()): ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' ) ?>" alt="<?php the_title(); ?>"></a>
		</div>
	<?php endif; ?>
	<div class="entry-container">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tp-branded' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tp-branded' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->

	<div class="entry-meta">
		<?php if(! $options['single_post_hide_author']):
			echo tp_branded_author();
		endif; 
		if (! $options['single_post_hide_date'] ) :
			tp_branded_posted_on();
		endif; ?>

		<?php tp_branded_single_categories(); ?>

	</div><!-- .entry-meta -->
</article>
