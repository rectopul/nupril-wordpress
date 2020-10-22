<?php

/**
 * Template Name: Filtro de lojas
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!-- middle -->
<section class="middle">



    <!-- bloco Internal -->
    <div class="compre internal">
        <div class="row d-flex flex-wrap">

            <div class="col-lg-6 col-sm-6 col-xs-12 order-1 order-sm-0 description">
                <h1>Compre</h1>
                <h3>Descubra onde a Nupill está.</h3>
                <p>Compre na Kosmetic On-line ou procure o estabelecimento parceiro da Nupill mais próximo da sua casa.</p>

                <div class="block-loja">
                    <h3>Compre na loja virtual:</h3>
                    <p class="mt-md-3">
                        <a href="#">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            }
                            ?>
                        </a>
                    </p>

                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-xs-12 order-0 order-sm-1 image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/compre.png" alt="Foto Notícia" />

            </div>

        </div>
        <!-- /bloco Internal -->


        <!-- bloco Form Local -->
        <div class="form-local description">
            <form name="form-local" action="" method="GET">
                <div class="row d-flex align-items-center justify-content-start justify-content-sm-center">
                    <h3 class="col-lg-12 col-sm-12 col-xs-12">Ou busque pela sua localização:</h3>
                    <!-- ***** -->
                    <!-- Não sei se vai usar type text ou select, fiz os dois exemplos -->
                    <!-- ***** -->
                    <div class="form-group col-lg-3 col-sm-6 col-xs-12">
                        <label for="estado">Estado</label>
                        <!--input type="text" name="estado" id="estado" class="form-control" required-->
                        <select class="form-control" id="estado">
                            <option value="">Selecione</option>
                            <!-- loop wordpress -->
                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'shop_location',
                                'hide_empty' => false,
                            ));


                            foreach ($terms as $term) {
                                if (!$term->parent) {
                                    printf(
                                        '<option value="%s">%s</option>',
                                        $term->term_id,
                                        $term->name
                                    );
                                }
                            }

                            ?>
                        </select>

                        <div class="filter-first-select">
                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'shop_location',
                                'hide_empty' => false,
                            ));


                            foreach ($terms as $term) {
                                if (!$term->parent) {
                                    printf(
                                        '<div class="filter-first-select--item" data-id="%s">%s</div>',
                                        $term->term_id,
                                        $term->name
                                    );
                                }
                            }

                            ?>
                        </div>
                    </div>

                    <div class="form-group col-lg-3 col-sm-6 col-xs-12">
                        <label for="cidade">Cidade</label>
                        <select type="text" name="cidade" id="cidade" class="form-control">
                        </select>
                    </div>

                    <div class="form-group col-lg-3 col-sm-6 col-xs-12">
                        <label for="bairro">Bairro</label>
                        <select type="text" name="Bairro" id="Bairro" class="form-control">
                        </select>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <input type="submit" class="form-control btn btn-blue btn-filter-apply" value="Buscar Loja">
                    </div>


                </div>

            </form>


            <!-- bloco news list -->
            <div class="local-list">
                <ul class="row">

                    <!-- loop -->

                    <?php
                    $args = array(
                        'post_type' => 'loja',
                        'posts_per_page' => 12
                    );

                    $query = new WP_Query($args);

                    $cities = [];

                    // The Loop
                    if ($query->have_posts()) {
                        $count = $query->post_count;

                        echo  '<p class="col-lg-12 shops__result">' . $count . ' resultados encontrados:</p>';

                        while ($query->have_posts()) {
                            $query->the_post();

                            printf(
                                '<li class="col-lg-3 col-sm-3 col-xs-6">
                                    <a href="%s">
                                        <h3>%s</h3>
                                        <p>%s</p>
                                    </a>
                                </li>',
                                get_the_permalink(),
                                get_the_title(),
                                get_the_content()
                            );
                        }
                    }

                    wp_reset_postdata();
                    ?>
                    <!-- /loop -->

                </ul>
            </div>
        </div>
        <!-- bloco Form Local -->

</section>
<!-- /middle -->

<?php get_footer(); ?>