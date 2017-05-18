<?php

function assetsTheme()
{
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/css/vendor/swiper.min.css');
    wp_enqueue_style('fancybox', get_stylesheet_directory_uri() . '/css/vendor/jquery.fancybox.css');
    wp_enqueue_style('chosen', get_stylesheet_directory_uri() . '/css/vendor/chosen.css');
    wp_enqueue_style('mCustomScrollbar', get_stylesheet_directory_uri() . '/css/vendor/jquery.mCustomScrollbar.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css');

    wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js');
    wp_enqueue_script('jwplayer', get_stylesheet_directory_uri() . '/js/vendor/jwplayer.js');
    wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}

function hook_css()
{
    $options = get_option('plugin_options');
    $output = '';

    if ($options) {
        $output .= '<style type="text/css">';
        $output .= '.tab-1 { background-image: url("' . $options['clients']['contact_photo'] . '"); }';
        $output .= '.tab-2 { background-image: url("' . $options['investors']['contact_photo'] . '"); }';
        $output .= '.tab-3 { background-image: url("' . $options['talents']['contact_photo'] . '"); }';
        $output .= '@media only scren and (max-width: 1024px) and (min-width: 768px) {' .
            '.tab-1, .tab-2, .tab-3 { background-image: none; }' .
        '}';
        $output .= '@media only scren and (max-width: 767px) and (min-width: 320px) {' .
            '.tab-1, .tab-2, .tab-3 { background-image: none; }' .
        '}';
        $output .= '</style>';
    }

    echo $output;
}

function hook_js_ie()
{
    $output = "<!--[if lt IE 9]>\n" .
    "<script>\n" .
        "\tdocument.createElement('header');\n" .
        "\tdocument.createElement('nav');\n" .
        "\tdocument.createElement('main');\n" .
        "\tdocument.createElement('section');\n" .
        "\tdocument.createElement('article');\n" .
        "\tdocument.createElement('aside');\n" .
        "\tdocument.createElement('footer');\n" .
        "\tdocument.createElement('picture');\n" .
        "\tdocument.createElement('figure');\n" .
        "\tdocument.createElement('figcaption');\n" .
    "</script>\n" .
    "<![endif]-->\n";

    echo $output;
}

function hook_js()
{
    $output = '<script>jwplayer.key="3cbF7OSeDc4bWIH3soWS3YmC3zMPzvr2xNhRsg==";</script>';
    $output .= '<script type="text/javascript">var ajaxUrl = "' . admin_url( 'admin-ajax.php?lang=' . ICL_LANGUAGE_CODE ) . '";</script>';
    $output .= '<script type="text/javascript" src="https://tools.euroland.com/tools/common/eurolandiframeautoheight/eurolandtoolsintegrationobject.js"></script>';

    echo $output;
}

add_action('wp_head', 'hook_css');
add_action('wp_head','hook_js_ie', 3);
add_action('wp_head','hook_js');
add_action('wp_enqueue_scripts', 'assetsTheme');