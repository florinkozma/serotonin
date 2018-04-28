<?php
/*
 * 404 TEMPLATE
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

get_header(); ?>
<div class="row">
    <div class="col error404 pag">
        <h1><?php esc_html_e( '404', 'serotonin' ); ?></h1>
        <h3 class="subheading"><?php esc_html_e( 'Not all those who wander are lost.', 'serotonin' ); ?></h3>
        <h3 class="subheading"><?php esc_html_e( '...but you clearly are.', 'serotonin' ); ?></h3>
    </div>
</div>
<div class="row fade">
    <div class="col error404-content">
        <?php $serotonin_archive_url = home_url( '/' ) . date( "Y" ) . '/'; # Current year's archive ?>
        <h3><?php echo sprintf( wp_kses( esc_html__( 'Check out the <a href="%s">archive</a> or <a class="open-search">search</a> for something.', 'serotonin' ), array( 'a' => array( 'href' => array(),'class' => array() ) ) ), esc_url( $serotonin_archive_url) ); ?></h3>
        <p><?php esc_html_e( "And don't worry, we all get lost every once in awhile.", 'serotonin' ); ?></p>
    </div>
</div>
<?php get_footer();