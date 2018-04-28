<?php
/*
 * NOTHING FOUND
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */
?>

<div class="row fade">
	<div class="col">
		<h3><?php esc_html_e( 'Nothing found', 'serotonin' ); ?></h3>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( wp_kses( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'serotonin' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'serotonin' ); ?>&nbsp;<a class="open-search"><?php esc_html_e( 'Search', 'serotonin' ); ?></a>&nbsp;<?php esc_html_e( 'again with some different keywords.', 'serotonin' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'serotonin' ); ?></p>
		<?php endif; ?>
	</div>
</div>