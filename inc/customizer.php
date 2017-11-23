<?php
/**
* Homemade Theme Customizer
*
* @package Homemade
*/
/**
* Add postMessage support for site title and description for the Theme Customizer.
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function homemade_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'homemade_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'homemade_customize_partial_blogdescription',
		) );
	}
$wp_customize->add_panel('header_1',array(
'title' => __('Top Header'),
'description' => "<p>You can modify your header from here</p>",
'priority' => 1,
));
/*Call us customizer section*/
$wp_customize->add_section('top_header_area',array(
'title' => 'Phone number',
'panel' => 'header_1',
'priority' => 1,
));
$wp_customize->add_setting('call_us',array(
'default' => '<b>9808546858</b>',
'type' => 'option',
'transport' => 'refresh',
));
$wp_customize->add_control('call_us',array(
'label' => 'Add phone number here',
'section' => 'top_header_area',
'type' => 'textarea',
));
// call us color
$wp_customize->add_setting('call_us_color', array('default' => '#ffffff', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'call_us_color',
array(
'label'      => 'Phone number color',
'section'    => 'top_header_area',
'settings'   => 'call_us_color',
))
);
// Social media menubar
$wp_customize->add_panel('social_sites',array(
'title' => __('Social Profiles'),
'description' => "<p>You can modify your Social profiles from here</p>",
'priority' => 1,
));
//Social Profile
$wp_customize->add_section(
'social_profile',
array(
'title' => 'Social Profile',
'panel'=> 'social_sites',
'description' => 'Add your social media link',
'priority' => 14,
)
);
$social=array();
$social[]=array('facebook', array(
	'label'=>"Facebook",
	'section'=>'social_profile',
	'type'=>"url" ));
$social[]=array('twitter', array(
	'label'=>"Twitter",
	'section'=>'social_profile',
	'type'=>"url" ));
$social[]=array('instagram', array(
	'label'=>"Instagram",
	'section'=>'social_profile',
	'type'=>"url" ));
$social[]=array('linkedin', array(
	'label'=>"LinkedIn",
	'section'=>'social_profile',
	'type'=>"url" ));
$social[]=array('google-plus', array(
	'label'=>"Google-plus",
	'section'=>'social_profile',
	'type'=>"url" ));
