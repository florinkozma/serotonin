<?php
/*
 * INFINITE SCROLL CONTENT
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

# Check if blog sidebar is active
if ( get_theme_mod( 'serotonin_sidebar', true ) && !is_single() ) {
	# If the blog sidebar is active and you are on the single post page
	$serotonin_blog_class = 'leftblog'; $serotonin_thumbnail = 'serotonin-sidebar';
} else {
	# Everything else
	$serotonin_blog_class = 'fullblog'; $serotonin_thumbnail = 'serotonin-default';
}

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <!-- Begin post -->
        <div class="row fade">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
                <!-- Begin post featured image -->
                <div class="row">
                    <figure class="col image">
                        <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( $serotonin_thumbnail ); ?></a>
                    </figure>
                </div>
                <!-- End post featured image -->
                <!-- Begin post title -->
                <div class="row">
                    <div class="col <?php if ( !is_attachment() ) { echo 'title'; } ?>">
                        <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
                <!-- End post title -->
                <!-- Begin post content -->
                <div class="row">
                    <?php if ( !is_attachment() ) : ?>
                        <!-- Begin post meta -->
                        <div class="col meta">
                            <?php collisionstudio_post_meta(); ?>
                        </div>
                        <!-- End post meta -->
                    <?php endif; ?>
                    <!-- Begin post excerpt -->
                    <div class="col content">
                        <?php collisionstudio_the_excerpt( '525' ); ?>
                    </div>
                    <!-- End post excerpt -->
                </div>
                <!-- End post content -->
                <?php if ( is_sticky() ) : ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <!-- Begin sticky stamp -->
                        <div class="sticky-img">
                            <img src="<?php echo esc_url( SEROTONIN_URL ) . 'assets/img/sticky.svg'; ?>" alt="sticky post">
                        </div>
                        <!-- End sticky stamp -->
                    <?php else: ?>
                        <!-- Begin sticky stamp -->
                        <div class="sticky-noimg">
                            <img src="<?php echo esc_url( SEROTONIN_URL ) . 'assets/img/sticky.svg'; ?>" alt="sticky post">
                        </div>
                        <!-- End sticky stamp -->
                    <?php endif; ?>
                <?php endif; ?>
            </article>
        </div>
        <!-- End post -->
    <?php endwhile; # end the loop
else : get_template_part( 'template-parts/content', 'none' );
endif;