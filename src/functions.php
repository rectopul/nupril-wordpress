<?php

/**
 * Theme Setup
 * get all supports and menus for this theme
 * List all functions into this function
 */
if (!function_exists('rmb_theme_setup')) {
    function rmb_theme_setup()
    {
    }
}

function rmb_theme_setup_support()
{

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    );

    // Set content-width.
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 580;
    }

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
    add_theme_support('post-thumbnails');

    // Set post thumbnail size.
    set_post_thumbnail_size(1200, 9999);

    // Add custom image size used in Cover Template.

    add_image_size('theme-fullscreen', 1980, 9999);
    add_image_size('single_thumbnail', 410, 450, true);
    add_image_size('post_category', 410, 231);
    add_image_size('project_thumb', 650, 462, true);
    add_image_size('project_preview', 728, 463);
    add_image_size('view_large', 710, 420, true);
    add_image_size('categories', 630, 365, true);
    add_image_size('product_small', 198, 198, false);
    add_image_size('timeline', 1200, 368, false);
    // Custom logo.
    $logo_width  = 120;
    $logo_height = 90;

    // If the retina setting is active, double the recommended width and height.
    if (get_theme_mod('retina_logo', false)) {
        $logo_width  = floor($logo_width * 2);
        $logo_height = floor($logo_height * 2);
    }

    add_theme_support(
        'custom-logo',
        [
            'height'      => $logo_height,
            'width'       => $logo_width,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );

    /**
     * Add Support to custom header in pages
     */
    $header = [
        'default-text-color' => 'fff',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    ];

    add_theme_support('custom-header', $header);

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support('title-tag');

    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
    load_theme_textdomain('auaha');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'rmb_theme_setup_support');

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function rmb_theme_menus()
{

    $locations = array(
        'primary'  => __('Desktop Horizontal Menu', 'twentytwenty'),
        'expanded' => __('Desktop Expanded Menu', 'twentytwenty'),
        'mobile'   => __('Mobile Menu', 'twentytwenty'),
        'footer'   => __('Footer Menu', 'twentytwenty'),
        'social'   => __('Social Menu', 'twentytwenty'),
    );

    register_nav_menus($locations);
}

add_action('init', 'rmb_theme_menus');

/**
 * Register and Enqueue Scripts.
 */