foreach ($social as $soc) {
$wp_customize->add_setting($soc[0], array(
	'default' => '',
	'type'=>'option'));
$wp_customize->add_control($soc[0], $soc[1]);
}
//Navigation area
$wp_customize->add_panel('nav_area',array(
'title' => __('Navigation'),
'description' => "<p>You can modify your Navigation color here</p>",
'priority' => 1,
));
$wp_customize->add_section('navigation_area',array(
'title' => 'Navigation color area',
'panel' => 'nav_area',
'priority' => 1,
));
//navigation text color
$wp_customize->add_setting('nav_text_color', array('default' => '#ffffff', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_text_color',
array(
'label'      => 'Navigation text color',
'section'    => 'navigation_area',
'settings'   => 'nav_text_color',
))
);
//navigation background color
$wp_customize->add_setting('nav_background_color', array('default' => '#e9680a', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_background_color',
array(
'label'      => 'Navigation background color',
'section'    => 'navigation_area',
'settings'   => 'nav_background_color',
))
);
// Footer section
$wp_customize->add_panel('footer_area',array(
'title' => __('Footer'),
'description' => "<p>You can modify your footer here</p>",
'priority' => 1,
));
// Copyright Policy line
$wp_customize->add_section('copyright_line',array(
'title' => 'Copyright Line',
'panel' => 'footer_area',
'priority' => 1,
));
$wp_customize->add_setting('copyright_line',array(
'default' => '<b>© Copyright 2016 www.pjpokhrel.com . All Rights Reserved. Some ABN Number if its in Australia.
		Site designed by PJPokhrel in Sydney. Have a good day. Thank you. </b>',
'type' => 'option',
'transport' => 'refresh',
));
$wp_customize->add_control('copyright_line',array(
'label' => 'Add your Copyright policy here',
'section' => 'copyright_line',
'type' => 'textarea',
));
// Footer color
$wp_customize->add_section('footer_color',array(
'title' => 'Footer color',
'panel' => 'footer_area',
'priority' => 1,
));
//footer background color
$wp_customize->add_setting('footer_background_color',
 array('default' => '#313131',
 	   'type'=>'option'
));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color',
array(
'label'      => 'Footer background color',
'section'    => 'footer_color',
'settings'   => 'footer_background_color'
))
);
//footer header text color
$wp_customize->add_setting('footer_text_color', array('default' => '#ffffff', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color',
array(
'label'      => 'Footer heading font color',
'section'    => 'footer_color',
'settings'   => 'footer_text_color',
))
);
//footer sub text color
$wp_customize->add_setting('footer_subtext_color', array('default' => '#707671', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_subtext_color',
array(
'label'      => 'Footer sub-text color',
'section'    => 'footer_color',
'settings'   => 'footer_subtext_color',
))
);
//Page manager
$wp_customize->add_panel('page_manager',array(
'title' => __('Page manager'),
'description' => "<p>You can modify your page here</p>",
'priority' => 1,
));
for($i = 1; $i<=4; $i++){
$wp_customize->add_section( 'tab-'.$i , array(
'title'      => __( 'Tab-'.$i, 'homemade' ),
'panel' => 'page_manager',
'priority'   => 30,
) );
}//end loop
for($j = 1;$j<=4;$j++){
$wp_customize->add_setting('page-head-'.$j,array(
'default' => 'Tab-'.$j,
'type' => 'option',
'transport' => 'refresh',
));
$wp_customize->add_control('page-head-'.$j,array(
'label' => 'Page heading',
'section' => 'tab-'.$j,
'type' => 'text',
));
$wp_customize->add_setting( 'page-drop-'.$j, array(
'default' => '',
'type' => 'option',
'transport' => 'refresh',
) );
$wp_customize->add_control( 'page-drop-'.$j, array(
'label'    => __( 'Select Page', 'homemade' ),
'section'  => 'tab-'.$j,
'type'     => 'dropdown-pages'
) );
}//end loop


//top page
$wp_customize->add_section( 'top-pager' , array(
'title'      => __( 'Top-page', 'homemade' ),
'panel' => 'page_manager',
'priority'   => 30,
) );

$wp_customize->add_setting('top-page', array(
'default' => '',
'type' => 'option',
'transport' => 'refresh',
) );
$wp_customize->add_control('top-page', array(
'label'    => __( 'Select Page', 'homemade' ),
'section'  => 'top-pager',
'type'     => 'dropdown-pages'
) );

//Middle page

$wp_customize->add_section( 'mid-page' , array(
'title'      => __( 'Middle-Page', 'homemade' ),
'panel' => 'page_manager',
'priority'   => 30,
) );

//show_enable_disable($wp_customize, $section, $setting_control, $string);
 // show_enable_disable($wp_customize, 'mid-page', 'enable_mid_page', 'Display middle page in home page?');
 
$wp_customize->add_setting('page-mid-full', array(
'default' => '',
'type' => 'option',
'transport' => 'refresh',
) );
$wp_customize->add_control('page-mid-full', array(
'label'    => __( 'Select Page', 'homemade' ),
'section'  => 'mid-page',
'type'     => 'dropdown-pages'
) );



$wp_customize->add_setting('mid_page_background', array('default' => '#f9a42d', 'type'=>'option'));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mid_page_background',
array(
'label'      => 'Middle page-background color',
'section'    => 'mid-page',
'settings'   => 'mid_page_background',
))
);



}//function homemade register
add_action( 'customize_register', 'homemade_customize_register' );
/**
* Render the site title for the selective refresh partial.
*
* @return void
*/
function homemade_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
* Render the site tagline for the selective refresh partial.
*
* @return void
*/
function homemade_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function homemade_customize_preview_js() {
	wp_enqueue_script( 'homemade-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'homemade_customize_preview_js' );
// Added by manjit
/*******************
*******Header*******
*******************/