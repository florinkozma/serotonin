<?php
/*
 * HOMEPAGE FEATURED POSTS
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 *
 * A function containing a custom loop, based on the user-chosen category.
 * The function represents one (of 3) row of posts.
 */

function collisionstudio_featured_posts_row( $category ) { ?>
    <div class="col featured">
        <!-- Category title -->
        <h2><?php echo get_cat_name( $category[0] ); ?></h2>
        <?php
        $p = new WP_Query( array( 'post_type' => 'post', 'cat' => $category[0] ) );
        $cs_post = '';
        # Begin the loop
        if ($p->have_posts()) {
          while ( $p->have_posts() && $cs_post < 3 ) {
            $p->the_post(); $cs_post++; # Inside the loop: ?>
                <!-- Post -->
                <ul class="categorized">
                    <li <?php post_class(); ?>>
                        <!-- Post title -->
                        <h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
                        <!-- Post excerpt -->
                        <?php collisionstudio_the_excerpt( 135 ); # The excerpt trimmed to 135 characters ?>
                    </li>
                </ul>
            <?php }
        } # End the loop
        wp_reset_query(); # Reset the wp_query so we can repeat the loop ?>
    </div>
<?php }
# Output the three columns
if( class_exists('acf') ):
	collisionstudio_featured_posts_row( get_field( 'serotonin-first-featured-category'  ) );
	collisionstudio_featured_posts_row( get_field( 'serotonin-second-featured-category' ) );
	collisionstudio_featured_posts_row( get_field( 'serotonin-third-featured-category'  ) );
endif;