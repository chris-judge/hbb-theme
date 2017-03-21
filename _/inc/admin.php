<?php


// Adding is login page function
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// changing the logo link from wordpress.org to your site
function quindo_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'quindo_login_url' );

// changing the alt text on the logo to show your site name
function quindo_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'quindo_login_title' );

// Remove unwanted items from admin menu
function quindo_remove_admin_menu_items() {
    $remove_menu_items = array(__('Comments'),);
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'quindo_remove_admin_menu_items');    

// Register styles for WYSIWYG editor
function quindo_editor_styles() {
    if (WP_ENV === 'production')
        $quindo_file_suffix = '.min';
    add_editor_style( '_/css/editor-style'.$quindo_file_suffix.'.css' );
}
add_action( 'after_setup_theme', 'quindo_editor_styles' );

// Register styles for login page
// function quindo_login_css() {
//     if (WP_ENV === 'production')
//         $quindo_file_suffix = '.min';
//     wp_enqueue_style( 'logincss', get_template_directory_uri() . '/_/css/login'.$quindo_file_suffix.'.css?'.filemtime(get_template_directory()."/_/css/login" . $quindo_file_suffix . ".css"), false );
// }
// add_action( 'login_enqueue_scripts', 'quindo_login_css', 10 );

// Allow Thumbnails in Posts
add_theme_support( 'post-thumbnails' );

// Disable admin editor. Should be in config.php but let's add it here just in case
define('DISALLOW_FILE_EDIT', TRUE);

// Change Excerpt notation
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );
function tgm_io_custom_gforms_spinner( $src ) {

    return get_stylesheet_directory_uri() . '/_/img/loading.svg';
    
}


/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );


add_filter( 'gform_confirmation_anchor', '__return_false' );