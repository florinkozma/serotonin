<?php
/*
 * HEADER
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Blog">
<head>
	<meta charset="<?php esc_html( bloginfo( 'charset' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if( get_theme_mod( 'serotonin_page_borders', true ) ) { ?>
	<!-- page borders -->
	<div id="border-top"></div>
	<div id="border-right"></div>
	<div id="border-bottom"></div>
	<div id="border-left"></div>
<?php } ?>
<div id="collisionstudio_preloader">
	<span class="loading"></span>
</div>
<header id="collisionstudio_header">
	<div class="container">
		<div class="row">
			<nav class="col navigation">
				<!-- Mobile menu -->
				<div class="mobile-menu">
					<?php if( !get_theme_mod( 'serotonin_site_logo' ) ): ?>
						<div id="mobile-name">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a>
						</div>
					<?php else: ?>
						<div id="mobile-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'serotonin_site_logo' ) ); ?>" alt="logo"></a>
						</div>
					<?php endif; ?>
					<div class="collisionstudio_menu-icon mobile-toggle"><span></span></div>
				</div>
				<!-- Main menu -->
				<ul class="main-menu">
					<?php
						# Left menu
						if( has_nav_menu( 'serotonin-menu-left' ) ) :
							echo wp_nav_menu( array( 'echo' => false, 'theme_location' => 'serotonin-menu-left','items_wrap' => '%3$s', 'depth' => 3 ) );
						endif;
					?>
					<li>
						<?php if( !get_theme_mod( 'serotonin_site_logo' ) ): ?>
							<span id="name">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php esc_html( bloginfo( 'name' ) ); ?>
								</a>
							</span>
						<?php else: ?>
							<span id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( get_theme_mod( 'serotonin_site_logo' ) ); ?>" alt="logo">
								</a>
							</span>
						<?php endif; ?>
					</li>
					<?php
						# Right menu
						if( has_nav_menu( 'serotonin-menu-right' ) ) :
							echo wp_nav_menu( array( 'echo' => false,  'theme_location' => 'serotonin-menu-right','items_wrap' => '%3$s', 'depth' => 3 ) );
						endif;
					?>
					<?php if( get_theme_mod( 'serotonin_nav_menu_search', false ) ) : ?>
						<li>
							<a class="open-search">
								<?php esc_html_e( 'Search', 'serotonin' ); ?>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</div>
</header>
<section id="collisionstudio_search">
	<div class="container">
		<div class="row">
			<div class="col search">
				<form id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input id="search-box" name="s" type="search" placeholder="<?php esc_html_e( 'Search...', 'serotonin' ); ?>" value="<?php the_search_query(); ?>" required>
				</form>
			</div>
		</div>
	</div>
</section>
<div class="close-search collisionstudio_close-icon"><span></span></div>
<main id="collisionstudio_main">
    <div class="container">