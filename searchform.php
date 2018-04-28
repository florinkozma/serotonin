<?php 
/*
 * SEARCH FORM
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="searchwidget"  placeholder="<?php esc_html_e( 'type anything and hit enter', 'serotonin' ); ?>"  id="search" value="<?php the_search_query(); ?>" name="s" required>
</form>