<?php
/**
 * Template Name: Главная
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cd
 */

get_header(); ?>

    <main class="relative z-10 container grid md:gap-y-4 gap-y-3 mb-4">

        <!--First section-->
        <?php if (have_rows('main-banner')) : ?>
            <?php while (have_rows('main-banner')) : the_row(); ?>
                <section
                        class="mt-1 md:pt-11.5 pt-5 md:h-[680px] h-[330px] md:pb-12.5 pb-5 md:px-0 px-5 rounded-30 relative"
                        style="background-color:<?php the_sub_field('bg-color'); ?>">
                    <div class="flex flex-col justify-between items-center h-full relative z-20">
                        <div class="">
                            <p class="text-white font-bold text-center tracking-mini lg:mb-3.5 mb-3 lg:text-huge md:text-5xl text-3.3xl leading-tight">
                                <?php the_sub_field('caption'); ?>
                            </p>
                            <p class="text-white font-medium tracking-normal md:text-xl text-lg text-center main-banner-subcaption">
                                <?php the_sub_field('text'); ?>
                            </p>
                        </div>
                        <?php $btn = get_sub_field('btn'); ?>
                        <?php if ($btn) : ?>
                            <a href="<?php echo esc_url($btn['url']); ?>"
                               class="bg-white font-medium text-lg leading-[34px] py-3 px-9.5 rounded-full transition-all duration-300 hover:bg-stone-200 md:block hidden"
                               target="<?php echo esc_attr($btn['target']); ?>">
                                <?php echo esc_html($btn['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="absolute left-1/2 -translate-x-1/2 md:top-16 md:bottom-auto bottom-0 w-full z-10">
                        <figure>
                            <img src="<?php echo get_template_directory_uri() . '/dist/img/track.png'; ?>"
                                 alt="delivery">
                        </figure>
                        <?php if (have_rows('metrics')) : ?>
                            <div class="grid grid-cols-3 md:gap-x-[90px] gap-x-[24px] absolute md:bottom-[30%] bottom-[26%] md:left-[18%] left-[12%] lg:max-w-[600px] md:max-w-[400px] max-w-[63%]">
                                <?php while (have_rows('metrics')) : the_row(); ?>
                                    <div class="relative">
                                        <div class="absolute md:opacity-70 left-0 top-0 md:mix-blend-overlay">
                                            <p class="font-black tracking-tight lg:text-[51px] md:text-[28px] text-[22px] lg:leading-[62px] leading-none">
                                                <?php the_sub_field('value'); ?>
                                            </p>
                                            <p class="font-semibold lg:text-[19.8px] md:text-base text-[10px] lg:leading-[23px] leading-none tracking-small">
                                                <?php the_sub_field('desc'); ?>
                                            </p>
                                        </div>
                                        <div class="md:opacity-70 opacity-0 mix-blend-overlay">
                                            <p class="font-black tracking-tight lg:text-[51px] md:text-[28px] text-[22px] lg:leading-[62px] leading-none">
                                                <?php the_sub_field('value'); ?>
                                            </p>
                                            <p class="font-semibold lg:text-[19.8px] md:text-base text-[10px] lg:leading-[23px] leading-none tracking-small">
                                                <?php the_sub_field('desc'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
        <!--End first section-->

        <!--Second section-->
        <?php get_template_part('/template-parts/services-list'); ?>
        <!--End second section-->

        <?php get_template_part('/template-parts/feedback-btn') ?>

        <!--Third section-->
        <?php if (have_rows('benefits')) : ?>
            <div class="grid md:grid-cols-2 gap-x-2 gap-y-1.5">
                <?php while (have_rows('benefits')) : the_row(); ?>
                    <div class="relative bg-white rounded-30 overflow-hidden md:h-[596px] h-[293px] md:pt-11.5 pt-5.5 md:px-4 px-3 shadow-block">
                        <div class="relative z-20 flex flex-col items-center text-center">
                            <div class="md:mb-6 mb-1.5 tracking-tight font-semibold md:text-4xl text-2.6xl">
                                <?php the_sub_field('caption'); ?>
                            </div>
                            <p class="text-lg text-grey-900/50 font-medium">
                                <?php the_sub_field('short-text'); ?>
                            </p>
                        </div>
                        <?php $img = get_sub_field('img'); ?>
                        <?php if ($img) : ?>
                            <figure class="absolute z-10 bottom-0 w-full md:h-auto h-2/3 left-0">
                                <img src="<?php echo esc_url($img['url']); ?>"
                                     class="block max-w-full mx-auto md:h-auto h-full"
                                     alt="<?php echo esc_attr($img['alt']); ?>"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <!--End third section-->

        <!--Four section-->
        <?php if (have_rows('scheme')) : ?>
            <div class="grid md:grid-cols-3 gap-x-2 gap-y-1.5">
                <?php
                $scheme_item_count = 1;
                while (have_rows('scheme')) : the_row(); ?>
                    <div class="relative bg-white md:min-h-[432px] min-h-[293px] rounded-30 overflow-hidden shadow-block pt-9 pl-11.5 pr-4">
                        <div class="relative z-20">
                            <span class="block w-12 h-12 rounded-full border-2 border-solid border-black/10 flex items-center justify-center mb-3.5">
                                <?php esc_html_e($scheme_item_count); ?>
                            </span>
                            <p class="tracking-tight font-semibold leading-huge text-2.9xl mb-3.5">
                                <?php the_sub_field('caption'); ?>
                            </p>
                            <p class="tracking-small text-grey-900/50 font-medium">
                                <?php the_sub_field('short-text'); ?>
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
                    $scheme_item_count++;
                endwhile; ?>
            </div>
        <?php endif; ?>
        <!--End four section-->

        <!--Five section-->
        <?php get_template_part('/template-parts/text-img-gradient-block', null, array('selector' => 'about')); ?>
        <!--End five section-->

        <!--Six section-->
        <?php if (have_rows('metrics')) : ?>
            <div class="grid md:grid-cols-4 gap-x-2 gap-y-1.5">
                <?php while (have_rows('metrics')) : the_row(); ?>
                    <div class="p-6 bg-white rounded-20 shadow-block">
                        <p class="font-semibold tracking-tight mb-3 text-5.3xl">
                            <?php the_sub_field('value'); ?>
                        </p>
                        <p class="text-grey-900/60 tracking-small font-medium text-xl">
                            <?php the_sub_field('text'); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <!--End six section-->

        <!--Seven section-->
        <?php
        $posts_args = array(
            'type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
        );
        $posts = query_posts($posts_args);
        if (have_posts()) : ?>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-x-2 gap-y-1.5">
                <?php while (have_posts()) : the_post(); ?>
                    <?php $list_img = get_field('list-img'); ?>
                    <div class="h-[420px] shadow-block">
                        <div class="relative group bg-white pl-9 pr-6 pb-8.5 flex flex-col h-full justify-end rounded-30 overflow-hidden">
                            <a href="<?php echo get_permalink(); ?>" class="absolute z-30 inset-0"></a>
                            <div class="absolute z-10 bg-cover bg-center inset-0 transition-all duration-300 group-hover:scale-105"
                                 style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 60%),
                                         url('<?php echo esc_url($list_img['url']); ?>');"></div>
                            <p class="text-white font-semibold tracking-tight text-xl relative z-20 group-hover:underline">
                                <?php the_title(); ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
                <div class="h-[420px] shadow-block">
                    <div class="relative group bg-white pl-9 pr-6 pb-8.5 flex flex-col justify-center items-center h-full justify-end rounded-30 overflow-hidden">
                        <a href="<?php echo get_home_url() . '/blog'; ?>"
                           class="absolute z-30 inset-0">
                        </a>
                        <p class="text-[128px] text-grey-900/20 leading-none transition-all duration-300 group-hover:text-grey-900/50">
                            +
                        </p>
                        <p class="font-semibold text-xl tracking-tight mt-10 group-hover:underline">
                            <?php esc_html_e('Все статьи', 'cd'); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End seven section-->
    </main>

<?php get_footer();