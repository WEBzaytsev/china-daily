<?php
/**
 * Template Name: Контакты
 */

get_header();
?>

    <main class="relative z-10 container grid md:gap-y-4 gap-y-3 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <div class="grid md:grid-cols-2 gap-y-6 bg-white rounded-30 md:pb-13 pb-10 md:px-13 px-2 md:pt-13 pt-6.5">
            <div>
                <p class="mb-4 font-semibold">
                    Адрес: <?php the_field( 'legal-address', 'option' ); ?>
                </p>
                <p class="mb-1 5 text-[11px]">
                    <?php the_field( 'schedulle', 'option' ); ?>
                </p>
                <a  href="tel:<?php the_field( 'phone', 'option' ); ?>"
                    class="block text-xl mb-4 hover:underline">
                    <?php the_field( 'phone', 'option' ); ?>
                </a>
                <a href="mailto:<?php the_field( 'email', 'option' ); ?>"
                   class="block hover:underline">
                    <?php the_field( 'email', 'option' ); ?>
                </a>
            </div>
            <div class="md:self-center md:justify-self-center">
                <?php get_template_part('/template-parts/socials', null, array('icon-size' => 40)); ?>
            </div>
        </div>
    </main>

<?php
get_footer();