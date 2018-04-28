<?php 
/*
 * CUSTOMIZER CSS
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio/
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# WP_HEAD STYLES
if ( !function_exists( 'collisionstudio_custom_style' ) ) {
	function collisionstudio_custom_style() {


		wp_enqueue_style  ( 'serotonin.min', SEROTONIN_URL . 'assets/css/serotonin.min.css'  );

		$accentcolor = get_theme_mod( 'serotonin_accent_color', SEROTONIN_COLOR );
		$custom_styling = '';
		if ( is_user_logged_in() ) {
			$custom_styling .= '@media only screen and (min-width: 768px){.commentform-two{width:100%;}.col.commentform-two{padding:0 30px;}}.form-submit,.comment-subscription-form{ padding:0 30px;}';
		}
		if ( !get_theme_mod( 'serotonin_sticky_header', true ) ) {
			$custom_styling .= '@media only screen and (min-width:960px){#collisionstudio_header{position:absolute;}}';
		}
		if ( get_theme_mod( 'serotonin_accent_color_loading_screen' ) ) {
			$custom_styling .= ".loading:before,#infinite-handle span:before {border-right-color: $accentcolor }";
		}
		if ( get_theme_mod( 'serotonin_accent_color_site_name' ) ) {
			$custom_styling .= "#mobile-name, .navigation .main-menu li #name {color: $accentcolor }";
		}
		if ( get_theme_mod( 'serotonin_accent_color_navigation_menu' ) ) {
			$custom_styling .= ".collisionstudio_menu-icon span,.collisionstudio_menu-icon span:before,.collisionstudio_menu-icon span:after{background: $accentcolor }";
			$custom_styling .= ".navigation .main-menu li{color: $accentcolor }.navigation .main-menu li a:after{ border-color:	#000000; }";
			$custom_styling .= ".navigation .main-menu li .sub-menu a:after {border-color: $accentcolor }";
		}
		if ( get_theme_mod( 'serotonin_accent_color_homepage_headlines' ) ) {
			$custom_styling .= ".featured h2,.description h2{color: $accentcolor }";
		}
		if( get_theme_mod( 'serotonin_accent_color_page_titles' ) ) {
			$custom_styling .= ".pag h1{color: $accentcolor }";
		}
		if( get_theme_mod( 'serotonin_accent_color_widget_titles' ) ) {
			$custom_styling .= ".widgets h4,.widgets h6{color: $accentcolor }";
		}
		if( get_theme_mod( 'serotonin_accent_color_blog_pagination' ) ) {
			$custom_styling .= ".pagination a:hover,.pages .current{ color: $accentcolor }";
		}
		if( !serotonin_anything_in_contact_details() ) {
			$custom_styling .= ".contact-message{width:100%}";
		}

		$custom_styling .= "::selection {background: $accentcolor } ::-moz-selection{background: $accentcolor }a:after{border-color: $accentcolor }";
		$custom_styling .= "h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover{ color: $accentcolor }";
		$custom_styling .= "button:hover, input[type='submit']:hover,input[type='reset']:hover,input[type='button']:hover,button:focus,input[type='submit']:focus,input[type='reset']:focus,input[type='button']:focus{ background: $accentcolor ; border-color: $accentcolor }";
		$custom_styling .= "input[type='email']:focus,input[type='number']:focus,input[type='search']:focus,input[type='text']:focus,input[type='tel']:focus,input[type='url']:focus,input[type='password']:focus,textarea:focus,select:focus{ border-color: $accentcolor }";
		$custom_styling .= ".content a{color: $accentcolor }.results-content .searched li .keyword:after{border-color: $accentcolor }";


		wp_add_inline_style( 'serotonin.min', $custom_styling );
	}
}