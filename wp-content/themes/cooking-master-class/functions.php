<?php
/**
 * Cooking Master Class functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cooking Master Class
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Cooking_Master_Class_Loader.php' );

$Cooking_Master_Class_Loader = new \WPTRT\Autoload\Cooking_Master_Class_Loader();

$Cooking_Master_Class_Loader->cooking_master_class_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Cooking_Master_Class_Loader->cooking_master_class_register();

if ( ! function_exists( 'cooking_master_class_setup' ) ) :

	function cooking_master_class_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'cooking-master-class', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('cooking-master-class-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','cooking-master-class' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'cooking_master_class_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_cooking_master_class_dismissable_notice', 'cooking_master_class_dismissable_notice');
		add_action( 'wp_ajax_tm-check-plugin-exists', 'tm_check_plugin_exists' );
		add_action( 'wp_ajax_tm_install_and_activate_plugin', 'tm_install_and_activate_plugin' );
	}
endif;
add_action( 'after_setup_theme', 'cooking_master_class_setup' );


function cooking_master_class_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cooking_master_class_content_width', 1170 );
}
add_action( 'after_setup_theme', 'cooking_master_class_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cooking_master_class_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cooking-master-class' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'cooking-master-class' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 1', 'cooking-master-class' ),
		'id'            => 'sidebar1',
		'description'   => esc_html__( 'Add widgets here.', 'cooking-master-class' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'cooking-master-class' ),
		'id'            => 'sidebar2',
		'description'   => esc_html__( 'Add widgets here.', 'cooking-master-class' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'cooking-master-class' ),
		'id'            => 'cooking-master-class-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'cooking-master-class' ),
		'id'            => 'cooking-master-class-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'cooking-master-class' ),
		'id'            => 'cooking-master-class-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'cooking-master-class' ),
		'id'            => 'cooking-master-class-footer4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'cooking_master_class_widgets_init' );

function tm_install_and_activate_plugin() {

	$post_plugin_details = $_POST['plugin_details'];
	$plugin_text_domain = $post_plugin_details['plugin_text_domain'];
	$plugin_main_file		=	$post_plugin_details['plugin_main_file'];
	$plugin_url					=	$post_plugin_details['plugin_url'];

	$plugin = array(
		'text_domain'	=> $plugin_text_domain,
		'path' 				=> $plugin_url,
		'install' 		=> $plugin_text_domain . '/' . $plugin_main_file
	);

	wp_cache_flush();

	$plugin_path = plugin_basename( trim( $plugin['install'] ) );


	$activate_plugin = activate_plugin( $plugin_path );

	if($activate_plugin) {

		echo $activate_plugin;

	} else {
		echo $activate_plugin;
	}

	$msg = 'installed';

	$response = array( 'status' => true, 'msg' => $msg );
	wp_send_json( $response );
	exit;
}

function tm_check_plugin_exists() {

	check_ajax_referer( 'theme_importer_nonce' );

	if ( ! current_user_can( 'activate_plugins' ) ) {
		wp_send_json_error( array( 'install_status' => false, 'active_status' => false ) );
		return;
	}

	$plugin_text_domain = isset( $_POST['plugin_text_domain'] ) ? sanitize_key( wp_unslash( $_POST['plugin_text_domain'] ) ) : '';
	$main_plugin_file   = isset( $_POST['main_plugin_file'] ) ? sanitize_file_name( wp_unslash( $_POST['main_plugin_file'] ) ) : '';
	$plugin_path        = $plugin_text_domain . '/' . $main_plugin_file;

	$get_plugins         = get_plugins();
	$is_plugin_installed = false;
	$activation_status   = false;
	if ( isset( $get_plugins[ $plugin_path ] ) ) {
		$is_plugin_installed = true;
		$activation_status   = is_plugin_active( $plugin_path );
	}
	wp_send_json_success(
		array(
			'install_status' => $is_plugin_installed,
			'active_status'  => $activation_status,
			'plugin_path'    => $plugin_path,
			'plugin_slug'    => $plugin_text_domain,
		)
	);
}


/**
 * Enqueue scripts and styles.
 */
