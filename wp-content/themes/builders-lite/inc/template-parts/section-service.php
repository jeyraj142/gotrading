<?php
  /**
  * Second Section
  **/

  $builders_lite_hide_ser = get_theme_mod('builders_lite_ser_hide','1');

  if( $builders_lite_hide_ser == '' ){
?>
    <section class="services">
      <div class="aligner">
        <?php
          $showserttl = esc_html(get_theme_mod('builders_lite_ser_ttl'));
          $dispserttl = '';
            if( !empty( $showserttl ) ){
              $dispserttl = '<div class="section_head"><h2 class="section_title"><span>'.$showserttl.'</span></h2></div>';
            }

            echo $dispserttl;
        ?>
        <div class="flex">
            <?php
              for( $ser = 1; $ser<=3; $ser++ ){
                if( get_theme_mod( 'builders_lite_service'.$ser,true ) !='' ){
                  $serquery = new WP_Query(array('page_id' => get_theme_mod( 'builders_lite_service'.$ser )));
                  while( $serquery->have_posts() ) : $serquery->the_post();
            ?>        
                    <div class="column-third">
                      <div class="service-col">
						<?php if( has_post_thumbnail() ){
							echo '<div class="service-thumb">'.get_the_post_thumbnail().'</div>';
						}?>
						<div class="service-data">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo builders_lite_excerpt(22); ?></p>
							<?php if( !empty( get_theme_mod( 'builders_lite_service_more' ) ) ){
								echo '<a href="'.get_the_permalink().'" class="service-more">'.get_theme_mod( 'builders_lite_service_more' ).'</a>';
							} ?>
						</div>
                      </div><!-- service col -->
                    </div><!-- col -->
            <?php
                  endwhile;
                }
              }
            ?>
        </div><!-- row -->
      </div><!-- aligner -->
    </section>
      
<?php
  }
?>