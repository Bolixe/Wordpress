<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 825, 510, true );

	add_image_size( 'header-article', 1440, 465, TRUE ); 	// Header image for single page ( detail post page )
	add_image_size( 'list-big', 960, 505, TRUE );		  	// Large image for listing page 
	add_image_size( 'list-smaller', 480, 505, TRUE );		// Small image for listing page 

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area Top Navigation', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your navigation.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area Footer', 'twentyfifteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Newsletter in news', 'twentyfifteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Widget exclusive for Newsletter', 'twentyfifteen' ),
		'before_widget' => '<div id="%1$s" class="newsletter %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="entry-share">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';




/*************************************************************************

				CUSTOM FUNCTIONS DIESACHBEARBEITER

*************************************************************************/


/* Small hack to increase the height of the excerpt field in the backend */

function excerpt_textarea_height() {
    echo'<style type="text/css">
        	#excerpt{ height:200px !important; }
    	 </style>';
}
add_action('admin_head', 'excerpt_textarea_height');


/* ****************************************** */
/* 		Add additional post types 			  */
/* ****************************************** */


function icl_theme_register_custom() {

	/************* PROJECTS DECLARATION ******************/

		// Set UI labels for Custom Post Type
	$labels_project = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'twentyfifteen' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'twentyfifteen' ),
		'menu_name'           => __( 'Projects', 'twentyfifteen' ),
		'parent_item_colon'   => __( 'Parent Project', 'twentyfifteen' ),
		'all_items'           => __( 'All Projects', 'twentyfifteen' ),
		'view_item'           => __( 'View Project', 'twentyfifteen' ),
		'add_new_item'        => __( 'Add New Project', 'twentyfifteen' ),
		'add_new'             => __( 'Add New', 'twentyfifteen' ),
		'edit_item'           => __( 'Edit Project', 'twentyfifteen' ),
		'update_item'         => __( 'Update Project', 'twentyfifteen' ),
		'search_items'        => __( 'Search Project', 'twentyfifteen' ),
		'not_found'           => __( 'Not Found', 'twentyfifteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
	);
	
		// Set other options for Custom Post Type
	$args_project = array(
		'label'               => __( 'work', 'twentyfifteen' ),
		'description'         => __( 'Project from customers', 'twentyfifteen' ),
		'labels'              => $labels_project,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' 		  => array('category', 'post_tag'),
		'rewrite'             => array('slug' => ( 'work' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'work', $args_project );

	/************* EOF PROJECTS DECLARATION ******************/

	/************* NEWS DECLARATION ******************/


		// Set UI labels for Custom Post Type
	$labels_news = array(
		'name'                => _x( 'News', 'Post Type General Name', 'twentyfifteen' ),
		'singular_name'       => _x( 'News', 'Post Type Singular Name', 'twentyfifteen' ),
		'menu_name'           => __( 'News', 'twentyfifteen' ),
		'parent_item_colon'   => __( 'Parent News', 'twentyfifteen' ),
		'all_items'           => __( 'All News', 'twentyfifteen' ),
		'view_item'           => __( 'View News', 'twentyfifteen' ),
		'add_new_item'        => __( 'Add New News', 'twentyfifteen' ),
		'add_new'             => __( 'Add New', 'twentyfifteen' ),
		'edit_item'           => __( 'Edit News', 'twentyfifteen' ),
		'update_item'         => __( 'Update News', 'twentyfifteen' ),
		'search_items'        => __( 'Search News', 'twentyfifteen' ),
		'not_found'           => __( 'Not Found', 'twentyfifteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
	);
	
		// Set other options for Custom Post Type
	$args_news = array(
		'label'               => __( 'news', 'twentyfifteen' ),
		'description'         => __( 'News', 'twentyfifteen' ),
		'labels'              => $labels_news,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments',  'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' 		  => array('thema', 'label'),
		'rewrite'             => array('slug' => ( 'news' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'news', $args_news );

	/************* EOF NEWS DECLARATION ******************/


	/************* COLLECTIVE DECLARATION ******************/


		// Set UI labels for Custom Post Type
	$labels_collec = array(
		'name'                => _x( 'Collective', 'Post Type General Name', 'twentyfifteen' ),
		'singular_name'       => _x( 'Collective', 'Post Type Singular Name', 'twentyfifteen' ),
		'menu_name'           => __( 'Collectives', 'twentyfifteen' ),
		'parent_item_colon'   => __( 'Parent Collectives', 'twentyfifteen' ),
		'all_items'           => __( 'All Collectives', 'twentyfifteen' ),
		'view_item'           => __( 'View Collective', 'twentyfifteen' ),
		'add_new_item'        => __( 'Add New Collective', 'twentyfifteen' ),
		'add_new'             => __( 'Add Collective', 'twentyfifteen' ),
		'edit_item'           => __( 'Edit Collective', 'twentyfifteen' ),
		'update_item'         => __( 'Update Collective', 'twentyfifteen' ),
		'search_items'        => __( 'Search Collective', 'twentyfifteen' ),
		'not_found'           => __( 'Not Found', 'twentyfifteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
	);
	
		// Set other options for Custom Post Type
	$args_collec = array(
		'label'               => __( 'collective', 'twentyfifteen' ),
		'description'         => __( 'Collectives', 'twentyfifteen' ),
		'labels'              => $labels_collec,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' 		  => array('group', 'note'),
		'rewrite'             => array('slug' => ( 'collective' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'collective', $args_collec );

	/************* EOF COLLECTIVE DECLARATION ******************/

	/************* JOBS DECLARATION ******************/


		// Set UI labels for Custom Post Type
	$labels_jobs = array(
		'name'                => _x( 'Jobs', 'Post Type General Name', 'twentyfifteen' ),
		'singular_name'       => _x( 'Job', 'Post Type Singular Name', 'twentyfifteen' ),
		'menu_name'           => __( 'Jobs', 'twentyfifteen' ),
		'parent_item_colon'   => __( 'Parent Jobs', 'twentyfifteen' ),
		'all_items'           => __( 'All Jobs', 'twentyfifteen' ),
		'view_item'           => __( 'View Job', 'twentyfifteen' ),
		'add_new_item'        => __( 'Add New Job', 'twentyfifteen' ),
		'add_new'             => __( 'Add Job', 'twentyfifteen' ),
		'edit_item'           => __( 'Edit Job', 'twentyfifteen' ),
		'update_item'         => __( 'Update Job', 'twentyfifteen' ),
		'search_items'        => __( 'Search Job', 'twentyfifteen' ),
		'not_found'           => __( 'Not Found', 'twentyfifteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
	);
	
		// Set other options for Custom Post Type
	$args_jobs = array(
		'label'               => __( 'Jobs', 'twentyfifteen' ),
		'description'         => __( 'Jobs', 'twentyfifteen' ),
		'labels'              => $labels_jobs,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' 		  => array('kind', 'type'),
		'rewrite'             => array('slug' => ( 'jobs' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 7,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'jobs', $args_jobs );

	/************* EOF JOBS DECLARATION ******************/

	/************* TEAM DECLARATION ******************/


		// Set UI labels for Custom Post Type
	$labels_team = array(
		'name'                => _x( 'Team', 'Post Type General Name', 'twentyfifteen' ),
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'twentyfifteen' ),
		'menu_name'           => __( 'Team', 'twentyfifteen' ),
		'parent_item_colon'   => __( 'Parent Team', 'twentyfifteen' ),
		'all_items'           => __( 'All Team', 'twentyfifteen' ),
		'view_item'           => __( 'View Team', 'twentyfifteen' ),
		'add_new_item'        => __( 'Add New Team', 'twentyfifteen' ),
		'add_new'             => __( 'Add Team', 'twentyfifteen' ),
		'edit_item'           => __( 'Edit Team', 'twentyfifteen' ),
		'update_item'         => __( 'Update Team', 'twentyfifteen' ),
		'search_items'        => __( 'Search Team', 'twentyfifteen' ),
		'not_found'           => __( 'Not Found', 'twentyfifteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
	);
	
		// Set other options for Custom Post Type
	$args_team = array(
		'label'               => __( 'Team', 'twentyfifteen' ),
		'description'         => __( 'Team', 'twentyfifteen' ),
		'labels'              => $labels_team,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'custom-fields', 'excerpt', 'thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		//'taxonomies' 		  => array('departament'),
		'rewrite'             => array('slug' => ( 'team' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 9,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'team', $args_team );

	/************* EOF TEAM DECLARATION ******************/


}
	/* Hook into the 'init' action */
add_action( 'init', 'icl_theme_register_custom', 0 );

	/* Hook to add subtitle field from plugin wp subtitle */
add_post_type_support( 'work', 'wps_subtitle' );
add_post_type_support( 'news', 'wps_subtitle' ); 
add_post_type_support( 'collective', 'wps_subtitle' ); 
add_post_type_support( 'jobs', 'wps_subtitle' ); 


function post_remove(){     //creating functions post_remove for removing menu item
 
   remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove');

function change_excerpt_box_title() {
	remove_meta_box( 'postexcerpt', 'team', 'side' );
	add_meta_box('postexcerpt', __('Departament'), 'post_excerpt_meta_box', 'team', 'normal', 'high');
}
add_action( 'admin_init',  'change_excerpt_box_title' );



function news_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
	$labels_tax = array(
		'name'              => _x( 'Topics', 'taxonomy general name' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Topics' ),
		'all_items'         => __( 'All Topics' ),
		'parent_item'       => __( 'Parent Topic' ),
		'parent_item_colon' => __( 'Parent Topic:' ),
		'edit_item'         => __( 'Edit Topic' ),
		'update_item'       => __( 'Update Topic' ),
		'add_new_item'      => __( 'Add New Topic' ),
		'new_item_name'     => __( 'New Topic Name' ),
		'menu_name'         => __( 'Topic' ),
	);

	$args_tax = array(
		'hierarchical'      => true,
		'labels'            => $labels_tax,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'thema' ),
	);

	register_taxonomy( 'thema', array( 'news' ), $args_tax );


		// Add new taxonomy, NOT hierarchical (like tags)
	$labels_tag = array(
		'name'                       => _x( 'Labels', 'taxonomy general name' ),
		'singular_name'              => _x( 'Label', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Labels' ),
		'popular_items'              => __( 'Popular Writers' ),
		'all_items'                  => __( 'All Labels' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Label' ),
		'update_item'                => __( 'Update Label' ),
		'add_new_item'               => __( 'Add New Label' ),
		'new_item_name'              => __( 'New Label Name' ),
		'separate_items_with_commas' => __( 'Separate labels with commas' ),
		'add_or_remove_items'        => __( 'Add or remove labels' ),
		'choose_from_most_used'      => __( 'Choose from the most used labels' ),
		'not_found'                  => __( 'No labels found.' ),
		'menu_name'                  => __( 'Labels' ),
	);

	$args_tag = array(
		'hierarchical'          => false,
		'labels'                => $labels_tag,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'label' ),
	);

	register_taxonomy( 'label', 'news', $args_tag );
}
add_action( 'init', 'news_taxonomy' );


function collective_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
	$groups_tax = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args_tax = array(
		'hierarchical'      => true,
		'labels'            => $groups_tax,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'group' ),
	);

	register_taxonomy( 'group', array( 'collective' ), $args_tax );


		// Add new taxonomy, NOT hierarchical (like tags)
	$labels_tag = array(
		'name'                       => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Labels' ),
		'popular_items'              => __( 'Popular Writers' ),
		'all_items'                  => __( 'All Labels' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ),
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate labels with commas' ),
		'add_or_remove_items'        => __( 'Add or remove labels' ),
		'choose_from_most_used'      => __( 'Choose from the most used labels' ),
		'not_found'                  => __( 'No labels found.' ),
		'menu_name'                  => __( 'Tags' ),
	);

	$args_tag = array(
		'hierarchical'          => false,
		'labels'                => $labels_tag,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'note' ),
	);

	register_taxonomy( 'note', 'collective', $args_tag );
}
add_action( 'init', 'collective_taxonomy' );


function jobs_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
	$groups_tax = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args_tax = array(
		'hierarchical'      => true,
		'labels'            => $groups_tax,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kind' ),
	);

	register_taxonomy( 'kind', array( 'jobs' ), $args_tax );


		// Add new taxonomy, NOT hierarchical (like tags)
	$labels_tag = array(
		'name'                       => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Labels' ),
		'popular_items'              => __( 'Popular Writers' ),
		'all_items'                  => __( 'All Labels' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ),
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate labels with commas' ),
		'add_or_remove_items'        => __( 'Add or remove labels' ),
		'choose_from_most_used'      => __( 'Choose from the most used labels' ),
		'not_found'                  => __( 'No labels found.' ),
		'menu_name'                  => __( 'Tags' ),
	);

	$args_tag = array(
		'hierarchical'          => false,
		'labels'                => $labels_tag,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', 'jobs', $args_tag );
}
add_action( 'init', 'jobs_taxonomy' );



/* ****************************************** */
/* 		Get translated array objects		  */
/* ****************************************** */


function lang_object_ids($ids_array, $type) {
	if(function_exists('icl_object_id')) {
		$res = array();
		foreach ($ids_array as $id) {
			$xlat = icl_object_id($id,$type,false);
			if(!is_null($xlat)) $res[] = $xlat;
		} 
		return $res;
	}else { 
		return $ids_array;
	}
}

/* ****************************************** */
/* 		Add to extra image in post 			  */
/* ****************************************** */


// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('inc/multi-post-thumbnails.php');

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) 
{ 
    $extra_images_no = get_option("extra_images_no");
    if ($extra_images_no == "") $extra_images_no = 4;    
    for ($i = 1 ; $i <= $extra_images_no ; $i++) 
    {
        new MultiPostThumbnails(array( 'label' => "Behind Scenes $i", 'id' => "extra-image-$i", 'post_type' => 'work' ) );
        new MultiPostThumbnails(array( 'label' => "Life at DP $i", 'id' => "extra-image-$i", 'post_type' => 'jobs' ) );
    }
}

function extra_images_exists(){

    global $post, $query_string;
    $return_value    = false;
    $bg_image        = false;
    $extra_images_no = get_option("extra_images_no");

    if ($extra_images_no == "") $extra_images_no = 4;

    for ($i = 1 ; $i <= $extra_images_no ; $i++){                                                                                          
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail('work', "extra-image-" . $i . "")) :
                 $return_value = true; endif; 
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail('jobs', "extra-image-" . $i . "")) :
                 $return_value = true; endif;           
            if (get_post_meta(get_the_ID(), "background_image", true) == "extra-image-" . $i) $bg_image = true;    
            
    }
    if ($bg_image && $return_value == false) $return_value = false;
    if ($bg_image && $return_value == true) $return_value = true; 
    return $return_value;
}

function get_extra_images(){

	global $post, $wp_query;
	$extra_images_no   = get_option("extra_images_no");
	$post_ID           = $post->ID;

	if ($extra_images_no == "") 
		$extra_images_no = 4;

	$postFormat        = get_post_format( $post->ID ); 
	$page_template     = get_page_template();
	$path              = pathinfo($page_template);
	$page_template     = $path['filename'];

	$post_extra_images = array();
	 	//$post_captions     = array();

	$post_type = get_post_type( $post->ID );

	for ($i = 1 ; $i <= $extra_images_no ; $i++)
    {           
        if (get_post_meta($post_ID, "background_image", true) != "extra-image-" . $i)
        {
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail($post_type, "extra-image-" . $i . "") ) :
            	
                $image_id = MultiPostThumbnails::get_post_thumbnail_id( $post_type, "extra-image-" . $i . "", $post_ID );
                
                $image_feature_url         = wp_get_attachment_image_src( $image_id, "thumbnail" );
                //$post_extra_images[]       = $image_feature_url[0];

                $post_extra_images .= '<img src="'.  $image_feature_url[0] . '" alt="' . get_post_field('post_excerpt', $image_id) . '" />';                
                print '<img src="'.  $image_feature_url[0] . '" alt="' . get_post_field('post_excerpt', $image_id) . '" />';                
                //$image_thumb_url           = wp_get_attachment_image_src( $image_id, "thumbnail" );
                //$post_extra_thumb_images[] = $image_thumb_url[0];
                //$post_captions[$i-1]       = get_post_field('post_excerpt', $image_id);
            endif;
        }
    }

}

/* WPLang show only the language avaible to switch  */

function new_nav_menu_items($items,$args) { 

	if (( $args->menu == 3 ) || ( $args->menu == 7 )) {
			
		if (function_exists('icl_get_languages')) {
			$languages = icl_get_languages('skip_missing=0');
			if(1 < count($languages)){
				foreach($languages as $l){
					if(!$l['active']){
						$items = $items.'<li class="menu-item"><a href="'.$l['url'].'">'.$l['language_code'].'</a></li>';
					}
				}
			}
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items',10,2 );






/*
 * WordPress Ajax Load More
 * https://github.com/dcooney/wordpress-ajax-load-more
 *
 * Copyright 2014 Connekt Media - http://cnkt.ca/ajax-load-more/
 * Free to use under the GPLv2 license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Darren Cooney
 * Twitter: @KaptonKaos
*/

/*-----------------------------------------------------------------------------------*/
/*	Example of registering our WP Ajax Load More scripts
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'enqueue_scripts' ) ) {
    function enqueue_scripts() {
    	//Register our JS
		//wp_deregister_script('jquery');
		//wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', true);		
		wp_register_script('ajax-load-more', get_template_directory_uri() . '/ajax-load-more/js/ajax-load-more.js', 'jquery', '1.0', true);

        // Enqueue our scripts
    	//wp_enqueue_script('jquery');
    	wp_enqueue_script('ajax-load-more');	    	
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_scripts');
}

/*-----------------------------------------------------------------------------------*/
/*	WP Ajax Load More Shortcode
/*-----------------------------------------------------------------------------------*/

function ajax_load_more( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'path' 				=> get_template_directory_uri().'/ajax-load-more',
		'post_type' 		=> 'post',
		'category' 			=> '',
		'taxonomy' 			=> '',
		'tag' 				=> '',
		'author' 			=> '',
		'search' 			=> '',
		'post_not_in' 		=> '',
		'offset' 		    => '0',
		'display_posts' 	=> '4',
		'scroll' 			=> 'true',
		'max_pages' 		=> '5',
		'transition' 		=> 'slide',
		'button_text' 		=> 'Older Posts' 
   ), $atts));	
   return '<section id="ajax-load-more"><ul class="listing" data-path="'.$path.'" data-post-type="'.$post_type.'" data-category="'.$category.'" data-taxonomy="'.$taxonomy.'" data-tag="'.$tag.'" data-author="'.$author.'" data-post-not-in="'.$post_not_in.'" data-offset="'.$offset.'" data-display-posts="'.$display_posts.'" data-search="'.$search.'" data-scroll="'.$scroll.'" data-max-pages="'.$max_pages.'" data-button-text="'.$button_text.'" data-transition="'.$transition.'"></ul></section>';  
}
add_shortcode('ajax_load_more', 'ajax_load_more');




	// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
function joints_related_posts( $ti_related) {

    global $post;
    $tags = wp_get_post_terms( $post->ID, 'label' );

    if($tags) {	

        foreach( $tags as $tag ) {
            $tag_arr .= $tag->term_id . ',';            		
        }

		$terms = wp_get_post_terms( $post->ID, 'label', array( 'fields' => 'ids') );

        $args = array(
	        	//'suppress_filters'      => true,
            'post_type'      => 'news',
	        'post__not_in'   => array( $post->ID),
	        'posts_per_page' => 3,
	        'tax_query'      => array(
	            array(
	                'taxonomy'         => 'label',
	                'terms'            => $terms,
				    'field'            => 'term_id',
				    'include_children' => false
	            ),
	        )
        );

        $related_posts = get_posts( $args );
        if($related_posts) {	
        	echo '<h3 class="block-title">' . $ti_related . '</h3>';        
	        echo '<ul class="related-news">';
	            foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
	                <li>
	                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>                   
	                </li>
	            <?php endforeach; 
		    echo '</ul>';
	    }
    }
    wp_reset_postdata();
}

	// Custom taxonomy related to post can be create a list of tags. Using parameter "taxonomy name"
function tags_custom_taxonomy( $taxonomy ) {

	if ( $taxonomy != '' ) {
		
	    global $post;
	    $tags = wp_get_post_terms( $post->ID, $taxonomy );

	    if($tags) {	

	        $separator = ', ';            		
			$num_tags  = count( $tags );

	        foreach( $tags as $tag ) {

	            $tag_list  .= '<a rel="tag" href="'.  site_url() . '/' . $taxonomy . '/' . $tag->slug . '/">' . $tag->name . '</a>';

	            if ( $num_tags > 1 ) 	           
	            	$tag_list  .= $separator; 

	           	$num_tags--;
	        }

	        echo $tag_list;
	    }
    }
}


function my_easymail_texts ( $translated_text, $untranslated_text, $domain ) {

	if(ICL_LANGUAGE_CODE == 'de')
	 	$static_button = 'jetzt anmelden ';
	else if(ICL_LANGUAGE_CODE == 'en')
	 	$static_button = 'sign up now';
	
	if ( $untranslated_text === 'Subscribe' && $domain == "alo-easymail" ) {
		return $static_button;
	}
	return $translated_text;
}
add_filter('gettext', 'my_easymail_texts', 20, 3);






/* ****************************************** */
/* 	Show custom type post in dashboard		  */
/* ****************************************** */


// unregister the default activity widget
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {

    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

}

// register your custom activity widget
add_action('wp_dashboard_setup', 'add_custom_dashboard_activity' );
function add_custom_dashboard_activity() {
    wp_add_dashboard_widget('custom_dashboard_activity', 'Activities', 'custom_wp_dashboard_site_activity');
}

// the new function based on wp_dashboard_recent_posts (in wp-admin/includes/dashboard.php)
function wp_dashboard_recent_post_types( $args ) {

// Chenged from here 

	if ( ! $args['post_type'] ) {
		$args['post_type'] = array (
								'work', 
								'news', 
								'collective', 
								'jobs',  
								'team',  
								'page'
							);
	}

	$query_args = array(
		'post_type'      => $args['post_type'],
		'post_status'    => $args['status'],
		'orderby'        => 'date',
		'order'          => $args['order'],
		'posts_per_page' => intval( $args['max'] ),
		'no_found_rows'  => true,
		'cache_results'  => false
	);
	$posts = new WP_Query( $query_args );

	if ( $posts->have_posts() ) {

		echo '<div id="' . $args['id'] . '" class="activity-block">';

		if ( $posts->post_count > $args['display'] ) {
			echo '<small class="show-more hide-if-no-js"><a href="#">' . sprintf( __( 'See %s more…'), $posts->post_count - intval( $args['display'] ) ) . '</a></small>';
		}

		echo '<h4>' . $args['title'] . '</h4>';

		echo '<ul>';

		$i = 0;
		$today    = date( 'Y-m-d', current_time( 'timestamp' ) );
		$tomorrow = date( 'Y-m-d', strtotime( '+1 day', current_time( 'timestamp' ) ) );

		while ( $posts->have_posts() ) {
			$posts->the_post();

			$time = get_the_time( 'U' );
			if ( date( 'Y-m-d', $time ) == $today ) {
				$relative = __( 'Today' );
			} elseif ( date( 'Y-m-d', $time ) == $tomorrow ) {
				$relative = __( 'Tomorrow' );
			} else {
				// translators: date and time format for recent posts on the dashboard, see http://php.net/date 
				$relative = date_i18n( __( 'd.m.y' ), $time );
			}

 			$text = sprintf(
				// translators: 1: relative date, 2: time, 4: post title 
 				__( '<span>%1$s, %2$s</span> <a href="%3$s">%4$s</a>' ),
  				$relative,
  				get_the_time(),
  				get_edit_post_link(),
  				_draft_or_post_title()
  			);

 			$hidden = $i >= $args['display'] ? ' class="hidden"' : '';
 			echo "<li{$hidden}>$text</li>";
			$i++;
		}

		echo '</ul>';
		echo '</div>';

	} else {
		return false;
	}

	wp_reset_postdata();

	return true;
}



// The replacement widget
function custom_wp_dashboard_site_activity() {

    echo '<div id="activity-widget">';

    $work = wp_dashboard_recent_post_types( array(
        'post_type'  => 'work',
        'display' => 8,
        'max'     => 8,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently published works' ),
        'id'      => 'published-works',
    ));
	
	$news = wp_dashboard_recent_post_types( array(
        'post_type'  => 'news',
        'display' => 6,
        'max'     => 6,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently published news' ),
        'id'      => 'published-news',
    ));
	
	$collective = wp_dashboard_recent_post_types( array(
        'post_type'  => 'collective',
        'display' => 4,
        'max'     => 4,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently published collectives' ),
        'id'      => 'published-collectives',
    ));	

	$jobs = wp_dashboard_recent_post_types( array(
        'post_type'  => 'jobs',
        'display' => 4,
        'max'     => 4,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently published jobs' ),
        'id'      => 'published-jobs',
    ));		

    $page = wp_dashboard_recent_post_types( array(
        'post_type'  => 'page',
        'display' => 5,
        'max'     => 5,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently published pages' ),
        'id'      => 'published-pages',
    ) );

    $recent_comments = wp_dashboard_recent_comments( 5 );

    if ( !$work && !$news && !$collective && !$jobs  && !$page && !$recent_comments ) {
        echo '<div class="no-activity">';
        echo '<p class="smiley"></p>';
        echo '<p>' . __( 'No activity yet!' ) . '</p>';
        echo '</div>';
    }

    echo '</div>';
}



add_action( 'dashboard_glance_items', 'cpad_at_glance_content_table_end' );
function cpad_at_glance_content_table_end() 
{
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';
    
    $post_types = get_post_types( $args, $output, $operator );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="' . $post_type->name . '-count">' . $output . '</li>';
        }
    }


    /*$taxonomies = get_taxonomies( $args, $output, $operator );
    foreach ( $taxonomies as $taxonomy ) {
        $num_terms = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, intval( $num_terms ) );
        if ( current_user_can( 'manage_categories' ) ) {
            $output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="taxonomy-count ' . $taxonomy->name . '-count">' . $output . '</li>';
        }
    }*/
}

/* ****************************************** */
/* 	EOF Show custom type post in dashboard    */
/* ****************************************** */


/* ****************************************** */
/* 	Metaslider Hack (temporary)    			  */
/* ****************************************** */

function ms_vimeo_force_https($url, $slider_id, $slide_id) {
   return "https:" . $url;
}
add_filter('metaslider_vimeo_params', 'ms_vimeo_force_https', 10, 3); 

/* ****************************************** */
/* 	EOF Metaslider Hack (temporary)		      */
/* ****************************************** */


/* ****************************************** */
/* 	Admin login style css       			  */
/* ****************************************** */

 	// custom admin login logo
function custom_login_logo() {
	echo 	'<style type="text/css">

				body, html { background: #000000 none repeat scroll 0 0 !important;	}

				h1 a { 
					background-image: url(' . get_bloginfo('template_directory') . '/img/head-logo.png) !important;
					background-size: 248px auto !important;
					background-color: #000 !important;  
					width: 100% !important;
					max-height: 50px !important;
					border-radius: 6px !important;
					background-position: center center !important;
				}

				.login form{ border-radius: 10px !important; }

				.wp-core-ui .button-primary {
				    background: #737373 none repeat scroll 0 0;
				    border-color: #000;
				    color: #fff;
				    box-shadow: 0 0 0 rgba(0, 0, 0, 0.5) inset, 0 0 0 rgba(0, 0, 0, 0.15);
				    text-decoration: none;
				}

				.wp-core-ui .button-primary:focus,
				.wp-core-ui .button-primary:hover {
				    background: #000 none repeat scroll 0 0;
				    box-shadow: 0 0 0 rgba(0, 0, 0, 0.5) inset, 0 0 0 rgba(0, 0, 0, 0.15);
				    border-color: #737373;
				}
				
		    </style>';
}
add_action('login_head', 'custom_login_logo');


/* ****************************************** */
/* 	EOF Admin login style css    		      */
/* ****************************************** */
 