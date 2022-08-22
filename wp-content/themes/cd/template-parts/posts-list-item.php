<?php
$post = $args['post'];
$post_cat_ID = wp_get_post_categories($post->ID)[0];
$post_cat = get_the_category_by_ID($post_cat_ID);
?>

<?php $list_img = get_field('list-img'); ?>
<div class="group shadow-block relative">
    <a href="<?php esc_attr_e(get_permalink()); ?>"
       class="absolute inset-0 z-20"></a>
    <div class="rounded-30 relative z-10 bg-white h-full overflow-hidden grid grid-rows-blog-post">
        <div class="relative md:pl-9 pl-4 md:pr-6 pr-4 md:pb-14.5 pb-8 flex flex-col overflow-hidden justify-end">
            <div class="absolute z-10 bg-cover bg-center inset-0 transition-all duration-300 group-hover:scale-105"
                 style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 60%),
                     url('<?php echo esc_url($list_img['url']); ?>');"></div>
            <p class="text-white font-semibold tracking-tight text-xl relative z-20">
                <?php esc_html_e($post_cat); ?>
            </p>
        </div>
        <div class="md:pt-5 pt-3.5 md:pl-11 pl-4 md:pb-8 pb-10.5 md:pr-6 pr-4 flex flex-col justify-between">
            <div>
                <p class="font-semibold tracking-tight md:text-2.9xl text-2xl leading-huge md:mb-3.5 mb-3 group-hover:underline">
                    <?php the_title(); ?>
                </p>
                <p class="font-medium tracking-small text-grey-900/60 md:mb-0 mb-6">
                    <?php the_field( 'short_desc' ); ?>
                </p>
            </div>
            <p class="hover:underline font-medium tracking-small">
                <?php esc_html_e('Подробнее →'); ?>
            </p>
        </div>
    </div>
</div>