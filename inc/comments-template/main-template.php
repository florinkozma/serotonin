<?php
/*
 * COMMENTS TEMPLATE
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio/
 *
 * This whole comments template is split into 3 files.
 * The basic engines of this template are wp_list_comments() and comment_form().
 * They run in the two included template parts.
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# If the post is password protected, stop here.
if( post_password_required() ) { return; }

# The comments
if ( have_comments() ) {
	get_template_part( 'inc/comments-template/comment' );
}

# The comment form
get_template_part( 'inc/comments-template/form-fields' );