function rmb_register_scripts()
{

    wp_enqueue_script(
        'instaFeed-js',
        get_template_directory_uri() . '/js/instafeed.min.js',
        array('jquery'),
        '',
        true
    );

    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '',
        true
    );

    //wp_style_add_data('twentytwenty-style', 'rtl', 'replace');

    // Add output of Bootstrap settings as inline style.
    wp_add_inline_style(
        'bootstrap-style',
        get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css'
    );

    // Add output of swiperJs scripts.
    wp_enqueue_script(
        'swiperJs-script',
        get_template_directory_uri() . '/js/swiper-bundle.min.js',
        array('jquery'),
        '6.12',
        true
    );

    // Add output of theme scripts
    wp_enqueue_script(
        'baseTheme-script',
        get_template_directory_uri() . '/js/theme.js',
        array('jquery'),
        '2.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'rmb_register_scripts');
/**
 * Register and Enqueue Styles.
 */
function rmb_register_styles()
{

    //$theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/app.css');
    wp_enqueue_style('theme-style-custom', get_template_directory_uri() . '/css/style_other.css');
    wp_enqueue_style('theme-style-responsive', get_template_directory_uri() . '/assets/css/responsivo.css');
    //wp_style_add_data('twentytwenty-style', 'rtl', 'replace');

    // Add output of Bootstrap settings as inline style.
    wp_enqueue_style(
        'bootstrap-style',
        get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css'
    );

    // Add output of Bootstrap settings as inline style.
    wp_enqueue_style('swiperJs-style', get_template_directory_uri() . '/css/swiper-bundle.min.css');

    //add font overpass
    //https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap

    wp_enqueue_style(
        'google-Work-Sans',
        'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet',
        false
    );
}

add_action('wp_enqueue_scripts', 'rmb_register_styles');

/**
 * Enable api
 */

wp_enqueue_script('wp-api');


/**
 * Implement get theme mods.
 */
require get_template_directory() . '/inc/getThemeMods.php';
// Register Custom Navigation Walker 
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/**
 * Insert custom controls from this theme
 */
require_once get_template_directory() . '/inc/rmbCustomControls.php';
require_once get_template_directory() . '/inc/custom-controls/panels.php';
require_once get_template_directory() . '/inc/custom-controls/sections.php';
require_once get_template_directory() . '/inc/custom-controls/settings.php';
require_once get_template_directory() . '/inc/custom-controls/controls.php';
require_once get_template_directory() . '/inc/custom-controls/callbacks.php';
require_once get_template_directory() . '/inc/custom-controls/partials.php';

/**
 * Implement the Custom Controls form madison.
 */
require get_template_directory() . '/inc/madison/functions.php';


function custom_types()
{
    /**
     * Post Type Videos
     * custom post specific from this theme
     */
    $lojas = array(
        'labels' => array(
            'name' => __('Lojas'),
            'singular_name' => __('Loja')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'loja'),
        'menu_icon' => 'dashicons-location',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('loja', $lojas);
    /**
     * Post Type Videos
     * custom post specific from this theme
     */
    $videos = array(
        'labels' => array(
            'name' => __('Videos'),
            'singular_name' => __('Video')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'videos'),
        'menu_icon' => 'dashicons-youtube',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('video', $videos);
    /**
     * Post Type Equipe
     * custom post specific from this theme
     */
    $product = array(
        'labels' => array(
            'name' => __('Produtos'),
            'singular_name' => __('Produto')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'product'),
        'menu_icon' => 'dashicons-cart',
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
        'supports' => array('title', 'excerpt', 'editor', 'thumbnail')
    );

    register_post_type('product', $product);

    /**
     * Post Type Banner
     * custom post specific from this theme
     */
    $banner = array(
        'labels' => array(
            'name' => __('Banners'),
            'singular_name' => __('Banner')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'banner'),
        'menu_icon' => 'dashicons-format-image',
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('banner', $banner);
}

add_action('init', 'custom_types');

/**
 * Stick custom post
 */

function insertMetaboxes()
{

    add_meta_box('pseudosticky', 'Destaque', 'insertStickPost', 'product', 'side', 'high');

    function insertStickPost($post, $metabox)
    {
        $entered = get_post_meta($post->ID, 'pseudosticky', true);

        printf(
            '<label><input name="pseudosticky" type="checkbox" %s> Destacar</label>',
            $entered == "on" ? ' checked="checked"' : ''
        );
    }
}

add_action('add_meta_boxes', 'insertMetaboxes');

// Save Meta Details
add_action('save_post', 'save_details');

function save_details()
{
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }

    update_post_meta($post->ID, "pseudosticky", $_POST["pseudosticky"]);
}


/**
 * Taxonomias
 */
function reg_cat()
{
    /**
     * Tipos de Babás
     */
    $shopCategory = array(
        'name' => _x('Localização de lojas', 'taxonomy general name'),
        'singular_name' => _x('Localização de loja', 'taxonomy singular name'),
        'search_items' =>  __('Search Localização de lojas'),
        'popular_items' => __('Popular Localização de lojas'),
        'all_items' => __('Todos os Localização de lojas'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Localização de loja'),
        'update_item' => __('Atualizar Localização de loja'),
        'add_new_item' => __('Adicionar Novo Localização de loja'),
        'new_item_name' => __('Novo Localização de loja'),
        'separate_items_with_commas' => __('Separate Localização de lojas with commas'),
        'add_or_remove_items' => __('Add or remove Localização de lojas'),
        'choose_from_most_used' => __('Choose from the most used Localização de lojas'),
        'menu_name' => __('Localização de loja'),
    );
    register_taxonomy('shop_location', array('loja'), array(
        'hierarchical' => true,
        'labels' => $shopCategory,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'shop_location'),
    ));


    /**
     * Tipos de Babás
     */
    $productCategory = array(
        'name' => _x('Categorias de Produtos', 'taxonomy general name'),
        'singular_name' => _x('Categoria de produto', 'taxonomy singular name'),
        'search_items' =>  __('Search Categorias de Produtos'),
        'popular_items' => __('Popular Categorias de Produtos'),
        'all_items' => __('Todos os Categorias de Produtos'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Categoria de produto'),
        'update_item' => __('Atualizar Categoria de produto'),
        'add_new_item' => __('Adicionar Novo Categoria de produto'),
        'new_item_name' => __('Novo Categoria de produto'),
        'separate_items_with_commas' => __('Separate Categorias de Produtos with commas'),
        'add_or_remove_items' => __('Add or remove Categorias de Produtos'),
        'choose_from_most_used' => __('Choose from the most used Categorias de Produtos'),
        'menu_name' => __('Categoria de produto'),
    );
    register_taxonomy('product_category', array('product'), array(
        'hierarchical' => true,
        'labels' => $productCategory,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'product_category'),
    ));
}

add_action('init', 'reg_cat');

if (!function_exists('wp_body_open')) {

    /**
     * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * SVG sprite
 * 
 */
function svg_sprite($name)
{
    $svg = esc_url(get_template_directory_uri() . '/assets/svg/symbol/sprite.svg#' . $name);

    //var_dump($svg);

    echo '<svg shape-rendering="geometricPrecision">
        <use xlink:href="' . $svg . '"/></use>
    </svg>';
}

function get_svg_sprite($name)
{
    $svg = esc_url(get_template_directory_uri() . '/assets/svg/symbol/sprite.svg#' . $name);

    //var_dump($svg);

    return '<svg shape-rendering="geometricPrecision">
        <use xlink:href="' . $svg . '"/></use>
    </svg>';
}

//add class in links menu
function add_menuclass($ulclass)
{

    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}

add_filter('wp_nav_menu', 'add_menuclass');

function add_additional_class_on_li($classes, $item, $args)
{

    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * Rotas api
 */
add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/city/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_cities',
    ));
});

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function api_get_cities($data)
{

    $terms = get_terms(array(
        'taxonomy' => 'shop_location',
        'hide_empty' => false,
    ));

    $cities = [];

    foreach ($terms as $term) {
        if ($term->parent == $data['id']) $cities[] = $term;
    }

    return $cities;
}

/**
 * Rotas api
 */
add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/mail-send', array(
        'methods' => 'POST',
        'callback' => 'api_send_mail',
    ));
});

