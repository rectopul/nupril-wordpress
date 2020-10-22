<?php

/**
 * Template Name: Redes sociais
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
    <div class="row socials__header">
        <div class="col md-6 d-flex flex-column">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>

        <div class="col md-6">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', ['class' => 'socials__header--thumb']);
            }
            ?>
        </div>
    </div>

    <!-- Instagram -->
    <div class="row socials__title">
        <div class="col-12">
            <?php echo svg_sprite('instagram'); ?> <strong>Instagram</strong> @nupill_oficial
        </div>
    </div>

    <div class="row" id="instagram__list">
        <div class="col-12">
            <!-- Swiper -->
            <div class="swiper-container instagram__list--container socials__container">
                <div class="swiper-wrapper instagram__list socials__wrapper">
                </div>
            </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next arrow-medium arrow-insta-next"><?php echo svg_sprite('arrow'); ?></div>
        <div class="swiper-button-prev arrow-medium arrow-insta-prev"><?php echo svg_sprite('arrow'); ?></div>
    </div>


    <!-- Facebook -->
    <div class="row socials__title icon-face">
        <div class="col-12">
            <?php echo svg_sprite('facebook'); ?> <strong>Facebook</strong> Nupill Cosméticos
        </div>
    </div>

    <div class="row" id="instagram__list">
        <div class="col-12">
            <!-- Swiper -->
            <div class="swiper-container socials__container facebook__container">
                <div class="swiper-wrapper facebook__list socials__wrapper">
                </div>
            </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next arrow-medium arrow-face-next"><?php echo svg_sprite('arrow'); ?></div>
        <div class="swiper-button-prev arrow-medium arrow-face-prev"><?php echo svg_sprite('arrow'); ?></div>
    </div>

    <!-- Youtube -->
    <div class="row socials__title icon-youtube">
        <div class="col-12">
            <?php echo svg_sprite('youtube'); ?> <strong>YouTube</strong> Nupill Oficial
        </div>
    </div>

    <div class="row mb-5" id="instagram__list">
        <div class="col-12">
            <!-- Swiper -->
            <div class="swiper-container socials__container youtube__container">
                <div class="swiper-wrapper youtube__list socials__wrapper">
                    <?php
                    /**
                     * Loop post type videos
                     */

                    $params = [
                        'post_type' => 'video',
                        'post_status' => 'publish',
                        'posts_per_page' => 12,
                    ];

                    // The Query
                    $the_query = new WP_Query($params);

                    // The Loop
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post(); ?>

                            <div class="youtube__item swiper-slide" data-id="<?php echo get_the_ID(); ?>">
                                <div><?php the_content(); ?></div>
                            </div> <?php
                                }
                            } else {
                                echo 'nenhum video cadastrado';
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                                    ?>
                </div>
            </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next arrow-medium arrow-youtube-next"><?php echo svg_sprite('arrow'); ?></div>
        <div class="swiper-button-prev arrow-medium arrow-youtube-prev"><?php echo svg_sprite('arrow'); ?></div>
    </div>
</div>

<?php get_footer(); ?>