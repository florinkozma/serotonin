<?php
/*
 * FUNCTIONS
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

# CONSTANTS
define( 'SEROTONIN_DIR', get_template_directory() . '/' );
define( 'SEROTONIN_URL', get_template_directory_uri() . '/' );
define( 'SEROTONIN_LOGO', SEROTONIN_URL . 'assets/img/logo.png' );
define( 'SEROTONIN_COLOR', '#00abba' );

# THEME CONTENT WIDTH
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

# WIDGET SETTINGS
if ( !function_exists( 'collisionstudio_widgets_settings' ) ) {
	function collisionstudio_widgets_settings() {
		global $wp_widget_factory;
		# Remove style from recent comments widget, so we can implement our own
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

# TAG CLOUD FONT SIZE TO 10pt / 13px
if ( !function_exists( 'collisionstudio_tagcloud_args' ) ) {
	function collisionstudio_tagcloud_args($args) {
		$args['smallest'] = 10;
		$args['largest']  = 10;
		return $args; 
	}
}

# MAKE THE THEME TRANSLATION READY
load_theme_textdomain( 'serotonin', SEROTONIN_DIR . 'languages' );


# BUILD THE FONTS URL (WITH TRANSLATION IN MIND)
function collisionstudio_font_URL_builder() {

	$fonts_url = '';
	$poppins = esc_html_x( 'on', 'Poppins font: on or off', 'serotonin' );
	$oldStandardTT = esc_html_x( 'on', 'Old Standard TT font: on or off', 'serotonin' );

	if ( 'off' !== $poppins || 'off' !== $oldStandardTT ) {
		$font_families = array();
		if ( 'off' !== $poppins ) {
			$font_families[] = 'Poppins:300,400,500,600,700';
		}
		if ( 'off' !== $oldStandardTT ) {
			$font_families[] = 'Old Standard TT:400,400italic';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

# ENQUEUE FONTS
function collisionstudio_google_fonts() {
	wp_enqueue_style( 'serotonin-fonts', collisionstudio_font_URL_builder(), array(), null );
}

# ADMIN DASHBOARD STYLE
if ( !function_exists( 'collisionstudio_dashboard_style' ) ) {
	function collisionstudio_dashboard_style() {
		wp_enqueue_style( 'serotonin-admin', SEROTONIN_URL . 'assets/css/admin.min.css' );
	}
}

# TINYMCE/WYSIWYG STYLE
if ( !function_exists( 'collisionstudio_add_editor_style' ) ) {
	function collisionstudio_add_editor_style() {
		wp_enqueue_style( 'serotonin-fonts', collisionstudio_font_URL_builder(), array(), null );
		add_editor_style( 'assets/css/wysiwyg.min.css' );
	}
}

# STYLES AND SCRIPTS
if ( !function_exists( 'collisionstudio_scripts' ) ) {
	function collisionstudio_scripts() {
		global $serotonin_contactPageId;
		# Get contact page template id
		if ( class_exists('acf') ) {
			$contact_template = get_pages(array(
				'meta_key'	=> '_wp_page_template',
				'meta_value'=> 'template-contact.php'
			));
			foreach($contact_template as $page){
				$serotonin_contactPageId =  $page->ID;
				break;
			}
		}


		# Transfer some data into javascript files
		$serotonin_cf7Styling	= class_exists('acf') ? get_field('serotonin-contact-form-7-serotonin-styling') : '';
		$serotonin_mapLat		= class_exists('acf') ? get_field('serotonin-map-latitude', $serotonin_contactPageId) : '';
		$serotonin_mapLong		= class_exists('acf') ? get_field('serotonin-map-longitude', $serotonin_contactPageId) : '';
		$localize_serotonin_js = array(
			'cf7'			=> $serotonin_cf7Styling,
			'scrollspeed'	=> get_theme_mod('serotonin_smooth_scroll')
		);
		$localize_map_js = array(
			'mapLatitude'	=> $serotonin_mapLat,
			'mapLongitude'	=> $serotonin_mapLong,
			'accentColor'	=> get_theme_mod('serotonin_accent_color', SEROTONIN_COLOR)
		);
		
		# Enqueue scripts and styles
		wp_enqueue_style  ( 'serotonin-style',			 get_stylesheet_uri() ); # Default stylesheet
		wp_enqueue_style  ( 'serotonin-normalize',		 SEROTONIN_URL . 'assets/css/normalize.min.css'  );
		wp_enqueue_style  ( 'serotonin-main',			 SEROTONIN_URL . 'assets/css/serotonin.min.css'  );
		wp_enqueue_script ( 'serotonin-html5shiv-js',	 SEROTONIN_URL . 'assets/js/html5shiv.min.js', array('jquery')    );
		wp_enqueue_script ( 'serotonin-scrollreveal-js', SEROTONIN_URL . 'assets/js/scrollreveal.min.js', array('jquery') );
		wp_enqueue_script ( 'serotonin-main-js',		 SEROTONIN_URL . 'assets/js/serotonin.min.js',	array('jquery'), '1.0.0', true );
		
		wp_localize_script( 'serotonin-main-js', 'fromPHP', $localize_serotonin_js );


		# Load scripts only if the options are activated, important for site speed

		# Wordpress comment reply
		if( is_singular() && comments_open() ) {
			wp_enqueue_script ( 'comment-reply' ); # Comment reply script
		}
		# Sticky header js
		if ( get_theme_mod( 'serotonin_sticky_header', true ) ) {
			wp_enqueue_script ( 'serotonin-sticky-js', SEROTONIN_URL . 'assets/js/sticky.min.js', array('jquery'), '1.0.0', true );
		}
		# Smooth scroll js
		if ( get_theme_mod( 'serotonin_smooth_scroll' ) ) {
			wp_enqueue_script ( 'serotonin-scrollspeed-js', SEROTONIN_URL . 'assets/js/scrollspeed.min.js', array('jquery') );
		}
		# Jetpack css and js
		if ( class_exists( 'Jetpack' ) ) {
			wp_enqueue_style  ( 'serotonin-jetpack', SEROTONIN_URL . 'assets/css/jetpack.min.css' );
			if( is_home() ) {
				wp_enqueue_script ( 'serotonin-jetpack-js', SEROTONIN_URL . 'assets/js/jetpack.min.js', array('jquery'), '1.0.0', true );
			}
		}
		# Google Map
		if( $localize_map_js['mapLatitude'] && $localize_map_js['mapLongitude'] && is_page_template( 'template-contact.php' ) ) {
			wp_enqueue_script ( 'serotonin-google-api-js', 'https://maps.googleapis.com/maps/api/js', array('jquery'), true, true );
			wp_enqueue_script ( 'serotonin-map-js',	SEROTONIN_URL . 'assets/js/map.js', array('jquery'), true, true );
			wp_localize_script( 'serotonin-map-js', 'fromPHP', $localize_map_js );
		}
	}
}

# INCLUDES
include( SEROTONIN_DIR . '/inc/class-tgm-plugin-activation.php' );
include( SEROTONIN_DIR . '/inc/template-tags.php' );
include( SEROTONIN_DIR . '/inc/acf-fields.php' );
include( SEROTONIN_DIR . '/inc/pagination.php' );
include( SEROTONIN_DIR . '/inc/customizer/customizer.php' );
include( SEROTONIN_DIR . '/inc/customizer/wp-head.php' );

# FUNCTIONS
include( SEROTONIN_DIR . '/inc/functions/collisionstudio_setup.php' );
include( SEROTONIN_DIR . '/inc/functions/collisionstudio_sidebars.php' );
include( SEROTONIN_DIR . '/inc/functions/collisionstudio_excerpt.php' );
include( SEROTONIN_DIR . '/inc/functions/collisionstudio_meta.php' );
include( SEROTONIN_DIR . '/inc/functions/collisionstudio_jetpack.php' );

# ACTIONS AND FILTERS
add_action( 'tgmpa_register',		'collisionstudio_required_plugins'		);
add_action( 'after_setup_theme',	'collisionstudio_setup'					);
add_action( 'wp_head',				'collisionstudio_google_fonts',	1		);
add_action( 'wp_head',				'collisionstudio_opengraph_info',	999 );
add_action( 'widgets_init',			'collisionstudio_widgets_init'			);
add_action( 'widgets_init',			'collisionstudio_widgets_settings'		);
add_action( 'wp_enqueue_scripts',	'collisionstudio_scripts',			999 );
add_action( 'wp_enqueue_scripts',	'collisionstudio_custom_style',		999 );
add_action( 'admin_init',			'collisionstudio_add_editor_style'		);
add_action( 'admin_head',			'collisionstudio_dashboard_style'		);
add_filter( 'widget_tag_cloud_args','collisionstudio_tagcloud_args'			);
add_filter( 'wp_nav_menu_args',		'collisionstudio_menu_args'				);

# Jetpack actions and filters
add_action( 'after_setup_theme',							'collisionstudio_infinite_scroll'							);
add_action( 'after_setup_theme',							'collisionstudio_responsive_videos'							);
add_filter( 'jetpack_implode_frontend_css',					'__return_false'											);
add_filter( 'wp', 											'collisionstudio_jetpack_remove_relatedposts',			 20 );
add_filter( 'jetpack_relatedposts_filter_thumbnail_size',	'collisionstudio_jetpack_relatedposts_thumbnail_size'		);
add_filter( 'jetpack_relatedposts_filter_headline',			'collisionstudio_jetpack_relatedposts_headline'				);
add_filter( 'jetpack_relatedposts_post_category_context',	'collisionstudio_relatedposts_post_category_context', 10, 2 );
add_filter( 'infinite_scroll_js_settings',					'collisionstudio_infinite_scroll_button'					);