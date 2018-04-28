<?php
/*
 * FUNCTIONS - Custom excerpt
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

# The theme custom excerpt
if ( !function_exists( 'collisionstudio_the_excerpt' ) ) {
	function collisionstudio_the_excerpt( $character_length ) {
		$excerpt = strip_tags( get_the_content( '...' ) );
		$character_length++;
		if ( mb_strlen( $excerpt ) > $character_length ) {
			$subex = mb_substr( $excerpt, 0, $character_length - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo '<p>' . mb_substr( $subex, 0, $excut ) . '...</p>';
			} else {
				echo '<p>' . $subex . '...</p>';
			}

		} else {
			echo '<p>' . $excerpt . '</p>';
		}
	}
}
