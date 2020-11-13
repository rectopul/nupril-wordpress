<?php
function customize_controls($wp_customize)
{

    $wp_customize->add_control(new Skyrocket_TinyMCE_Custom_control($wp_customize, 'first_products', [
        'label'       => __('Conteúdo "Primeiros produtos"'),
        'type'        => 'textarea',
        'setting'     => 'first_products',
        'section'     => 'first_products',
        'input_attrs' => [
            //attributes from control
            'toolbar1'     => 'undo redo formatselect bold italic fontsizeselect forecolor bullist numlist alignleft aligncenter alignright link',
            'mediaButtons' => true,
        ]
    ]));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'quality_title', [
        'label'       => __('Titulo "Qualidade Nupill"'),
        'type'        => 'text',
        'setting'     => 'quality_title',
        'section'     => 'first_products',
        'input_attrs' => [
            //attributes from control
            'toolbar1'     => 'undo redo formatselect bold italic fontsizeselect forecolor bullist numlist alignleft aligncenter alignright link',
            'mediaButtons' => true,
        ]
    ]));

    $wp_customize->add_control(new Skyrocket_TinyMCE_Custom_control($wp_customize, 'quality', [
        'label'       => __('Conteúdo "Qualidade Nupill"'),
        'type'        => 'textarea',
        'setting'     => 'quality',
        'section'     => 'first_products',
        'input_attrs' => [
            //attributes from control
            'toolbar1'     => 'undo redo formatselect bold italic fontsizeselect forecolor bullist numlist alignleft aligncenter alignright link',
            'mediaButtons' => true,
        ]
    ]));
}
add_action('customize_register', 'customize_controls');
