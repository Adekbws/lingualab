<?php
require_once('widgets/menu-walker.php');
if ( ! function_exists( 'ha_template_setup' ) )
{
	function ha_template_setup() 
	{
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'top_menu_left' => esc_html__( 'Top Menu Left', 'lingualab' ),
			'top_menu_right' => esc_html__( 'Top Menu Right', 'lingualab' ),
			'bottom_menu_1' => esc_html__( 'Bottom 1', 'lingualab' ),
			'bottom_menu_2' => esc_html__( 'Bottom 2', 'lingualab' ),
			'bottom_menu_3' => esc_html__( 'Bottom 3', 'lingualab' ),
			'info_menu_1' => esc_html__( 'Info 1', 'lingualab' ),
			'info_menu_2' => esc_html__( 'Info 2', 'lingualab' ),
		) );

		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'caption',
		) );
	}
}

load_theme_textdomain( 'lingualab', TEMPLATEPATH.'/languages' );
add_action( 'after_setup_theme', 'ha_template_setup' );


function ha_template_scripts() {
    
    wp_enqueue_style( 'ha_template-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'ha_template-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'ha_template_scripts' );



function add_this_script_footer()
{
	wp_enqueue_script('ha_template-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array() );
} 

add_action('wp_footer', 'add_this_script_footer'); 

//widgets
require_once('widgets/top-informations.php');



//languages post type
function create_posttype() {

    register_post_type( 'jezyki',
        array(
            'labels' => array(
                'name' => __( 'Języki' ),
                'singular_name' => __( 'Język' )
            ),
            'public' => true,
            'has_archive' => false,
			'rewrite' => array('slug' => _x( 'jezyki', 'URL slug', 'lingualab' )), 
			'hierarchical' => TRUE, 
			'with_front' =>false,
			'show_in_nav_menus'=>true,
        )
	);

	register_post_type( 'branze',
        array(
            'labels' => array(
                'name' => __( 'Branże' ),
                'singular_name' => __( 'Branża' )
            ),
            'public' => true,
            'has_archive' => false,
			'rewrite' => array('slug' => _x( 'branze', 'URL slug', 'lingualab' )), 
			'hierarchical' => TRUE, 
			'with_front' =>false,
			'show_in_nav_menus'=>true,
        )
	);

	flush_rewrite_rules( false );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );






//disable comments

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');




?>