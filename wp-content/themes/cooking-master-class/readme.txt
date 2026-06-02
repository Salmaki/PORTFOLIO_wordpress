=== Cooking Master Class ===
Contributors: TheMagnifico52
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 0.7.6
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: three-columns, four-columns, wide-blocks, block-styles, custom-logo, one-column, two-columns, grid-layout, sticky-post, custom-background, custom-colors, custom-header, custom-menu, featured-images, flexible-header, threaded-comments, theme-options, left-sidebar, right-sidebar, full-width-template, editor-style, e-commerce, food-and-drink, blog, post-formats, translation-ready

== Description ==

The Cooking Master Class Theme is an elegant, adaptable, and professionally designed solution created for chefs, cooking schools, culinary instructors, and food enthusiasts who want to showcase their culinary expertise, recipes, and cooking programs in a visually engaging and highly functional platform; featuring a clean, modern layout with a strong emphasis on high-quality imagery, it highlights cooking classes, chef profiles, upcoming events, and detailed course information in an organized and attractive manner; the homepage is designed to capture attention through immersive hero sections with image or video support, setting the perfect tone for culinary storytelling and food education; fully responsive and mobile-friendly, the theme ensures seamless performance and beautiful presentation across desktops, tablets, and smartphones; it includes multiple pre-designed templates for recipe blogs, testimonials, class schedules, and event pages, making it easy to build a professional website without coding knowledge; with strong multimedia support, users can integrate photo galleries, cooking tutorials, and instructional videos to enhance learning experiences and audience engagement; flexible customization options allow adjustments to colors, typography, and layouts to match personal or brand identity; optimized for performance and user experience, it ensures fast loading and smooth navigation across all sections; combining education and culinary creativity, the Cooking Master Class Theme delivers a powerful digital platform for sharing food knowledge, promoting cooking classes, and inspiring learners in the world of gastronomy.


== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in Cooking Master Class in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. Navigate to Appearance > Customize in your admin panel and customize to taste.

== Copyright ==

Cooking Master Class WordPress Theme, Copyright 2023 TheMagnifico52
Cooking Master Class is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Cooking Master Class includes support for Infinite Scroll in Jetpack.

== Credits ==

Cooking Master Class bundles the following third-party resources:

Bootstrap, Copyright (c) 2011-2019 Twitter, Inc.
**License:** MIT
Source: https://github.com/twbs/bootstrap

Font Awesome Free 5.6.3 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)

TGMPA
* GaryJones Copyright (C) 1989, 1991
* https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/LICENSE.md
* License: GNU General Public License v2.0

OwlCarousel
 * Copyright 2013-2017 David Deutsch
 * https://github.com/OwlCarousel2/OwlCarousel2
 * https://github.com/OwlCarousel2/OwlCarousel2/blob/develop/LICENSE

Bootstrap
 * Bootstrap v4.3.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 The Bootstrap Authors
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)

PSR-4 autoloader
  * Justin Tadlock
  * License: https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
  * Source: https://github.com/WPTRT/autoload

Webfonts Loader
  * https://github.com/WPTT/webfont-loader
  * License: https://github.com/WPTT/webfont-loader/blob/master/LICENSE

CustomizeSectionButton
  * Justin Tadlock
  * Copyright 2019, Justin Tadlock.
  * License: https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
  * https://github.com/WPTRT/customize-section-button

Pxhere Images,
	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://pxhere.com/en/license

	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://pxhere.com/en/photo/626716

  License: CC0 1.0 Universal (CC0 1.0)
  Source: https://pxhere.com/en/photo/819587

  License: CC0 1.0 Universal (CC0 1.0)
  Source: https://pxhere.com/en/photo/819572

  License: CC0 1.0 Universal (CC0 1.0)
  Source: https://pxhere.com/en/photo/819548

  License: CC0 1.0 Universal (CC0 1.0)
  Source: https://pxhere.com/en/photo/819815

== Changelog ==

= 0.7.6 =
* Version Updated. 

= 0.7.5 =
* Description Update.

= 0.7.4 =

* Done some changes.

= 0.7.3 =

