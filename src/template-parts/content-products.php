<?php if ($args['carousel']) : ?>
    <!-- Swiper -->
    <div class="swiper-container">
    <?php endif; ?>

    <article class="<?php echo $args['carousel'] ? 'swiper-wrapper' : 'row'; ?>">
        <!-- Slides -->
        <?php
        //Args
        $params = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $args['limit'] ? $args['limit'] : 12,
        ];

        if ($args['first'] == true) $params['tag'] = 'first';

        if ($args['tag']) $params['tag'] = $args['tag'];

        if ($args['orderby'] && $args['order']) {
            $params['orderby'] = $args['orderby'];

            if ($args['order']) $params['order'] = $args['order'];
        } else {

            if ($args['order']) $params['date'] = $args['order'];
        }





        // The Query
        $the_query = new WP_Query($params);

        // The Loop
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();



                if ($args['text']) {
                    $ano = get_field($args['orderby']);

                    printf(
                        '<div class="first-products__item swiper-slide %s" data-id"%s">
                            <a href="%s">
                                <figure>%s</figure>
                                <h6>%s</h6>
                                <p>%s</p>
                            </a>
                        </div>',
                        $args['class'],
                        get_the_ID(),
                        get_permalink(),
                        get_the_post_thumbnail(),
                        $ano,
                        get_the_excerpt()
                    );
                } else {

                    printf(
                        '<div class="first-products__item %s %s"><a href="%s">%s %s</a></div>',
                        $args['carousel'] ? 'swiper-slide' : '',
                        $args['class'],
                        get_permalink(),
                        get_the_post_thumbnail(),
                        $args['title'] ? '<h4>' . get_the_title() . '</h4>' : ''
                    );
                }
            }
        } else {
            echo 'nenhum case cadastrado';
        }
        /* Restore original Post Data */
        wp_reset_postdata(); ?>
    </article>

    <?php if ($args['carousel']) : ?>
        <!-- Swiper -->

    </div>
<?php endif; ?>