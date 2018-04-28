<?php
/*
 * TEMPLATE TAGS
 * @package serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# Categories (Blog meta)
if( !function_exists( 'collisionstudio_meta_categories' ) ) {
	function collisionstudio_meta_categories() {
		is_date() || is_tag() || is_category() ? $separator = ', ' : $separator = '';  # Comma separator for archive, tag or category pages
		$categories_list = get_the_category_list( $separator );
		if ( $categories_list && collisionstudio_categorized_blog() ) {
			printf( esc_html__( '%1$s', 'serotonin' ), $categories_list );
		}
	}
}

# Posted By (Blog meta)
if( !function_exists( 'collisionstudio_meta_postedby' ) ) {
	function collisionstudio_meta_postedby() {
		$author = get_the_author();
		$date = '<a href="' . esc_url( get_home_url() ) . "/" . get_the_time( 'Y' ) . "/" . get_the_time( 'm' ) . "/" . get_the_time( 'd' ) . '">' . get_the_time( 'M d, Y' ) .'</a>';
		printf( esc_html__( 'Posted by %1$s on %2$s', 'serotonin' ), $author, $date );
		if( is_date() || is_tag() || is_category() ) { echo ' ' . esc_html__( 'under', 'serotonin' ) . ' '; } # Add "under" if is on archive, tag or category pages
	}
}

# Read more / Share This Post (Blog meta)
if( !function_exists( 'collisionstudio_readmore_share' ) ) {
	function collisionstudio_readmore_share() {
		global $post;
		if( is_single() ): ?>
			<!-- Share -->
			<li class="share">
				<?php esc_html_e( 'Share this post', 'serotonin' ); ?>
				<ul class="share-box">
					<li><a class="facebook popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url( the_permalink() ); ?>&t=<?php the_title(); ?>">Facebook</a></li>
					<li><a class="googleplus popup" href="https://plus.google.com/share?url=<?php esc_url( the_permalink() ); ?>">Google Plus</a></li>
					<li><a class="twitter popup" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php esc_url( the_permalink() ); ?>">Twitter</a></li>
					<li><a class="tumblr popup" href="http://www.tumblr.com/share/link?url=<?php esc_url( the_permalink() ); ?>&title=<?php the_title(); ?>">Tumblr</a></li>
					<li><a class="pinterest popup" href="https://www.pinterest.com/pin/create/button/?guid=BfZSRH0FN46L-1&url=<?php esc_url( the_permalink() ); ?>&media=<?php echo esc_url( wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] ); ?>&description=<?php the_title(); ?>">Pinterest</a></li>
				</ul>
			</li>
		<?php else: ?>
			<!-- Read more -->
			<li><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Continue reading', 'serotonin' ); ?></a></li>
		<?php
			endif;
	}
}

# Blog meta template
if ( !function_exists( 'collisionstudio_post_meta' ) ) {
	function collisionstudio_post_meta() { ?>

		<ul>
			<!-- Author / Date -->
			<li><?php collisionstudio_meta_postedby(); ?></li>
			<!-- Categories -->
			<li><?php collisionstudio_meta_categories(); ?></li>
			<?php if( has_tag() ): ?>
				<!-- Tags -->
				<li><ul class="post-tags"><?php echo wp_kses_post( get_the_tag_list( '<li>', '</li> <li>', '</li>' ) ); ?></ul></li>
			<?php endif; ?>
			<!-- Comment number -->
			<?php
				# For translations:
				$zero_comments 	= esc_html__( 'No comments', 'serotonin' );
				$one_comment 	= esc_html__( 'One comment', 'serotonin' );
				$more_comments 	= esc_html__( '% comments',  'serotonin' );

				if( get_comments_number() > 0 ) :
			?>
				<li><a href="<?php esc_url( the_permalink() ); ?>#comments"><?php comments_number( $zero_comments, $one_comment, $more_comments ); ?></a></li>
			<?php else: ?>
				<li><?php comments_number( $zero_comments, $one_comment, $more_comments ); ?></li>
			<?php
				endif;
				collisionstudio_readmore_share();
			?>
		</ul>

	<?php }
}

# Next-prev articles
if ( !function_exists( 'collisionstudio_nextprev_article' ) ) {
	function collisionstudio_nextprev_article() {
		$previous_article	= esc_html__( 'prev', 'serotonin' );
		$next_article 		= esc_html__( 'next', 'serotonin' ); 
		$prevfix = ( get_previous_post() )	? ' fix' : '' ;
		$nextfix = ( get_next_post() ) 		? ' fix' : '' ; ?>

		<!-- Begin pagination -->
		<div class="row fade noscroll">
			<div class="col pagination">
				<div class="prev<?php echo esc_html( $prevfix ); ?>">
					<?php previous_post_link( '%link', $previous_article ); ?>
					<div class="prev-post">
						<?php
							$prev_post = get_previous_post();
							if (!empty( $prev_post )):
								echo esc_html($prev_post->post_title);
							endif;
						?>
					</div>
				</div>
				<div class="next<?php echo esc_html( $nextfix ); ?>">
					<?php next_post_link( '%link', $next_article ); ?>
					<div class="next-post">
						<?php
							$next_post = get_next_post();
							if (!empty( $next_post )):
								echo esc_html($next_post->post_title);
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- End pagination -->

	<?php }
}

# The title for archive, tag and category pages
if( !function_exists( 'collisionstudio_the_archive_title' ) ) {
	function collisionstudio_the_archive_title() {

		# Output the title for each page
		if		( is_day() )		{ the_time ('d F Y'); } # If is day, output the year, month and day
		elseif	( is_year() )		{ the_time ('Y');	  } # If is year, output the year
		elseif	( is_month() )		{ the_time ('F Y');	  } # If is month, output the month and day
		elseif	( is_tag() )		{ single_tag_title(); } # If is tag page, output the tag
		elseif	( is_category() )	{ single_cat_title(); } # If is category page, output the category

	}
}

# The subheading for archive, tag and category pages
if( !function_exists( 'collisionstudio_the_archive_subheading' ) ) {
	function collisionstudio_the_archive_subheading() {

		# For translations:
		$tag        = single_tag_title( '#', false ); # The tag with a hashtag
		$category   = single_cat_title( '',  false ); # The category
		# Subheading:
		if		( is_date() )     { esc_html_e( 'Who said time travel is not possible?', 'serotonin' ); }
		elseif	( is_category() ) { printf( esc_html__( 'Browsing category %1$s', 'serotonin' ), $category); }
		elseif	( is_tag() )      { printf( esc_html__( 'Browsing posts tagged with %1$s', 'serotonin' ), $tag); }

	}
}

# Post signature
if( !function_exists( 'collisionstudio_post_signature' ) ) {
	function collisionstudio_post_signature() {

		# If any of the customizer signature options are used
		if( get_theme_mod( 'serotonin_post_signature' ) || get_theme_mod( 'serotonin_author1_name' ) || get_theme_mod( 'serotonin_author2_name' ) || get_theme_mod( 'serotonin_author3_name' ) ) {
			# If is not attachment or page
			if( !is_attachment() && !is_page() ) {
				echo '<div class="signature"><p>'; # Opening div
					if( get_the_author() == get_theme_mod( 'serotonin_author1_name' ) )  { echo wp_kses_post( get_theme_mod( 'serotonin_author1_signature' ) ); } # First author
				elseif( get_the_author() == get_theme_mod( 'serotonin_author2_name' ) )  { echo wp_kses_post( get_theme_mod( 'serotonin_author2_signature' ) ); } # Second author
				elseif( get_the_author() == get_theme_mod( 'serotonin_author3_name' ) )  { echo wp_kses_post( get_theme_mod( 'serotonin_author3_signature' ) ); } # Third author
				else { echo wp_kses_post( get_theme_mod( 'serotonin_post_signature' ) ); } # if none of the above: Default post signature
				echo '</p></div>'; # Closing div
			}
		}

	}
}

# Anything in footer. Returns true if there is any widgets or copyright text in the footer
# Function used in footer.php
if( !function_exists('serotonin_anything_in_footer') ) {
	function serotonin_anything_in_footer() {
		if( is_active_sidebar( 'footer1' ) 
			|| is_active_sidebar( 'footer2' ) 
			|| is_active_sidebar( 'footer3' ) 
			|| is_active_sidebar( 'footer4' ) 
			|| get_theme_mod( 'serotonin_copyright_text' ) ) {
			return true;
		}
	}
}

# Anything in contact details. Returns true if there is any info setup in contact page
# Function used in template-contact.php
if( !function_exists('serotonin_anything_in_contact_details') ) {
	function serotonin_anything_in_contact_details() {
		global $serotonin_contactPageId;
		# We already have $serotonin_contactPageId defined in functions.php
		if( class_exists('acf') ):
			if( get_field( 'serotonin-name', $serotonin_contactPageId ) 
				|| get_field( 'serotonin-address', $serotonin_contactPageId ) 
				|| get_field( 'serotonin-phone', $serotonin_contactPageId ) 
				|| get_field( 'serotonin-email', $serotonin_contactPageId ) ) {
				return true;
			}
		endif;
	}
}


# Returns true if a blog has more than 1 category.
if ( !function_exists( 'collisionstudio_categorized_blog' ) ) {
	function collisionstudio_categorized_blog() {
		if ( ( $all_the_cool_cats = get_transient( 'collisionstudio_categories') ) === false ) {
			# Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'	 => 'ids',
				'hide_empty' => 1,
				'number'	 => 2, # We only need to know if there is more than one category.
			) );
			$all_the_cool_cats = count( $all_the_cool_cats ); # Count
			set_transient( 'collisionstudio_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) { return true; } # If blog has more than 1 category the function should return true. 
		else { return false; } # If the blog has only 1 category the function should return false.
	}
}

# Flush out the transients used in collisionstudio_categorized_blog().
if ( !function_exists( 'collisionstudio_category_transient_flusher' ) ) {
	function collisionstudio_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
		delete_transient( 'collisionstudio_categories' );
	}
}
add_action( 'edit_category', 'collisionstudio_category_transient_flusher' );
add_action( 'save_post',	 'collisionstudio_category_transient_flusher' );