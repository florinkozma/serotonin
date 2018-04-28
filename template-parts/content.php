<?php
/*
 * BLOG CONTENT
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 *
 * This is the main loop, it displays the latest posts and it's used almost everywhere
 * (blog page, single post, single page, attachament page etc.)
 * however, the homepage template uses two different loops
 * You can find them in content-homepage.php and content-homepage-featured.php
 *
 * The custom functions can be found in inc/template-tags.php
 */

# Check if the right sidebar is active
if ( get_theme_mod( 'serotonin_sidebar', true ) && !is_single() ) {
	$serotonin_blog_class = 'leftblog'; $serotonin_thumbnail = 'serotonin-sidebar'; # the right sidebar is active and you are on the single post page
}
else {
	$serotonin_blog_class = 'fullblog'; $serotonin_thumbnail = 'serotonin-default'; # everything else
}
# Check if Jetpack's infinite scroll is active
$infinite_scroll_active = class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ); ?>

<!-- Begin content -->
<div class="row">
    <!-- Begin blog content -->
    <div id="collisionstudio_blog" class="col <?php echo esc_html( $serotonin_blog_class ); ?>">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); # Begin the loop ?>
                <!-- Begin post -->
                <div class="row fade">
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
                        <?php if( has_post_thumbnail() ) : ?>
                            <!-- Begin post featured image -->
                            <div class="row">
                                <figure class="col image">
                                    <?php if( is_singular() ) : ?>
                                        <?php the_post_thumbnail( 'serotonin-default' ); ?>
                                    <?php else: ?>
                                        <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( $serotonin_thumbnail ); ?></a>
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <!-- End post featured image -->
                        <?php endif; ?>
                        <!-- Begin post title -->
                        <div class="row">
                            <div class="col <?php if ( !is_attachment() ) { echo 'title'; } ?>">
                                <?php if( is_singular() ): ?>
                                    <h2><?php the_title(); ?></h2>
                                <?php else: ?>
                                    <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                                <?php endif; ?>
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
                                <?php if( is_single() ) { the_content(); collisionstudio_post_signature(); } else { collisionstudio_the_excerpt( '525' ); } ?>
                            </div>
                            <!-- End post excerpt -->
                        </div>
                        <!-- End post content -->
                        <?php if ( !is_single() && is_sticky() ) : ?>
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
                <?php if ( is_single() && class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
                    <!-- Begin Jetpack related posts -->
                    <div class="row fade">
                        <div class="col related">
                            <?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
                        </div>
                    </div>
                    <!-- End Jetpack related posts -->
                <?php endif; ?>
                <?php if ( is_single() ) { collisionstudio_nextprev_article(); } ?>
                <?php if ( comments_open() ) { comments_template(); } ?>
            <?php endwhile; # end the loop ?>
        <?php else : # no posts ?>
        	<?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </div>
    <!-- End blog content -->
    <?php if ( get_theme_mod( 'serotonin_sidebar', true ) && !is_single() ) { get_sidebar(); } ?>
</div>
<?php if ( !is_singular() && !$infinite_scroll_active ) { collisionstudio_numeric_postnav(); }