function cooking_master_class_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'yeseva-one',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'nunito-sans',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'cooking-master-class-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'cooking-master-class-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'cooking-master-class-style',$cooking_master_class_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('cooking-master-class-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cooking_master_class_scripts' );

/**
 * Enqueue Preloader.
 */
function cooking_master_class_preloader() {

	$cooking_master_class_theme_color_css = '';
	$cooking_master_class_preloader_bg_color = get_theme_mod('cooking_master_class_preloader_bg_color');
	$cooking_master_class_preloader_dot_1_color = get_theme_mod('cooking_master_class_preloader_dot_1_color');
	$cooking_master_class_preloader_dot_2_color = get_theme_mod('cooking_master_class_preloader_dot_2_color');
  	$cooking_master_class_preloader2_dot_color = get_theme_mod('cooking_master_class_preloader2_dot_color');
	$cooking_master_class_logo_max_height = get_theme_mod('cooking_master_class_logo_max_height');
	$cooking_master_class_scroll_bg_color = get_theme_mod('cooking_master_class_scroll_bg_color');
	$cooking_master_class_scroll_color = get_theme_mod('cooking_master_class_scroll_color');
	$cooking_master_class_scroll_font_size = get_theme_mod('cooking_master_class_scroll_font_size');
	$cooking_master_class_scroll_border_radius = get_theme_mod('cooking_master_class_scroll_border_radius');
	$cooking_master_class_related_product_display_setting = get_theme_mod('cooking_master_class_related_product_display_setting', true);

  	if(get_theme_mod('cooking_master_class_logo_max_height') == '') {
		$cooking_master_class_logo_max_height = '100';
	}

	if(get_theme_mod('cooking_master_class_preloader_dot_1_color') == '') {
		$cooking_master_class_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('cooking_master_class_preloader_dot_2_color') == '') {
		$cooking_master_class_preloader_dot_2_color = '#222121';
	}

	// Start CSS build
	$cooking_master_class_theme_color_css = '';

	
	if (!$cooking_master_class_related_product_display_setting) {
	    $cooking_master_class_theme_color_css .= '
	        .related.products,
	        .related h2 {
	            display: none !important;
	        }
	    ';
	}

	$cooking_master_class_theme_color_css .= '
		.custom-logo-link img{
			max-height: '.esc_attr($cooking_master_class_logo_max_height).'px;
	 	}
		.loading, .loading2{
			background-color: '.esc_attr($cooking_master_class_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($cooking_master_class_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($cooking_master_class_preloader_dot_2_color).';
		  }
		}
		.load hr {
			background-color: '.esc_attr($cooking_master_class_preloader2_dot_color).';
		}
		a#button{
			background-color: '.esc_attr($cooking_master_class_scroll_bg_color).';
			color: '.esc_attr($cooking_master_class_scroll_color).' !important;
			font-size: '.esc_attr($cooking_master_class_scroll_font_size).'px;
			border-radius: '.esc_attr($cooking_master_class_scroll_border_radius).'%;
		}
	';
    wp_add_inline_style( 'cooking-master-class-style',$cooking_master_class_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'cooking_master_class_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/* TGM. */
require get_parent_theme_file_path( '/inc/tgm.php' );


function cooking_master_class_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/** * Posts pagination. */
if ( ! function_exists( 'cooking_master_class_blog_posts_pagination' ) ) {
	function cooking_master_class_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'cooking_master_class_blog_pagination_type', 'blog-nav-numbers' );
		if ( $pagination_type == 'blog-nav-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}

/*dropdown page sanitization*/
function cooking_master_class_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function cooking_master_class_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function cooking_master_class_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function cooking_master_class_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function cooking_master_class_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'cooking_master_class_loop_columns');
if (!function_exists('cooking_master_class_loop_columns')) {
	function cooking_master_class_loop_columns() {
		$columns = get_theme_mod( 'cooking_master_class_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

function cooking_master_class_preloader1(){
	if(get_theme_mod('cooking_master_class_preloader_type', 'Preloader 1') == 'Preloader 1' ) {
		return true;
	}
	return false;
}

function cooking_master_class_preloader2(){
	if(get_theme_mod('cooking_master_class_preloader_type', 'Preloader 1') == 'Preloader 2' ) {
		return true;
	}
	return false;
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'cooking_master_class_shop_per_page', 9 );
function cooking_master_class_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'cooking_master_class_product_per_page', 9 );
	return $cols;
}

// Filter to change the number of related products displayed
add_filter( 'woocommerce_output_related_products_args', 'cooking_master_class_products_args' );
function cooking_master_class_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function cooking_master_class_get_page_id_by_title($cooking_master_class_pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $cooking_master_class_pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

if ( ! function_exists( 'cooking_master_class_file_setup' ) ) :

	function cooking_master_class_file_setup() {

		define( 'FREE_MNSSP_API_URL', 'https://license.themagnifico.net/api/general/' );

		if ( ! defined( 'COOKING_MASTER_CLASS_CONTACT_SUPPORT' ) ) {
			define('COOKING_MASTER_CLASS_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/cooking-master-class/','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_REVIEW' ) ) {
			define('COOKING_MASTER_CLASS_REVIEW',__('https://wordpress.org/support/theme/cooking-master-class/reviews/','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_LIVE_DEMO' ) ) {
			define('COOKING_MASTER_CLASS_LIVE_DEMO',__('https://demo.themagnifico.net/cooking-master-class/','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_GET_PREMIUM_PRO' ) ) {
			define('COOKING_MASTER_CLASS_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/cooking-master-class-wordpress-theme','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_PRO_DOC' ) ) {
			define('COOKING_MASTER_CLASS_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/cooking-master-class-pro-doc/','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_FREE_DOC' ) ) {
			define('COOKING_MASTER_CLASS_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/cooking-master-class-free-doc/','cooking-master-class'));
		}
		if ( ! defined( 'COOKING_MASTER_CLASS_BUNDLE_LINK' ) ) {
			define('COOKING_MASTER_CLASS_BUNDLE_LINK',__('https://www.themagnifico.net/products/wordpress-theme-bundle','cooking-master-class'));
		}

		/**
		 * Customizer additions.
		 */
		require get_template_directory() . '/inc/customizer.php';
	}
endif;
add_action( 'after_setup_theme', 'cooking_master_class_file_setup' );

if ( class_exists( 'WP_Customize_Control' ) ) {
	// Image Toggle Radio Buttpon
	class Cooking_Master_Class_Image_Radio_Control extends WP_Customize_Control {

	    public function render_content() {
	 
	        if (empty($this->choices))
	            return;
	 
	        $name = '_customize-radio-' . $this->id;
	        ?>
	        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	        <ul class="controls" id='cooking-master-class-img-container'>
	            <?php
	            foreach ($this->choices as $value => $label) :
	                $class = ($this->value() == $value) ? 'cooking-master-class-radio-img-selected cooking-master-class-radio-img-img' : 'cooking-master-class-radio-img-img';
	                ?>
	                <li style="display: inline;">
	                    <label>
	                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
	                          	$this->link();
	                          	checked($this->value(), $value);
	                          	?> />
	                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
	                    </label>
	                </li>
	                <?php
	            endforeach;
	            ?>
	        </ul>
	        <?php
	    } 
	}
}

/**
 * Enqueue S Header.
 */
function cooking_master_class_sticky_header() {

	$cooking_master_class_sticky_header = get_theme_mod('cooking_master_class_sticky_header');

	$cooking_master_class_custom_style= "";

	if($cooking_master_class_sticky_header != true){

		$cooking_master_class_custom_style .='.stick_header{';

			$cooking_master_class_custom_style .='position: static;';

		$cooking_master_class_custom_style .='}';
	}

	wp_add_inline_style( 'cooking-master-class-style',$cooking_master_class_custom_style );

}
add_action( 'wp_enqueue_scripts', 'cooking_master_class_sticky_header' );


/**
 * Get CSS
 */

function cooking_master_class_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','cooking_master_class',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('cooking_master_class_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'cooking_master_class_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_cooking_master_class-info' != $hook ) {
		return;
	}
	
}
add_action( 'admin_enqueue_scripts', 'cooking_master_class_getpage_css' );

//Admin Notice For Getstart
function cooking_master_class_ajax_notice_handler() {
	check_ajax_referer( 'cooking_master_class_dismissed_notice_nonce', 'wpnonce' );
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
	wp_die();
}

function cooking_master_class_deprecated_hook_admin_notice() {

     // Check if the notice has been dismissed by the user
    $dismissed = get_user_meta(get_current_user_id(), 'cooking_master_class_dismissable_notice', true);

    // Exclude the notice from being shown on the "Theme Importer" page
    $current_screen = get_current_screen();
    if ($current_screen && $current_screen->id === 'appearance_page_theme-importer') {
        return; // Don't show the notice on this page
    }

    if (!$dismissed) {  
    	?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'cooking-master-class'); ?><?php echo esc_html( wp_get_theme() ); ?></h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php esc_html_e('Get Started With Theme By Clicking On Getting Started.', 'cooking-master-class'); ?></p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=cooking-master-class-info.php' )); ?>"><?php esc_html_e( 'Get started', 'cooking-master-class' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero notice-pro-btn" target="_blank" href="<?php echo esc_url( COOKING_MASTER_CLASS_GET_PREMIUM_PRO ); ?>"><?php esc_html_e( 'Get Premium ', 'cooking-master-class' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero notice-bundle-btn" target="_blank" href="<?php echo esc_url( COOKING_MASTER_CLASS_BUNDLE_LINK ); ?>"><?php esc_html_e( 'Buy All Themes - 130+ Templates', 'cooking-master-class' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( COOKING_MASTER_CLASS_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'cooking-master-class' ) ?></a>
	        	</span>
	    	</div>	    	
        </div>
    <?php }
}

add_action( 'admin_notices', 'cooking_master_class_deprecated_hook_admin_notice' );

function cooking_master_class_switch_theme() {
    delete_user_meta(get_current_user_id(), 'cooking_master_class_dismissable_notice');
}
add_action('after_switch_theme', 'cooking_master_class_switch_theme');
function cooking_master_class_dismissable_notice() {
	check_ajax_referer( 'cooking_master_class_dismissed_notice_nonce', 'wpnonce' );
    update_user_meta(get_current_user_id(), 'cooking_master_class_dismissable_notice', true);
    wp_die();
}

// Demo Content Code

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit;
}

