<?php
/**
 * nyu core functions and definitions
 *
 * @package nyu core
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'nyu_core_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function nyu_core_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on nyu core, use a find and replace
	 * to change 'nyu-core' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nyu-core', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nyu-core' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'nyu_core_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nyu_core_setup
add_action( 'after_setup_theme', 'nyu_core_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function nyu_core_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nyu-core' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'nyu-core' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description' => __( 'An optional widget area for your site footer', 'nyu-core'),
	) );
}
add_action( 'widgets_init', 'nyu_core_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function nyu_core_scripts() {
	wp_enqueue_style( 'nyu-base', 'http://www.nyu.edu/common/css/base.css' );
	//wp_enqueue_style( 'nyu-core-fonts', '//cloud.typography.com/7436432/791902/css/fonts.css' ); //localhost
	wp_enqueue_style( 'nyu-core-fonts', '//cloud.typography.com/7436432/687502/css/fonts.css' ); //prod
	wp_enqueue_style( 'nyu-core-style', get_stylesheet_uri() );
	

	wp_enqueue_script( 'nyu-core-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'nyu-core-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'nyu-core-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'nyu_core_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//for building and debugging
function buildHelper() {
	add_filter('show_admin_bar', '__return_false');
	remove_action('wp_head', 'wp_generator');  	
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
}

//buildHelper(); //comment out for prod	