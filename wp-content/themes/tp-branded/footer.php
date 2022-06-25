<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

/**
 * tp_branded_footer_primary_content hook
 *
 * @hooked tp_branded_add_subscribe_section -  10
 *
 */
do_action( 'tp_branded_footer_primary_content' );

/**
 * tp_branded_content_end_action hook
 *
 * @hooked tp_branded_content_end -  10
 *
 */
do_action( 'tp_branded_content_end_action' );

/**
 * tp_branded_content_end_action hook
 *
 * @hooked tp_branded_footer_start -  10
 * @hooked tp_branded_Footer_Widgets->add_footer_widgets -  20
 * @hooked tp_branded_footer_site_info -  40
 * @hooked tp_branded_footer_end -  100
 *
 */
do_action( 'tp_branded_footer' );

/**
 * tp_branded_page_end_action hook
 *
 * @hooked tp_branded_page_end -  10
 *
 */
do_action( 'tp_branded_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