// Add the AJAX action to trigger theme mods import
add_action('wp_ajax_import_theme_mods', 'demo_importer_ajax_handler');

// Handle the AJAX request
function demo_importer_ajax_handler() {

    check_ajax_referer( 'theme_importer_nonce' );

    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_send_json_error( 'Permission denied.' );
        return;
    }

    // Sample data to import
    $theme_mods_data = array(
        'header_textcolor' => '000000',  // Example: change header text color
        'background_color' => 'ffffff',  // Example: change background color
        'custom_logo'      => 123,       // Example: set a custom logo by attachment ID
        'footer_text'      => 'Custom Footer Text', // Example: custom footer text
    );

    // Call the function to import theme mods
    if (demo_theme_importer($theme_mods_data)) {
        // After importing theme mods, create the menu
        create_demo_menu();
        wp_send_json_success(array(
        	'msg' => 'Theme mods imported successfully.',
        	'redirect' => home_url()
        ));
    } else {
        wp_send_json_error('Failed to import theme mods.');
    }

    wp_die();
}

// Function to set theme mods
function demo_theme_importer($import_data) {
    if (is_array($import_data)) {
        foreach ($import_data as $mod_name => $mod_value) {
            set_theme_mod($mod_name, $mod_value);
        }
        return true;
    } else {
        return false;
    }
}

