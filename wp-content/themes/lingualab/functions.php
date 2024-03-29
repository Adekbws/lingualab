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
	wp_enqueue_style( 'ha_template-flatpickr', get_template_directory_uri() . '/css/flatpickr.min.css' );
	if ( is_front_page() || is_home() )
	{
	//	wp_enqueue_style( 'ha_template-sliderstyle', get_template_directory_uri() . '/css/sliderstyle.css' );
	}

	wp_enqueue_style( 'ha_template-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'ha_template_scripts' );



function add_this_script_footer()
{
	wp_enqueue_script('ha_template-jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', array() );
	wp_enqueue_script('ha_template-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array() );
	if ( is_front_page() || is_home() )
	{
//wp_enqueue_script('ha_template-sliderjs1', get_template_directory_uri() . '/js/jquery.ba-cond.min.js', array() );
	//	wp_enqueue_script('ha_template-sliderjs2', get_template_directory_uri() . '/js/jquery.slitslider.js', array() );
	}
}

add_action('wp_footer', 'add_this_script_footer');

//widgets
require_once('widgets/top-informations.php');
require_once('widgets/contact-informations.php');
require_once('widgets/blogcontact-informations.php');

//languages post type
function create_posttype() {

    register_post_type( 'jezyki',
        array(
            'labels' => array(
                'name' => __( 'Języki' ),
                'singular_name' => __( 'Język' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => _x( 'jezyk', 'URL slug', 'lingualab' )),
			'hierarchical' => false,
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
            // Features this CPT supports in Post Editor
        	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'branze'),
			'hierarchical' => false,
			'with_front' =>false,
			'show_in_nav_menus'=>true,
        )
	);

	register_post_type( 'uslugi',
				array(
						'labels' => array(
								'name' => __( 'Usługi' ),
								'singular_name' => __( 'Usługa' )
						),
						// Features this CPT supports in Post Editor
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
						'public' => true,
						'has_archive' => false,
						'taxonomies'  => array( 'uslugi_category' ),
			'rewrite' => array('slug' => 'usluga'),
			'hierarchical' => false,
			'with_front' =>false,
			'show_in_nav_menus'=>true,
				)
	);
	register_taxonomy( 'uslugi_category', array( 'uslugi' ),
			array(
					'labels' => array(
							'name' => 'Kategorie usług',
							'menu_name' => 'Kategorie usług',
							'singular_name' => 'Kategoria usług',
							'all_items' => 'Wszystkie kategorie usług'
					),
					'public' => true,
					'hierarchical' => true,
					'show_ui' => true,
					'rewrite' => array( 'slug' => 'uslugi', 'hierarchical' => true, 'with_front' => false ),
			)
	);
	register_taxonomy( 'jezyki_category', array( 'jezyki' ),
			array(
					'labels' => array(
							'name' => 'Kategorie jezykow',
							'menu_name' => 'Kategorie jezykow',
							'singular_name' => 'Kategoria jezykow',
							'all_items' => 'Wszystkie kategorie jezykow'
					),
					'public' => true,
					'hierarchical' => true,
					'show_ui' => true,
					'rewrite' => array( 'slug' => 'jezyki', 'hierarchical' => true, 'with_front' => false ),
			)
	);

//blog types



register_post_type( 'blog_post',
        array(
            'labels' => array(
                'name' => 'Blog',
                'menu_name' => 'Blog',
                'singular_name' => 'Wpis',
                'all_items' => 'Wszystkie wpisy'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'hierarchical' => false,
            'has_archive' => 'blog',
            'taxonomies' => array('blog_category','blog-tag'),
            'rewrite' => array( 'slug' => 'blog', 'hierarchical' => true, 'with_front' => false )
						//blog/%blog_category%
        )
    );
    register_taxonomy( 'blog_category', array( 'blog_post' ),
        array(
            'labels' => array(
                'name' => 'Kategorie',
                'menu_name' => 'Kategorie',
                'singular_name' => 'Kategoria',
                'all_items' => 'Wszystkie kategorie'
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'rewrite' => array( 'slug' => 'category', 'hierarchical' => true, 'with_front' => false ),
        )
    );

		register_taxonomy('blog_tag',array( 'blog_post' ),array(
		    'hierarchical' => false,
				'labels' => array(
						'name' => 'Tagi',
						'menu_name' => 'Tagi',
						'singular_name' => 'Tag',
						'all_items' => 'Wszystkie tagi'
				),
		    'show_ui' => true,
		    'update_count_callback' => '_update_post_term_count',
		    'query_var' => true,
		    'rewrite' => array( 'slug' => 'blog/tag', 'hierarchical' => true, 'with_front' => false  ),
		  ));


			//case studies

			register_post_type( 'case_studies',
			        array(
			            'labels' => array(
			                'name' => 'Case studies',
			                'menu_name' => 'Case studies',
			                'singular_name' => 'Case study',
			                'all_items' => 'Wszystkie wpisy case studies'
			            ),
			            'public' => true,
			            'publicly_queryable' => true,
			            'show_ui' => true,
			            'show_in_menu' => true,
			            'show_in_nav_menus' => true,
			            'supports' => array( 'title', 'editor','thumbnail', 'custom-fields', ),
			            'hierarchical' => false,
			            'has_archive' => false,
			            'rewrite' => array( 'slug' => 'case-studies', 'hierarchical' => true, 'with_front' => false )
			        )
			    );



					//portfolioSlideRow

					//slider

					register_post_type( 'slider',
					        array(
					            'labels' => array(
					                'name' => 'Slajder',
					                'menu_name' => 'Slajder',
					                'singular_name' => 'Slajd',
					                'all_items' => 'Wszystkie slajdy'
					            ),
					            'public' => true,
					            'publicly_queryable' => true,
					            'show_ui' => true,
					            'show_in_menu' => true,
					            'show_in_nav_menus' => true,
					            'supports' => array( 'title', 'custom-fields', ),
					            'hierarchical' => false,
					            'has_archive' => false,
					        )
					    );

	flush_rewrite_rules( false );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



add_action( 'init', 'my_custom_page_word' );
    function my_custom_page_word() {
      global $wp_rewrite;  //


      $wp_rewrite->pagination_base = '';
    }

/*
function set_pagination_base () {

    global $wp_rewrite;

    $wp_rewrite->pagination_base = 'p';

}
add_action( 'init', 'set_pagination_base' );


*/

add_action( 'wp_loaded', 'add_clinic_permastructure' );
function add_clinic_permastructure() {
	global $wp_rewrite;
	add_permastruct( 'blog_tag', 'blog/tag/%blog_tag%', false );
}



add_action( 'generate_rewrite_rules', 'register_product_rewrite_rules' );
function register_product_rewrite_rules( $wp_rewrite ) {
    $new_rules = array(
        'blog/tag/([^/]+)/?$' => 'index.php?blog_tag=' . $wp_rewrite->preg_index( 1 ), // 'products/any-character/'
				'blog/tag/([^/]+)/(\d{1,})/?$' => 'index.php?blog_tag=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 2),
				'blog/(\d{1,})/?$' => 'index.php?post_type=blog_post&paged=' . $wp_rewrite->preg_index( 1),
				'blog/([^/]+)/(\d{1,})/?$' => 'index.php?blog_category=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index(2),
  );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}


/*
function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'blog_post')
        return $link;

    if ($cats = get_the_terms($post->ID, 'blog_category'))
    {
			var_dump($cats[0]['name']);
			exit;

        $link = str_replace('%blog_category%', 'uuuuu', $link); // see custom function defined below\
    }
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);
*/








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







add_action( 'wp_ajax_evaluationformtab_action', 'evaluationFormTab' );
add_action( 'wp_ajax_nopriv_evaluationformtab_action', 'evaluationFormTab' );

function evaluationFormTab()
{

	$idformtab = intval( $_POST['idformtab']);
	if ($idformtab) {
		ob_start();
		include_once('evaluationform/form'.$idformtab.'.php');
		$html = ob_get_contents();
		ob_end_clean();
	}
/*
tlumaczenia pisemne specjalistyczne - form1.php 1
tłumaczenia przysięgłe - form2.php		2
Szczegóły - Tłumaczenia specjalistyczne lub/i przysięgłe form5.php		3
Szczegóły - Tłumaczenia specjalistyczne wraz ze składem (DTP) form6.php 4
Szczegóły - Skład do druku (DTP) form4.php 5
Korekta native speakera - form1.php 1
Szczegóły - lokalizacja form3.php  7
tłumaczenia ustne form7.php		8
Sprzęt do tłumaczeń symultanicznych	form8.php		 9
tłumaczenia ustne wraz ze sprzętem form9.php   10
*/


	echo json_encode(array('status'=>1,'html'=>$html, 'id_form'=>$idformtab));
	die();
}

//send evaluation form
add_action( 'wp_ajax_evaluationformsend_action', 'evaluationFormSend' );
add_action( 'wp_ajax_nopriv_evaluationformsend_action', 'evaluationFormSend' );

function evaluationFormSend()
{
	//sanitize

	$evaluation_form=array();
	$evaluation_form['rodo']=0;

	foreach($_POST['evaluation_form'] as $ek=>$einput)
	{
		if($ek == 'daylist')
		{
				$days=array();
				foreach($_POST['evaluation_form']['daylist'] as $kd=>$day )
				{
						foreach($day as $pd=>$part)
						{
							$days[$kd][$pd]=filter_var(trim($part),FILTER_SANITIZE_STRING);
						}
				}
				$evaluation_form[$ek]=$days;
		}
		else
		{
			$evaluation_form[$ek]=filter_var(trim($einput),FILTER_SANITIZE_STRING);
		}
	}
	//echo json_encode(array('status'=>$evaluation_form));
	//die();
	$status=1;
	if((int)$evaluation_form['rodo'])
	{
		if( empty( $evaluation_form['client_name'] || $evaluation_form['client_surname'] || $evaluation_form['client_email'] || $evaluation_form['client_phone'] || $evaluation_form['client_company'] ) )
		{
			$status=2;
		}
		else
		{
			//check user e-mail is valid
			if( filter_var( $evaluation_form['client_email'], FILTER_VALIDATE_EMAIL ) )
			{
				$contentHTML = '';
				$contentHTML .= '<b>' . __( 'Imię i nazwisko Klienta:', 'lingualab' ) . '</b> ' . $evaluation_form['client_name'] . ' ' . $evaluation_form['client_surname'] . '<br>';
				$contentHTML .= '<b>' . __( 'E-mail:', 'lingualab' ) . '</b> ' . $evaluation_form['client_email'] . '<br>';
				$contentHTML .= '<b>' . __( 'Telefon kontaktowy:', 'lingualab' ) . '</b> ' . $evaluation_form['client_phone'] . '<br>';
				$contentHTML .= '<b>' . __( 'Nazwa firmy:', 'lingualab' ) . '</b> ' . $evaluation_form['client_company'] . '<br>';

				if( !empty( $evaluation_form['client_q'] ) )
					$contentHTML .= '<b>' . __( 'Fraza wpisana w wyszukiwarce dzięki której nas znaleziono:', 'lingualab' ) . '</b> ' . $evaluation_form['client_q'] . '<br>';

				$service_type = (int)$evaluation_form['service_type'];
				//generate service content email
				/*0>–––
				    1>Tłumaczenia pisemne specjalistyczne
				    2>Tłumaczenie przysięgłe
				    3>Tłumaczenie pisemne specjalistyczne lub/i przysięgłe
				    4>Tłumaczenie pisemne specjalistyczne wraz ze składem (DTP)
				    5>Skład do druku (DTP)
				    6>Korekta Native Speakera
				    7>Lokalizacja
				    8>Tłumaczenie ustne
				    9>Sprzęt do tłumaczeń symultanicznych
				    10>Tłumaczenie ustne wraz ze sprzętem*/
				switch( $service_type )
				{
					case 1:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenia pisemne specjalistyczne', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 2:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenie przysięgłe', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['translate_for']))
								$contentHTML .= '<b>' . __( 'Tłumaczenia z oryginału / kopii:', 'lingualab' ) . '</b> ' . $evaluation_form['translate_for'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['delivery_method']))
								$contentHTML .= '<b>' . __( 'Sposób dostawy:', 'lingualab' ) . '</b> ' . $evaluation_form['delivery_method'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
								$contentHTML .= '<b>' . __( 'Dodatkowy komentarz:', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
							//attachment
					break;
					case 3:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenie pisemne specjalistyczne lub/i przysięgłe', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 4:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenie pisemne specjalistyczne wraz ze składem (DTP)', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['document_destination']))
								$contentHTML .= '<b>' . __( 'Przeznaczenie dokumentu:', 'lingualab' ) . '</b> ' . $evaluation_form['document_destination'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 5:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Skład do druku (DTP)', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['document_destination']))
								$contentHTML .= '<b>' . __( 'Przeznaczenie dokumentu:', 'lingualab' ) . '</b> ' . $evaluation_form['document_destination'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 6:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Korekta Native Speakera', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 7:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Lokalizacja', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['service_kind']))
							$contentHTML .= '<b>' . __( 'Rodzaj usługi:', 'lingualab' ) . '</b> ' . $evaluation_form['service_kind'] . '<br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['deadline']))
								$contentHTML .= '<b>' . __( 'Termin realizacji:', 'lingualab' ) . '</b> ' . $evaluation_form['deadline'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
						//attachemnt
					break;
					case 8:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenie ustne', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['translate_type']))
							$contentHTML .= '<b>' . __( 'Rodzaj tłumaczenia:', 'lingualab' ) . '</b> ' . $evaluation_form['translate_type'] . '<br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['place']))
								$contentHTML .= '<b>' . __( 'Miasto / miejsce:', 'lingualab' ) . '</b> ' . $evaluation_form['place'] . '<br>';

						if(!empty($evaluation_form['translate_topic']))
										$contentHTML .= '<b>' . __( 'Tematyka tłumaczenia', 'lingualab' ) . '</b> ' . $evaluation_form['translate_topic'] . '<br>';

						if(!empty($evaluation_form['daylist']))
						{
							$contentHTML .= '<b>' . __( 'Preferowane terminy:', 'lingualab' ) . '</b><br>';
							foreach( $evaluation_form['daylist'] as $dk=>$day)
							{
								if( isset( $evaluation_form['daylist'][$dk]['deadline'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['deadline'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['from'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['from'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['to'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['to'];
								$contentHTML .= '<br>';
							}

						}
						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
					break;
					case 9:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Sprzęt do tłumaczeń symultanicznych', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['cabins_qty']))
							$contentHTML .= '<b>' . __( 'Ilość kabin:', 'lingualab' ) . '</b> ' . $evaluation_form['cabins_qty'] . '<br>';

						if(!empty($evaluation_form['transmitters']))
							$contentHTML .= '<b>' . __( 'Dla ilu osób zapewnić odbiorniki przekazu:', 'lingualab' ) . '</b> ' . $evaluation_form['transmitters'] . '<br>';

						if(!empty($evaluation_form['sound']))
								$contentHTML .= '<b>' . __( 'Nagłośnienie:', 'lingualab' ) . '</b> ' . $evaluation_form['sound'] . '<br>';

						if(!empty($evaluation_form['microphone_type']))
								$contentHTML .= '<b>' . __( 'Ilość mikrofonów i ich rodzaj:', 'lingualab' ) . '</b> ' . $evaluation_form['microphone_type'] . '<br>';

						if(!empty($evaluation_form['place']))
										$contentHTML .= '<b>' . __( 'Miasto / miejsce', 'lingualab' ) . '</b> ' . $evaluation_form['place'] . '<br>';

						if(!empty($evaluation_form['daylist']))
						{
							$contentHTML .= '<b>' . __( 'Preferowane terminy:', 'lingualab' ) . '</b><br>';
							foreach( $evaluation_form['daylist'] as $dk=>$day)
							{
								if( isset( $evaluation_form['daylist'][$dk]['deadline'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['deadline'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['from'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['from'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['to'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['to'];
								$contentHTML .= '<br>';
							}

						}
						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
					break;
					case 10:
						$contentHTML .= '<br>' .  __( 'Wybrana usługa:', 'lingualab' ) . ' <b>' .  __( 'Tłumaczenie ustne wraz ze sprzętem', 'lingualab' ) . '</b><br>';

						if(!empty($evaluation_form['translate_type']))
							$contentHTML .= '<b>' . __( 'Rodzaj tłumaczenia:', 'lingualab' ) . '</b> ' . $evaluation_form['translate_type'] . '<br>';

						if(!empty($evaluation_form['from_language']))
							$contentHTML .= '<b>' . __( 'Z języka:', 'lingualab' ) . '</b> ' . $evaluation_form['from_language'] . '<br>';

						if(!empty($evaluation_form['to_language']))
								$contentHTML .= '<b>' . __( 'Na język:', 'lingualab' ) . '</b> ' . $evaluation_form['to_language'] . '<br>';

						if(!empty($evaluation_form['place']))
								$contentHTML .= '<b>' . __( 'Miasto / miejsce:', 'lingualab' ) . '</b> ' . $evaluation_form['place'] . '<br>';

						if(!empty($evaluation_form['translate_topic']))
										$contentHTML .= '<b>' . __( 'Tematyka tłumaczenia', 'lingualab' ) . '</b> ' . $evaluation_form['translate_topic'] . '<br>';

						if(!empty($evaluation_form['daylist']))
						{
							$contentHTML .= '<b>' . __( 'Preferowane terminy:', 'lingualab' ) . '</b><br>';
							foreach( $evaluation_form['daylist'] as $dk=>$day)
							{
								if( isset( $evaluation_form['daylist'][$dk]['deadline'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['deadline'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['from'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['from'] . ' - ';

								if( isset( $evaluation_form['daylist'][$dk]['to'] ) )
									$contentHTML .= $evaluation_form['daylist'][$dk]['to'];
								$contentHTML .= '<br>';
							}

						}

						if(!empty($evaluation_form['transmitters']))
								$contentHTML .= '<b>' . __( 'Dla ilu osób zapewnić odbiorniki przekazu:', 'lingualab' ) . '</b> ' . $evaluation_form['transmitters'] . '<br>';

						if(!empty($evaluation_form['sound']))
								$contentHTML .= '<b>' . __( 'Nagłośnienie:', 'lingualab' ) . '</b> ' . $evaluation_form['sound'] . '<br>';

						if(!empty($evaluation_form['microphone_type']))
										$contentHTML .= '<b>' . __( 'Ilość mikrofonów i ich rodzaj', 'lingualab' ) . '</b> ' . $evaluation_form['microphone_type'] . '<br>';

						if(!empty($evaluation_form['optional_comment']))
										$contentHTML .= '<b>' . __( 'Dodatkowy komentarz', 'lingualab' ) . '</b> ' . $evaluation_form['optional_comment'] . '<br>';
					break;
				}




					$file_result = "brak pliku";
				if(!empty($_FILES["evaluation_form"])){
					$file_result = "";
					$target_dir = "tmpuploads/";
					$target_file = get_template_directory(). '/' . $target_dir . basename($_FILES["evaluation_form"]["name"]["file"]);
					$tmp_directory = get_template_directory(). '/' . $target_dir;

					$uploadOk = 1;
					$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					// Check file size
					if ($_FILES["fileToUpload"]["size"] > 30000000) {
					    $file_result .= "Sorry, your file is too large.";
					    $uploadOk = 0;
					}
					// Allow certain file formats
					if($fileType == "exe" || $fileType == "php" || $fileType == "js" || $fileType == "bin") {
					    $file_result .= "Sorry, only document files are allowed.";
					    $uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    $file_result .= "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($_FILES["evaluation_form"]["tmp_name"]["file"], $target_file)) {
					        $file_result .= "The file ". basename( $_FILES["evaluation_form"]["name"]["file"]). " has been uploaded.";
									$ulpoad_status = true;
					    } else {
					        $file_result .= "Sorry, there was an error uploading your file.";
					    }
					}
				}


				//rodo

				$contentHTML .= '<br><br><br><b>' . __( 'Wyrażone zgody:', 'lingualab' ) . '</b><br>';
				$contentHTML .= get_field( 'evaluationform_rodo', pll_get_post( 103 ) );

				$to = get_field( 'sendevaluation_email', pll_get_post( 103 ) );
				$subject =  __( 'Wiadomość z formularza bezpłatnej wyceny', 'lingualab' );
				$headers=array();
				//$headers[] = 'From: Lingualab <no-reply@example.net>';
				$headers[] = 'Content-Type: text/html; charset=UTF-8';
				//wp_mail
				if($ulpoad_status)
				{
						if (wp_mail( $to, $subject, $contentHTML, $headers, $target_file )) {
							$status=4;
						}else{
							$status=5;
						}

						$files = glob($tmp_directory); // get all file names
						foreach($files as $file){ // iterate files
						  if(is_file($file))
						    unlink($file); // delete file
						}
				}elseif (wp_mail( $to, $subject, $contentHTML, $headers, $target_file )) {
						$status=4;
				}
				else
				{
						$status=5;

				}
			}
			else
			{
				$status=3;
			}





			/*
			$headers[] = 'From: Me Myself <me@example.net>';
			$headers[] = 'Cc: John Q Codex <jqc@wordpress.org>';
			$headers[] = 'Cc: iluvwp@wordpress.org'; // note you can just use a simple email address

			wp_mail( $to, $subject, $message, $headers );
			*/
		}
	}



	echo json_encode(array('status'=>$status, 'file_result'=>$file_result, 'Wyslanie maila'=>$mail_result));
	die();
}

///////////////////tlumacznia custom postow

add_filter('pll_translated_post_type_rewrite_slugs', function($post_type_translated_slugs) {
	// Add translation for "product" post type.
	$post_type_translated_slugs = array(
		'branze' => array(
			'pl' => array(
				'has_archive' => true,
				'rewrite' => array(
					'slug' => 'branze',
				),
			),
			'en' => array(
				'has_archive' => true,
				'rewrite' => array(
					'slug' => 'specializations',
				),
			),
		),
	);
	return $post_type_translated_slugs;
});



function the_excerpt_max_charlength($charlength)
{
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength )
	{
		$returnText='';
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 2 ] ) );
		if ( $excut < 0 )
		{
			$returnText.= mb_substr( $subex, 0, $excut );
		}
		else
		{
			$returnText.= $subex;
		}
		$returnText.= '...';
		return $returnText;
	}
	else
	{
		return $excerpt;
	}
}

function hwl_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_post_type_archive( 'blog_post' ) || get_queried_object()->taxonomy=='blog_tag' || get_queried_object()->taxonomy=='blog_category') {
        // Display 50 posts for a custom post type called 'movie'
        $query->set( 'posts_per_page', 4 );
        return;
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );

function template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'blog_post' )
  {
    return locate_template('archive-search.php');  //  redirect to archive-search.php
  }
  return $template;
}
add_filter('template_include', 'template_chooser');


////////////////////////Filtr do usuwania Custom posty type slug
function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'uslugi' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'uslugi', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );



/*
function debug_rewrite_rules() {
    global $wp, $template, $wp_rewrite;

    echo '<pre>';
    echo 'Request: ';
    echo empty($wp->request) ? "None" : esc_html($wp->request) . PHP_EOL;
    echo 'Matched Rewrite Rule: ';
    echo empty($wp->matched_rule) ? None : esc_html($wp->matched_rule) . PHP_EOL;
    echo 'Matched Rewrite Query: ';
    echo empty($wp->matched_query) ? "None" : esc_html($wp->matched_query) . PHP_EOL;
    echo 'Loaded Template: ';
    echo basename($template);
    echo '</pre>' . PHP_EOL;

    echo '<pre>';
    print_r($wp_rewrite->rules);
    echo '</pre>';
}

add_action( 'wp_head', 'debug_rewrite_rules' );
*/

?>
