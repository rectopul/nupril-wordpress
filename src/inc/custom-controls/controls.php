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
}
add_action('customize_register', 'customize_controls');
