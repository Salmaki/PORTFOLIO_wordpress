(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-cooking_master_class_options-';
		
		// Label
		function cooking_master_class_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'cooking_master_class_first_color' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'cooking_master_class_scroll_hide' || id === 'cooking_master_class_preloader_hide' || id === 'cooking_master_class_sticky_header' || id === 'cooking_master_class_products_per_row' || id === 'cooking_master_class_width_option')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'cooking_master_class_theme_color' || id === 'background_color' || id === 'background_image' || id === 'cooking_master_class_heading_color' || id === 'cooking_master_class_paragraph_color' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' || id === 'cooking_master_class_post_layout' || id === 'cooking_master_class_404_page_main_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'cooking_master_class_social_icon_setting' || id === 'cooking_master_class_facebook_icon' || id === 'cooking_master_class_twitter_icon' || id === 'cooking_master_class_intagram_icon'|| id === 'cooking_master_class_linkedin_icon'|| id === 'cooking_master_class_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'cooking_master_class_topbar_phone_text' || id === 'cooking_master_class_header_search_setting' || id === 'cooking_master_class_header_button_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'cooking_master_class_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Product

			if ( id === 'cooking_master_class_product_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'cooking_master_class_footer_bg_image' || id === 'cooking_master_class_show_hide_copyright' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'cooking_master_class_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'cooking_master_class_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cooking_master_class_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		cooking_master_class_customizer_label( 'custom_logo', 'Logo Setup' );
		cooking_master_class_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		cooking_master_class_customizer_label( 'cooking_master_class_first_color', 'Global Color' );

		// General Setting
		cooking_master_class_customizer_label( 'cooking_master_class_preloader_hide', 'Preloader' );
		cooking_master_class_customizer_label( 'cooking_master_class_sticky_header', 'Sticky Header' );
		cooking_master_class_customizer_label( 'cooking_master_class_scroll_hide', 'Scroll To Top' );
		cooking_master_class_customizer_label( 'cooking_master_class_products_per_row', 'woocommerce Setting' );
		cooking_master_class_customizer_label( 'cooking_master_class_width_option', 'Site Width Layouts' );

		// Colors
		cooking_master_class_customizer_label( 'cooking_master_class_theme_color', 'Theme Color' );
		cooking_master_class_customizer_label( 'background_color', 'Colors' );
		cooking_master_class_customizer_label( 'background_image', 'Image' );
		cooking_master_class_customizer_label( 'cooking_master_class_heading_color', 'Heading Typography' );
		cooking_master_class_customizer_label( 'cooking_master_class_paragraph_color', 'Paragraph Typography' );

		//Header Image
		cooking_master_class_customizer_label( 'header_image', 'Header Image' );

		cooking_master_class_customizer_label( 'cooking_master_class_post_layout', 'Post Layouts Settings' );

		cooking_master_class_customizer_label( 'cooking_master_class_404_page_main_heading', '404 Page Settings' );

		// Social Icon
		cooking_master_class_customizer_label( 'cooking_master_class_social_icon_setting', 'Social Icon' );
		cooking_master_class_customizer_label( 'cooking_master_class_facebook_icon', 'Facebook' );
		cooking_master_class_customizer_label( 'cooking_master_class_twitter_icon', 'Twitter' );
		cooking_master_class_customizer_label( 'cooking_master_class_intagram_icon', 'Intagram' );
		cooking_master_class_customizer_label( 'cooking_master_class_linkedin_icon', 'Linkedin' );
		cooking_master_class_customizer_label( 'cooking_master_class_pintrest_icon', 'Pintrest' );

		// Header
		cooking_master_class_customizer_label( 'cooking_master_class_topbar_phone_text', 'Phone Number' );
		cooking_master_class_customizer_label( 'cooking_master_class_header_search_setting', 'Search Icon' );
		cooking_master_class_customizer_label( 'cooking_master_class_header_button_text', 'Header Button' );

		//Slider
		cooking_master_class_customizer_label( 'cooking_master_class_slider_section_setting', 'Slider' );

		//Product
		cooking_master_class_customizer_label( 'cooking_master_class_product_section_setting', 'Product Option' );

		//Footer
		cooking_master_class_customizer_label( 'cooking_master_class_footer_bg_image', 'Footer' );
		cooking_master_class_customizer_label( 'cooking_master_class_show_hide_copyright', 'Copyright' );
	
		// Post Setting
		cooking_master_class_customizer_label( 'cooking_master_class_post_page_title', 'Post Setting' );

		//Single Post Setting
		cooking_master_class_customizer_label( 'cooking_master_class_single_post_thumb', 'Single Post Setting' );

	});

})( jQuery );
