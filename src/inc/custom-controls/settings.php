<?php
function customize_settings($wp_customize)
{
    $wp_customize->add_setting('first_products', array(
        'default'           => '',
        'section'           => 'first_products',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->get_setting('first_products')->transport = 'postMessage';
}
add_action('customize_register', 'customize_settings');
