<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage  Tp Branded
 * @since  Tp Branded 1.0.0
 */

$options = tp_branded_get_theme_options();  


if ( ! function_exists( 'tp_branded_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since  Tp Branded 1.0.0
	 */
	function tp_branded_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'tp_branded_doctype', 'tp_branded_doctype', 10 );


if ( ! function_exists( 'tp_branded_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'tp_branded_before_wp_head', 'tp_branded_head', 10 );

if ( ! function_exists( 'tp_branded_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tp-branded' ); ?></a>
		<?php
	}
endif;
add_action( 'tp_branded_page_start_action', 'tp_branded_page_start', 10 );

if ( ! function_exists( 'tp_branded_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'tp_branded_page_end_action', 'tp_branded_page_end', 10 );

if ( ! function_exists( 'tp_branded_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_site_branding() {
		$options  = tp_branded_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];	 ?>
		<div class="menu-overlay"></div>
			<header id="masthead" class="site-header center-aligned" role="banner">
				<div class="wrapper">
					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" title="Primary Menu">
						<?php
							echo tp_branded_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
							echo tp_branded_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
						?>	
							<span class="menu-label"><?php esc_html_e('Menu', 'tp-branded'); ?></span>		
						</button>
						<?php
						$social_html = null;
						if($options['social_menu_enable'] && has_nav_menu( 'social' )): 
							$social_html = wp_nav_menu(
								array(
									'theme_location' => 'social',
									'container' => 'div',
									'items_wrap' => '%3$s',
									'echo' => false,
									'depth' => 1,
									'link_before' => '<span class="screen-reader-text">',
									'link_after' => '</span>',
									'fallback_cb' => false,
								)
							);
						else:
							$social_html = '';
						endif;
					
						$search_html= null;
						if($options['search_icon_in_primary_menu_enable']){
							$search_html = sprintf(
								'<li class="social-menu"><div class="social-icons"><ul><li class="search-menu"><a href="#" title="%1$s">%2$s%3$s</a><div id="search">%4$s</div></li>%5$s</ul></div></li>',
								esc_attr__('Search','tp-branded'),
								tp_branded_get_svg( array( 'icon' => 'search' ) ), 
								tp_branded_get_svg( array( 'icon' => 'close' ) ), 
								get_search_form( $echo = false ),
								$social_html
							);
							
						}else{
							$search_html = '';
						}

						wp_nav_menu( array(
							'theme_location' => 'primary',
							'container' => 'div',
							'menu_class' => 'menu nav-menu',
							'menu_id' => 'primary-menu',
							'echo' => true,
							'fallback_cb' => 'tp_branded_menu_fallback_cb',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$search_html.'</ul>',
						) );
						
					?>
					</nav><!-- #site-navigation -->
					<div class="site-branding">
						<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) ) && has_custom_logo()  ) : ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif; 

					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
						<div id="site-identity">
							<?php
							if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							} 
							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
									<?php
								endif; 
							}?>
						</div>
					<?php endif; ?>
					</div>
					<div class="icon-wrapper">
	                    <?php
	                    $search_html= null;
						if($options['primary_search_enable']){
							$search_html = sprintf(
											'<li class="search-menu"><a href="#" title="%1$s">%2$s%3$s</a><div id="search">%4$s</div></li>',
											esc_attr__('Search','tp-branded'),
											tp_branded_get_svg( array( 'icon' => 'search' ) ), 
											tp_branded_get_svg( array( 'icon' => 'close' ) ), 
											get_search_form( $echo = false )
										);
							
						}else{
							$search_html = '';
						}
							$social_html = null;
							if($options['social_menu_enable'] && has_nav_menu( 'social' )): 
								$social_html = sprintf(
									'<li class="social-menu">%1$s</li>',
									wp_nav_menu( 
										array(
											'theme_location' => 'social',
											'container' => 'div',
											'container_class' => 'social-icons',
											'echo' => true,
											'depth' => 1,
											'link_before' => '<span class="screen-reader-text">',
											'link_after' => '</span>',
											'fallback_cb' => false,
											'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$search_html.'</ul>',
										)
									)
								);
							else:
								$social_html = '';
							endif;
	                    ?>
	                </div>
				</div><!-- .wrapper-->
			</header>
		<?php 
	}
endif;
add_action( 'tp_branded_header_action', 'tp_branded_site_branding', 10 );

if ( ! function_exists( 'tp_branded_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'tp_branded_content_start_action', 'tp_branded_content_start', 10 );

if ( ! function_exists( 'tp_branded_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since  Tp Branded 1.0.0
     *
     */
    function tp_branded_header_image() {
        if ( tp_branded_is_frontpage() )
            return;
        $header_image = get_header_image();
        /*if ( is_singular() ) :
            $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
        endif;*/
        ?>

        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php tp_branded_custom_header_banner_title(); ?>
                </header>
                <?php tp_branded_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php
    }
endif;
add_action( 'tp_branded_header_image_action', 'tp_branded_header_image', 10 );

if ( ! function_exists( 'tp_branded_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since  Tp Branded 1.0.0
	 */
	function tp_branded_add_breadcrumb() {
		$options = tp_branded_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( tp_branded_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * branded_simple_breadcrumb hook
				 *
				 * @hooked branded_simple_breadcrumb -  10
				 *
				 */
				do_action( 'tp_branded_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'tp_branded_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'tp_branded_content_end_action', 'tp_branded_content_end', 10 );

if ( ! function_exists( 'tp_branded_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_footer_start() {
		$options = tp_branded_get_theme_options();

		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'tp_branded_footer', 'tp_branded_footer_start', 10 );

if ( ! function_exists( 'tp_branded_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_footer_site_info() {
		$options = tp_branded_get_theme_options();
		$theme_data = wp_get_theme();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'];
		?>
		<div class="site-info col-1">
                <div class="wrapper">
                    <span>
                    <?php if (!empty( $copyright_text ) ):
						echo tp_branded_santize_allow_tag( $copyright_text ); 
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
					endif; ?>
					<?php echo esc_html__( ' All Rights Reserved | ', 'tp-branded' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'tp-branded' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'tp_branded_footer', 'tp_branded_footer_site_info', 40 );

if ( ! function_exists( 'tp_branded_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_footer_scroll_to_top() {
		$options  = tp_branded_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo tp_branded_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'tp_branded_footer', 'tp_branded_footer_scroll_to_top', 40 );


if ( ! function_exists( 'tp_branded_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_loader() {
		$options = tp_branded_get_theme_options();
		if ( $options['loader_enable'] ) { ?>

			<div id="loader">
	            <div class="loader-container">
	            	<?php if ( 'default' == $options['loader_icon'] ) : ?>
		                <div id="preloader">
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                </div>
		            <?php else :
		            	echo tp_branded_get_svg( array( 'icon' => esc_attr( $options['loader_icon'] ) ) );
		            endif; ?>
	            </div>
	        </div><!-- #loader -->
		<?php }
	}
endif;
add_action( 'tp_branded_before_header', 'tp_branded_loader', 10 );


if ( ! function_exists( 'tp_branded_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since  Tp Branded 1.0.0
	 *
	 */
	function tp_branded_infinite_loader_spinner() { 
		global $post;
		$options = tp_branded_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :			
			echo '<div class="blog-loader">' . tp_branded_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';			
		endif;
	}
endif;
add_action( 'tp_branded_infinite_loader_spinner_action', 'tp_branded_infinite_loader_spinner', 10 );
