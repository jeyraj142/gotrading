<?php
/**
 * sponsor section
 *
 * This is the template for the content of sponsor section
 *
 * @package Theme Palace
 * @subpackage Tp Branded
 * @since  Tp Branded 1.0.0
 */
if ( ! function_exists( 'tp_branded_add_our_partners_section' ) ) :
    /**
    * Add sponsor section
    *
    *@since Tp Branded 1.0.0
    */
    function tp_branded_add_our_partners_section() {
        $options = tp_branded_get_theme_options();
        // Check if sponsor is enabled on frontpage
        $our_partners_enable = apply_filters( 'tp_branded_section_status', true, 'our_partners_section_enable' );

        if ( true !== $our_partners_enable ) {
            return false;
        }

        // Render sponsor section now.
        tp_branded_render_our_partners_section();
    }
endif;

if ( ! function_exists( 'tp_branded_render_our_partners_section' ) ) :
  /**
   * Start sponsor section
   *
   * @return string sponsor content
   * @since  Tp Branded 1.0.0
   *
   */
   function tp_branded_render_our_partners_section() {
        $options = tp_branded_get_theme_options();
        ?>

        <div id="tp_branded_our_partners_section" class="relative page-section same-background">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                  tp_branded_section_tooltip( 'tp_branded_our_partners_section' );
                endif; ?>
                <div class="section-content col-5 clear">
                    <?php for ( $i = 1; $i <= 5; $i++){ ?>
                        <article>
                           <div class="client-logo">
                              <?php if( !empty( $options['our_partners_url_' . $i] ) && !empty( $options['our_partners_image_' . $i] ) ): ?>
                                  <a href="<?php echo esc_url( $options['our_partners_url_' . $i] ); ?>" target="_blank"><img src="<?php echo esc_url( $options['our_partners_image_' . $i] ); ?>"></a>
                              <?php endif; ?>
                            </div>
                        </article>
                    <?php } ?>
                </div><!-- .col-4 -->
            </div><!-- .wrapper -->
        </div><!-- #tp_branded_our_partners_section -->
            
    <?php }
endif;