<?php
/**
 * Blog section
 *
 * This is the template for the content of latest blog section
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */
if ( ! function_exists( 'tp_branded_add_project_section' ) ) :
    /**
    * Add latest blog section
    *
    *@since  Branded 1.0.0
    */
    function tp_branded_add_project_section() {
        $options = tp_branded_get_theme_options();
        // Check if latest blog is enabled on frontpage
        $project_enable = apply_filters( 'tp_branded_section_status', true, 'project_section_enable' );

        if ( true !== $project_enable ) {
            return false;
        }
        // Get latest blog section details
        $section_details = array();
        $section_details = apply_filters( 'tp_branded_filter_project_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render latest blog section now.
        tp_branded_render_project_section( $section_details );
    }
endif;

if ( ! function_exists( 'tp_branded_get_project_section_details' ) ) :
    /**
    * latest blog section details.
    *
    * @since  Tp Branded 1.0.0
    * @param array $input latest blog section details.
    */
    function tp_branded_get_project_section_details( $input ) {
        $options = tp_branded_get_theme_options();

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['project_content_post_' . $i] ) )
                $post_ids[] = $options['project_content_post_' . $i];
        }

        $args = array(
            'post_type'             => 'post',
            'post__in'              => ( array ) $post_ids,
            'posts_per_page'        => absint( 3 ),
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true,
        );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = tp_branded_trim_content( 25 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// project section content details.
add_filter( 'tp_branded_filter_project_section_details', 'tp_branded_get_project_section_details' );


if ( ! function_exists( 'tp_branded_render_project_section' ) ) :
  /**
   * Start latest blog section
   *
   * @return string latest blog content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_project_section( $content_details = array() ) {
        $options = tp_branded_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        $bg_image = !empty( $options['our_project_image'] ) ? $options['our_project_image'] : '';
        ?>
        
        <div id="tp_branded_project_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $bg_image ) ?>');">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                    tp_branded_section_tooltip( 'tp_branded_project_section' );
                endif; ?>
                <?php if ( !empty ($options['project_title'])) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html($options['project_title']); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content grid-layout">
                    <?php foreach($content_details as $content): ?>
                        <article class="has-post-thumbnail">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                <a href="<?php echo esc_url($content['url']);?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="entry-meta">
                                   <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ); ?>
                                    </span><!-- .cat-links -->
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                </header> 
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']);?></p>
                                </div><!-- .entry-content -->

                                <?php if ( !empty($options['project_read_more_btn_label'] ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['project_read_more_btn_label'] ); ?>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div><!-- .read-more -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->

                <?php if ( !empty($options['project_btn_link'] ) ) : ?>
                    <div class="view-more">
                        <a href="<?php echo esc_url( $options['project_btn_link'] ); ?>" class="btn"><?php echo esc_html( $options['project_view_all_btn_label'] ); ?>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div><!-- .read-more -->
                <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #businesszen_pro_our_partners_section -->

    <?php }
endif;  ?>
