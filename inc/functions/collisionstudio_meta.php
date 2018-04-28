<?php
/*
 * FUNCTIONS - Meta tags
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

# Meta tags
if ( !function_exists( 'collisionstudio_opengraph_info' ) ) {
	function collisionstudio_opengraph_info() {

		# Jetpack has its own OG Tags
		if( class_exists( 'Jetpack' ) ) {
			return;
		}

		global $post;
		setup_postdata( $post );

		# Define all variables beforehand, we don't want them to raise any PHP errors if they're empty
		$meta						= '';
		$og_site_name				= '';
		$og_url						= '';
		$og_title					= '';
		$og_article_author			= '';
		$og_publisher_author		= '';
		$og_type					= '';
		$og_image					= '';
		$og_description				= '';
		$twitter_card				= '';
		$twitter_title				= '';
		$twitter_description		= '';
		$twitter_image				= '';
		$itemprop_name				= '';
		$itemprop_description		= '';
		$itemprop_image				= '';
		$og_image_url 				= class_exists('acf') ? esc_url( get_field( 'serotonin-image' )['url'] ) : '';
		
		# Variables
		$logo 						= esc_url( get_theme_mod( 'serotonin_site_logo', SEROTONIN_LOGO ) );# Site logo
		$title						= get_bloginfo( 'title' );				# Site title
		$description 				= get_bloginfo( 'description' ); 		# Site description
		$permalink					= esc_url( get_permalink() );			# Permalink
		$post_title					= get_the_title();						# Post title
		$excerpt 					= get_the_excerpt(); 					# Post excerpt
		$author						= get_the_author();						# Post author
		if ( !is_404() ) :
			$image 					= esc_url( wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] ); # Thumbnail image
		endif;
		if ( is_home() ) :
			$permalink 				= esc_url(  home_url( '/' ) ); # Permalink
		endif;
		
			# Open Graph
			$og_site_name 			= "<meta property='og:site_name' content='$title'>\n";
			$og_url 				= "<meta property='og:url' content='$permalink'>\n";
			# Twitter
			$twitter_card			= "<meta name='twitter:card' content='summary'>\n";
		
		if ( !is_singular() || is_front_page() || is_404() ): # If it is NOT singular OR if is home page OR if it is 404 page
			$meta 					= "<meta name='description' content='$description'>\n";
			# Open Graph
			$og_image 				= "<meta property='og:image' content='$logo'>\n";
			$og_description 		= "<meta property='og:description' content='$description'>\n";	
			$og_type 				= "<meta property='og:type' content='website'>\n";
			# Twitter
			$twitter_title			= "<meta name='twitter:title' content='$title'>\n";
			$twitter_description	= "<meta name='twitter:description' content='$description'>\n";
			$twitter_image			= "<meta name='twitter:image' content='$logo'>\n";
			# Schema.org
			$itemprop_name			= "<meta itemprop='name' content='$title'>\n";
			$itemprop_description	= "<meta itemprop='description' content='$description'>\n";
			$itemprop_image			= "<meta itemprop='image' content='$logo'>\n";
		else: # If it IS singular
			$meta 					= "<meta name='description' content='$excerpt'>\n";
			# Open Graph
			$og_title 				= "<meta property='og:title' content='$post_title'>\n";
			$og_type 				= "<meta property='og:type' content='article'>\n";
			$og_description 		= "<meta property='og:description' content='$excerpt'>\n";
			$og_article_author 		= "<meta property='og:article:author' content='$author'>\n";
			$og_publisher_author 	= "<meta property='og:article:publisher' content='$author'>\n";
			# Twitter
			$twitter_title			= "<meta name='twitter:title' content='$post_title'>\n";
			$twitter_description	= "<meta name='twitter:description' content='$excerpt'>\n";
			# Schema.org
			$itemprop_name			= "<meta itemprop='name' content='$post_title'>\n";
			$itemprop_description	= "<meta itemprop='description' content='$excerpt'>\n";
			if( !has_post_thumbnail( $post->ID ) ): # If it hasn't post thumbnail
				# Open Graph
				$og_image 			= "<meta property='og:image' content='$logo'>\n";
				# Twitter
				$twitter_image		= "<meta name='twitter:image' content='$logo'>\n";
				# Schema.org
				$itemprop_image		= "<meta itemprop='image' content='$logo'>\n";
			else:
				# Open Graph
				$og_image 			= "<meta property='og:image' content='$image'>\n";
				# Twitter
				$twitter_image		= "<meta name='twitter:image' content='$image'>\n";
				# Schema.org
				$itemprop_image		= "<meta itemprop='image' content='$image '>\n";
			endif;
		endif;
		if( is_page_template( 'template-about.php' ) ): # If it's about page
			# Open Graph
			$og_image 				= "<meta property='og:image' content='" . $og_image_url . "'>\n";
			# Twitter
			$twitter_image			= "<meta name='twitter:image' content='" . $og_image_url . "'>\n";
			# Schema.org
			$itemprop_image			= "<meta itemprop='image' content='" . $og_image_url . "'>\n";
		endif;


		# Output them in order:
		echo wp_kses( $meta,				array( 'meta' => array( 'name'		=> array(), 'content' => array() ) ) );

		echo "\n<!-- Open Graph Data -->\n";
		echo wp_kses( $og_site_name,		array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_url,				array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_title,			array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_article_author,	array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_publisher_author,	array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_type,				array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_image,			array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $og_description,		array( 'meta' => array( 'property'	=> array(), 'content' => array() ) ) );

		echo "\n<!-- Twitter Card data -->";
		echo wp_kses( $twitter_card,		array( 'meta' => array( 'name'		=> array(), 'content' => array() ) ) );
		echo wp_kses( $twitter_title,		array( 'meta' => array( 'name'		=> array(), 'content' => array() ) ) );
		echo wp_kses( $twitter_description,	array( 'meta' => array( 'name'		=> array(), 'content' => array() ) ) );
		echo wp_kses( $twitter_image,		array( 'meta' => array( 'name'		=> array(), 'content' => array() ) ) );

		echo "\n<!-- Schema.org markup Data -->";
		echo wp_kses( $itemprop_name,		array( 'meta' => array( 'itemprop'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $itemprop_description,array( 'meta' => array( 'itemprop'	=> array(), 'content' => array() ) ) );
		echo wp_kses( $itemprop_image,		array( 'meta' => array( 'itemprop'	=> array(), 'content' => array() ) ) );
	}
}