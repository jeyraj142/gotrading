<?php
/**
 * Services section
 *
 * This is the template for the content of services section
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */
if ( ! function_exists( 'tp_branded_add_our_services_section' ) ) :
    /**
    * Add services section
    *
    *@since Tp Branded 1.0.0
    */
    function tp_branded_add_our_services_section() {
        $options = tp_branded_get_theme_options();
        // Check if services is enabled on frontpage
        $our_services_enable = apply_filters( 'tp_branded_section_status', true, 'our_services_section_enable' );

        if ( true !== $our_services_enable ) {
            return false;
        }
        // Get services section details
        $section_details = array();
        $section_details = apply_filters( 'tp_branded_filter_our_services_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // add_action( 'wp_head', 'tp_branded_service_section_style' );
        // Render services section now.
        tp_branded_render_our_services_section( $section_details );
    }
endif;

if ( ! function_exists( 'tp_branded_get_our_services_section_details' ) ) :
    /**
    * services section details.
    *
    * @since  Tp Branded 1.0.0
    * @param array $input services section details.
    */
    function tp_branded_get_our_services_section_details( $input ) {
        $options = tp_branded_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['our_services_content_page_' . $i] ) )
                $page_ids[] = $options['our_services_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
        );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = tp_branded_trim_content( 25 );
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// services section content details.
add_filter( 'tp_branded_filter_our_services_section_details', 'tp_branded_get_our_services_section_details' );


if ( ! function_exists( 'tp_branded_render_our_services_section' ) ) :
  /**
   * Start services section
   *
   * @return string services content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_our_services_section( $content_details = array() ) {
        $options = tp_branded_get_theme_options();    

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        
            <div id="tp_branded_our_services_section" class="relative page-section same-background">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        tp_branded_section_tooltip( 'tp_branded_our_services_section' );
                    endif; ?>
                    <div class="section-header">
                        <?php
                        if( !empty( $options['our_services_section_title'] ) ):
                            ?>
                            <h2 class="section-title"><?php echo esc_html( $options['our_services_section_title'] ); ?></h2>
                        <?php endif; ?>
                    </div>

                    <div class="section-content col-3 clear">
                        <?php foreach ( $content_details as $i => $content ) : ?>
                            <article>
                                <div class="service-item-wrapper">
                                    <div class="icon-container">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo ! empty( $options['our_services_content_icon_' . ($i+1)] ) ? esc_attr( $options['our_services_content_icon_' . ($i+1)] ) : 'fa-cogs'; ?>"></i>
                                        </a>
                                    </div><!-- .services-icon -->
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url']); ?>"><?php echo esc_html( $content['title']); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div>
            </div><!-- #blogpost_pro_services -->  
        
    <?php }
endif;