* Fixed malformed HTML closing tags in admin notice (h2, p).
* Fixed missing output escaping: replaced echo wp_get_theme() with esc_html(), _e() with esc_html_e().
* Fixed security: added check_ajax_referer() and current_user_can() to tm_check_plugin_exists(), demo_importer_ajax_handler() AJAX handlers.
* Fixed security: added nonce verification to cooking_master_class_dismissable_notice() and cooking_master_class_ajax_notice_handler().
* Fixed security: added nonce verification and capability check to cooking_master_class_update_recommended_action_callback() in theme-installation.php.
* Fixed sanitization of $_POST inputs in AJAX handlers using sanitize_key(), sanitize_file_name(), wp_unslash().
* Fixed incorrect esc_attr() usage with multiple arguments in comment date/time display in template-tags.php.
* Fixed esc_url() incorrectly applied to get_comment_author_link() HTML output in template-tags.php.
* Fixed orphaned </div> in index.php when no posts are found.
* Fixed scroll-to-top anchor missing href attribute in footer.php.
* Fixed deprecated get_page_by_title() replaced with WP_Query via get_posts() per WordPress 6.2 handbook.
* Fixed key name mismatch: nr_actions_recommended -> count_actions_recommended in theme-installation localize script.
* Replaced console.log() calls in theme-installation.js and theme-importer.js with silent error handling.
* Added nonce to recommend-action AJAX call in theme-installation.js.
* Replaced die() with wp_die() in AJAX handler functions.

= 0.7.2

* Added pro button in global setting.
* Added section heading in global setting.
* Added Pro button in all section.
* Added secion heading in all section.
* Added 404 settings.
* Updated 404 page.
* Added sticky header.
* Added post settings.
* Added single post settings.

= 0.7.1

* Made some changes.

= 0.7.0

* Update single.php file
* Update page single file.
* Update archive product file.
* Update single-product file.
* Update notice code.
* Added new code of global color.
* Updated Demo importer code.
* Update pattern file.
* Added some tags.
* Added post layout option.
* Updated getstart.

= 0.6.9

* Made some changes.

= 0.6.8

* Made some changes.

= 0.6.7

* Added demo impoter.
* Updated getstart.

= 0.6.6

* Added bundle notice.

= 0.6.5

* Minor fixes and improvements.

= 0.6.4

* Added woocommerce related product column setting.
* Added woocommerce related product per page setting.
* Added woocommerce related product show setting.

= 0.6.3

* Added show/hide single page thumbnail option in customizer.

= 0.6.2

* Updated getstart.
* Added some getstart file.

= 0.6.1

* Added menu css.
* Updated sidebar css.
* Added default sidebar.
* Added default css.
* Resolved textdomain error.

= 0.6

* Added footer background color option in customizer.
* Added footer content color option in customizer.
* Added copyright text color option in customizer.
* Added single page sidebar layout option in customizer.
* Updated POT file.

= 0.5.9

* Added blog page pagination type option in customizer.
* Added number of posts per row option in customizer.
* Added blog page sidebar position option in customizer.
* Added single post sidebar position option in customizer.
* Added show/hide single post tag option in customizer.
* Updated POT file.

= 0.5.8

* Added preloader type option in customizer.
* Added preloader color option in customizer.
* Updated POT file.

= 0.5.7

* Added menu font size option in customizer.
* Added menu font weight option in customizer.
* Added slider content layout option in customizer.
* Added slider excerpt length option in customizer.
* Updated POT file.

= 0.5.6

* Added show / hide slider title option in customizer.
* Added show / hide slider content option in customizer.
* Added Buy Pro link in every section.
* Added TGM files.
* Updated POT file.

= 0.5.5

* Added scroll to top background color option in customizer.
* Added scroll to top color option in customizer.
* Added scroll to top font size option in customizer.
* Added scroll to top border radius option in customizer.
* Updated POT file.

= 0.5.4

* Added product per page setting.
* Added show/hide single product page sidebar option in customizer.
* Added single product page sidebar layout option in customizer.
* Added show/hide shop page sidebar option in customizer.
* Added shop page sidebar layout option in customizer.

= 0.5.3

* Added POT file.

= 0.5.2

* Added global color option in customizer.
* Added site width layout option in customizer.
* Added nav menus text transform option in customizer.

= 0.5.1

* Added copyright content alignment option in customizer.
* Added show / hide post page content option in customizer.  
* Added footer content alignment option in customizer.
* Added show / hide single post page content option in customizer.

= 0.5

* Added single post page image border radius option in customizer.
* Added single post page image box shadow option in customizer.
* Added footer background image option in customizer.
* Added footer widget heading alignment option in customizer.
* Added footer background image position option in customizer.

= 0.0.4

* Updated archive product template.
* Updated php version.
* Updated woocommerce default img function.
* Added footer link.

= 0.0.3

* Updated Urls.

= 0.0.2

* Removed bootstrap.min.js
* Removed bootstrap.min.css.

= 0.0.1

* Initial release.