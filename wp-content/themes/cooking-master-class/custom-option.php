<?php

    $cooking_master_class_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $cooking_master_class_scroll_position = get_theme_mod( 'cooking_master_class_scroll_top_position','Right');
    if($cooking_master_class_scroll_position == 'Right'){
        $cooking_master_class_theme_css .='#button{';
            $cooking_master_class_theme_css .='right: 20px;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_scroll_position == 'Left'){
        $cooking_master_class_theme_css .='#button{';
            $cooking_master_class_theme_css .='left: 20px;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_scroll_position == 'Center'){
        $cooking_master_class_theme_css .='#button{';
            $cooking_master_class_theme_css .='right: 50%;left: 50%;';
        $cooking_master_class_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $cooking_master_class_single_post_page_image_box_shadow = get_theme_mod('cooking_master_class_single_post_page_image_box_shadow',0);
    if($cooking_master_class_single_post_page_image_box_shadow != false){
        $cooking_master_class_theme_css .='.single-post .entry-header img{';
            $cooking_master_class_theme_css .='box-shadow: '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px #cccccc;';
        $cooking_master_class_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $cooking_master_class_single_post_page_image_border_radius = get_theme_mod('cooking_master_class_single_post_page_image_border_radius', 0);
    if($cooking_master_class_single_post_page_image_border_radius != false){
        $cooking_master_class_theme_css .='.single-post .entry-header img{';
            $cooking_master_class_theme_css .='border-radius: '.esc_attr($cooking_master_class_single_post_page_image_border_radius).'px;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $cooking_master_class_footer_bg_image = get_theme_mod('cooking_master_class_footer_bg_image');
    if($cooking_master_class_footer_bg_image != false){
        $cooking_master_class_theme_css .='#colophon{';
            $cooking_master_class_theme_css .='background: url('.esc_attr($cooking_master_class_footer_bg_image).')!important;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $cooking_master_class_footer_bg_image_position = get_theme_mod( 'cooking_master_class_footer_bg_image_position','scroll');
    if($cooking_master_class_footer_bg_image_position == 'fixed'){
        $cooking_master_class_theme_css .='#colophon{';
            $cooking_master_class_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $cooking_master_class_theme_css .='}';
    }elseif ($cooking_master_class_footer_bg_image_position == 'scroll'){
        $cooking_master_class_theme_css .='#colophon{';
            $cooking_master_class_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $cooking_master_class_footer_widget_heading_alignment = get_theme_mod( 'cooking_master_class_footer_widget_heading_alignment','Left');
    if($cooking_master_class_footer_widget_heading_alignment == 'Left'){
        $cooking_master_class_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $cooking_master_class_theme_css .='text-align: left;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_footer_widget_heading_alignment == 'Center'){
        $cooking_master_class_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $cooking_master_class_theme_css .='text-align: center;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_footer_widget_heading_alignment == 'Right'){
        $cooking_master_class_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $cooking_master_class_theme_css .='text-align: right;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $cooking_master_class_footer_widget_content_alignment = get_theme_mod( 'cooking_master_class_footer_widget_content_alignment','Left');
    if($cooking_master_class_footer_widget_content_alignment == 'Left'){
        $cooking_master_class_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $cooking_master_class_theme_css .='text-align: left;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_footer_widget_content_alignment == 'Center'){
        $cooking_master_class_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $cooking_master_class_theme_css .='text-align: center;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_footer_widget_content_alignment == 'Right'){
        $cooking_master_class_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $cooking_master_class_theme_css .='text-align: right;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $cooking_master_class_copyright_content_alignment = get_theme_mod( 'cooking_master_class_copyright_content_alignment','Center');
    if($cooking_master_class_copyright_content_alignment == 'Left'){
        $cooking_master_class_theme_css .='.footer-menu-left{';
        $cooking_master_class_theme_css .='text-align: left;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_copyright_content_alignment == 'Center'){
        $cooking_master_class_theme_css .='.footer-menu-left{';
            $cooking_master_class_theme_css .='text-align: center;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_copyright_content_alignment == 'Right'){
        $cooking_master_class_theme_css .='.footer-menu-left{';
            $cooking_master_class_theme_css .='text-align: right;';
        $cooking_master_class_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $cooking_master_class_width_option = get_theme_mod( 'cooking_master_class_width_option','Full Width');
    if($cooking_master_class_width_option == 'Boxed Width'){
        $cooking_master_class_theme_css .='body{';
            $cooking_master_class_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $cooking_master_class_theme_css .='}';
        $cooking_master_class_theme_css .='.scrollup i{';
            $cooking_master_class_theme_css .='right: 100px;';
        $cooking_master_class_theme_css .='}';
        $cooking_master_class_theme_css .='.page-template-custom-home-page .home-page-header{';
            $cooking_master_class_theme_css .='padding: 0px 40px 0 10px;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_width_option == 'Wide Width'){
        $cooking_master_class_theme_css .='body{';
            $cooking_master_class_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $cooking_master_class_theme_css .='}';
        $cooking_master_class_theme_css .='.scrollup i{';
            $cooking_master_class_theme_css .='right: 30px;';
        $cooking_master_class_theme_css .='}';
    }else if($cooking_master_class_width_option == 'Full Width'){
        $cooking_master_class_theme_css .='body{';
            $cooking_master_class_theme_css .='max-width: 100%;';
        $cooking_master_class_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $cooking_master_class_nav_menu = get_theme_mod( 'cooking_master_class_nav_menu_text_transform','Uppercase');
    if($cooking_master_class_nav_menu == 'Capitalize'){
        $cooking_master_class_theme_css .='.main-navigation .menu > li > a{';
            $cooking_master_class_theme_css .='text-transform:Capitalize;';
        $cooking_master_class_theme_css .='}';
    }
    if($cooking_master_class_nav_menu == 'Lowercase'){
        $cooking_master_class_theme_css .='.main-navigation .menu > li > a{';
            $cooking_master_class_theme_css .='text-transform:Lowercase;';
        $cooking_master_class_theme_css .='}';
    }
    if($cooking_master_class_nav_menu == 'Uppercase'){
        $cooking_master_class_theme_css .='.main-navigation .menu > li > a{';
            $cooking_master_class_theme_css .='text-transform:Uppercase;';
        $cooking_master_class_theme_css .='}';
    }

    $cooking_master_class_menu_font_size = get_theme_mod( 'cooking_master_class_menu_font_size');
    if($cooking_master_class_menu_font_size != ''){
        $cooking_master_class_theme_css .='.main-navigation .menu > li > a{';
            $cooking_master_class_theme_css .='font-size: '.esc_attr($cooking_master_class_menu_font_size).'px;';
        $cooking_master_class_theme_css .='}';
    }

    $cooking_master_class_nav_menu_font_weight = get_theme_mod( 'cooking_master_class_nav_menu_font_weight',500);
    if($cooking_master_class_menu_font_size != ''){
        $cooking_master_class_theme_css .='.main-navigation .menu > li > a{';
            $cooking_master_class_theme_css .='font-weight: '.esc_attr($cooking_master_class_nav_menu_font_weight).';';
        $cooking_master_class_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $cooking_master_class_first_color = get_theme_mod('cooking_master_class_first_color');
    $cooking_master_class_second_color = get_theme_mod('cooking_master_class_second_color');

    if ($cooking_master_class_first_color) {
        $cooking_master_class_theme_css .= ':root {';
        $cooking_master_class_theme_css .= '--first-color: ' . esc_attr($cooking_master_class_first_color) . ' !important;';
        $cooking_master_class_theme_css .= '} ';
    }

    if ($cooking_master_class_second_color) {
        $cooking_master_class_theme_css .= ':root {';
        $cooking_master_class_theme_css .= '--second-color: ' . esc_attr($cooking_master_class_second_color) . ' !important;';
        $cooking_master_class_theme_css .= '} ';
    }

    /*-------------------- Global Second Color -------------------*/

    $cooking_master_class_global_second_color = get_theme_mod('cooking_master_class_global_second_color');

    if($cooking_master_class_global_second_color != false){
        $cooking_master_class_theme_css .='#masthead, #top-slider, .product-box, .main-navigation ul.sub-menu > li > a:hover, .main-navigation ul.sub-menu > li > a:focus{';
            $cooking_master_class_theme_css .='background-color: '.esc_attr($cooking_master_class_global_second_color).';';
        $cooking_master_class_theme_css .='}';
    }

    if($cooking_master_class_global_second_color != false){
        $cooking_master_class_theme_css .='#colophon a:hover, #colophon a:focus{';
            $cooking_master_class_theme_css .='color: '.esc_attr($cooking_master_class_global_second_color).';';
        $cooking_master_class_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $cooking_master_class_slider_content_layout = get_theme_mod( 'cooking_master_class_slider_content_layout','Left');
    if($cooking_master_class_slider_content_layout == 'Left'){
        $cooking_master_class_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cooking_master_class_theme_css .='text-align : left;';
        $cooking_master_class_theme_css .='}';
    }
    if($cooking_master_class_slider_content_layout == 'Center'){
        $cooking_master_class_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cooking_master_class_theme_css .='text-align : center;';
        $cooking_master_class_theme_css .='}';
        $cooking_master_class_theme_css .='span.slide-video-btn a#openModalButton{';
            $cooking_master_class_theme_css .='justify-content : center;';
        $cooking_master_class_theme_css .='}';
    }
    if($cooking_master_class_slider_content_layout == 'Right'){
        $cooking_master_class_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cooking_master_class_theme_css .='text-align : right;';
        $cooking_master_class_theme_css .='}';
        $cooking_master_class_theme_css .='span.slide-video-btn a#openModalButton{';
            $cooking_master_class_theme_css .='justify-content : end;';
        $cooking_master_class_theme_css .='}';
    }

    /*-------------------- Heading typography -------------------*/

    $cooking_master_class_heading_color = get_theme_mod('cooking_master_class_heading_color');
    $cooking_master_class_heading_font_family = get_theme_mod('cooking_master_class_heading_font_family');
    $cooking_master_class_heading_font_size = get_theme_mod('cooking_master_class_heading_font_size');
    if($cooking_master_class_heading_color != false || $cooking_master_class_heading_font_family != false || $cooking_master_class_heading_font_size != false){
        $cooking_master_class_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #colophon h5, .sidebar h5, .article-box h3.entry-title, .slider-inner-box h2, #top-slider .slider-inner-box h2, #top-slider .slider-inner-box h3, h2.wp-block-heading a, .featured h3.main-heading, .featured h4.main-heading, h5.slider-short, h5.box-title, h5.main-title, h5.class-title, h5.service-title, h6.box-short{';
            $cooking_master_class_theme_css .='color: '.esc_attr($cooking_master_class_heading_color).'!important; 
            font-family: '.esc_attr($cooking_master_class_heading_font_family).'!important;
            font-size: '.esc_attr($cooking_master_class_heading_font_size).'px !important;';
        $cooking_master_class_theme_css .='}';
    }

    $cooking_master_class_paragraph_color = get_theme_mod('cooking_master_class_paragraph_color');
    $cooking_master_class_paragraph_font_family = get_theme_mod('cooking_master_class_paragraph_font_family');
    $cooking_master_class_paragraph_font_size = get_theme_mod('cooking_master_class_paragraph_font_size');
    if($cooking_master_class_paragraph_color != false || $cooking_master_class_paragraph_font_family != false || $cooking_master_class_paragraph_font_size != false){
        $cooking_master_class_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $cooking_master_class_theme_css .='color: '.esc_attr($cooking_master_class_paragraph_color).'!important; 
            font-family: '.esc_attr($cooking_master_class_paragraph_font_family).'!important;
            font-size: '.esc_attr($cooking_master_class_paragraph_font_size).'px !important;';
        $cooking_master_class_theme_css .='}';
    }

    /*------------------ Footer CSS -------------------*/
    $cooking_master_class_footer_bg_color = get_theme_mod( 'cooking_master_class_footer_bg_color');
    if($cooking_master_class_footer_bg_color != '' ){
        $cooking_master_class_theme_css .='#colophon {';
            $cooking_master_class_theme_css .='background-color: '.esc_attr($cooking_master_class_footer_bg_color).'; ';
        $cooking_master_class_theme_css .='}';
    }

    $cooking_master_class_footer_content_color = get_theme_mod( 'cooking_master_class_footer_content_color');
    if($cooking_master_class_footer_content_color != ''){
        $cooking_master_class_theme_css .='#colophon, #colophon a, #colophon h5, #colophon .widget #wp-calendar caption {';
            $cooking_master_class_theme_css .='color: '.esc_attr($cooking_master_class_footer_content_color).';';
        $cooking_master_class_theme_css .='}';
    }

    /*------------------ Copyright CSS -------------------*/
    $cooking_master_class_copyright_text_color = get_theme_mod( 'cooking_master_class_copyright_text_color');
    if($cooking_master_class_copyright_text_color != ''){
        $cooking_master_class_theme_css .='#colophon .site-info a, #colophon .site-info span {';
            $cooking_master_class_theme_css .='color: '.esc_attr($cooking_master_class_copyright_text_color).';';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $cooking_master_class_post_page_image_border_radius = get_theme_mod('cooking_master_class_post_page_image_border_radius', 0);
    if($cooking_master_class_post_page_image_border_radius != false){
        $cooking_master_class_theme_css .='.article-box img{';
            $cooking_master_class_theme_css .='border-radius: '.esc_attr($cooking_master_class_post_page_image_border_radius).'px;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $cooking_master_class_post_page_image_box_shadow = get_theme_mod('cooking_master_class_post_page_image_box_shadow',0);
    if($cooking_master_class_post_page_image_box_shadow != false){
        $cooking_master_class_theme_css .='.article-box img{';
            $cooking_master_class_theme_css .='box-shadow: '.esc_attr($cooking_master_class_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_post_page_image_box_shadow).'px #cccccc;';
        $cooking_master_class_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $cooking_master_class_single_post_navigation_show_hide = get_theme_mod('cooking_master_class_single_post_navigation_show_hide',true);
    if($cooking_master_class_single_post_navigation_show_hide != true){
        $cooking_master_class_theme_css .='.nav-links{';
            $cooking_master_class_theme_css .='display: none;';
        $cooking_master_class_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $cooking_master_class_single_post_page_image_box_shadow = get_theme_mod('cooking_master_class_single_post_page_image_box_shadow',0);
    if($cooking_master_class_single_post_page_image_box_shadow != false){
        $cooking_master_class_theme_css .='.single-post .entry-header img{';
            $cooking_master_class_theme_css .='box-shadow: '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px '.esc_attr($cooking_master_class_single_post_page_image_box_shadow).'px #cccccc;';
        $cooking_master_class_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $cooking_master_class_single_post_page_image_border_radius = get_theme_mod('cooking_master_class_single_post_page_image_border_radius', 0);
    if($cooking_master_class_single_post_page_image_border_radius != false){
        $cooking_master_class_theme_css .='.single-post .entry-header img{';
            $cooking_master_class_theme_css .='border-radius: '.esc_attr($cooking_master_class_single_post_page_image_border_radius).'px;';
        $cooking_master_class_theme_css .='}';
    }