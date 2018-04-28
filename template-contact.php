<?php
/*
 * TEMPLATE NAME: Contact Template
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

get_header(); ?>
<div class="row">
	<div class="col contact pag">
		<h1><?php esc_html( the_title() ); ?></h1>
		<h3 class="subheading"><?php esc_html( the_field( 'serotonin-page-subtitle' ) ); ?></h3>
	</div>
</div>
<div class="row fade">
	<?php if( serotonin_anything_in_contact_details() ): ?>
		<div class="col contact-details">
			<ul>
				<li><?php esc_html( the_field( 'serotonin-name' ) ); ?></li>
				<li><?php esc_html( the_field( 'serotonin-address' ) ); ?></li>
				<li><a href="tel:<?php esc_html( the_field( 'serotonin-phone' ) ); ?>"><?php esc_html( the_field( 'serotonin-phone' ) ); ?></a></li>
				<li><a href="mailto:<?php esc_html( the_field( 'serotonin-email' ) ); ?>"><?php esc_html( the_field( 'serotonin-email' ) ); ?></a></li>
			</ul>
		</div>
	<?php endif; ?>
	<div class="col contact-message">
		<?php wp_kses_post( the_field('contact-form-7' ) ); ?>
	</div>
</div>
<?php if( get_field( 'serotonin-map-latitude' ) && get_field( 'serotonin-map-longitude' ) ) : ?>
    <div class="row fade">
        <div class="col map">
            <div id="map"></div>
        </div>
    </div>
<?php endif; ?>
<?php get_footer();