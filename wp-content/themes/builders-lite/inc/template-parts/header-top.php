<?php
/**
 * @package Builders Lite
 */

$builders_lite_hide_top = get_theme_mod('builders_lite_tophide','1');
if( $builders_lite_hide_top == '' ){
	
	$hold_mail_txt = '';
	$hold_phn_txt = '';
	$hold_fb_social = '';
	$hold_tw_social = '';
	$hold_ig_social = '';
	$hold_li_social = '';
	$hold_gp_social = '';
	$hold_yt_social = '';

	$builders_lite_mail_txt = get_theme_mod('builders-lite-email-txt',true);
	$builders_lite_phn_txt = esc_html(get_theme_mod('builders-lite-phn-txt',true));

	$builders_lite_fbicn = get_theme_mod('facebook',true);
	$builders_lite_twicn = get_theme_mod('twitter',true);
	$builders_lite_igicn = get_theme_mod('instagram',true);
	$builders_lite_liicn = get_theme_mod('linkedin',true);
	$builders_lite_gpicn = get_theme_mod('google',true);
	$builders_lite_yticn = get_theme_mod('youtube',true);
	
	if( !empty( $builders_lite_mail_txt ) ){
		$hold_mail_txt .= '<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:'.esc_url( $builders_lite_mail_txt ).'">'.$builders_lite_mail_txt.'</a></li>';
	}
	if( !empty( $builders_lite_phn_txt ) ){
		$hold_phn_txt .= '<li><i class="fa fa-phone-square" aria-hidden="true"></i> '.$builders_lite_phn_txt.'</li>';
	}
	if( !empty( $builders_lite_fbicn ) ){
		$hold_fb_social .= '<a href="'.esc_url($builders_lite_fbicn).'" target="_blank" title="facebook-f"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
	}
	if( !empty( $builders_lite_twicn ) ){
		$hold_tw_social .= '<a href="'.esc_url($builders_lite_twicn).'" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
	}
	if( !empty( $builders_lite_igicn ) ){
		$hold_ig_social .= '<a href="'.esc_url($builders_lite_igicn).'" target="_blank" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
	}
	if( !empty( $builders_lite_liicn ) ){
		$hold_li_social .= '<a href="'.esc_url($builders_lite_liicn).'" target="_blank" title="linkedin-in"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
	}
	if( !empty( $builders_lite_gpicn ) ){
		$hold_gp_social .= '<a href="'.esc_url($builders_lite_gpicn).'" target="_blank" title="google-plus-g"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
	}
	if( !empty( $builders_lite_yticn ) ){
		$hold_yt_social .= '<a href="'.esc_url($builders_lite_yticn).'" target="_blank" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';
	}
?>
	<div class="top-header-bar">
		<div class="aligner">
			<?php if( !empty( $builders_lite_mail_txt || $builders_lite_phn_txt || $builders_lite_fbicn || $builders_lite_twicn || $builders_lite_igicn || $builders_lite_liicn || $builders_lite_gpicn || $builders_lite_yticn ) ){ ?>
				<ul class="flex ac jcfe">
					<?php
						echo $hold_mail_txt;
						echo $hold_phn_txt;
						if( !empty( $builders_lite_fbicn || $builders_lite_twicn || $builders_lite_igicn || $builders_lite_liicn || $builders_lite_gpicn || $builders_lite_yticn ) ){
							echo '<li><div class="top-head-scl">'.$hold_fb_social.$hold_tw_social.$hold_ig_social.$hold_li_social.$hold_gp_social.$hold_yt_social.'</div></li>';
						}
					?>
				</ul><!-- top head info -->
			<?php } ?>
		</div><!-- aligner -->
	</div><!-- top header bar -->
<?php
	}
?>