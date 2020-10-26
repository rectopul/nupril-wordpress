<?php

function customize_partials($wp_customize)
{
    $wp_customize->selective_refresh->add_partial(
        'first_products',
        [
            'selector' => '.first-products__text > article',
            'render_callback' => 'first_products_content',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
}
add_action('customize_register', 'customize_partials');