// Function to create demo menu
function create_demo_menu() {

	$menu_structure = [

        [
            'title' => 'Home',
            'slug'  => 'home',
            'template' => 'page-template/home-template.php',
        ],
        [
            'title' => 'Cupcake',
            'slug'  => 'cupcake',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
           	"
        ],
        [
            'title' => 'Recieps',
            'slug'  => 'recieps',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
           	"
        ],
        [
            'title' => 'Blog',
            'slug'  => 'blog',
        ],
        
        [
            'title' => 'Pages',
            'slug'  => 'pages',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
           	"
        ],
        [
            'title' => 'Contact Us',
            'slug'  => 'contact',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
           	"
        ],
    ];

    // ----------------------------------------------------
    // Do not modify below this line unless needed
    // ----------------------------------------------------

    $created_pages = [];

    $menu_name = 'Primary Menu';
    $location  = 'primary';
    $menu = wp_get_nav_menu_object($menu_name);

    $menu_id = (!$menu) ? wp_create_nav_menu($menu_name) : $menu->term_id;

    $create_page_and_menu = function($item, $parent_menu_id = 0, $parent_page_id = 0) 
        use (&$create_page_and_menu, &$created_pages, $menu_id) {

        $pages = get_posts( array(
            'post_type'   => 'page',
            'title'       => $item['title'],
            'post_status' => 'all',
            'numberposts' => 1,
        ) );
        $page = ! empty( $pages ) ? $pages[0] : null;

        if (!$page) {
            $page_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_name'    => $item['slug'],
                'post_parent'  => $parent_page_id,
                'post_content' => !empty($item['content']) ? $item['content'] : '',
            ]);

            if (!empty($item['template'])) {
                update_post_meta($page_id, '_wp_page_template', $item['template']);
            }

        } else {
            $page_id = $page->ID;
        }

        $created_pages[$item['title']] = $page_id;

        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'     => $item['title'],
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $page_id,
            'menu-item-type'      => 'post_type',
            'menu-item-parent-id' => $parent_menu_id,
            'menu-item-status'    => 'publish'
        ]);

        if (!empty($item['children'])) {
            foreach ($item['children'] as $child) {
                $create_page_and_menu($child, $menu_item_id, $page_id);
            }
        }
    };

    foreach ($menu_structure as $item) {
        $create_page_and_menu($item);
    }

    if (!empty($created_pages['Home'])) {
        update_option('page_on_front', $created_pages['Home']);
        update_option('show_on_front', 'page');
    }

    if (!empty($created_pages['Blog'])) {
        update_option('page_for_posts', $created_pages['Blog']);
    }

    $locations = get_theme_mod('nav_menu_locations');
    $locations[$location] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    //Slider
    set_theme_mod( 'cooking_master_class_slider_section_setting', true );
    
	set_theme_mod( 'cooking_master_class_slider_button_text', 'ORDER NOW' );
	set_theme_mod( 'cooking_master_class_slider_button_url', '#' );
	set_theme_mod( 'cooking_master_class_slider_video_button_url', 'https://www.youtube.com/embed/yAoLSRbwxL8?si=-7Q8UdpRbSEWjXuY' );

    for($i=1;$i<=3;$i++){
    	
        $title = 'Yummy sweeties delivered to your dining table!';
        $content = 'Lorem ipsum dolor sit amet, consecteturdolor sit lorem ipsum dolor sit adipiscing elit. dolor sit amet,';
            // Create post object
        $my_post = array(
			'post_title'    => wp_strip_all_tags( $title ),
			'post_content'  => $content,
			'post_status'   => 'publish',
			'post_type'     => 'page',
        );

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );

		if ($post_id) {
		// Set the theme mod for the slider page
		set_theme_mod('cooking_master_class_top_slider_page' . $i, $post_id);

		$image_url = get_template_directory_uri().'/assets/images/slider.png';

		$image_id = media_sideload_image($image_url, $post_id, null, 'id');

		    if (!is_wp_error($image_id)) {
		        // Set the downloaded image as the post's featured image
		        set_post_thumbnail($post_id, $image_id);
		    }
		}
    }

    //Product
    set_theme_mod( 'cooking_master_class_product_section_setting', true);
    set_theme_mod( 'cooking_master_class_product_section_heading','This Week’s Specials');
    set_theme_mod( 'cooking_master_class_product_section_sub_heading','Try our most popular signature recipes and taste the difference!');

	$cooking_master_class_product_title = array('Pinky Cream Cherry Milk','Gummy Tosca Mixed Flavors','Blushing Strawberry Cream','Mystery Rose Choco');


	if ( class_exists( 'WooCommerce' ) ) {

		$cooking_master_class_review_text = array(
			'Nice product',
			'Good Quality Product',
			'Nice Product. Must buy It.',
			'I like this Product',
			'Nice Product',
		);


		for($i=1;$i<=4;$i++){
	        $cooking_master_class_title = $cooking_master_class_product_title[$i-1];
	        $cooking_master_class_content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	        $cooking_master_class_excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	        // Create post object
	        $my_post = array(
	            'post_title'    => wp_strip_all_tags( $cooking_master_class_title ),
	            'post_content'  => $cooking_master_class_content,
	            'post_status'   => 'publish',
	            'post_type'     => 'product',
	            'post_excerpt'	=> $cooking_master_class_excerpt
	        );
	     
	        // Insert the post into the database
	        $post_id = wp_insert_post( $my_post );
	        // array_push( $_product_ids, $post_id );

			for ( $c=0; $c <= 5; $c++ ) {
				$comment_id = wp_insert_comment( array(
					'comment_post_ID'      => $post_id,
					'comment_author'       => get_the_author_meta( 'display_name' ),
					'comment_author_email' => get_the_author_meta( 'user_email' ),
					'comment_content'      => $cooking_master_class_review_text[$c],
					'comment_parent'       => 0,
					'user_id'              => get_current_user_id(), // <== Important
					'comment_date'         => date('Y-m-d H:i:s'),
					'comment_approved'     => 1,
				) );

				update_comment_meta( $comment_id, 'rating', 
				3 );
			}

			update_post_meta( $post_id, '_regular_price', "52" );
	        update_post_meta( $post_id, '_sale_price', "32" );
	        update_post_meta( $post_id, '_price', "32" );

	        update_post_meta($post_id, 'total_sales', '50');
	        update_post_meta($post_id, '_manage_stock', 'true');
	        update_post_meta($post_id, '_stock', '100');

	        $image_url = get_template_directory_uri().'/assets/images/special'.$i.'.png';

	        wp_set_object_terms($post_id, array('Skincare'), 'product_cat');

	        $image_name= 'special'.$i.'.png';
	        $upload_dir       = wp_upload_dir(); 
	        // Set upload folder
	        $image_data= file_get_contents($image_url); 
	        // Get image data
	        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	        // Generate unique name
	        $filename= basename( $unique_file_name ); 
	        // Create image file name

	        // Check folder permission and define file location
	        if( wp_mkdir_p( $upload_dir['path'] ) ) {
	        	$file = $upload_dir['path'] . '/' . $filename;
	        } else {
	        	$file = $upload_dir['basedir'] . '/' . $filename;
	    	}

	        // Create the image  file on the server
	        file_put_contents( $file, $image_data );

	        // Check image file type
	        $wp_filetype = wp_check_filetype( $filename, null );

	        // Set attachment data
	        $attachment = array(
	        'post_mime_type' => $wp_filetype['type'],
	        'post_title'     => sanitize_file_name( $filename ),
	        'post_content'   => '',
	        'post_type'     => 'product',
	        'post_status'    => 'inherit'
	        );

	        // Create the attachment
	        $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	        // Include image.php
	        require_once(ABSPATH . 'wp-admin/includes/image.php');

	        // Define attachment metadata
	        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	        // Assign metadata to attachment
	        wp_update_attachment_metadata( $attach_id, $attach_data );

	        // And finally assign featured image to post
	        set_post_thumbnail( $post_id, $attach_id );
	    }
		}
    
}
// Enqueue necessary scripts
add_action('admin_enqueue_scripts', 'demo_importer_enqueue_scripts');

