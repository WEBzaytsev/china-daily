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

    <main class="relative z-10 container grid gap-y-4 mb-4">

        <!--First section-->
        <?php if (have_rows('main-banner')) : ?>
            <?php while (have_rows('main-banner')) : the_row(); ?>
                <section class="mt-1 pt-11.5 h-[680px] pb-12.5 rounded-30 relative"
                         style="background-color:<?php the_sub_field('bg-color'); ?>">
                    <div class="flex flex-col justify-between items-center h-full relative z-20">
                        <div class="">
                            <p class="text-white font-bold text-center tracking-mini mb-3.5 text-huge">
                                <?php the_sub_field('caption'); ?>
                            </p>
                            <p class="text-white font-medium tracking-normal text-xl text-center">
                                <?php the_sub_field('text'); ?>

                            </p>
                        </div>
                        <?php $btn = get_sub_field('btn'); ?>
                        <?php if ($btn) : ?>
                            <a href="<?php echo esc_url($btn['url']); ?>"
                               class="bg-white font-medium text-lg leading-[34px] py-3 px-9.5 rounded-full transition-all duration-300 hover:bg-stone-200"
                               target="<?php echo esc_attr($btn['target']); ?>">
                                <?php echo esc_html($btn['title']); ?>
                            </a>
                        <?php endif; ?>
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

        <!--Second section-->
        <?php
        $services_args = array(
            'post_type' => 'service',
            'post_per_page' => 6,
            'orderby' => 'rand'
        );
        $services = query_posts($services_args);

        if (have_posts()) : ?>
            <div class="grid grid-cols-4 gap-2 grid-rows-services-list">
                <?php
                $service_count = 1;
                while (have_posts()) : the_post();
                    $post_id = $post->ID;
                    $service_css_class = '';
                    if ($service_count == 1) {
                        $service_css_class = 'col-start-1 col-end-3';
                    }

                    if ($service_count == 2) {
                        $service_css_class = 'col-start-3 col-end-5';
                    }
                    ?>
                    <div class="<?php echo sprintf(
                        '%s bg-white rounded-30 transition-all duration-300 relative hover:shadow-xl p-9 overflow-hidden group',
                        esc_attr($service_css_class)
                    ); ?>">
                        <div class="relative z-20">
                            <p class="font-semibold mb-3.5 tracking-tight leading-none text-3.3xl">
                                <?php the_field('list-title'); ?>
                            </p>
                            <p class="mb-3.5 text-grey-900/50 tracking-small">
                                <?php the_field('list-desc'); ?>
                            </p>
                            <a href="<?php echo get_permalink(); ?>"
                               class="font-medium tracking-small hover:underline">
                                Подробнее &#8594;
                            </a>
                        </div>
                        <?php $list_img = get_field('list-img'); ?>
                        <?php if ($list_img) : ?>
                            <figure class="absolute z-10 right-0 bottom-0 w-full max-w-full">
                                <img src="<?php echo esc_url($list_img['url']); ?>"
                                     class="block max-w-full group-hover:scale-105 transition-all duration-300 mx-auto"
                                     alt="<?php echo esc_attr($list_img['alt']); ?>"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                    <?php
                    $service_count++;
                endwhile;
                wp_reset_query(); ?>
            </div>
        <?php endif; ?>
        <!--End second section-->

        <a href="#"
           class="w-full block text-white py-9.5 bg-green-600 hover:bg-green-700 shadow-btn transition-all duration-300 font-medium text-xl tracking-small text-center rounded-30">
            <?php esc_html_e('Оставить  заявку', 'cd'); ?>
        </a>

        <!--Third section-->
        <?php if (have_rows('benefits')) : ?>
            <div class="grid grid-cols-2 gap-x-2 grid-rows-[596px]">
                <?php while (have_rows('benefits')) : the_row(); ?>
                    <div class="relative bg-white rounded-30 overflow-hidden pt-11.5 px-4 shadow-block">
                        <div class="relative z-20 flex flex-col items-center text-center">
                            <div class="mb-6 tracking-tight font-semibold text-4xl">
                                <?php the_sub_field('caption'); ?>
                            </div>
                            <p class="text-lg text-grey-900/50 font-medium">
                                <?php the_sub_field('short-text'); ?>
                            </p>
                        </div>
                        <?php $img = get_sub_field('img'); ?>
                        <?php if ($img) : ?>
                            <figure class="absolute z-10 bottom-0 w-full left-0">
                                <img src="<?php echo esc_url($img['url']); ?>"
                                     class="block max-w-full mx-auto"
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
            <div class="grid grid-cols-3 gap-x-2 grid-rows-[432px]">
                <?php
                $scheme_item_count = 1;
                while (have_rows('scheme')) : the_row(); ?>
                    <div class="relative bg-white rounded-30 overflow-hidden shadow-block pt-9 pl-11.5 pr-4">
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
        <?php if (have_rows('about')) : ?>
            <?php while (have_rows('about')) : the_row(); ?>
                <?php $img = get_sub_field('img'); ?>
                <?php $color = get_sub_field('color'); ?>
                <div class="pt-12.5 pl-9 h-[600px] bg-white rounded-30 bg-cover text-white"
                     style="background:linear-gradient(100.94deg, rgba(<?php echo formatColor($color); ?> 1) 32.74%, rgba(<?php echo formatColor($color); ?> 0) 60.15%),
                             url('<?php echo esc_url($img['url']); ?>') no-repeat center;">
                    <p class="font-semibold tracking-tight text-5xl leading-[58px] mb-12">
                        <?php the_sub_field('caption'); ?>
                    </p>
                    <p class="font-medium text-xl">
                        <?php the_sub_field('text'); ?>
                    </p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!--End five section-->
    </main>

<?php get_footer();

function formatColor($rgba_color_array): string
{
    $i = 1;
    return trim(array_reduce($rgba_color_array, function($carry, $item) use ($rgba_color_array, &$i) {
        if ($i >= count($rgba_color_array)) {
            return $carry;
        }

        $i++;
        return $carry .= $item . ', ';
    }));
}