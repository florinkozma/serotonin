<?php
/*
 * COMMENT FORM FIELDS
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio/
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'comment_form_default_fields', 'collisionstudio_comment_form_fields' );
# Overwrite the default WordPress fields for: author, e-mail and website;
if ( !function_exists( 'collisionstudio_comment_form_fields' ) ) {
	function collisionstudio_comment_form_fields( $fields ) {
		$commenter	=	wp_get_current_commenter();
		$req 		=	get_option( 'require_name_email' );
		$aria_req	=	( $req ? "aria-required='true'" : '' );
		$fields 	=	array(
			'author'	=>	'<div class="col commentform-one"><input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'serotonin' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />',
			'email'		=>	'<input id="email" name="email" type="text" placeholder="' . esc_html__( 'E-mail', 'serotonin' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . ' />',
			'url'		=>	'<input id="url" name="url" type="text" placeholder="' . esc_html__( 'Web', 'serotonin' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>',
			);
		return $fields;
	}
} ?>

<!-- Begin comment form -->
<div class="row fade">
	<div class="col comments-form">
		<?php comment_form( array(
			'title_reply'	=> esc_html__( 'Leave a comment', 'serotonin' ),
			'label_submit'	=> esc_html__( 'Submit comment', 'serotonin' ),
			apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' => '<div class="row"><div class="col commentform-two"><textarea name="comment" placeholder="' . esc_html__( 'Message', 'serotonin' ) . '" aria-required="true"></textarea></div>',
		) ); ?>
	</div>
</div>
<!-- End comment form -->