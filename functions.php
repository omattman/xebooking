<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

/**
 * Add main.js file to enable child theme javascript
 */
function add_main_js() {
    wp_enqueue_script(
        'main-js',
        get_stylesheet_directory_uri() . '/js/main.js',
        array( 'jquery' ), null, true
    );
}
add_action( 'wp_enqueue_scripts', 'add_main_js' );

/**
 * Remove files from Divi, which wasent needed
 */
function deregister_script() {
    $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

        if( !$is_page_builder_used ) {
            wp_dequeue_script('et-builder-modules-global-functions-script');
            wp_dequeue_script('google-maps-api');
            //wp_dequeue_script('divi-fitvids');
            wp_dequeue_script('waypoints');
            wp_dequeue_script('magnific-popup');

            wp_dequeue_script('hashchange');
            wp_dequeue_script('salvattore');
            wp_dequeue_script('easypiechart');

            wp_dequeue_script('et-jquery-visible-viewport');

            wp_dequeue_script('magnific-popup');
            wp_dequeue_script('et-jquery-touch-mobile');
            wp_dequeue_script('et-builder-modules-script');
            wp_dequeue_script('shortcodes_responsive');
        }
}
add_action( 'wp_print_scripts', 'deregister_script', 100 );


function deregister_styles() {
    $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

    if( !$is_page_builder_used ) {
        wp_dequeue_style('et-builder-modules-style');
        wp_dequeue_style('divi-style');
        wp_dequeue_style('magnific-popup');
        wp_dequeue_style('shortcodes_responsive');
        wp_dequeue_style('et_google_fonts_style');

        wp_enqueue_style( 'style', get_stylesheet_uri());
    }
}
add_action( 'wp_enqueue_scripts', 'deregister_styles', 20 );

/**
 * Remove divi Google fonts API CSS
 */
function disable_open_sans_divi() {
    wp_dequeue_style( 'divi-fonts' );
}
add_action( 'wp_enqueue_scripts', 'disable_open_sans_divi', 20 );

/**
 * Restrict Contact form 7 scripts and styles
 */
function remove_contactform7_css(){
    wp_dequeue_style('contact-form-7'); # Dequeue css.
    wp_dequeue_style('contact-form-7-multi-step-module'); # Dequeue css.
}
add_action( 'wp_enqueue_scripts', 'remove_contactform7_css' );

/**
 * Remove script version numbers.
 *
 * Numbers being enabled can lead to issues with caching/minification plugins,
 * as well as helps hackers identify the website better.
 */
