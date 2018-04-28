<?php
/*
 * FUNCTIONS - Jetpack custom functions
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */
 
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


# RELATED POSTS
# Remove default related posts
function collisionstudio_jetpack_remove_relatedposts() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jetpack_related_posts = Jetpack_RelatedPosts::init();
        $callback = array( $jetpack_related_posts, 'filter_add_target_to_dom' );
        # Remove related posts, we've added it in template-parts/content.php.
        remove_filter( 'the_content', $callback, 40 );
    }
}

# Thumbnail size
function collisionstudio_jetpack_relatedposts_thumbnail_size( $size ) {
	$size = array( 'width'  => 900, 'height' => 355 );
	return $size;
}

# Headline
function collisionstudio_jetpack_relatedposts_headline( $headline ) {
	$headline = sprintf( '<h3>%s</h3>', esc_html__( 'Related posts', 'serotonin' ) );
	return $headline;
}

# Category context
function collisionstudio_relatedposts_post_category_context( $post_cat_context, $category ) {
    $post_cat_context = sprintf( esc_html_x( 'Posted under %s', 'Posted under {category/tag name}', 'serotonin' ), $category->name );
	return $post_cat_context;
}


# INFINITE SCROLL
# Add theme support
function collisionstudio_infinite_scroll() {
    add_theme_support( 'infinite-scroll', array(
        'type'           => 'click',
        'container'      => 'collisionstudio_blog',
        'render'         => 'collisionstudio_infinite_scroll_render',
        'wrapper'        => false,
        'posts_per_page' => false,
        'footer'         => false,
        'footer_widgets' => false,
    ) );
}

# Render template
function collisionstudio_infinite_scroll_render() { get_template_part( 'template-parts/content-infinitescroll' ); }

# Load more posts button
function collisionstudio_infinite_scroll_button( $js_settings ) {
	$js_settings['text'] = esc_html__( 'Load more', 'serotonin' );
	return $js_settings;
}


# RESPONSIVE VIDEOS
function collisionstudio_responsive_videos() {
    add_theme_support( 'jetpack-responsive-videos' );
}