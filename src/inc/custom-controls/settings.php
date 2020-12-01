<?php
function customize_settings($wp_customize)
{
    $wp_customize->add_setting('first_products', array(
        'default'           => '',
        'section'           => 'first_products',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->get_setting('first_products')->transport = 'postMessage';

    $wp_customize->add_setting('quality_title', array(
        'default'           => '',
        'section'           => 'quality',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->get_setting('quality_title')->transport = 'postMessage';

    $wp_customize->add_setting('timeline_media', array(
        'default'           => '',
        'section'           => 'timeline',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->get_setting('quality')->transport = 'postMessage';

    //Qualidade
    //quality
}
add_action('customize_register', 'customize_settings');
