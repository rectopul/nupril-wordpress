<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package auaha
 */

get_header(); ?>

<section class="categories container my-md-5" data-slider="true">
    <!-- Titlulo -->
    <header>
        <h2>Produtos Nupill</h2>
        <h4>Vá direto para onde você quer chegar.</h4>
    </header>

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php get_template_part('template-parts/content', 'categories'); ?>
        </div>
    </div>

    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-cat-p-next"></div>
    <div class="swiper-button-prev swiper-cat-p-prev"></div>

</section>

<!-- Sobre a empresa -->
<div class="container content-about py-md-5">
    <div class="row">
        <div class="col-md-5 content-about__text">
            <h2>História da Empresa</h2>
            <h4>Da fundação à evolução no mercado.</h4>
            <article class="mt-md-5"><?php get_header_message(); ?></article>
        </div>

        <div class="col-md content-about__image pl-md-5">
            <figure>
                <?php about_image(); ?>
            </figure>
        </div>
    </div>

</div>

<!-- Sede da empresa -->
<div class="thirst container py-4 py-md-5">
    <div class="row">

        <div class="col-md thirst__image pr-md-5">
            <figure>
                <?php company_location_image(); ?>
            </figure>
        </div>

        <div class="col-md-5 thirst__text ">
            <h4>Nossa Sede</h4>
            <article class="mt-md-5"><?php company_location(); ?></article>
        </div>
    </div>
</div>

<!-- Primeiros produtos -->
<div class="first-products container-fluid my-md-5">
    <div class="container">
        <div class="row">

            <div class="col-md-6 first-products__text">
                <h4>Os primeiros produtos</h4>

                <article class="mt-md-3"><?php first_products_content(); ?></article>
            </div>

            <div class="col-md-6 first-products__products">
                <?php get_template_part('template-parts/content', 'products', [
                    'carousel'   => true,
                    'first' => true,
                    'limit' => 6
                ]); ?>

                <!-- Add Arrows -->
                <div class="swiper-button-next first-next"><?php svg_sprite('arrow'); ?></div>
                <div class="swiper-button-prev first-prev"><?php svg_sprite('arrow'); ?></div>
            </div>

        </div>
    </div>
</div>

<!-- timeline -->
<div class="timeline container py-md-5">
    <div class="col-12 my-5">
        <h4>Evolução da linha e do mercado</h4>
    </div>

    <div class="col-12">
        <?php get_template_part('template-parts/content', 'products', [
            'carousel'   => true,
            'first' => false,
            'tag' => 'timeline',
            'limit' => 12,
            'order' => 'ASC',
            'orderby' => 'ano_de_lancamento',
            'text' => true
        ]); ?>
    </div>
</div>

<!-- Qualidade commitment_image -->
<div class="quality blocks container my-5">
    <div class="col-12 blocks__title">
        <h2>Qualidade Nupill</h2>
        <h4>Os pilares da nossa política de qualidade.</h4>
        <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis vitae et leo duis ut diam quam. <br>
            Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor:</article>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-4 blocks__item">
                <div>
                    <figure>
                        <?php block_one_image_line_one(); ?>
                    </figure>

                    <?php block_one_text_line_one(); ?>
                </div>
            </div>

            <div class="col-md-4 blocks__item">
                <div>
                    <figure>
                        <?php block_two_image_line_one(); ?>
                    </figure>

                    <?php block_two_text_line_one(); ?>
                </div>
            </div>

            <div class="col-md-4 blocks__item">
                <div>
                    <figure>
                        <?php block_three_image_line_one(); ?>
                    </figure>

                    <?php block_three_text_line_one(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="separator">

<!-- Compromisso -->
<div class="container commitment pt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-md commitment__image--container pr-md-5">
                <figure class="commitment__image">
                    <?php commitment_image(); ?>
                </figure>
            </div>
            <div class="col-md-5 commitment__text">
                <h2>Compromisso com o Meio Ambiente</h2>
                <h4>Toda a saúde.</h4>
                <article class="mt-md-3 commitment_content"><?php commitment_content(); ?></article>
            </div>
        </div>
    </div>
</div>

<!-- Blocos compromisso -->
<div class="container commitment-blocks">
    <div class="col-12">
        <div class="row">
            <div class="col-md-4">
                <div class="commitment-blocks__item">
                    <header>
                        <figure>
                            <?php echo get_svg_sprite('custom-check'); ?>
                            <?php commitment_blocks_1_image(); ?>
                        </figure>
                    </header>

                    <article>
                        <?php commitment_blocks_1(); ?>
                    </article>
                </div>
            </div>

            <div class="col-md-4">
                <div class="commitment-blocks__item">
                    <header>
                        <figure>
                            <?php echo get_svg_sprite('custom-check'); ?>
                            <?php commitment_blocks_2_image(); ?>
                        </figure>
                    </header>

                    <article>
                        <?php commitment_blocks_2(); ?>
                    </article>
                </div>
            </div>

            <div class="col-md-4">
                <div class="commitment-blocks__item">
                    <header>
                        <figure>
                            <?php echo get_svg_sprite('custom-check'); ?>
                            <?php commitment_blocks_3_image(); ?>
                        </figure>
                    </header>

                    <article>
                        <?php commitment_blocks_3(); ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Onde comprar -->
<div class="whereToBuy container">
    <div class="col-12">

        <div class="row">

            <div class="col-md-7 whereToBuy__image">
                <figure><?php shop_image(); ?></figure>
            </div>

            <div class="col-md-5 whereToBuy__text">
                <h2>Onde Comprar</h2>
                <article>
                    <p><?php shop_description(); ?></p>
                    <a href="<?php shop_link(); ?>" target="_blank" class="btn btn-primary mt-3">Eu quero comprar</a>
                </article>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>