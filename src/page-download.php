<?php

/**
 * Template Name: Download
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container my-5 pb-md-5">
    <div class="row">
        <div class="col-md-6 download">
            <h2 class="download__title"><?php the_title(); ?></h2>

            <article class="download__content"><?php the_content(); ?></article>
        </div>

        <div class="col-md-6">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail();
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>