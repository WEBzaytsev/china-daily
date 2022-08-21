<?php
/**
 * china-daily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package china-daily
 */

if (!defined('CHINA_DAILY')) {
    // Replace the version number of the theme on each release.
    define('CHINA_DAILY', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cd_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on china-daily, use a find and replace
        * to change 'cd' to the name of your theme in all the template files.
        */
    load_theme_textdomain('cd', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('main-menu', 'cd'),
            'footer-menu' => esc_html__('footer-menu', 'cd'),
        )
    );

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
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'cd_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'cd_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cd_content_width()
{
    $GLOBALS['content_width'] = apply_filters('cd_content_width', 640);
}

add_action('after_setup_theme', 'cd_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cd_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'cd'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'cd'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'cd_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cd_scripts()
{
    $js_options = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => get_home_url(),
    );

    wp_enqueue_style(
        'cd-style',
        get_stylesheet_uri(),
        array(),
        CHINA_DAILY
    );

    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/dist/css/main.css',
        array(),
        CHINA_DAILY
    );

    wp_enqueue_script(
        'validate',
        get_template_directory_uri() . '/js/jquery.validate.min.js',
        array(),
        CHINA_DAILY,
        true
    );

    wp_enqueue_script(
        'select2',
        get_template_directory_uri() . '/js/select2.min.js',
        array(),
        CHINA_DAILY,
        true
    );

    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/dist/js/main.js',
        array(
            'jquery',
            'select2',
            'validate',
        ),
        CHINA_DAILY,
        true
    );

    wp_localize_script(
        'main-script',
        'options',
        $js_options
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cd_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF json save filter.
 *
 * @param string $path Path.
 *
 * @return string
 */

add_filter('acf/settings/save_json', 'cd_acf_json_save_point');

function cd_acf_json_save_point($path)
{
    return get_stylesheet_directory() . '/acf-json';
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        [
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Основные настройки',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]
    );
}

/**
 * Customize menus
 */
add_filter('nav_menu_link_attributes', 'cd_add_menu_link_class', 1, 3);
add_filter('nav_menu_css_class', 'cd_add_additional_class_on_li', 1, 3);
require get_template_directory() . '/includes/customize-menu.php';

/**
 * Create custom post types
 */
require get_template_directory() . '/includes/custom-post-type.php';
require get_template_directory() . '/includes/custom-taxonomy.php';

add_action('init', 'cd_create_post_type');
add_action('init', 'cd_register_taxonomy');

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name' => 'simple-text-block',
            'title' => __('Простой текст'),
            'description' => __('Простой блок текста'),
            'render_template' => 'template-parts/blocks/simple-text-block.php',
            'category' => 'formatting',
            'icon' => 'align-left',
            'keywords' => array('простой', 'текст'),
        ));

        acf_register_block_type(array(
            'name' => 'img-gradient-text-block',
            'title' => __('Текст с картинкой и градиентом'),
            'description' => __('Текст с картинкой и градиентом'),
            'render_template' => 'template-parts/blocks/img-gradient-text-block.php',
            'category' => 'formatting',
            'icon' => 'align-left',
            'keywords' => array('картинка', 'текст', 'градиент'),
        ));

        acf_register_block_type(array(
            'name' => 'simple-images',
            'title' => __('Картинки'),
            'description' => __('Картинки'),
            'render_template' => 'template-parts/blocks/simple-images.php',
            'category' => 'formatting',
            'icon' => 'align-left',
            'keywords' => array('картинка'),
        ));
    }
}

function formatColor($rgba_color_array): string
{
    $i = 1;
    return trim(array_reduce($rgba_color_array, function ($carry, $item) use ($rgba_color_array, &$i) {
        if ($i >= count($rgba_color_array)) {
            return $carry;
        }

        $i++;
        return $carry . $item . ', ';
    }));
}

function set_rows($items_count, $items_in_row): int
{
    return ceil($items_count / $items_in_row);
}