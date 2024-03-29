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

    //timeline
    /**
     * Compromisso da empresa
     * section: commitment
     * name: commitment_image
     */
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'timeline_media', #setting/option_id
        [
            'mime_type' => 'image',
            'section' => 'timeline',
            'label' => __('Imagem da Timeline', 'domain'),
            'description' => __('Selecione a imágem da timeline', 'domain')
        ]
    ));
}
add_action('customize_register', 'customize_controls');
