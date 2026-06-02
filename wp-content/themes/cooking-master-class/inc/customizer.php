<?php
/**
 * Cooking Master Class Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Cooking Master Class
 */

if ( ! defined( 'COOKING_MASTER_CLASS_URL' ) ) {
    define( 'COOKING_MASTER_CLASS_URL', esc_url( 'https://www.themagnifico.net/products/cooking-master-class-wordpress-theme', 'cooking-master-class') );
}
if ( ! defined( 'COOKING_MASTER_CLASS_TEXT' ) ) {
    define( 'COOKING_MASTER_CLASS_TEXT', __( 'Cooking Master Class Pro','cooking-master-class' ));
}
if ( ! defined( 'COOKING_MASTER_CLASS_BUY_TEXT' ) ) {
    define( 'COOKING_MASTER_CLASS_BUY_TEXT', __( 'Buy Cooking Master Class Pro','cooking-master-class' ));
}

use WPTRT\Customize\Section\Cooking_Master_Class_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Cooking_Master_Class_Button::class );

    $manager->add_section(
        new Cooking_Master_Class_Button( $manager, 'cooking_master_class_pro', [
            'title'       => esc_html( COOKING_MASTER_CLASS_TEXT,'cooking-master-class' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'cooking-master-class' ),
            'button_url'  => esc_url( COOKING_MASTER_CLASS_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'cooking-master-class-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'cooking-master-class-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cooking_master_class_customize_register($wp_customize){

    // Pro Version
    class Cooking_Master_Class_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( COOKING_MASTER_CLASS_BUY_TEXT,'cooking-master-class' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Cooking_Master_Class_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('cooking_master_class_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'cooking-master-class' ),
        'section'        => 'title_tagline',
        'settings'       => 'cooking_master_class_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'cooking-master-class' ),
        'section'        => 'title_tagline',
        'settings'       => 'cooking_master_class_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('cooking_master_class_logo_max_height',array(
        'default'   => '80',
        'sanitize_callback' => 'cooking_master_class_sanitize_number_absint'
    ));
    $wp_customize->add_control('cooking_master_class_logo_max_height',array(
        'label' => esc_html__('Logo Width','cooking-master-class'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('cooking_master_class_global_color_settings',array(
        'title' => esc_html__('Global Color Settings','cooking-master-class'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'cooking_master_class_first_color', array(
        'default' => '#590d0d',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_first_color', array(
        'label' => __('Select Your First Color', 'cooking-master-class'),
        'description' => __('Change the global color of the theme in one click.', 'cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'settings' => 'cooking_master_class_first_color',
    )));

    $wp_customize->add_setting( 'cooking_master_class_second_color', array(
        'default' => '#b3dee5',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_second_color', array(
        'label' => __('Select Your Second Color', 'cooking-master-class'),
        'description' => __('Change the global color of the theme in one click.', 'cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'settings' => 'cooking_master_class_second_color',
    )));

     //Typography option
    $cooking_master_class_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'cooking_master_class_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_heading_color', array(
        'label' => __('Heading Color', 'cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'settings' => 'cooking_master_class_heading_color',
    )));

    $wp_customize->add_setting('cooking_master_class_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices',
    ));
    $wp_customize->add_control( 'cooking_master_class_heading_font_family', array(
        'section' => 'cooking_master_class_global_color_settings',
        'label'   => __('Heading Fonts', 'cooking-master-class'),
        'type'    => 'select',
        'choices' => $cooking_master_class_font_array,
    ));

    $wp_customize->add_setting('cooking_master_class_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'setting' => 'cooking_master_class_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'cooking_master_class_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_paragraph_color', array(
        'label' => __('Paragraph Color', 'cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'settings' => 'cooking_master_class_paragraph_color',
    )));

    $wp_customize->add_setting('cooking_master_class_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices',
    ));
    $wp_customize->add_control( 'cooking_master_class_paragraph_font_family', array(
        'section' => 'cooking_master_class_global_color_settings',
        'label'   => __('Paragraph Fonts', 'cooking-master-class'),
        'type'    => 'select',
        'choices' => $cooking_master_class_font_array,
    ));

    $wp_customize->add_setting('cooking_master_class_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','cooking-master-class'),
        'section' => 'cooking_master_class_global_color_settings',
        'setting' => 'cooking_master_class_paragraph_font_size',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_global_setting', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_global_setting', array(
        'section'     => 'cooking_master_class_global_color_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));


    // Post Layouts Settings
     $wp_customize->add_section('cooking_master_class_post_layouts_settings',array(
        'title' => esc_html__('Post Layouts Settings','cooking-master-class'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('cooking_master_class_post_layout',array(
        'default' => 'pattern_two_column_right',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control(new Cooking_Master_Class_Image_Radio_Control($wp_customize, 'cooking_master_class_post_layout', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','cooking-master-class'),
        'section' => 'cooking_master_class_post_layouts_settings',
        'choices' => array(
            'pattern_one_column' => esc_url(get_template_directory_uri()).'/assets/images/1column.png',
            'pattern_two_column_right' => esc_url(get_template_directory_uri()).'/assets/images/right-sidebar.png',
            'pattern_two_column_left' => esc_url(get_template_directory_uri()).'/assets/images/left-sidebar.png',
            'pattern_three_column' => esc_url(get_template_directory_uri()).'/assets/images/3column.png',
            'pattern_four_column' => esc_url(get_template_directory_uri()).'/assets/images/4column.png',
            'pattern_grid_post' => esc_url(get_template_directory_uri()).'/assets/images/grid.png',
    ))
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_layouts_settings', array(
        'sanitize_callback' => 'cooking_master_class_sanitize_custom_control'
    ) );
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,
            'pro_version_post_layouts_settings', array(
                'section'     => 'cooking_master_class_post_layouts_settings',
                'type'        => 'pro_options',
                'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
                'description' => esc_url( COOKING_MASTER_CLASS_URL ),
                'priority'    => 100
            )
        )
    );

    //404 Page Settings
    $wp_customize->add_section('cooking_master_class_404_page_settings',array(
        'title' => esc_html__(' 404 Page Settings','cooking-master-class')
    ));

    $wp_customize->add_setting('cooking_master_class_404_page_main_heading',array(
        'default'           => __( 'Oops! Page Not Found', 'cooking-master-class' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_404_page_main_heading',array(
        'label' => esc_html__('404 Main Heading','cooking-master-class'),
        'section' => 'cooking_master_class_404_page_settings',
        'setting' => 'cooking_master_class_404_page_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_404_page_content_1',array(
        'default'           => __( 'We can’t seem to find the page you’re looking for.', 'cooking-master-class' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_404_page_content_1',array(
        'label' => esc_html__('404 Main Content 1','cooking-master-class'),
        'section' => 'cooking_master_class_404_page_settings',
        'setting' => 'cooking_master_class_404_page_content_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_404_page_text_1',array(
        'default'           => __( 'It looks like nothing was found at this location.', 'cooking-master-class' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_404_page_text_1',array(
        'label' => esc_html__('404 Text 1','cooking-master-class'),
        'section' => 'cooking_master_class_404_page_settings',
        'setting' => 'cooking_master_class_404_page_text_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_404_page_content_2',array(
        'default'           => __( 'Need Help?', 'cooking-master-class' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_404_page_content_2',array(
        'label' => esc_html__('404 Main Content 2','cooking-master-class'),
        'section' => 'cooking_master_class_404_page_settings',
        'setting' => 'cooking_master_class_404_page_content_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_404_page_text_2',array(
        'default'           => __( 'Try searching for what you need below.', 'cooking-master-class' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_404_page_text_2',array(
        'label' => esc_html__('404 Text 2','cooking-master-class'),
        'section' => 'cooking_master_class_404_page_settings',
        'setting' => 'cooking_master_class_404_page_text_2',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_404_page_settings', array(
        'sanitize_callback' => 'cooking_master_class_sanitize_custom_control'
    ) );
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,
            'pro_version_404_page_settings', array(
                'section'     => 'cooking_master_class_404_page_settings',
                'type'        => 'pro_options',
                'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
                'description' => esc_url( COOKING_MASTER_CLASS_URL ),
                'priority'    => 100
            )
        )
    );

    // General Settings
     $wp_customize->add_section('cooking_master_class_general_settings',array(
        'title' => esc_html__('General Settings','cooking-master-class'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('cooking_master_class_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_width_option',array(
        'type' => 'select',
        'section' => 'cooking_master_class_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','cooking-master-class'),
            'Wide Width' => __('Wide Width','cooking-master-class'),
            'Boxed Width' => __('Boxed Width','cooking-master-class')
        ),
    ) );

    $wp_customize->add_setting('cooking_master_class_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_general_settings',
        'settings'       => 'cooking_master_class_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_preloader_type',array(
        'default' => 'Preloader 1',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_preloader_type',array(
        'type' => 'radio',
        'label' => esc_html__('Preloader Type','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'choices' => array(
            'Preloader 1' => __('Preloader 1','cooking-master-class'),
            'Preloader 2' => __('Preloader 2','cooking-master-class'),
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'cooking_master_class_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_preloader_dot_1_color',
        'active_callback' => 'cooking_master_class_preloader1'
    )));

    $wp_customize->add_setting( 'cooking_master_class_preloader_dot_2_color', array(
        'default' => '#222121',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_preloader_dot_2_color',
        'active_callback' => 'cooking_master_class_preloader1'
    )));

    $wp_customize->add_setting( 'cooking_master_class_preloader2_dot_color', array(
        'default' => '#590d0d',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_preloader2_dot_color', array(
        'label' => esc_html__('Preloader Dot Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_preloader2_dot_color',
        'active_callback' => 'cooking_master_class_preloader2'
    )));

    $wp_customize->add_setting('cooking_master_class_sticky_header', array(
      'default' => false,
      'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_sticky_header',array(
          'label'          => __( 'Show Sticky Header', 'cooking-master-class' ),
          'section'        => 'cooking_master_class_general_settings',
          'settings'       => 'cooking_master_class_sticky_header',
          'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_general_settings',
        'settings'       => 'cooking_master_class_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_scroll_top_position',array(
        'type' => 'radio',
        'label' => __( 'Scroll To Top Position', 'cooking-master-class' ),
        'section' => 'cooking_master_class_general_settings',
        'choices' => array(
            'Right' => __('Right','cooking-master-class'),
            'Left' => __('Left','cooking-master-class'),
            'Center' => __('Center','cooking-master-class')
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'cooking_master_class_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'settings' => 'cooking_master_class_scroll_color'
    )));

    $wp_customize->add_setting('cooking_master_class_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','cooking-master-class'),
        'description' => __('Put in px','cooking-master-class'),
        'section'   => 'cooking_master_class_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('cooking_master_class_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','cooking-master-class'),
        'description' => __('Put in %','cooking-master-class'),
        'section'   => 'cooking_master_class_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting( 'cooking_master_class_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'cooking_master_class_sanitize_select',
    ) );

    $wp_customize->add_control('cooking_master_class_products_per_row', array(
       'label' => __( 'Product per row', 'cooking-master-class' ),
       'section'  => 'cooking_master_class_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('cooking_master_class_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_product_per_page',array(
        'label' => __('Product per page','cooking-master-class'),
        'section'   => 'cooking_master_class_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'cooking-master-class'),
        'section'     => 'cooking_master_class_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'cooking-master-class'),
        'section'     => 'cooking_master_class_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('cooking_master_class_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_general_settings',
        'settings'       => 'cooking_master_class_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('cooking_master_class_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_general_settings',
        'settings'       => 'cooking_master_class_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cooking-master-class'),
            'Right Sidebar' => __('Right Sidebar','cooking-master-class'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('cooking_master_class_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_general_settings',
        'settings'       => 'cooking_master_class_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','cooking-master-class'),
        'section' => 'cooking_master_class_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cooking-master-class'),
            'Right Sidebar' => __('Right Sidebar','cooking-master-class'),
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'cooking_master_class_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('cooking_master_class_menu_settings',array(
        'title' => esc_html__('Menus Settings','cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','cooking-master-class'),
        'section' => 'cooking_master_class_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('cooking_master_class_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','cooking-master-class'),
        'choices' => array(
            'Uppercase' => __('Uppercase','cooking-master-class'),
            'Capitalize' => __('Capitalize','cooking-master-class'),
            'Lowercase' => __('Lowercase','cooking-master-class'),
        ),
        'section'=> 'cooking_master_class_menu_settings',
    ));

    $wp_customize->add_setting('cooking_master_class_nav_menu_font_weight',array(
        'default'=> '500',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','cooking-master-class'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'cooking_master_class_menu_settings',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_menu_setting', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_menu_setting', array(
        'section'     => 'cooking_master_class_menu_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('cooking_master_class_top_slider',array(
        'title' => esc_html__('Slider Settings','cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_slider_section_setting', array(
        'default' => 1,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_slider_section_setting',array(
        'label'          => __( 'Enable Disable Slider', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_top_slider',
        'settings'       => 'cooking_master_class_slider_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_top_slider',
        'settings'       => 'cooking_master_class_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cooking_master_class_slider_content_setting', array(
        'default' => 1,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_slider_content_setting',array(
        'label'          => __( 'Enable Disable Slider Content', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_top_slider',
        'settings'       => 'cooking_master_class_slider_content_setting',
        'type'           => 'checkbox',
    )));

    for ( $cooking_master_class_count = 1; $cooking_master_class_count <= 3; $cooking_master_class_count++ ) {

        $wp_customize->add_setting( 'cooking_master_class_top_slider_page' . $cooking_master_class_count, array(
            'default'           => '',
            'sanitize_callback' => 'cooking_master_class_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'cooking_master_class_top_slider_page' . $cooking_master_class_count, array(
            'label'    => __( 'Select Slide Page', 'cooking-master-class' ),
            'section'  => 'cooking_master_class_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('cooking_master_class_slider_video_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_slider_video_button_url',array(
        'label' => esc_html__('Video Button Url','cooking-master-class'),
        'description' => esc_html__('Add Only Embed Url','cooking-master-class'),
        'section' => 'cooking_master_class_top_slider',
        'setting' => 'cooking_master_class_slider_video_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cooking_master_class_slider_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_slider_button_text',array(
        'label' => esc_html__('Button Text','cooking-master-class'),
        'section' => 'cooking_master_class_top_slider',
        'setting' => 'cooking_master_class_slider_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_slider_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_slider_button_url',array(
        'label' => esc_html__('Button Url','cooking-master-class'),
        'section' => 'cooking_master_class_top_slider',
        'setting' => 'cooking_master_class_slider_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cooking_master_class_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','cooking-master-class'),
        'choices' => array(
            'Left' => __('Left','cooking-master-class'),
            'Center' => __('Center','cooking-master-class'),
            'Right' => __('Right','cooking-master-class'),
        ),
        'section'=> 'cooking_master_class_top_slider',
    ));

    $wp_customize->add_setting('cooking_master_class_slider_excerpt_length',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_number_range',
        'default'  => 20,
    ));
    $wp_customize->add_control('cooking_master_class_slider_excerpt_length',array(
        'label'       => esc_html__('Slider Excerpt Length', 'cooking-master-class'),
        'section'     => 'cooking_master_class_top_slider',
        'type'        => 'range',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 50,
        ),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_section', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_slider_section', array(
        'section'     => 'cooking_master_class_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

    // Product
    $wp_customize->add_section('cooking_master_class_product_section',array(
        'title' => esc_html__('Product Option','cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_product_section_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cooking_master_class_product_section_setting',array(
        'label'          => __( 'Enable Disable Product', 'cooking-master-class' ),
        'section'        => 'cooking_master_class_product_section',
        'settings'       => 'cooking_master_class_product_section_setting',
        'type'           => 'checkbox',
    )));
    
    $wp_customize->add_setting('cooking_master_class_product_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_product_section_heading',array(
        'label' => esc_html__('Product Heading','cooking-master-class'),
        'section' => 'cooking_master_class_product_section',
        'setting' => 'cooking_master_class_product_section_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_product_section_sub_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cooking_master_class_product_section_sub_heading',array(
        'label' => esc_html__('Product Content','cooking-master-class'),
        'section' => 'cooking_master_class_product_section',
        'setting' => 'cooking_master_class_product_section_sub_heading',
        'type'  => 'text'
    ));

    if(class_exists('woocommerce')){

        $wp_customize->add_setting('cooking_master_class_home_product_per_page',array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('cooking_master_class_home_product_per_page',array(
            'label' => esc_html__('No Of Products','cooking-master-class'),
            'section' => 'cooking_master_class_product_section',
            'setting' => 'cooking_master_class_home_product_per_page',
            'type'  => 'number'
        ));
        
        $cooking_master_class_args = array(
           'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_cat',
            'pad_counts'               => false
        );
        $categories = get_categories( $cooking_master_class_args );
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $wp_customize->add_setting('cooking_master_class_home_product',array(
            'sanitize_callback' => 'cooking_master_class_sanitize_select',
        ));
        $wp_customize->add_control('cooking_master_class_home_product',array(
            'type'    => 'select',
            'choices' => $cats,
            'label' => __('Select Product Category','cooking-master-class'),
            'section' => 'cooking_master_class_product_section',
        ));
    }

    // Pro Version
    $wp_customize->add_setting( 'pro_version_product_section', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_product_section', array(
        'section'     => 'cooking_master_class_product_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('cooking_master_class_post_settings',array(
        'title' => esc_html__('Post Settings','cooking-master-class'),
        'priority'   =>40,
    ));

     $wp_customize->add_setting('cooking_master_class_post_page_title',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_post_page_meta',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_post_page_thumb',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting( 'cooking_master_class_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cooking_master_class_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cooking_master_class_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','cooking-master-class' ),
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cooking_master_class_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cooking_master_class_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','cooking-master-class' ),
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('cooking_master_class_post_page_content',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_post_page_excerpt_length',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('cooking_master_class_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('cooking_master_class_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_post_page_pagination',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting( 'cooking_master_class_blog_pagination_type', array(
        'default'           => 'blog-nav-numbers',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control( 'cooking_master_class_blog_pagination_type', array(
        'section' => 'cooking_master_class_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Type', 'cooking-master-class' ),
        'choices' => array(
            'blog-nav-numbers'  => __( 'Numeric', 'cooking-master-class' ),
            'next-prev' => __( 'Older/Newer Posts', 'cooking-master-class' ),
        )
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_thumb',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'cooking-master-class'),
    ));

    // Single Post Page Settings
    $wp_customize->add_setting( 'cooking_master_class_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cooking_master_class_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cooking_master_class_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','cooking-master-class' ),
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cooking_master_class_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cooking_master_class_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','cooking-master-class' ),
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('cooking_master_class_single_post_meta',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_title',array(
            'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_page_content',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'cooking-master-class'),
        'section'     => 'cooking_master_class_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control('cooking_master_class_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','cooking-master-class'),
        'section' => 'cooking_master_class_post_settings',
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('cooking_master_class_single_post_comment_title',array(
        'label' => __('Add Comment Title','cooking-master-class'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'cooking-master-class' ),
        ),
        'section'=> 'cooking_master_class_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('cooking_master_class_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('cooking_master_class_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','cooking-master-class'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'cooking-master-class' ),
        ),
        'section'=> 'cooking_master_class_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'cooking_master_class_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('cooking_master_class_page_settings',array(
        'title' => esc_html__('Page Settings','cooking-master-class'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('cooking_master_class_single_page_thumb',array(
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cooking_master_class_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'cooking-master-class'),
        'section'     => 'cooking_master_class_page_settings',
        'description' => esc_html__('Check this box to enable thumbnail on single page.', 'cooking-master-class'),
    ));

    $wp_customize->add_setting( 'cooking_master_class_single_page_sidebar_layout', array(
        'default'           => 'No Sidebar',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control( 'cooking_master_class_single_page_sidebar_layout', array(
        'section' => 'cooking_master_class_page_settings',
        'type' => 'select',
        'label' => __( 'Single Page Sidebar Position', 'cooking-master-class' ),
        'choices' => array(
            'No Sidebar' => __( 'No Sidebar', 'cooking-master-class' ),
            'Right Side' => __( 'Right Side', 'cooking-master-class' ),
            'Left Side' => __( 'Left Side', 'cooking-master-class' ),
        )
    ));
    
    // Footer
    $wp_customize->add_section('cooking_master_class_site_footer_section', array(
        'title' => esc_html__('Footer', 'cooking-master-class'),
    ));

    $wp_customize->add_setting('cooking_master_class_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'cooking_master_class_footer_bg_image',array(
        'label' => __('Footer Background Image','cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('cooking_master_class_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','cooking-master-class'),
        'choices' => array(
            'fixed' => __('fixed','cooking-master-class'),
            'scroll' => __('scroll','cooking-master-class'),
        ),
        'section'=> 'cooking_master_class_site_footer_section',
    ));

    $wp_customize->add_setting('cooking_master_class_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cooking-master-class'),
            'Center' => __('Center','cooking-master-class'),
            'Right' => __('Right','cooking-master-class')
        ),
    ) );

    $wp_customize->add_setting('cooking_master_class_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cooking-master-class'),
            'Center' => __('Center','cooking-master-class'),
            'Right' => __('Right','cooking-master-class')
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_footer_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_footer_bg_color', array(
        'label' => __('Footer Background Color', 'cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'settings' => 'cooking_master_class_footer_bg_color',
    )));

    $wp_customize->add_setting( 'cooking_master_class_footer_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_footer_content_color', array(
        'label' => __('Footer Content Color', 'cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'settings' => 'cooking_master_class_footer_content_color',
    )));

    $wp_customize->add_setting('cooking_master_class_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'cooking_master_class_sanitize_checkbox'
    ));
    $wp_customize->add_control('cooking_master_class_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
    ));

    $wp_customize->add_setting('cooking_master_class_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cooking_master_class_footer_text_setting', array(
        'label' => __('Replace the footer text', 'cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cooking_master_class_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'cooking_master_class_sanitize_choices'
    ));
    $wp_customize->add_control('cooking_master_class_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cooking-master-class'),
            'Center' => __('Center','cooking-master-class'),
            'Right' => __('Right','cooking-master-class')
        ),
    ) );

    $wp_customize->add_setting( 'cooking_master_class_copyright_text_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cooking_master_class_copyright_text_color', array(
        'label' => __('Copyright Text Color', 'cooking-master-class'),
        'section' => 'cooking_master_class_site_footer_section',
        'settings' => 'cooking_master_class_copyright_text_color',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer', array(
        'sanitize_callback' => 'Cooking_Master_Class_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cooking_Master_Class_Customize_Pro_Version ( $wp_customize,'pro_version_footer', array(
        'section'     => 'cooking_master_class_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cooking-master-class' ),
        'description' => esc_url( COOKING_MASTER_CLASS_URL ),
        'priority'    => 100
    )));

}
add_action('customize_register', 'cooking_master_class_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cooking_master_class_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cooking_master_class_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cooking_master_class_customize_preview_js(){
    wp_enqueue_script('cooking-master-class-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'cooking_master_class_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function cooking_master_class_panels_js() {
    wp_enqueue_style( 'cooking-master-class-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'cooking-master-class-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'cooking_master_class_panels_js' );