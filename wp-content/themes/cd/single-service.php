<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package china-daily
 */

get_header();
?>

    <main class="relative z-10 container grid gap-y-4 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <?php if (have_rows('first-block')) : ?>
            <?php while (have_rows('first-block')) : the_row();

                $rows = count(get_sub_field('metrics')); ?>
                <!--<div class="grid grid-cols-2 grid-rows-2 gap-2">-->
                <div class="grid grid-cols-2 grid-rows-<?php echo $rows; ?> gap-2">
                    <div class="relative row-span-full h-full bg-white rounded-30 min-h-300 flex items-center px-9 py-4">
                        <div class="font-semibold tracking-tight text-3.3xl">
                            <?php the_sub_field('text'); ?>
                        </div>
                        <?php $img = get_sub_field('img'); ?>
                        <?php if ($img) : ?>
                            <figure class="absolute right-0 top-1/2 -translate-y-1/2">
                                <img src="<?php echo esc_url($img['url']); ?>"
                                     alt="<?php echo esc_attr($img['alt']); ?>"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('metrics')) : ?>
                        <?php while (have_rows('metrics')) : the_row(); ?>
                            <div class="col-start-2 col-end-3 rounded-20 bg-white p-6">
                                <p class="mb-3 tracking-tight text-5.3xl font-semibold">
                                    <?php the_sub_field('value'); ?>
                                </p>
                                <p class="tracking-small text-xl font-medium text-grey-900/60">
                                    <?php the_sub_field('desc'); ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php get_template_part('/template-parts/feedback-btn') ?>

        <?php get_template_part('/template-parts/text-img-gradient-block', null, array('selector' => 'desc-w-img')); ?>

        <?php if (have_rows('links')) :
            $links_cols = count(get_field('links')); ?>
            <div class="grid grid-cols-<?php echo $links_cols > 4 ? 4 : $links_cols; ?> gap-x-2">
                <?php while (have_rows('links')) : the_row(); ?>
                    <div class="rounded-20 py-6 pl-6 pr-2 group relative"
                         style="background-color: <?php the_sub_field('color'); ?>;">
                        <a href="<?php the_sub_field('url'); ?>"
                           class="absolute inset-0 z-20"></a>
                        <p class="text-white tracking-tight text-2.9xl font-semibold leading-huge relative z-10 group-hover:underline">
                            <?php the_sub_field('text'); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('stages')) :
            $stages_cols = count(get_field('stages')); ?>
            <div class="grid grid-cols-<?php echo $stages_cols > 4 ? 4 : $stages_cols; ?> gap-x-2 grid-rows-[432px]">
                <?php
                $stages_item_count = 1;
                while (have_rows('stages')) : the_row(); ?>
                    <div class="relative bg-white rounded-30 overflow-hidden shadow-block pt-9 pl-8.5 pr-4">
                        <div class="relative z-20">
                            <span class="block w-12 h-12 rounded-full border-2 border-solid border-black/10 flex items-center justify-center mb-3.5">
                                <?php esc_html_e($stages_item_count); ?>
                            </span>
                            <p class="tracking-tight font-semibold text-2xl mb-3.5">
                                <?php the_sub_field('text'); ?>
                            </p>
                        </div>
                        <?php $img = get_sub_field('img'); ?>
                        <?php if ($img) : ?>
                            <figure class="absolute z-10 bottom-0 right-0">
                                <img src="<?php echo esc_url($img['url']); ?>"
                                     alt="<?php echo esc_attr($img['alt']); ?>"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                    <?php
                    $stages_item_count++;
                endwhile; ?>
            </div>
        <?php endif; ?>

        <?php get_template_part('/template-parts/services-list'); ?>

        <?php get_template_part('/template-parts/feedback-btn') ?>
    </main>

<?php
get_footer();
