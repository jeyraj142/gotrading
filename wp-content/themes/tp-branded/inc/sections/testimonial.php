<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */
if ( ! function_exists( 'tp_branded_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Tp Branded 1.0.0
    */
    function tp_branded_add_testimonial_section() {
    	$options = tp_branded_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'tp_branded_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'tp_branded_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        tp_branded_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'tp_branded_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since  Tp Branded 1.0.0
    * @param array $input testimonial section details.
    */
    function tp_branded_get_testimonial_section_details( $input ) {
        $options = tp_branded_get_theme_options();

        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                $page_ids[] = $options['testimonial_content_page_' . $i];

            endif;
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 4 ),
            'orderby'           => 'post__in',
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = tp_branded_trim_content( 50 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// testimonial section content details.
add_filter( 'tp_branded_filter_testimonial_section_details', 'tp_branded_get_testimonial_section_details' );


if ( ! function_exists( 'tp_branded_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_testimonial_section( $content_details = array() ) {
        $options = tp_branded_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        }
        ?>

        <div id="tp_branded_testimonial_section" class="relative page-section">
            <?php if ( is_customize_preview()):
                tp_branded_section_tooltip( 'tp_branded_testimonial_section' );
            endif; ?>
            <div class="quote">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/uploads/14.png');?>">
            </div>

            <?php if ( !empty( $options['testimonial_title'] )) : ?>
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                </div><!-- .section-header -->
            <?php endif; ?>

            <div class="testimonial-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
                <?php $i=1; foreach ( $content_details as $content ) : ?>
                    <article>
                        <div class="testimonial-item">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="testimonial-01"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    <?php if ( !empty( $options['testimonial_position_' . $i] ) ): ?>
                                        <span><?php echo esc_html( $options['testimonial_position_' . $i] ); ?></span>
                                    <?php endif ?>                                    
                                </header>
                            </div><!-- .entry-container -->
                        </div><!-- .testimonial-item -->
                    </article>
                <?php $i++; endforeach; ?>  
            </div><!-- .section-content -->
        </div><!-- #testimonial-section -->   
    <?php }
endif;