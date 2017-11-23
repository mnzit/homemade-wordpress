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
									echo ".main-navigation{background-color: $color3;} "	;
			//Footer_background_color
				$color4=get_option('footer_background_color');
			echo ".site-footer{background-color: $color4;} ";
			//Footer_text_color
			$color5=get_option('footer_text_color');
			echo ".site-footer{color: $color5;} ";
			//Footer_subtext_color
			$color6=get_option('footer_subtext_color');
			echo ".site-footer a,.copyright{color: $color6;} ";
			//middle-page-background-color
			$color7=get_option('mid_page_background');
			echo ".mid-page-content{background-color: $color7;} ";
			//Footer_subtext_color
			?>
			</style>
		</head>
		<body <?php body_class(); ?>>
			
			<div id="page" class="site">
				
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'homemade' ); ?></a>
				
				<header id="masthead" class="site-header">
			
					<div class="main-container">
					<?php
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
								<?php
								while ( $the_query->have_posts() ): ?>
										<div class="item">
											<?php
											$the_query->the_post();
											if ( has_post_thumbnail() ):  ?>
											<?php
											the_post_thumbnail();
											endif; ?>
										</div><!-- item -->
											<?php
								endwhile;
								/* Restore original Post Data */
								wp_reset_postdata();
								endif;?>
									</div><!--owl-carousel-->
										<?php endif;?>
							</div><!--slider-->
					<div class="container top-head">
						<div class="site-branding">
							<?php
							the_custom_logo();
							?>
						</div><!-- .site-branding -->
							
						<div class="call-us">
							<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_option('call_us'); ?>
						</div><!--call-us-->
								
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'homemade' ); ?></button>
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
					</div><!-- container -->
				
						<div class="clearfix"></div>

						
					</div><!--main-container-->	
				</header><!-- #masthead -->		
								<div id="content" class="site-content">