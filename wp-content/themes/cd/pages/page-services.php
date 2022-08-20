<?php
/**
 * Template Name: Услуги
 */

get_header();
?>

    <main class="relative z-10 container grid gap-y-4 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <?php get_template_part('/template-parts/services-list', null, array('page' => 'services')); ?>

        <?php get_template_part('/template-parts/feedback-btn') ?>
    </main>

<?php
get_footer();
