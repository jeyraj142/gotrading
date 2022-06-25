<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */
if ( ! function_exists( 'tp_branded_add_process_section' ) ) :
    /**
    * Add service section
    *
    *@since Tp Branded 1.0.0
    */
    function tp_branded_add_process_section() {
        $options = tp_branded_get_theme_options();
        // Check if service is enabled on frontpage
        $process_enable = apply_filters( 'tp_branded_section_status', true, 'process_section_enable' );

        if ( true !== $process_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'tp_branded_filter_process_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        tp_branded_render_process_section( $section_details );
    }
endif;

if ( ! function_exists( 'tp_branded_get_process_section_details' ) ) :
    /**
    * service section details.
    *
    * @since  Tp Branded 1.0.0
    * @param array $input service section details.
    */
    function tp_branded_get_process_section_details( $input ) {
        $options = tp_branded_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['process_content_page_' . $i] ) )
                $page_ids[] = $options['process_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
        );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = tp_branded_trim_content( 25 );
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

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
// service section content details.
add_filter( 'tp_branded_filter_process_section_details', 'tp_branded_get_process_section_details' );


if ( ! function_exists( 'tp_branded_render_process_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_process_section( $content_details = array() ) {
        $options = tp_branded_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        $featured_image = !empty( $options['process_image'] ) ? $options['process_image'] : '';
        ?>
        <div id="tp_branded_process_section" class="relative page-section">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                    tp_branded_section_tooltip( 'tp_branded_process_section' );
                endif; ?>
                <div class="section-content grid-layout">
                    <article class="has-post-thumbnail">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $featured_image ) ?>');">
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <?php if ( $options['process_title']) : ?>
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $options['process_title'] ); ?></h2>
                                </div><!-- .section-header -->
                            <?php endif; ?>

                            <div class="process-wrapper col-2 clear">
                                <?php foreach ( $content_details as $i => $content ) : ?>
                                    <article>
                                        <header class="entry-header">
                                            <span><?php if( $i < 10 ) echo "0"; ?><?php echo $i+1; ?></span>
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    </article><!-- .process-item -->
                                <?php endforeach; ?>
                            </div><!-- .process-wrapper -->
                        </div><!-- .entry-container -->
                    </article>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #businesszen_pro_our_partners_section -->
        
    <?php }
endif;