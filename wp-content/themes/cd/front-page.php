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

    <main class="relative z-10 container grid gap-y-4">

        <!--First section-->
        <?php if (have_rows('main-banner')) : ?>
            <?php while (have_rows('main-banner')) : the_row(); ?>
                <section class="mt-1 pt-11.5 h-[680px] pb-12.5 rounded-30 relative"
                         style="background-color:<?php the_sub_field('bg-color'); ?>">
                    <div class="flex flex-col justify-between items-center relative z-20">
                        <div class="">
                            <p class="text-white font-bold text-center tracking-mini mb-3.5 text-huge">
                                <?php the_sub_field('caption'); ?>
                            </p>
                            <p class="text-white font-medium tracking-normal text-xl text-center">
                                <?php the_sub_field('text'); ?>

                            </p>
                        </div>
                    </div>
                    <div class="absolute left-1/2 -translate-x-1/2 top-16 w-full z-10">
                        <figure>
                            <img src="<?php echo get_template_directory_uri() . '/dist/img/track.png'; ?>"
                                 alt="delivery">
                        </figure>
                        <?php if (have_rows('metrics')) : ?>
                            <div class="grid grid-cols-3 gap-x-[90px] absolute bottom-[176px] left-[207px] max-w-[600px]">
                                <?php while (have_rows('metrics')) : the_row(); ?>
                                    <div class="relative">
                                        <div class="absolute opacity-70  left-0 top-0 mix-blend-overlay">
                                            <p class="font-black tracking-tight text-[51px] leading-[62px]">
                                                <?php the_sub_field('value'); ?>
                                            </p>
                                            <p class="font-semibold text-[19.8px] leading-[23px] tracking-small">
                                                <?php the_sub_field('desc'); ?>
                                            </p>
                                        </div>
                                        <div class=" opacity-70 mix-blend-overlay">
                                            <p class="font-black tracking-tight text-[51px] leading-[62px]">
                                                <?php the_sub_field('value'); ?>
                                            </p>
                                            <p class="font-semibold text-[19.8px] leading-[23px] tracking-small">
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

    </main>

<?php get_footer();