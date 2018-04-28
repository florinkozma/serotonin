<?php
/*
 * HOMEPAGE STICKY POST
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 *
 * The custom functions can be found in inc/template-tags.php
 */

$serotonin_homepage_loop = new WP_Query( array( 'post_type' => 'post', 'post__in' => get_option( 'sticky_posts' ) ) );
$serotonin_postcount = '';

if ( $serotonin_homepage_loop->have_posts() ) {
  while ( $serotonin_homepage_loop->have_posts() && $serotonin_postcount < 1 ) {
    $serotonin_homepage_loop->the_post(); # Inside the loop:
        if( has_post_thumbnail() ) { $serotonin_postcount++; ?>
            <article <?php post_class( 'col' ); ?>>
                <div class="row">
                    <!-- POST IMAGE -->
                    <div class="col image">
                        <a href="<?php esc_url( the_permalink() ); ?>">
                            <?php the_post_thumbnail( 'serotonin-default' ); ?>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <!-- POST TITLE -->
                    <div class="col title">
                        <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
                <div class="row">
                    <!-- POST META -->
                    <div class="col meta">
                        <?php collisionstudio_post_meta(); ?>
                    </div>
                    <!-- POST EXCERPT -->
                    <div class="col content">
                        <?php collisionstudio_the_excerpt( '525' ); # 525 characters ?>
                    </div>
                </div>
            </article>
       <?php }
    }
}
wp_reset_query();