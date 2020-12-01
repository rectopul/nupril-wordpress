<?php
function first_products_content()
{
    echo get_theme_mod('first_products');
}

function quality_content()
{
    echo get_theme_mod('quality');
}
function quality_title()
{
    echo get_theme_mod('quality_title');
}

function timeline_media()
{
    $imageID = get_theme_mod('timeline_media');

    echo wp_get_attachment_image($imageID, 'timeline');
}
