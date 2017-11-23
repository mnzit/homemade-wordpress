<?php
/**
* The template for displaying all pages
* Template Name: Home Page
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Homemade
*/
get_header(); ?>
<div class="container body-container">
<div id="primary" class="content-area">
<main id="main" class="site-main">
<div class="headings">
<div class="heading" id = "heading-1">
<?php echo get_option('page-head-1'); ?>
</div><!--heading-1-->
<div class="heading" id = "heading-2">
<?php echo get_option('page-head-2'); ?>
</div><!--heading-2-->
<div class="heading" id = "heading-3">
<?php echo get_option('page-head-3'); ?>
</div><!--heading-3-->
<div class="heading" id = "heading-4">
<?php echo get_option('page-head-4'); ?>
</div><!--heading-4-->
</div><!--headings-->
<div class="clearfix"></div><!--clearfix-->
<?php
$ars = array();
for ($i = 1; $i <= 4; $i++): //to fetch all the 4 options in an array
	if (get_option('page-drop-' . $i) != 0):
		$ars[] = get_option('page-drop-' . $i);
	endif; //endifcondition
endfor; //endforloop

if (count($ars) > 0):
								
	$args = array(
		'post_type' => 'page',
		'post_per_page' => 6,
		'post__in' => $ars,
		'orderby' => 'post__in',
	); 
	$newargs = new WP_Query($args);
	if ($newargs->have_posts()):
		$count = 1;
		while ($newargs->have_posts()):
			$newargs->the_post(); 
?>
									
<div class = "drop-page" id="page-<?php echo $count; ?>">
<div class="tab-content">
<?php
	the_title();
	the_content();
?>
 <a href="<?php the_permalink(); ?>" class="readmore"> <?php echo __('Read more', 'homemade'); ?></a>
</div><!--tab-content-->
<div class="tab-image">
<?php $bimage = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID) , 'full'); ?>
<img src="<?php echo $bimage; ?>"/>
</div><!--tab-image-->
</div><!--drop-page-->
<?php
			$count++;
		endwhile; //endwhileloop
		wp_reset_postdata();
?>
<?php
	endif; //endifcondition
?>
<?php
endif; //endifcondition

?>
</div><!--pages-->
<div class="clearfix"></div><!--clearfix-->
<hr style = "width:90%">
<div class="top-page">
	<?php

if (get_option('top-page') != 0):
	$top[] = get_option('top-page');
endif; //endifcondition
$args = array(
	'post_type' => 'page',
	'post__in' => $top,
	'orderby' => 'post__in',
);
?>
<?php
$new_args = new WP_Query($args);

if ($new_args->have_posts()):
	while ($new_args->have_posts()):
		$new_args->the_post(); ?>
<div class="top-content">
<?php
		the_title();
		the_excerpt();
?>
<a href="<?php the_permalink(); ?>" class="readmore"><?php echo __('Read more', 'homemade'); ?></a>
</div><!--top-content-->
<div class="top-image">
																
<?php
	$topimage = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID) , 'full');
?>
<img src="<?php echo $topimage; ?>"/>
</div><!--top-image-->

<?php
	endwhile; //endwhileloop
	wp_reset_postdata();
endif;
?>
</div><!--top-page-->
<div class="clearfix"></div><!--clearfix-->
<div class="middle-page">
<?php

if (get_option('page-mid-full') != 0):
	$arm[] = get_option('page-mid-full');
endif; //endifcondition

?>
<?php
$argsa = array(
	'post_type' => 'page',
	'post__in' => $arm,
	'orderby' => 'post__in',
);
?>
<?php
$newargs_1 = new WP_Query($argsa);

if ($newargs_1->have_posts()):
	while ($newargs_1->have_posts()):
		$newargs_1->the_post(); ?>
<div class="mid-page-content">
<?php
		the_title();
		the_excerpt();
?>
</div><!--mid-page-content-->
<div class="mid-page-image">
<?php
		$bimage = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID) , 'full'); ?><img src="<?php echo $bimage; ?>"/>
</div><!--mid-page-image-->
<?php
	endwhile; //endwhileloop
	wp_reset_postdata();
endif; ?>
</div><!--middle-page-->
<div class="clearfix"></div><!--clearfix-->
<div class="posts">
<?php
$args = array(
	'posts_per_page' => 2,
	'order' => 'DESC',
	'orderby' => 'date',
	'category_name' => 'slider',
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()): ?>
<?php
	while ($the_query->have_posts()): ?>
<div class="post post-half">
<?php
		$the_query->the_post();
		the_title();
		if (has_post_thumbnail()):
			the_post_thumbnail();
			the_excerpt();
		endif; ?>
<a href="<?php the_permalink(); ?>" class="readmore"><?php echo __('Read more', 'homemade'); ?></a>
</div><!--post-->
<?php
	endwhile;
	wp_reset_postdata();
endif; ?>
<div class="post-half half-widget">
<?php
dynamic_sidebar('half-widget'); ?>
</div>
</div><!--posts-->
<div class="clearfix"></div><!--clearfix-->

</main><!-- #main -->
</div><!-- #primary -->
</div><!--container-->
<?php
get_footer();