function remove_cssjs_ver( $src ) {
		if( strpos( $src, '?ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 1000 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 1000 );
add_filter( 'the_generator', '__return_null' );

/**
 * Remove meta boxes from post, page and project edit page
 */
function remove_metaboxes() {
    remove_meta_box( 'authordiv','post','normal' );
    remove_meta_box( 'authordiv','page','normal' );
    remove_meta_box( 'authordiv','project','normal' );

    remove_meta_box( 'commentstatusdiv','post','normal' );
    remove_meta_box( 'commentstatusdiv','page','normal' );
    remove_meta_box( 'commentstatusdiv','project','normal' );

    remove_meta_box( 'commentsdiv','post','normal' );
    remove_meta_box( 'commentsdiv','page','normal' );
    remove_meta_box( 'commentsdiv','project','normal' );

    remove_meta_box( 'postcustom','post','normal' );
    remove_meta_box( 'postcustom','page','normal' );
    remove_meta_box( 'postcustom','project','normal' );

    remove_meta_box( 'postexcerpt','post','normal' );
    remove_meta_box( 'postexcerpt','page','normal' );
    remove_meta_box( 'postexcerpt','project','normal' );

    remove_meta_box( 'revisionsdiv','post','normal' );
    remove_meta_box( 'revisionsdiv','page','normal' );
    remove_meta_box( 'revisionsdiv','project','normal' );

    // remove_meta_box( 'slugdiv','post','normal' );
    // remove_meta_box( 'slugdiv','page','normal' );
    // remove_meta_box( 'slugdiv','project','normal' );

    remove_meta_box( 'trackbacksdiv','post','normal' );
    remove_meta_box( 'trackbacksdiv','page','normal' );
    remove_meta_box( 'trackbacksdiv','project','normal' );
}
add_action('admin_menu','remove_metaboxes');

// Customize Wordpress Admin panel names
function wd_admin_menu_rename() {
     global $menu;

    // Change 'Projects' name to 'Artister'
     $menu[26][0] = 'Artister';
}
add_action( 'admin_menu', 'wd_admin_menu_rename' );


/*
 * Add featured image sizes with automatic cropping
 * These images are used to automatically display thumnail
 * images of artist on profile page with the shortcodes below
 *
*/
add_image_size( 'featured-large', 1404, 500, true );
add_image_size( 'featured-header', 1170, 400, true );
add_image_size( 'featured-medium', 740, 500, true);
add_image_size( 'popular-categories', 240, 290, true);

function firm_comp_in_content() {
    global $post;
    return get_the_post_thumbnail($post->ID, '105, 9999');
}
add_shortcode('thumbnail-firm', 'firm_comp_in_content');

function get_website_home_url() {
    $homeurl = esc_url( home_url( '/' ) );
    echo $homeurl;
}
add_shortcode( 'home-url', 'get_home_url');

// overwrite "/project/" path to "book" for artists created under projects
function custom_project_path () {
    return array(
        'feeds' => true,
        'slug' => 'book',
        'with_front' => false,
        'has_archive' => false,
        'show_in_rest' => true
    );
}
add_filter( 'et_project_posttype_rewrite_args', 'custom_project_path' );


function wpseo_remove_breadcrumb_link( $link_output , $link ){
    $text_to_remove = 'Projekter';

    if( $link['text'] == $text_to_remove ) {
      $link_output = '';
    }

    return $link_output;
}
add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);

// Load custom modules into Divi Builder to show modules
function DS_Custom_Modules(){
    if(class_exists("ET_Builder_Module")){
        include("hero-blog-post.php");
        include("featured-blog-post.php");
        include("blog-post.php");
        include("artist-filter-category.php");
        include("artist-single-category.php");
    }
}

// Extend Divi Build and allow custom modules
function Prep_DS_Custom_Modules(){
    global $pagenow;

    $is_admin = is_admin();
    $action_hook = $is_admin ? 'wp_loaded' : 'wp';

    // list of admin pages where we need to load builder files
    $required_admin_pages = array( 'edit.php', 'post.php', 'post-new.php', 'admin.php', 'customize.php',    'edit-tags.php', 'admin-ajax.php', 'export.php' );
    $specific_filter_pages = array( 'edit.php', 'admin.php', 'edit-tags.php' );
    $is_edit_library_page = 'edit.php' === $pagenow && isset( $_GET['post_type'] ) && 'et_pb_layout' ===    $_GET['post_type'];
    $is_role_editor_page = 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'et_divi_role_editor' ===  $_GET['page'];
    $is_import_page = 'admin.php' === $pagenow && isset( $_GET['import'] ) && 'wordpress' === $_GET['import'];
    $is_edit_layout_category_page = 'edit-tags.php' === $pagenow && isset( $_GET['taxonomy'] ) && 'layout_category' === $_GET['taxonomy'];

    if ( ! $is_admin || (
        $is_admin && in_array( $pagenow, $required_admin_pages ) && ( ! in_array( $pagenow, $specific_filter_pages ) || $is_edit_library_page || $is_role_editor_page || $is_edit_layout_category_page || $is_import_page ) )
    )
    {
        add_action($action_hook, 'DS_Custom_Modules', 9789);
    }
}
Prep_DS_Custom_Modules();


function __search_by_title_only( $search, $wp_query )
{
    global $wpdb;
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';
    $search =
    $searchand = '';
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );

// show search results from projects and pages.
// 'post' not included to hide blog posts.
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('project','page'));
    }
    return $query;
}
add_filter('pre_get_posts','searchfilter');


// Derigester jQuery from header
if (!is_admin()) add_action('wp_enqueue_scripts', 'my_jquery_enqueue', 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


if (!is_admin()) add_action('wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
   wp_deregister_style( 'dashicons' );
}



function user_the_categories() {
    // get all categories for this post
    global $cats;
    $cats = get_the_category();
    // echo the first category
    echo $cats[0]->cat_name;
    // echo the remaining categories, appending separator
    for ($i = 1; $i < count($cats); $i++) {echo ', ' . $cats[$i]->cat_name ;}
}

//END ENQUEUE PARENT ACTION
?>
