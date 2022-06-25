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
<article class="has-post-thumbnail">
    <div class="primary-post-wrapper">
        <?php if ( $options['hide_archive_post_image'] == false ) : ?>
            <div class="featured-image" style="background-image: url('<?php echo ( has_post_thumbnail( )) ? the_post_thumbnail_url( 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg' ?>');">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->

            <?php endif; ?>

        <div class="entry-container">
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="entry-meta">
                <?php echo tp_branded_article_footer_meta();
                    tp_branded_posted_on();
                ?>
            </div><!-- .entry-meta -->

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn"><?php echo __( 'Read More', 'tp-branded' ); ?></a>
            </div><!-- .read-more -->

        </div><!-- .entry-container -->
    </div>
</article>
