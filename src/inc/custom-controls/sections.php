<?php
function customize_sections($wp_customize)
{
    $wp_customize->add_section('first_products', array(
        'title'    => __('Primeiros Produtos', 'auaha'),
        'capability' => 'edit_theme_options',
        'description' => __('Edite do texto do bloco "Primeiros produtos"'),
        'priority' => 2,
        'panel'            => 'panel_home'
    ));
}
add_action('customize_register', 'customize_sections');
