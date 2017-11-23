<?php
/**
* Homemade functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Homemade
*/
if ( ! function_exists( 'homemade_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function homemade_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Homemade, use a find and replace
		* to change 'homemade' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'homemade', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );
		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'homemade' ),
		) );
		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'homemade_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'homemade_setup' );
/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function homemade_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'homemade_content_width', 640 );
}
add_action( 'after_setup_theme', 'homemade_content_width', 0 );
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function homemade_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'homemade' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'homemade' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
'name'          => esc_html__( 'Footer 1', 'homemade' ),
'id'            => 'panel_1',
'description'   => esc_html__( 'Add widgets here.', 'homemade' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h4 class="widget-title">',
'after_title'   => '</h4>',
) );
	register_sidebar( array(
'name'          => esc_html__( 'Footer 2', 'homemade' ),
'id'            => 'panel_2',
'description'   => esc_html__( 'Add widgets here.', 'homemade' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h4 class="widget-title">',
'after_title'   => '</h4>',
) );
	register_sidebar( array(
'name'          => esc_html__( 'Footer 3', 'homemade' ),
'id'            => 'panel_3',
'description'   => esc_html__( 'Add widgets here.', 'homemade' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h4 class="widget-title">',
'after_title'   => '</h4>',
) );

	register_sidebar( array(
'name'          => esc_html__( 'Half-widget', 'homemade' ),
'id'            => 'half-widget',
'description'   => esc_html__( 'Add widgets here.', 'homemade' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h4 class="widget-title">',
'after_title'   => '</h4>',
) );
}
add_action( 'widgets_init', 'homemade_widgets_init' );
/**
* Enqueue scripts and styles.
*/
function homemade_scripts() {
	wp_enqueue_style( 'homemade-style', get_stylesheet_uri());
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style( 'owl-carousel-style_2', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	wp_enqueue_style( 'load-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  $query_args = array('family' => 'Raleway');
  wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
  wp_enqueue_style( 'google-fonts' );
	
	
	wp_enqueue_script( 'homemade-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'homemade-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(),
	'20151215', true );
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js', array("jquery"), '1.0',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'homemade_scripts' );
/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';
/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';
/**
* Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';
/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';
/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}