function demo_importer_enqueue_scripts() {
    wp_enqueue_script(
        'demo-theme-importer',
        get_template_directory_uri() . '/assets/js/theme-importer.js', // Path to your JS file
        array('jquery'),
        null,
        true
    );

    wp_enqueue_style('demo-importer-style', get_template_directory_uri() . '/assets/css/importer.css', array(), '');

    // Localize script to pass AJAX URL to JS
    wp_localize_script(
        'demo-theme-importer',
        'demoImporter',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('theme_importer_nonce')
        )
    );
}

/**
 * Theme Info.
 */
function cooking_master_class_theme_info_load() {
	require get_theme_file_path( '/inc/theme-installation/theme-installation.php' );
}
add_action( 'init', 'cooking_master_class_theme_info_load' );

add_action('wp_ajax_import_theme_mods', 'cooking_master_class_import_function');

function cooking_master_class_import_function() {
    check_ajax_referer('your-nonce-key', '_ajax_nonce');
    wp_send_json_success([
        'msg' => 'Demo imported successfully',
        'redirect' => admin_url('themes.php?page=theme-options')
    ]);
}


// Getstart Function


function free_mnssp_get_filtered_products($cursor = '', $search = '', $collection = 'pro') {
    $endpoint_url = FREE_MNSSP_API_URL . 'getFilteredProducts';

    $remote_post_data = array(
        'collectionHandle' => $collection,
        'productHandle' => $search,
        'paginationParams' => array(
            "first" => 12,
            "afterCursor" => $cursor,
            "beforeCursor" => "",
            "reverse" => true
        )
    );

    $body = wp_json_encode($remote_post_data);

    $options = [
        'body' => $body,
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
            if (isset($response_body->data->products) && !empty($response_body->data->products)) {
                return  array(
                    'products' => $response_body->data->products,
                    'pagination' => $response_body->data->pageInfo
                );
            }
        }
        return [];
    }
    
    return [];
}

