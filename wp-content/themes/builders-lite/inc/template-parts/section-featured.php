<?php
  /**
  * Featured Box Section
  **/

  $builders_lite_hide_feat = get_theme_mod('builders_lite_feat_hide','1');

  if( $builders_lite_hide_feat == '' ){
?>
<section class="featured-boxes">
	<div class="flex">
		<?php
		  for( $feat = 1; $feat<=3; $feat++ ){
			if( get_theme_mod( 'builders_lite_feat'.$feat,true ) !='' ){
			  $featquery = new WP_Query(array('page_id' => get_theme_mod( 'builders_lite_feat'.$feat )));
			  while( $featquery->have_posts() ) : $featquery->the_post();
			  
			  $featmore = get_theme_mod('builders_lite_feat_more');
			  $hold_featmore = '';
			  if( !empty( $featmore ) ){
				$hold_featmore = '<a href="'.get_the_permalink().'" class="feat-more">'.esc_html($featmore).'</a>';
			  }
			  $bgcls = '';
			  if( $feat%2 == 0 ){
				$bgcls = ' even';
			  }
		?>        
				<div class="features">
				  <div class="feat-box<?php echo $bgcls; ?>">
					<div class="inner-feat-box">
						<span><?php echo $feat; ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo builders_lite_excerpt(18); ?></p>
						<?php echo $hold_featmore; ?>
					</div>
				  </div><!-- feat box -->
				</div><!-- col -->
		<?php
			  endwhile;
			}
		  }
		?>
	</div><!-- row -->
</section>
      
<?php
  }
?>