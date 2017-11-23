<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Homemade
*/
?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="container">
			<div class="footer-site-branding">
				<?php
				the_custom_logo();
				?>
				</div><!-- .site-branding -->
				<div class="footer-contents">
					<div class="panel first-panel">
						<?php dynamic_sidebar( 'panel_1' ); ?>
						</div><!--first-panel-->
						<div class="panel second-panel">
						<?php dynamic_sidebar( 'panel_2' ); ?>
							</div><!--second-panel-->
							<div class="panel third-panel">
							<?php dynamic_sidebar( 'panel_3' ); ?>	
								</div><!--third-panel-->
								<div class="panel fourth-panel">
									<?php
									$social=array('facebook','twitter','instagram','linkedin','google-plus');
									foreach ($social as $soc):
									if( get_option($soc) !=""): ?>
									<a href="<?php echo get_option($soc);?>" target="_blank"><i class="fa fa-<?php echo $soc;?>" aria-hidden="true"></i></a>
									<?php
									endif;
									endforeach;
									?>
									</div><!--fourth-panel-->
									<div class="clearfix"></div>
									<br>
									<div class="copyright">
										<?php echo get_option('copyright_line'); ?>
										</div><!--copyright-->
										</div><!--footer-contents-->
										</div><!-- .container -->
										</div><!-- .site-info -->
										</footer><!-- #colophon -->
										</div><!-- #page -->
										<?php wp_footer(); 

?>
									</body>
								</html>