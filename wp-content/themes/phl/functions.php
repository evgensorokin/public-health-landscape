<?php
/**
 * PHL functions and definitions
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
 * @subpackage Twenty_Sixteen
 * @since PHL 1.0
 */

/**
 * PHL only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own twentysixteen_setup() function to override in a child theme.
     *
     * @since PHL 1.0
     */
    function twentysixteen_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on PHL, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

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
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 0, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'twentysixteen' ),
            'social'  => __( 'Social Links Menu', 'twentysixteen' ),
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

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );
    }
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since PHL 1.0
 */
function twentysixteen_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'twentysixteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Copyright', 'twentysixteen' ),
        'id'            => 'copyright',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since PHL 1.0
 */
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since PHL 1.0
 */
function twentysixteen_scripts() {
    // Theme stylesheet.
    wp_enqueue_style( 'twentysixteen-nice-select', get_template_directory_uri() . '/css/nice-select.css', array(), '3.3.5' );
    wp_enqueue_style( 'twentysixteen-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '3.3.5' );
    wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

    // Load the html5 shiv.
    wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
    wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'twentysixteen-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array( 'jquery' ), '20150825', true );
    wp_enqueue_script( 'twentysixteen-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array( 'jquery' ), '20150825', true );
    wp_enqueue_script( 'twentysixteen-own-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20150825', true );
    wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150825', true );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since PHL 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since PHL 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
    $color = trim( $color, '#' );

    if ( strlen( $color ) === 3 ) {
        $r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
        $g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
        $b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
    } else if ( strlen( $color ) === 6 ) {
        $r = hexdec( substr( $color, 0, 2 ) );
        $g = hexdec( substr( $color, 2, 2 ) );
        $b = hexdec( substr( $color, 4, 2 ) );
    } else {
        return array();
    }

    return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

    acf_add_options_sub_page('Footer');
}

function getSeason() {
    $seasons = array(
        0 => 'Winter',
        1 => 'Spring',
        2 => 'Summer',
        3 => 'Autumn'
    );
    return $seasons[floor(date('n') / 3) % 4];
}

function getNumberSeason($season) {
    $seasons = array(
        1 => 'Winter',
        2 => 'Spring',
        3 => 'Summer',
        4 => 'Autumn'
    );
    return array_search($season, $seasons);
}

function true_load_posts_calendar(){
    $args = array('post_type' => 'post', 'posts_per_page' => 12, 'category_name' => $_POST['categoryLoader'], 'orderby' => 'post_date', 'order' => 'ASC');
    $loop = new WP_Query( $args );
    $request = array();

    if( $loop->have_posts() ) {
        while ($loop->have_posts()) {
            $loop->the_post();
            $categoryPost = get_the_category($loop->post->ID);
            $yearFuture = (int)$categoryPost[0]->cat_name > (int)date('Y') ? true : false;
            $monthFuture = date('m', strtotime($loop->post->post_title)) > date('m') && (int)$categoryPost[0]->cat_name == (int)date('Y') ? true : false;
            $clickable = $yearFuture || $monthFuture ? false : true;

            $request[] = array(
                'link' => get_the_permalink($loop->post->ID),
                'title' => $loop->post->post_title,
                'category' => $categoryPost[0]->cat_name,
                'clickable' => $clickable,
                'active' => $loop->post->post_title == date('F') && (int)$categoryPost[0]->cat_name == (int)date('Y') ? true : false
            );
        }
    }
    wp_reset_query();
    die(json_encode($request));
}

add_action('wp_ajax_loadpostpopupcalendar', 'true_load_posts_calendar');
add_action('wp_ajax_nopriv_loadpostpopupcalendar', 'true_load_posts_calendar');

function true_load_posts_issues(){
    $args = array('parent' => $_POST['categoryLoader'], 'hide_empty' => 0);
    $categories = get_categories( $args );
    $request = array();

    if( $categories ) {
        foreach ($categories as $cat) {
            $category = get_category($_POST['categoryLoader']);
            $yearFuture = (int)$category->name > (int)date('Y') ? true : false;
            $monthFuture = getNumberSeason($cat->cat_name) > getNumberSeason(getSeason()) && (int)$category->name == (int)date('Y') ? true : false;
            $clickable = $yearFuture || $monthFuture ? false : true;

            $request[] = array(
                'link' => get_category_link($cat->cat_ID),
                'title' => $cat->cat_name,
                'category' => $category->cat_name,
                'clickable' => $clickable,
                'active' => $cat->cat_name == getSeason() && (int)$category->name == (int)date('Y') ? true : false
            );
        }
    }
    wp_reset_query();
    die(json_encode($request));
}

add_action('wp_ajax_loadpostpopupissues', 'true_load_posts_issues');
add_action('wp_ajax_nopriv_loadpostpopupissues', 'true_load_posts_issues');