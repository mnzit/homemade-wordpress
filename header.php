<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
									*
									* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
									*
									* @package Homemade
									*/
	?>
	<!doctype html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php wp_head(); ?>
			<style>	
				<?php
			//Call_us_text_color
			$color1=get_option('call_us_color');
			echo ".call-us{color: $color1;} ";
			//Nav_text_color
			$color2=get_option('nav_text_color');
			echo ".main-navigation a,.mid-page-content{color: $color2;}";
			//Nav_background_color
			$color3=get_option('nav_background_color');
			echo ".main-navigation,.menu-toggle{background-color: $color3;} ";
			//middle-page-background-color
			$color7=get_option('mid_page_background');
			echo ".mid-page-content{background-color: $color7;} ";
			//Footer_subtext_color
			$mid_back = get_option('mid_page_background');
			echo".heading{background-color:$mid_back;}";
			//button-1
			$btn1 = get_option('btn_1');
			echo".more_details{background-color:$btn1;}";
			//text_color-1
			$text_c1 = get_option('text_color_1');
			echo".mid-page-content, a.more_details,.footer-contents h4.widget-title{color:$text_c1;}";
			//text_color-2
			$text_c2 = get_option('text_color_2');
			echo".panel ul li a,.copyright{color:$text_c2;}";
			//footer background-color
			$footer_backc = get_option('footer_backc');
			echo".site-footer{background-color:$footer_backc;}";
			?>

			</style>
		</head>
		<body <?php body_class(); ?>>
			
			<div id="page" class="site">	
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'homemade' ); ?></a>	
				<header id="masthead" class="site-header">
					<div class="main-container">
					<?php
					if ( !is_front_page()) {
  					get_sidebar();
  					}
						if(is_front_page()):?>
							<div class="slider">
								<?php
								$args= array(
								'numberposts' => 10,
								'order' => 'DESC',
								'orderby' => 'date',
								'category_name' => 'slider',
								);
								// The Query
								$the_query = new WP_Query( $args );
											
								// The Loop
								if ( $the_query->have_posts() ): ?>
									<div id="owl-demo" class="owl-carousel owl-theme">
								<?php while ( $the_query->have_posts() ): ?>
										<div class="item">
											<?php $the_query->the_post();
											if ( has_post_thumbnail() ): 
												the_post_thumbnail();?>
												<div class="slider_contents" >
												<div class="wow fadeInUpBig" data-wow-duration="0.7s" data-wow-delay="0s">
												<div class="title title-5">
												<?php
												the_title();?>
												</div><!--title-5-->
												<div class="content content-5">
												<?php
												the_content();
											endif; ?>
										</div><!--content-5-->
												</div>
												</div><!--slider-contents-->
										</div><!-- item -->
											<?php
								endwhile;
								/* Restore original Post Data */
								wp_reset_postdata();
								endif;?>
								
								</div><!--owl-carousel-->
						<?php
						else:
  					get_theme_mod('header_static_image_selector'); // Assigning it to a variable to keep the markup clean

    if( get_theme_mod( 'header_static_image_selector' ) != '') { // if there is a background img
        $theme_header_bg = get_theme_mod('header_static_image_selector'); // Assigning it to a variable to keep the markup clean
    }
?>
<div class = "slider" style="background-image:url('<?php echo $theme_header_bg ?>'); width:100%; height:300px; background-repeat: no-repeat; background-size:cover; background-attachment: scroll; z-index: 0;"> </div>
 <?php
						 endif;?>
							</div><!--slider-->
				<div class="clearfix"></div><!--clearfix-->
				<!-- <div class="container"> -->
					<div class="top-head container">
						<div class="site-branding" data-wow-duration="0.8s" data-wow-delay="0s">
							<?php the_custom_logo(); ?>
						</div><!-- .site-branding -->
						<div class="call-us">
							<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_option('call_us'); ?>
						</div><!--call-us-->									
					
							<div class="clearfix"></div><!--clearfix-->
					<nav id="site-navigation" class="main-navigation">
		<!-- 					<div class="mob"><?php echo get_the_title();?></div> -->
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><div id="nav-icon1">
								  <span></span>
								  <span></span>
								  <span></span>
							</div></button>
							<div class="clearfix"></div><!--clearfix-->
								<?php
								wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								) );
								?>
							<div class="social-profile">
							<?php
							$social=array('facebook','twitter','instagram','linkedin','google-plus');
							foreach ($social as $soc):
								if( get_option($soc) !=""): ?>
									<a href="<?php echo get_option($soc);?>" target="_blank"><i class="fa fa-<?php echo $soc;?>" aria-hidden="true"></i></a>
									<?php
								endif;
							endforeach;
									?>
							</div><!-- social-profile -->

					</nav><!-- #site-navigation -->
					</div><!--top-header-->

				<!-- </div>container -->
					<div class="clearfix"></div><!--clearfix-->
					</div><!--main-container-->	
				</header><!-- #masthead -->		
				<div id="content" class="site-content">