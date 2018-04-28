<?php 
/*
 * BLOG PAGINATION
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio/
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

# NUMERIC NAVIGATION
if ( !function_exists( 'collisionstudio_numeric_postnav' ) ) {
	function collisionstudio_numeric_postnav() {
			# Prev-next text for translation
			$prev			= esc_html__( 'prev', 'serotonin' );
			$next			= esc_html__( 'next', 'serotonin' );
			$double_zero	= esc_html__( '00', 'serotonin' );
			# Other sometimes undefined variables
			$space				 = '';
			$paged				 = '';
			$class				 = '';
			$max_pages			 = '';
			$current_page		 = '';
			$previous_page		 = '';
			$maxpage_addzero	 = '';
			$currentpage_addzero = '';

			wp_link_pages( $defaults = array( 'echo' => 0 ) );
			global $wp_query;
			$space = ( is_date() || is_tag() || is_category() ) ? ' space' : '' ;
			# Stop execution if is singular or if there's only one page
			if( is_singular() || $wp_query->max_num_pages <= 1 ) {
				return;
			}
			# Variables
			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 ;
			$max_pages   = intval( $wp_query->max_num_pages );
			# Current page
			$current_page = intval( get_query_var( 'paged' ) );
			if( $current_page == 0 ) { $current_page = 1; }
			# Previous page number
			if ( $current_page >= 1 ) {
				$previous_page = $current_page - 1;
			}
			# Add a zero to page numbers smaller than 10 (example: 05)
			if ( $current_page 	< 10 ) { $currentpage_addzero 	= '0'; }
			if ( $max_pages 	< 10 ) { $maxpage_addzero 		= '0'; }
			if ( $previous_page < 10 ) { $previous_page 		= '0' . $previous_page; }
		?>
		<!-- Begin pagination -->
		<div class="row fade">
			<div class="col pagination<?php echo esc_html( $space ); ?>">
				<div class="prev">
					<?php if( get_previous_posts_link() ) { previous_posts_link( $prev ); } else { echo esc_html( $prev ); } ?>
				</div>
				<div class="pages">
					<?php if( get_previous_posts_link() ) { previous_posts_link( $previous_page ); } else { echo esc_html( $double_zero ); } ?>
					<span class="current"><?php echo esc_html( $currentpage_addzero . $current_page ); ?></span>
					<?php if( $current_page != $max_pages ) {
						$class = $paged == $max_pages ? ' class="current"' : ''; ?>
						<a href="<?php echo get_pagenum_link( $max_pages ); ?>"><?php echo esc_html( $maxpage_addzero . $max_pages ); ?></a>
					<?php } ?>
				</div>
				<div class="next">
					<?php if( get_next_posts_link() ) { next_posts_link( $next ); } else { echo esc_html( $next ); } ?>
				</div>
			</div>
		</div>
		<!-- End pagination -->
		<?php
	}
}