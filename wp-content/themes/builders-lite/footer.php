<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Builders Lite
 */
?>
</div><!-- main-aligner -->

    <div class="copyright-wrapper">
        <div class="aligner">
            <div class="copyright">
                <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>  <?php echo esc_html(date_i18n( __( 'Y', 'builders-lite' ) )); ?> <?php esc_html_e('. Powered by WordPress','builders-lite'); ?></p>               
            </div><!-- copyright --><div class="clear"></div>           
        </div><!-- aligner -->
    </div>
        
<?php wp_footer(); ?>

</body>
</html>