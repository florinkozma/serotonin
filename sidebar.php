<?php
/*
 * RIGHT SIDEBAR
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) 2016 Collision Studio | collision.studio
 */

if ( !is_active_sidebar( 'serotonin_sidebar1' ) ) { return; } ?>
<!-- begin sidebar -->
<aside class="col sidebar" id="collisionstudio_sidebar">
    <div class="row">
        <?php dynamic_sidebar( 'serotonin_sidebar1' ); ?>
    </div>
</aside>
<!-- end sidebar -->