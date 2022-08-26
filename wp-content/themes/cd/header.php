<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package china-daily
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/cd/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/cd/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/cd/favicon/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/wp-content/themes/cd/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/wp-content/themes/cd/favicon/mstile-144x144.png">
<meta name="theme-color" content="#D80126">


    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-common-bg font-inter pt-[73px] text-grey-900'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="">
    <header class="header fixed z-20 top-0 left-0 w-full bg-common-bg lg:py-3 py-1.5 lg:border-none border-b border-grey-200">
        <div class="lg:hidden container flex items-center justify-between relative w-full z-10">
            <?php get_template_part('/template-parts/mob-menu-btn'); ?>
            <a href="/"
               class="absolute top-1/2 left-1/2 z-20 -translate-y-1/2 -translate-x-1/2">
                <?php get_template_part('/template-parts/logo'); ?>
            </a>
            <span class="opacity-0 relative z-10">
                <?php get_template_part('/template-parts/logo'); ?>
            </span>
            <div class="mob-socials">
                <?php get_template_part('/template-parts/socials', null, array('icon-size' => 30)); ?>
            </div>
        </div>
        <div class="flex main-header-content z-20 lg:static absolute top-0 left-1/2 lg:translate-x-0 lg:translate-y-0 -translate-x-1/2 bg-common-bg transition-all duration-300 -translate-y-[150vh] lg:flex-row flex-col lg:h-auto h-full container lg:w-full w-fit items-center lg:justify-between">
            <div class="flex lg:flex-row flex-col items-center lg:mt-0 mt-3">
                <a href="/"
                   class="lg:mb-0 mb-3">
                    <?php get_template_part('/template-parts/logo'); ?>
                </a>
                <p class="lg:hidden text-center text-sm font-semibold mb-12.5 whitespace-nowrap">
                    <?php esc_html_e('Доставка товаров из Китая'); ?>
                </p>
                <?php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'menu_id' => 'main-menu',
                            'container_class' => 'xl:ml-13 ml-4 lg:mb-0 mb-7.5',
                            'menu_class' => 'flex lg:flex-row flex-col items-center',
                            'add_li_class' => 'relative before:block before:absolute before:bg-grey-900 before:bottom-0 before:left-1/2 before:w-full before:max-w-0 before:h-px before:-translate-x-1/2 before:transition-all before:duration-300 hover:before:max-w-full lg:mr-8 last:mr-0 lg:mb-0 mb-3 last:mb-0',
                            'link_class' => 'lg:font-semibold lg:text-base text-lg'
                        )
                    );
                } ?>
            </div>
            <div class="flex lg:flex-row flex-col items-center">
                <a class="font-semibold lg:mr-8 lg:mb-0 mb-7.5 lg:text-base text-xl order-1"
                   href="tel:<?php the_field('phone', 'option'); ?>">
                    <?php the_field('phone', 'option'); ?>
                </a>

                <div class="lg:order-2 order-3 lg:mr-0 -mr-3.5">
                    <?php get_template_part('/template-parts/socials', null, array('icon-size' => 40)); ?>
                </div>

                <div class="lg:order-3 order-2 lg:mb-0 mb-5">
                    <?php get_template_part(
                        '/template-parts/feedback-btn',
                        null,
                        array('css-classes' => 'px-5 py-3 bg-green-600 text-white font-medium text-[15px] rounded-10 shadow-btn transition-all duration-300 hover:bg-green-700')
                    ); ?>
                </div>
            </div>
        </div>
    </header>

