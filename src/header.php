<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

    <section class="content">

        <header>
            <nav class="row navbar navbar-light navbar-expand-lg justify-content-lg-between">
                <button class="navbar-toggler col-xs-2 " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');

                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    printf(
                        '<a href="%s" class="navbar-brand"><img src="%s" alt="%s"></a>',
                        get_bloginfo('url'),
                        $logo[0],
                        get_bloginfo('name')
                    );
                }
                ?>

                <?php
                if (has_nav_menu('primary')) {

                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse col-lg-10 col-xs-12 justify-content-end',
                        'container_id' => 'navbarSupportedContent',
                        'menu_class' => 'navbar-nav',
                        'add_li_class' => 'nav-item'
                    ));
                } elseif (!has_nav_menu('expanded')) {

                    wp_list_pages(
                        array(
                            'match_menu_classes' => true,
                            'show_sub_menu_icons' => true,
                            'title_li' => false,
                        )
                    );
                }
                ?>

                <!-- <div class="collapse navbar-collapse col-lg-10 col-xs-12 justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Produto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Cuidados Diários</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Revenda</a></li>
                        <li class="nav-item active"><a class="nav-link" href="#">Compre</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Notícias</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Redes Sociais</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Download</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">SAC</a></li>
                        <li class="nav-item"><a class="nav-link button-pink" href="#">Nossa Loja</a></li>
                    </ul>
                </div> -->
            </nav>
        </header>



        <?php if (is_home()) : ?>
            <!-- full banner -->
            <section class="container-fluid">
                <div class="row">
                    <?php get_template_part('template-parts/full', 'banner'); ?>
                </div>
            </section>
        <?php else :

            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs container-fluid">', '</div>');
            }
        ?>
        <?php endif; ?>

        <!-- check template -->
        <?php if (is_page_template('categories.php')) : ?>
            <div class="container">
                <!-- banner list -->
                <div class="categories-banner swiper-container">
                    <?php get_template_part('template-parts/content', 'banners'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (is_page_template('page-socials.php')) : ?>
            <script>
                var tokens = {
                    instagram: <?php echo get_theme_mod('insta_token'); ?>,
                    facebook: <?php echo get_theme_mod('face_token'); ?>,
                }
            </script>
        <?php endif; ?>