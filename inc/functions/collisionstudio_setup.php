<?php
/*
 * FUNCTIONS - Theme setup
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 * 
 * Setup for Serotonin theme, and other functions
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# Setup function
if( !function_exists( 'collisionstudio_setup' ) ) {
	function collisionstudio_setup() {
		# Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		# Custom image thumbnails
		add_theme_support	( 'post-thumbnails' ); 						# Add featured image support
		add_image_size		( 'serotonin-default', 1200, 450, true ); 	# No-sidebar image size
		add_image_size		( 'serotonin-sidebar', 946, 507, true  ); 	# Sidebar image image
		# Switch default core markup to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		# Register menus
		register_nav_menus( array(
			'serotonin-menu-left'		=> esc_html__( 'Header Left',  'serotonin' ),
			'serotonin-menu-right'	=> esc_html__( 'Header Right', 'serotonin' )
		) );
		# Remove container div from header menus for Serotonin split menu
		function collisionstudio_menu_args( $args = 'container' ) {
			$args['container'] = false;
			return $args;
		}
	}
}

# Required "Serotonin" plugins
function collisionstudio_required_plugins() {
	$plugins = array(
		# Require Advanced Custom Fields plugin
		array(
			'name'				=> 'Advanced Custom Fields',
			'slug'				=> 'advanced-custom-fields',
			'required'			=> true,
			'force_activation'	=> true
		),
		# Require Contact Form 7 plugin
		array(
			'name'				=> 'Contact Form 7',
			'slug'				=> 'contact-form-7',
			'required'			=> true,
			'force_activation'	=> true
		),
		# Require Contact Form 7 on Contact page
		array(
			'name'				=> 'Contact Form 7 on Contact page',
			'slug'				=> 'advanced-custom-fields-contact-form-7-field',
			'required'			=> true,
			'force_activation'	=> true
		)
	);
	$config = array(
		'id'           => 'serotonin',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'strings'      => array(
			'nag_type' => 'updated'
		),
	);
	tgmpa( $plugins, $config );
}

# Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

# Underline searched word function. For search results page
if( !function_exists( 'collisionstudio_the_search_result' ) ) {
	function collisionstudio_the_search_result() {
		# This function underlines the word (or letter) that is being searched
		$searched_word;
		$search_query 	= get_search_query();						# Get Search query
		$search_query 	= strtolower( $search_query ); 				# Make search query lowercase
		$search_title 	= get_the_title(); 							# Get the title of the post
		$title_words 	= explode( " ", $search_title ); 			# explode into words
		$title_words 	= array_map( 'strtolower', $title_words );	# Make array items lowercase
		$word_number	= 0; 										# The first word to begin checking
		$word_count 	= count( $title_words );					# Count words in the title
		# Find searched word in the array
		foreach ( $title_words as &$word ) {
			if ( $word === $search_query ) {
				$word = '<span class="keyword">' . $word . '</span>';
			}
		}
		$final_title 	= implode( " ", $title_words );				# Declare the final title
		echo wp_kses( $final_title, array('span' => array( 'class' => array() ) ) ); # This way, we don't have to echo on function call
	}
}

#  Similar search words function. For search results page
if( !function_exists( 'collisionstudio_similar_search_words' ) ) {
	function collisionstudio_similar_search_words( $words ) {
		# Where $word will be all the words from the results
		# Defaults
		$words_to_output	= 3;									# Words to echo on the page
		$min_characters 	= 3;									# Min character number for each word
		$special_chars 		= "/[\'^£$%&*()}{@#~?><>,|=_+¬-]/";		# Special characters to exclude from results
		$results 			= false;

		# Begin
		$words_count		= 0;
		$words 				= strtolower  ( $words );				# Make all the words lowercase
		$search_query 		= strtolower  ( get_search_query() );	# Define searched parameters variable, also lowercase
		$words_array 		= preg_split  ( '/[\s,]+/', $words );	# Split the words by space or comma and create an array
		$words_array 		= array_unique( $words_array );			# Make sure the words don't repeat
		shuffle( $words_array );									# Randomize the words

		# Begin the loop
		foreach ( $words_array as $word ) {
			if ( !preg_match( $special_chars, $word ) && strlen( $word ) >= $min_characters && $words_count < $words_to_output && $word != $search_query ) {
				# If the word does not contain any of the unwanted cahacters
				# And the word is not smaller than 3
				# And the selected words are no more than 3
				# And The selected words do not include the searched word

				# Do this with every word that passed all the conditions:
				echo '<span class="similar"><a href="' . esc_url( home_url( '/' ) ) . '?s=' . $word . '">' . $word . '</a></span>';
				$results = true; # Are there any results?
				$words_count++; # To keep track of the total words
			}
		} # End the loop
		if( !$results ) {
			# If there are no results
			echo sprintf( wp_kses( esc_html__( "nothing found <div class='unusual'>(unusual word, isn't it?)</div>", 'serotonin' ), array( 'div' => array( 'class' => array( 'unusual' ) ) ) ) );
		}
	}
}