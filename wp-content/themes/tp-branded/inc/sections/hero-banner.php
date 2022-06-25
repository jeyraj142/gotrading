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
if ( ! function_exists( 'tp_branded_add_hero_banner_section' ) ) :
    /**
    * Add services section
    *
    *@since Tp Branded 1.0.0
    */
    function tp_branded_add_hero_banner_section() {
        $options = tp_branded_get_theme_options();
        // Check if services is enabled on frontpage
        $hero_banner_enable = apply_filters( 'tp_branded_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get services section details
        $section_details = array();
        $section_details = apply_filters( 'tp_branded_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // add_action( 'wp_head', 'tp_branded_service_section_style' );
        // Render services section now.
        tp_branded_render_hero_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'tp_branded_get_hero_banner_section_details' ) ) :
    /**
    * services section details.
    *
    * @since  Tp Branded 1.0.0
    * @param array $input services section details.
    */
    function tp_branded_get_hero_banner_section_details( $input ) {
        $options = tp_branded_get_theme_options();
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['hero_banner_service_content_post_' . $i] ) )
                $post_ids[] = $options['hero_banner_service_content_post_' . $i];
        }

        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
        );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
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
// services section content details.
add_filter( 'tp_branded_filter_hero_banner_section_details', 'tp_branded_get_hero_banner_section_details' );


if ( ! function_exists( 'tp_branded_render_hero_banner_section' ) ) :
  /**
   * Start services section
   *
   * @return string services content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_hero_banner_section( $content_details = array() ) {
        $options = tp_branded_get_theme_options();      
        if ( empty( $content_details ) ) {
            return;
        }

        $hero_banner_image = !empty($options['hero_banner_image']) ? $options['hero_banner_image'] : '';
        ?>
        
        <div id="tp_branded_hero_banner_section" class="page-section">
         <div class="wrapper">
            <?php if ( is_customize_preview()):
                tp_branded_section_tooltip( 'tp_branded_hero_banner_section' );
            endif; ?>
            <?php if ( !empty( $options['hero_banner_section_title'] ) ) : ?>
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html( $options['hero_banner_section_title'] ); ?></h2>
                </div>
            <?php endif; ?>

            <div class="section-content col-3 clear">
                <article class="same-width">
                    <?php if ( !empty( $options['biography_title'] || $options['biography_description'] ) ) : ?>
                    <div class="left-info">
                       <div class="entry-container">
                        <?php if( !empty($options['biography_title'])) : ?>
                           <span><?php echo esc_html($options['biography_title']); ?></span>
                       <?php endif; ?>
                        <?php if( !empty($options['biography_title'])) : ?>
                           <p><?php echo esc_html($options['biography_description']); ?></p>
                       <?php endif; ?>
                       </div><!-- .entry-container -->
                    </div>
                    <?php endif; ?>

                 <div class="left-info">
                     <div class="entry-container">
                        <!-- contact title -->
                        <?php if( !empty($options['contact_title'])) : ?>
                           <span><?php echo esc_html($options['contact_title']); ?></span>
                        <?php endif; ?>

                        <!-- contact address -->
                        <?php if( !empty($options['contact_address'])) : ?>
                            <p><?php echo esc_html($options['contact_address']); ?></p>
                        <?php endif; ?>

                        <!-- contact email -->
                         <?php if( !empty($options['contact_email'])) : ?>
                             <a href="mailto:<?php echo esc_attr($options['contact_email']); ?>"><?php echo esc_html($options['contact_email']); ?></a>
                         <?php endif; ?>

                         <!-- contact information no -->
                         <?php if( !empty($options['contact_information_no'])) : ?>
                             <a href="tel:<?php echo esc_attr($options['contact_information_no']); ?>"><?php echo esc_html($options['contact_information_no']); ?></a>
                         <?php endif; ?>
                     </div><!-- .entry-container -->
                 </div>

                 <div class="left-info">
                     <div class="entry-container">
                        <?php if( !empty($options['hero_banner_service_title'])) : ?>
                            <span><?php echo esc_html($options['hero_banner_service_title']); ?></span>
                        <?php endif; ?>

                        <?php foreach ( $content_details as $content ) : ?>
                            <a href="<?php echo esc_html( $content['url']); ?>"><?php echo esc_html( $content['title']); ?></a>
                        <?php endforeach; ?>
                     </div><!-- .entry-container -->
                 </div>
             </article>

             <article class="half-width">
                <div class="center-info">
                    <img src="<?php echo esc_url($hero_banner_image);?>">
                </div>
            </article>

            <article class="same-width">
                <?php for ( $i = 1; $i <= 3; $i++){ ?>
                <div class="right-info">
                     <div class="entry-container">
                        <div class="counter-item">

                            <!-- counter label -->
                            <?php if( !empty( $options['hero_banner_counter_label_' . $i] ) ): ?>
                                <h3 class="counter-title"><?php echo esc_html( $options['hero_banner_counter_label_' . $i] ); ?></h3>
                            <?php endif; ?>

                            <!-- counter value -->
                            <?php if( !empty( $options['hero_banner_counter_value_' . $i] ) ): ?>
                              <h2 class="counter-value"><?php echo esc_html( $options['hero_banner_counter_value_' . $i] ); ?></h2>
                             <?php endif;?>

                        </div>
                    </div><!-- .entry-container -->
                </div>
            <?php } ?>
        </article>
    </div><!-- .section-content -->
</div><!-- .wrapper -->
</div><!-- .press_pro_hero_banner_section -->
        
    <?php }
endif;