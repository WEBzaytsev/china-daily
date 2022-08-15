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

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-common-bg font-inter'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="">
    <header class="header fixed top-0 left-0 w-full bg-common-bg py-3">
        <div class="container w-full flex items-center justify-between">
            <div class="flex items-center">
                <a href="<?php esc_url(get_home_url(), 'cd') ?>">
                    <figure>
                        <?php $logo = get_field('logo', 'option'); ?>
                        <?php if ($logo) : ?>
                            <img src="<?php echo esc_url($logo['url']); ?>"
                                 alt="<?php echo esc_attr($logo['alt']); ?>"/>
                        <?php endif; ?>
                    </figure>
                </a>
                <?php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'menu_id' => 'main-menu',
                            'container_class' => 'ml-13',
                            'menu_class' => 'flex items-center',
                            'add_li_class' => 'relative before:block before:absolute before:bg-grey-900 before:bottom-0 before:left-1/2 before:w-full before:max-w-0 before:h-px before:-translate-x-1/2 before:transition-all before:duration-300 hover:before:max-w-full mr-8 last:mr-0',
                            'link_class' => 'font-semibold'
                        )
                    );
                } ?>
            </div>
            <div class="flex items-center">
                <a class="font-semibold mr-8"
                   href="tel:<?php the_field('phone', 'option'); ?>">
                    <?php the_field('phone', 'option'); ?>
                </a>
                <?php if (have_rows('socials', 'option')) :
                    $socials_count = count(get_field('socials', 'option'))
                    ?>
                    <!--                <div class="grid-cols-2"></div>-->
                    <div class="grid grid-cols-<?php echo $socials_count; ?> gap-2.5 mr-3.5">
                        <?php while (have_rows('socials', 'option')) : the_row(); ?>
                            <a href="<?php the_sub_field('url'); ?>"
                               class="drop-shadow-icon">
                                <?php $icon = get_sub_field('icon'); ?>
                                <?php if ($icon) : ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>"
                                         alt="<?php echo esc_attr($icon['alt']); ?>"/>
                                <?php endif; ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <a href="#"
                   class="px-5 py-3 bg-green-600 text-white font-medium text-[15px] rounded-10 shadow-btn transition-all duration-300 hover:bg-green-700">
                    <span class="">
                        <?php esc_html_e('Оставить  заявку', 'cd'); ?>
                    </span>
                </a>
            </div>
        </div>
    </header>