function free_mnssp_get_filtered_products_ajax() {
    $cursor = isset($_POST['cursor']) ? sanitize_text_field(wp_unslash($_POST['cursor'])) : '';
    $search = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
    $collection = isset($_POST['collection']) ? sanitize_text_field(wp_unslash($_POST['collection'])) : 'pro';

    check_ajax_referer('free_mnssp_create_pagination_nonce_action', 'mnssp_pagination_nonce');

    $get_filtered_products = free_mnssp_get_filtered_products($cursor, $search, $collection);
    ob_start();
    if (isset($get_filtered_products['products']) && !empty($get_filtered_products['products'])) {
        foreach ( $get_filtered_products['products'] as $product ) {

            $product_obj = $product->node;
            
            if (isset($product_obj->inCollection) && !$product_obj->inCollection) {
                continue;
            }

            $product_obj = $product->node;

            $demo_url = isset($product->node->metafield->value) ? $product->node->metafield->value : '';
            $product_url = isset($product->node->onlineStoreUrl) ? $product->node->onlineStoreUrl : '';
            $image_src = isset($product->node->images->edges[0]->node->src) ? $product->node->images->edges[0]->node->src : '';
            $price = isset($product->node->variants->edges[0]->node->price) ? '$' . $product->node->variants->edges[0]->node->price : ''; ?>

            <div class="mnssp-grid-item">
                <div class="mnssp-image-wrap">
                    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr($product_obj->title); ?>">
                    <div class="mnssp-image-overlay">
                        <a class="mnssp-demo-url mnssp-btn" href="<?php echo esc_attr($demo_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Demo'); ?></a>
                        <a class="mnssp-buy-now mnssp-btn" href="<?php echo esc_attr($product_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Buy Now'); ?></a>
                    </div>
                </div>
                <footer>
                    <h3><?php echo esc_html($product_obj->title); ?></h3>
                </footer>
                <div class="mnssp-grid-item-price">Price: <?php echo esc_html($price); ?></div>
            </div>
        <?php }
    }
    $output = ob_get_clean();

    $pagination = isset($get_filtered_products['pagination']) ?  $get_filtered_products['pagination'] : [];
    wp_send_json(array(
        'content' => $output,
        'pagination' => $pagination
    ));
}

add_action('wp_ajax_free_mnssp_get_filtered_products', 'free_mnssp_get_filtered_products_ajax');
add_action('wp_ajax_nopriv_free_mnssp_get_filtered_products', 'free_mnssp_get_filtered_products_ajax');

function free_mnssp_get_collections() {
    
    $endpoint_url = FREE_MNSSP_API_URL . 'getCollections';

    $options = [
        'body' => [],
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
           return  $response_body->data;
        }
        return  [];
    }

    return  [];
}