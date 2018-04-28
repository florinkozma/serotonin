<?php
/*
 * FUNCTIONS - Register sidebars
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# Register Sidebars
if ( !function_exists( 'collisionstudio_widgets_init' ) ) {
	function collisionstudio_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog sidebar', 'serotonin' ),
			'id'            => 'serotonin_sidebar1',
			'description'   => esc_html__( 'Sidebar widget area of your blog', 'serotonin' ),
			'before_widget' => '<aside class="col"><article id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</article></aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer (First Column)', 'serotonin' ),
			'id'            => 'serotonin_footer1',
			'description'   => esc_html__( 'First widget area of your footer.', 'serotonin' ),
			'before_widget' => '<article id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</article>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer (Second Column)', 'serotonin' ),
			'id'            => 'serotonin_footer2',
			'description'   => esc_html__( 'Second widget area of your footer.', 'serotonin' ),
			'before_widget' => '<article id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</article>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer (Third Column)', 'serotonin' ),
			'id'            => 'serotonin_footer3',
			'description'   => esc_html__( 'Third widget area of your footer.', 'serotonin' ),
			'before_widget' => '<article id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</article>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		));
			register_sidebar( array(
			'name'          => esc_html__( 'Footer (Fourth Column)', 'serotonin' ),
			'id'            => 'serotonin_footer4',
			'description'   => esc_html__( 'Fourth widget area of your footer.', 'serotonin' ),
			'before_widget' => '<article id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</article>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		));
	}
}