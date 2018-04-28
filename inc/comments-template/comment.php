<?php
/*
 * SINGLE COMMENT
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 *
 * This file contains the 2 functions that output the single comment template.
 * The second function ends the output for each comment.
 * On line 63 we echo the comments based on the functions
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !function_exists( 'collisionstudio_comments') ) {
	function collisionstudio_comments( $comment, $args, $depth ) {
		# Comment author url
		$comment_author_url = get_comment_author_link();
		$GLOBALS['comment'] = $comment;
		$if_reply = '';
		extract($args, EXTR_SKIP);
		if ( 'article'	== $args['style'] ) {
			$tag		= 'article';
			$add_below	= 'comment';
		} else {
			$tag		= 'article';
			$add_below	= 'comment';
		}

		# Comment reply class
		if ( $comment->comment_parent != '0' ) {
			$if_reply = 'reply';
		} ?>
		<div class="comment <?php echo esc_html( $if_reply ); ?>" id="comment-<?php comment_ID() ?>">
			<div class="comment-author">
			    <?php echo get_avatar( $comment, 90 ); ?>
			</div>
			<div class="comment-text">
				<ul class="comment-info">
					<li><?php echo wp_kses( $comment_author_url, array( 'a' => array( 'href' => array(), 'rel' => array(), 'class' => array() ) ) ); ?></li>
					<li datetime="<?php comment_date( 'Y-m-d' ) ?>T<?php comment_time( 'H:iP' ) ?>" itemprop="datePublished"><?php comment_date( 'j F Y' ) ?>, <?php comment_time() ?></li>
					<li><?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => '2' ) ) ); ?></li>
				</ul>
				<?php comment_text(); # The comment ?>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p class="comment-meta-item"><?php esc_html_e( 'Your comment is awaiting moderation.', 'serotonin' ); ?></p>
			<?php endif; ?>
		</div>
	<?php 
	}
}

# Ending function for single comment
if ( !function_exists( 'collisionstudio_comments_close' ) ) {
	function collisionstudio_comments_close() {}
} ?>

<!-- Begin comments -->
<div class="row fade">
	<div id="comments" class="col comments">
		<h3>

			<?php
				$serotonin_comments_number = get_comments_number();
				if( $serotonin_comments_number == 1 ) { esc_html_e( 'One comment on', 'serotonin' ); }
				elseif( $serotonin_comments_number > 1 ) { echo get_comments_number() . ' ' .  esc_html__( 'comments on', 'serotonin' ); }
				the_title(' "','"');
			?>

		</h3>
		<?php
			wp_list_comments( array(
				'style'			=> 'div',
				'short_ping'	=> true,
				'reply_text'	=> esc_html__( 'Reply to comment', 'serotonin' ),
				'avatar_size'	=> 90,
				'callback'		=> 'collisionstudio_comments',
				'end-callback'	=> 'collisionstudio_comments_close'
			) ); 

			# Comments pagination
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
				echo get_the_comments_navigation();
			}
		?>

	</div>
</div>
<!-- End comments -->