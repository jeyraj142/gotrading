<div class="header-right">
	<div class="toggle">
		<a class="toggleMenu" href="#"><?php esc_html_e('Menu','builders-lite'); ?></a>
	</div><!-- toggle -->
	<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">
		<?php 
			wp_nav_menu( 
				array( 
					'theme_location' => 'primary'
				)
			);
		?>
	</nav>
</div><!-- aligner -->