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

    <main class="relative z-10 container grid md:gap-y-4 gap-y-3 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <?php if (have_rows('first-block')) : ?>
            <?php while (have_rows('first-block')) : the_row();

                $rows = count(get_sub_field('metrics')); ?>
                <!--<div class="grid grid-cols-2 xl:grid-rows-2 gap-2">-->
                <div class="grid xl:grid-cols-2 xl:grid-rows-<?php echo $rows; ?> gap-2">
                    <div class="relative xl:row-span-full h-full bg-white rounded-30 min-h-300 flex items-center md:px-9 px-3 md:py-4 py-5">
                        <div class="font-semibold tracking-tight md:text-3.3xl text-2.6xl md:mb-0 mb-[125px] relative z-20">
                            <?php the_sub_field('text'); ?>
                        </div>
                        <?php $img = get_sub_field('img'); ?>
                        <?php if ($img) : ?>
                            <figure class="absolute z-10 right-0 md:top-1/2 md:-translate-y-1/2 md:bottom-auto bottom-0">
                                <img src="<?php echo esc_url($img['url']); ?>"
                                     alt="<?php echo esc_attr($img['alt']); ?>"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('metrics')) : ?>
                        <?php while (have_rows('metrics')) : the_row(); ?>
                            <div class="xl:col-start-2 xl:col-end-3 rounded-20 bg-white p-6">
                                <p class="mb-3 tracking-tight md:text-5.3xl text-3xl font-semibold">
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
            <div class="grid md:grid-cols-<?php echo $links_cols > 4 ? 4 : $links_cols; ?> gap-x-2 gap-y-2.5">
                <?php while (have_rows('links')) : the_row(); ?>
                    <div class="rounded-20 py-6 pl-6 pr-2 group relative min-h-[124px] md:block flex items-center"
                         style="background-color: <?php the_sub_field('color'); ?>;">
                        <!--<a href="<?php /*the_sub_field('url'); */?>"
                           class="absolute inset-0 z-20"></a>-->
                        <p class="text-white tracking-tight md:text-2.9xl text-2xl font-semibold leading-huge relative z-10">
                            <?php the_sub_field('text'); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('stages')) :
            $stages_cols = count(get_field('stages')); ?>
<!--        <div class="grid-cols-4"></div>-->
            <div class="grid <?php echo $stages_cols >= 4 ? 'xl:grid-cols-4 md:grid-cols-2' : 'md:grid-cols-' . $stages_cols; ?> gap-x-2 gap-y-2">
                <?php
                $stages_item_count = 1;
                while (have_rows('stages')) : the_row(); ?>
                    <div class="relative bg-white rounded-30 overflow-hidden shadow-block pt-9 pl-8.5 pr-4 md:h-[432px] h-[293px]">
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
