<?php
/**
 * psrm functions and definitions
 *
 * @package psrm
 */

function psrm_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'psrm' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'psrm_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Enable title tag support
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'psrm_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function psrm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Home Page Slider', 'psrm' ),
		'id'            => 'home-slider-desktop',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title sr-only">',
		'after_title'   => '</div>',
	) );
    register_sidebar( array(
		'name'          => __( 'Sidebar', 'psrm' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
    register_sidebar( array(
		'name'          => __( 'Home Museum Info', 'psrm' ),
		'id'            => 'home-museum-info',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
    register_sidebar( array(
		'name'          => __( 'Home Welcome', 'psrm' ),
		'id'            => 'home-welcome',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
    register_sidebar( array(
		'name'          => __( 'Home CTA', 'psrm' ),
		'id'            => 'home-cta',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'psrm_widgets_init' );
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Enqueue scripts and styles.
 */
function psrm_scripts() {

	wp_enqueue_style( 'psrm-google-font', '//fonts.googleapis.com/css?family=Oswald:400' );
	wp_enqueue_style( 'psrm-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'psrm-style', get_stylesheet_directory_uri() . '/public/css/all.css', array('psrm-google-font', 'psrm-font-awesome'), '1468126460' );

    wp_enqueue_script('psrm-scripts', get_stylesheet_directory_uri() . '/public/js/all.js', array('jquery'), '1468126460', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'psrm_scripts' );

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function psrm_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );
    $posted_on = sprintf(
        _x('Posted on %s', 'post date', 'psrm'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
    echo '<span class="posted-on">' . $posted_on . '</span>';
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function psrm_entry_footer()
{
    // Hide category and tag text for pages.
    if ('post' == get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(__(', ', 'psrm'));
        if ($categories_list && psrm_categorized_blog()) {
            printf('<span class="cat-links">' . __('Posted in %1$s', 'psrm') . '</span>', $categories_list);
        }
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', __(', ', 'psrm'));
        if ($tags_list) {
            printf('<span class="tags-links">' . __('Tagged %1$s', 'psrm') . '</span>', $tags_list);
        }
    }
    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(__('Leave a comment', 'psrm'), __('1 Comment', 'psrm'), __('% Comments', 'psrm'));
        echo '</span>';
    }
    edit_post_link(__('Edit', 'psrm'), '<span class="edit-link">', '</span>');
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function psrm_categorized_blog()
{
    if (false === ($all_the_cool_cats = get_transient('psrm_categories'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ));
        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);
        set_transient('psrm_categories', $all_the_cool_cats);
    }
    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so psrm_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so psrm_categorized_blog should return false.
        return false;
    }
}
