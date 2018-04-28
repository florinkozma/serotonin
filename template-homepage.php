<?php
/*
 * TEMPLATE NAME: Homepage Template
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

get_header(); ?>
<div class="row">
	<div class="col front">
		<?php if( get_field( 'serotonin-sticky-post' ) ) : ?>
			<!-- Featured post section -->
			<div class="row fade">
				<?php get_template_part( 'template-parts/content', 'homepage' ); ?>
			</div>
		<?php endif; ?>
		<!-- Category columns section -->
		<div class="row fade">
			<?php get_template_part( 'template-parts/content', 'homepage-featured' ); ?>
		</div>
		<!-- About me section -->
		<div class="row fade">
			<div class="col description">
				<h2><?php the_field( 'serotonin-about-title' ); ?></h2>
				<h4 class="subheading"><?php the_field( 'serotonin-about-subtitle' ); ?></h4>
				<?php the_field( 'serotonin-about-wysiwyg' ); ?>
				<ul class="more monospace">
				<?php if( get_field( 'serotonin-link-1-url' ) ) { ?><li><a href="http://<?php esc_url( the_field( 'serotonin-link-1-url' ) ); ?>"> <?php esc_html( the_field( 'serotonin-link-1-text' ) ); ?></a></li><?php } ?>
				<?php if( get_field( 'serotonin-link-2-url' ) ) { ?><li><a href="http://<?php esc_url( the_field( 'serotonin-link-2-url' ) ); ?>"> <?php esc_html( the_field( 'serotonin-link-2-text' ) ); ?></a></li><?php } ?>
				<?php if( get_field( 'serotonin-link-3-url' ) ) { ?><li><a href="http://<?php esc_url( the_field( 'serotonin-link-3-url' ) ); ?>"> <?php esc_html( the_field( 'serotonin-link-3-text' ) ); ?></a></li><?php } ?>
				</ul>
			</div>
			<div class="col authorav">
				<img src="<?php echo esc_url(get_field( 'serotonin-image' )['url']  ); ?>" alt="<?php echo esc_html( get_field( 'serotonin-image' )['alt'] ) ?>">
			</div>
		</div>
	</div>
</div>
<?php get_footer();