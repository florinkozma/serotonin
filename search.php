<?php
/*
 * SEARCH RESULTS PAGE
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

get_header(); ?>
<div class="row">
    <div class="col results pag">
        <h1><?php esc_html_e( 'Search results', 'serotonin' ); ?></h1>
        <h3 class="subheading">
            <?php printf( esc_html__( 'These are the search results for %s', 'serotonin' ), '"' . get_search_query() . '"' ); ?>
        </h3>
    </div>
</div>

<?php if( have_posts() ): ?>
	<div class="row fade">
		<div class="col results-content">
			<ul class="searched">
				<?php
					$serotonin_all_the_words = '';
					while( have_posts() ): the_post(); # Start The loop ?>
						<li><h5><a href="<?php esc_url( the_permalink() ); ?>"><?php collisionstudio_the_search_result(); ?></a></h5></li> <!-- Result -->
						<?php $serotonin_all_the_words = $serotonin_all_the_words . ' ' . esc_html( get_the_title() ); # Gather all the words from the results in one string
					endwhile; # End The Loop
				?>
			</ul>
		</div>
	</div>
	<div class="row fade">
	    <div class="col results-options">
	        <h3><?php esc_html_e( 'Similar search words:', 'serotonin' ); ?> <?php collisionstudio_similar_search_words( esc_html( $serotonin_all_the_words ) ); ?></h3>
	        <p><?php echo sprintf( wp_kses( esc_html__( "Not what you were looking for? That's okay, you can always <a class='open-search'>search</a> again.", 'serotonin' ), array( 'a' => array('class' => array() ) ) ) ); ?></p>
	    </div>
	</div>
<?php else:
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();