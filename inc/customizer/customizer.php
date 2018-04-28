<?php
/*
 * THEME CUSTOMIZER
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

# Register the customizer
if ( !function_exists( 'collisionstudio_customize_register' ) ) {
	function collisionstudio_customize_register( $wp_customize ) {


		# GENERAL SECTION
		$wp_customize -> add_section( 'serotonin_section_general', array(
			'title'			=>	esc_html__( 'General Settings', 'serotonin' ),
			'description'	=>	esc_html__( 'Theme general settings', 'serotonin' ),
			'priority'		=>	200
		) );

		# Page Borders
		$wp_customize -> add_setting( 'serotonin_page_borders', array(
			'default'		=>	true,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_page_borders', array(
			'label'			=>	esc_html__( 'Add page borders', 'serotonin' ),
			'section'		=>	'serotonin_section_general',
			'settings'		=>	'serotonin_page_borders',
			'type'			=>	'checkbox'
		) );

		# Smooth scroll
		$wp_customize -> add_setting( 'serotonin_smooth_scroll', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_smooth_scroll', array(
			'label'			=>	esc_html__( 'Activate smooth scrolling', 'serotonin' ),
			'section'		=>	'serotonin_section_general',
			'settings'		=>	'serotonin_smooth_scroll',
			'type'			=>	'checkbox'
		) );
		

		# HEADER SECTION
		$wp_customize -> add_section( 'serotonin_section_header', array(
			'title'			=>	esc_html__( 'Header Settings', 'serotonin' ),
			'description'	=>	esc_html__( 'Theme header settings', 'serotonin' ),
			'priority'		=>	300
		) );

		# Website Logo
		$wp_customize -> add_setting( 'serotonin_site_logo', array(
			'default'			=>	esc_url( SEROTONIN_LOGO ),
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( new WP_Customize_Image_Control ( $wp_customize, 'serotonin_site_logo', array(
			'label'			=>	esc_html__( 'Website Logo', 'serotonin' ),
			'section'		=>	'serotonin_section_header',
			'settings'		=>	'serotonin_site_logo'
		) ) );

		# Sticky Header
		$wp_customize -> add_setting( 'serotonin_sticky_header', array(
			'default'		=>	true,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_sticky_header', array(
			'label'			=>	esc_html__( 'Make header sticky', 'serotonin' ),
			'section'		=>	'serotonin_section_header',
			'settings'		=>	'serotonin_sticky_header',
			'type'			=>	'checkbox'
		) );

		# Navigation Menu Search
		$wp_customize -> add_setting( 'serotonin_nav_menu_search', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_nav_menu_search', array(
			'label'			=>	esc_html__( 'Add navigation menu search', 'serotonin' ),
			'section'		=>	'serotonin_section_header',
			'settings'		=>	'serotonin_nav_menu_search',
			'type'			=>	'checkbox'
		) );


		# BLOG SECTION
		$wp_customize -> add_section( 'serotonin_section_blog', array(
			'title'			=>	esc_html__( 'Blog Settings', 'serotonin' ),
			'description'	=>	esc_html__( 'Theme blog settings', 'serotonin' ),
			'priority'		=>	400
		) );

		# Sidebar
		$wp_customize -> add_setting( 'serotonin_sidebar', array(
			'default'		=> true,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_sidebar', array(
			'label'			=>	esc_html__( 'Add right sidebar', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_sidebar',
			'type'			=>	'checkbox',
			'priority'		=>	1
		) );

		# Post Signature
		$wp_customize -> add_setting( 'serotonin_post_signature', array(
				'sanitize_callback' => 'wp_kses_post'  # Allow HTML but no <script> tags
			) );
		$wp_customize -> add_control( 'serotonin_post_signature', array(
			'label'			=>	esc_html__( 'Signature (HTML allowed)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_post_signature',
			'type'			=>	'textarea',
			'priority'		=>	2
		) );

		# Custom text label for "Signature" section
		class serotonin_post_section_custom_text extends WP_Customize_Control {
			public function render_content() {
				echo '<span class="customize-control-title">' . esc_html__( 'You can use separate signatures for each author', 'serotonin' ) . '</span>';
			}
		}
		$wp_customize->add_setting( 'serotonin_post_section_custom_text', array(
				'sanitize_callback' => 'esc_attr'
			) );
		$wp_customize->add_control( new serotonin_post_section_custom_text( $wp_customize, 'serotonin_post_section_custom_text', array(
			'section'		=> 'serotonin_section_blog',
			'settings'		=> 'serotonin_post_section_custom_text',
			'priority'		=>	3
		)));

		# Author 1 Signature
		$wp_customize -> add_setting( 'serotonin_author1_name', array(
				'sanitize_callback' => 'esc_attr'
			) );
		$wp_customize -> add_control( 'serotonin_author1_name', array(
			'label'			=>	esc_html__( 'First Author Name (case sensitive)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author1_name',
			'type'			=>	'text',
			'priority'		=>	4
		) );
		$wp_customize -> add_setting( 'serotonin_author1_signature', array(
				'sanitize_callback' => 'wp_kses_post' # Allow HTML but no <script> tags
			) );
		$wp_customize -> add_control( 'serotonin_author1_signature', array(
			'label'			=>	esc_html__( 'First Author Signature (HTML allowed)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author1_signature',
			'type'			=>	'textarea',
			'priority'		=>	5
		) );

		# Author 2 Signature
		$wp_customize -> add_setting( 'serotonin_author2_name', array(
				'sanitize_callback' => 'esc_attr'
			) );
		$wp_customize -> add_control( 'serotonin_author2_name', array(
			'label'			=>	esc_html__( 'Second Author Name (case sensitive)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author2_name',
			'type'			=>	'text',
			'priority'		=>	6
		) );
		$wp_customize -> add_setting( 'serotonin_author2_signature', array(
				'sanitize_callback' => 'wp_kses_post' # Allow HTML but no <script> tags
			) );
		$wp_customize -> add_control( 'serotonin_author2_signature', array(
			'label'			=>	esc_html__( 'Second Author Signature (HTML allowed)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author2_signature',
			'type'			=>	'textarea',
			'priority'		=>	7
		) );

		# Author 3 Signature
		$wp_customize -> add_setting( 'serotonin_author3_name', array(
				'sanitize_callback' => 'esc_attr'
			) );
		$wp_customize -> add_control( 'serotonin_author3_name', array(
			'label'			=>	esc_html__( 'Third Author Name (case sensitive)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author3_name',
			'type'			=>	'text',
			'priority'		=>	8
		) );
		$wp_customize -> add_setting( 'serotonin_author3_signature', array(
				'sanitize_callback' => 'wp_kses_post' # Allow HTML but no <script> tags
			) );
		$wp_customize -> add_control( 'serotonin_author3_signature', array(
			'label'			=>	esc_html__( 'Third Author Signature (HTML allowed)', 'serotonin' ),
			'section'		=>	'serotonin_section_blog',
			'settings'		=>	'serotonin_author3_signature',
			'type'			=>	'textarea',
			'priority'		=>	9
		) );


		# FOOTER SECTION
		$wp_customize -> add_section( 'serotonin_section_footer', array(
			'title'			=>	esc_html__( 'Footer Settings', 'serotonin' ),
			'description'	=>	esc_html__( 'Theme footer settings', 'serotonin' ),
			'priority'		=>	500
		) );

		# Copyright Text
		$wp_customize -> add_setting( 'serotonin_copyright_text', array(
			'default'		=>	esc_html__( 'Copyright Serotonin 2016. Design and development by Collision Studio. Powered by WordPress.', 'serotonin' ),
			'sanitize_callback' => 'wp_kses_post' # Allow HTML but no <script> tags
		) );
		$wp_customize -> add_control( 'serotonin_copyright_text', array(
			'label'			=>	esc_html__( 'Copyright Text', 'serotonin' ),
			'section'		=>	'serotonin_section_footer',
			'settings'		=>	'serotonin_copyright_text',
			'type'			=>	'textarea'
		) );


		# COLORS SECTION
		$wp_customize -> add_section( 'serotonin_section_colors', array(
			'title'			=>	esc_html__( 'Color Settings', 'serotonin' ),
			'description'	=>	esc_html__( 'Theme color settings', 'serotonin' ),
			'priority'		=>	600
		) );

		# Accent Color
		$wp_customize -> add_setting( 'serotonin_accent_color', array(
			'default'		=>	SEROTONIN_COLOR,
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize -> add_control( new WP_Customize_Color_Control ( $wp_customize, 'serotonin_accent_color', array(
			'label'			=>	esc_html__( 'Accent Color', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color',
			'priority'		=>	1
		) ) );

		# Custom text label for "Accent Color" section
		class serotonin_accent_color_custom_text extends WP_Customize_Control {
			public function render_content() {
				echo '<span class="customize-control-title">' . esc_html__( 'Use accent color on:', 'serotonin' ) . '</span>';
			}
		}
		$wp_customize->add_setting( 'serotonin_accent_color_custom_text', array(
				'sanitize_callback' => 'esc_attr'
			) );
		$wp_customize->add_control( new serotonin_accent_color_custom_text( $wp_customize, 'serotonin_accent_color_custom_text', array(
			'section'		=> 'serotonin_section_colors',
			'settings'		=> 'serotonin_accent_color_custom_text',
			'priority'		=>	2
		)));

		# Use accent color for loading screen
		$wp_customize -> add_setting( 'serotonin_accent_color_loading_screen', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_loading_screen', array(
			'label'			=>	esc_html__( 'Loading screen', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_loading_screen',
			'type'			=>	'checkbox'
		) );

		# Use accent color for website name
		$wp_customize -> add_setting( 'serotonin_accent_color_site_name', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_site_name', array(
			'label'			=>	esc_html__( 'Website name', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_site_name',
			'type'			=>	'checkbox'
		) );

		# Use accent color for navigation menu
		$wp_customize -> add_setting( 'serotonin_accent_color_navigation_menu', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_navigation_menu', array(
			'label'			=>	esc_html__( 'Navigation menu', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_navigation_menu',
			'type'			=>	'checkbox'
		) );

		# Use accent color for homepage headlines
		$wp_customize -> add_setting( 'serotonin_accent_color_homepage_headlines', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_homepage_headlines', array(
			'label'			=>	esc_html__( 'Homepage headlines', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_homepage_headlines',
			'type'			=>	'checkbox'
		) );

		# Use accent color for page titles
		$wp_customize -> add_setting( 'serotonin_accent_color_page_titles', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_page_titles', array(
			'label'			=>	esc_html__( 'Page titles', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_page_titles',
			'type'			=>	'checkbox'
		) );

		# Use accent color for widget titles
		$wp_customize -> add_setting( 'serotonin_accent_color_widget_titles', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_widget_titles', array(
			'label'			=>	esc_html__( 'Widget titles', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_widget_titles',
			'type'			=>	'checkbox'
		) );

		# Use accent color for blog pagination
		$wp_customize -> add_setting( 'serotonin_accent_color_blog_pagination', array(
			'default'		=>	false,
			'sanitize_callback' => 'esc_attr'
		) );
		$wp_customize -> add_control( 'serotonin_accent_color_blog_pagination', array(
			'label'			=>	esc_html__( 'Blog pagination', 'serotonin' ),
			'section'		=>	'serotonin_section_colors',
			'settings'		=>	'serotonin_accent_color_blog_pagination',
			'type'			=>	'checkbox'
		) );
	} # collisionstudio_customize_register()
}
add_action( 'customize_register', 'collisionstudio_customize_register' );

# Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
if ( !function_exists( 'collisionstudio_customize_preview_js' ) ) {
	function collisionstudio_customize_preview_js() {
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'collisionstudio_customize_preview_js' );