<?php
/*
 * TEMPLATE NAME: About Template
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

get_header();
# If none of the social links are used, $serotonin_social gets a value of 'fullwiwth' witch is used as class for the content.
!get_field ( 'serotonin-facebook' ) && !get_field ('serotonin-twitter') && !get_field ( 'serotonin-instagram' ) && !get_field ( 'serotonin-tumblr' ) && !get_field ( 'serotonin-pinterest' ) ? $serotonin_social = ' fullwitdh' : $serotonin_social = null; ?>
<div class="row">
    <div class="col about pag">
        <h1><?php the_title(); ?></h1>
        <h3 class="subheading"><?php the_field( 'serotonin-page-subtitle' ); ?></h3>
    </div>
</div>
<div class="row fade">
    <div class="col about-image">
        <img src="<?php echo esc_url( get_field( 'serotonin-image' )['url'] ); ?>" alt="<?php echo esc_html( get_field( 'serotonin-image' )['alt'] ); ?>">
    </div>
</div>
<div class="row fade">
    <?php if ( !$serotonin_social ) : ?>
        <div class="col about-social">
            <ul class="social">
                <?php if ( get_field ( 'serotonin-facebook'  ) ) { ?> <li><a href="http://<?php esc_url( the_field( 'serotonin-facebook'  ) ); ?>"> Facebook  </a></li> <?php } ?>
                <?php if ( get_field ( 'serotonin-twitter'   ) ) { ?> <li><a href="http://<?php esc_url( the_field( 'serotonin-twitter'   ) ); ?>"> Twitter   </a></li> <?php } ?>
                <?php if ( get_field ( 'serotonin-instagram' ) ) { ?> <li><a href="http://<?php esc_url( the_field( 'serotonin-instagram' ) ); ?>"> Instagram </a></li> <?php } ?>
                <?php if ( get_field ( 'serotonin-tumblr'    ) ) { ?> <li><a href="http://<?php esc_url( the_field( 'serotonin-tumblr'    ) ); ?>"> Tumblr    </a></li> <?php } ?>
                <?php if ( get_field ( 'serotonin-pinterest' ) ) { ?> <li><a href="http://<?php esc_url( the_field( 'serotonin-pinterest' ) ); ?>"> Pinterest </a></li> <?php } ?>
    		</ul>
        </div>
    <?php endif; ?>
    <div class="col about-content<?php echo esc_html($serotonin_social); ?>">
        <?php the_field( 'serotonin-about_wysiwyg' ); ?>
    </div>
</div>
<?php get_footer();