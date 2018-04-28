<?php
/*
 * ARCHIVE CONTENT
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 * 
 * The custom functions can be found in inc/template-tags.php
 */

 if ( have_posts() ) : ?>
    <div class="row">
        <div class="col archive pag">
            <h1><?php collisionstudio_the_archive_title(); ?></h1>
            <h3 class="subheading"><?php collisionstudio_the_archive_subheading(); ?></h3>
        </div>
    </div>
    <div class="row fade">
        <div class="col archive-month">
            <ul class="archived">
            <?php
            # Start The Loop
            while ( have_posts() ) : the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
                    <p><?php collisionstudio_meta_postedby(); collisionstudio_meta_categories(); ?></p>
                </li>
            <?php endwhile; # End the loop ?>
            </ul>
        </div>
    </div>
    <?php collisionstudio_numeric_postnav(); ?>
<?php else :
	get_template_part( 'template-parts/content', 'none' );
endif;