function api_send_mail($request = null)
{

    $response = array();
    $parameters = $request->get_json_params();

    $name = sanitize_text_field($parameters['nome']);
    $subject = sanitize_text_field($parameters['assunto']);
    $message = sanitize_text_field($parameters['mensagem']);
    $mail = sanitize_text_field($parameters['email']);
    $phone = sanitize_text_field($parameters['telefone']);

    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Nupill Wordpress - SAC &lt;support@example.com');

    $adminMail = get_option('admin_email');

    $thisMessage = 'O cliente ' . $name . ' - (Fone: ' . $phone . ') entrou em contato com o seguinte assunto: ' . $subject . ' <br>' .
        $message;

    $error = new WP_Error();

    if (empty($adminMail)) {
        $error->add(400, __("Erro in access e-mail sender.", 'wp-rest-user'), array('status' => 400));
        return $error;
    }

    if (empty($name)) {
        $error->add(400, __("Please inform the Name.", 'wp-rest-user'), array('status' => 400));
        return $error;
    }
    if (empty($message)) {
        $error->add(400, __("Please inform the Message.", 'wp-rest-user'), array('status' => 400));
        return $error;
    }
    if (empty($mail)) {
        $error->add(400, __("Please inform the Mail.", 'wp-rest-user'), array('status' => 400));
        return $error;
    }

    if (wp_mail($adminMail, $subject, $thisMessage, $headers, null)) {
        $response['code'] = 200;

        $response['message'] = `Sua mensagem foi enviada com sucesso!`;
    } else {
        $error->add(400, __("Error in sendMail.", 'wp-rest-user'), array('status' => 400));
        return $error;
    };

    return $response;
}

add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/location/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_locations',
    ));
});

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function api_get_locations($data)
{

    $terms = get_terms(array(
        'taxonomy' => 'shop_location',
        'hide_empty' => false,
    ));

    $cities = [];

    foreach ($terms as $term) {
        if ($term->parent == $data['id']) $cities[] = $term;
    }

    return $cities;
}

/**
 * Rotas api
 * Get shops by tax id
 */
add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/shops/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_shops',
    ));
});

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function api_get_shops($data)
{

    $args = array(
        'post_type' => 'loja',
        'tax_query' => array(
            array(
                'taxonomy' => 'shop_location',
                'field' => 'term_id',
                'terms' => $data['id']
            )
        )
    );

    $query = new WP_Query($args);

    $cities = [];

    // The Loop
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $cities[] = [
                'title' => get_the_title(),
                'image' => get_the_post_thumbnail(),
                'content' => get_the_content(),
                'link' => get_the_permalink(),
                'ID' => get_the_id()
            ];
        }
    }

    wp_reset_postdata();

    return $cities;
}
