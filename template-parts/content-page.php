<?php
/*
 * SINGLE PAGE CONTENT
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="row">
		    <div class="col pag">
		        <h1><?php the_title(); ?></h1>
		    </div>
		</div>
        <div class="row fade">
        	<?php if( has_post_thumbnail() ) { ?>
        	    <div class="col image">
        	    	<?php the_post_thumbnail( 'serotonin-default' ); ?>
        	    </div>
        	<?php } ?>
			<div class="col content">
                <?php the_content(); ?>
			</div>
		</div>
    <?php endwhile; ?>
<?php else : ?> 
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>