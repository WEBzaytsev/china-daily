<?php
$current_page = $args['page'] ?? 'main';
$services_args = array(
    'post_type' => 'service',
    'post_per_page' => 6,
    'post__not_in' => array(get_the_ID()),
);
$services = query_posts($services_args);

if (have_posts()) : ?>
    <div class="grid gap-2 <?php echo $current_page == 'main' ? 'lg:grid-cols-4 md:grid-cols-2' : 'lg:grid-cols-3 md:grid-cols-2'; ?>">
        <?php
        $service_count = 1;
        while (have_posts()) :
            the_post();
            $service_css_class = '';
            if ($service_count == 1) {
                $service_css_class = 'lg:col-start-1 lg:col-end-3';
            }

            if ($service_count == 2) {
                $service_css_class = 'lg:col-start-3 lg:col-end-5';
            }
            ?>
            <div class="bg-white md:h-[420px] h-[293px] rounded-30 transition-all duration-300 relative hover:shadow-xl md:py-9 md:px-9 py-5 px-3 overflow-hidden group <?php echo $current_page == 'main' ? esc_attr($service_css_class) : ''; ?> <?php echo hover_class(get_field('hover-color')); ?>">
                <div class="relative z-20">
                    <p class="font-semibold md:mb-3.5 mb-1.5 tracking-tight leading-none md:text-3.3xl text-2.6xl group-hover:text-white">
                        <?php the_field('list-title'); ?>
                    </p>
                    <?php if ($current_page == 'main') : ?>
                        <p class="md:mb-3.5 mb-1.5 text-grey-900/50 tracking-small group-hover:text-white">
                            <?php the_field('list-desc'); ?>
                        </p>
                    <?php endif; ?>
                    <a href="<?php echo get_permalink(); ?>"
                       class="font-medium tracking-small hover:underline group-hover:text-white">
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
<!--<div class="hover:bg-blue hover:bg-green-600 hover:bg-grey-600 hover:bg-orange hover:bg-ochre hover:bg-red"></div>-->
<?php endif;

function hover_class($color_name): string
{
    $color = $color_name;

    if ($color == 'grey' || $color == 'green') {
        $color .= '-600';
    }

    return 'hover:bg-' . $color;
}