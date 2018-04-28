<?php
/*
 * FOOTER
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */
?>

	</div>
</main>
	<?php if( serotonin_anything_in_footer() ) : ?>
		<footer id="collisionstudio_footer">
			<div class="container">
				<div class="row">
					<aside class="col part"><?php dynamic_sidebar( 'serotonin_footer1' ); ?></aside>
					<aside class="col part"><?php dynamic_sidebar( 'serotonin_footer2' ); ?></aside>
					<aside class="col part"><?php dynamic_sidebar( 'serotonin_footer3' ); ?></aside>
					<aside class="col part"><?php dynamic_sidebar( 'serotonin_footer4' ); ?></aside>
				</div>
				<?php if( get_theme_mod( 'serotonin_copyright_text' ) ) : ?>
					<div class="row">
						<div class="col copyright">
							<p><?php echo wp_kses_post( get_theme_mod( 'serotonin_copyright_text' ) ); # Allow HTML but no <script> tags ?></p>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</footer>
	<?php endif; ?>
<div class="back-to-top">
	<div class="collisionstudio_arrow-up"><span></span></div>
</div>
<?php wp_footer(); ?>
</body>
</html>