<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

get_header(); 
$options = tp_branded_get_theme_options();

?>

	<div id="inner-content-wrapper" class="wrapper page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="archive-blog-wrapper col-1 clear">
					<?php
					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					<?php  
					/**
					* Hook - tp_branded_action_pagination.
					*
					* @hooked tp_branded_pagination 
					*/
					do_action( 'tp_branded_action_pagination' ); 

					/**
					* Hook - tp_branded_infinite_loader_spinner_action.
					*
					* @hooked tp_branded_infinite_loader_spinner 
					*/
					do_action( 'tp_branded_infinite_loader_spinner_action' );
					?>
				</div><!-- #div -->
			</main>
		</div><!-- #primary -->

		<?php  
		if ( tp_branded_is_sidebar_enable() ) {
			get_sidebar();
		}
		?>
	</div><!-- .wrapper -->

<?php
get_footer();
