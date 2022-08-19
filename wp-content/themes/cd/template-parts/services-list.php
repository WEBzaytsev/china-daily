<?php
$current_page = $args['page'] ?? 'main';
$services_args = array(
    'post_type' => 'service',
    'post_per_page' => 6,
    'orderby' => 'rand',
    'post__not_in' => array(get_the_ID()),
);
$services = query_posts($services_args);

if (have_posts()) : ?>
    <div class="grid gap-2 grid-rows-services-list <?php echo $current_page == 'main' ? 'grid-cols-4' : 'grid-cols-3'; ?>">
        <?php
        $service_count = 1;
        while (have_posts()) :
            the_post();
            $service_css_class = '';
            if ($service_count == 1) {
                $service_css_class = 'col-start-1 col-end-3';
            }

            if ($service_count == 2) {
                $service_css_class = 'col-start-3 col-end-5';
            }
            ?>
            <div class="bg-white rounded-30 transition-all duration-300 relative hover:shadow-xl p-9 overflow-hidden group <?php echo $current_page == 'main' ? esc_attr($service_css_class) : ''; ?>">
                <div class="relative z-20">
                    <p class="font-semibold mb-3.5 tracking-tight leading-none text-3.3xl">
                        <?php the_field('list-title'); ?>
                    </p>
                    <?php if ($current_page == 'main') : ?>
                        <p class="mb-3.5 text-grey-900/50 tracking-small">
                            <?php the_field('list-desc'); ?>
                        </p>
                    <?php endif; ?>
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