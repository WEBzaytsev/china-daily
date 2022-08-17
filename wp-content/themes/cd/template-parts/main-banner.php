<?php if (have_rows('main-banner')) : ?>
    <?php while (have_rows('main-banner')) : the_row(); ?>
        <section class="mt-1 pt-11.5 h-[551px] pb-12.5 rounded-30 relative"
                 style="background-color:<?php the_sub_field('color'); ?>">
            <p class="text-white font-bold text-center tracking-mini mb-3.5 text-[60px] leading-none relative z-20">
                <?php the_title(); ?>
            </p>
            <figure class="absolute w-full bottom-0 left-0">
                <?php $img = get_sub_field('img'); ?>
                <?php if ($img) : ?>
                    <img src="<?php echo esc_url($img['url']); ?>"
                         class="block max-w-full mx-auto"
                         alt="<?php echo esc_attr($img['alt']); ?>"/>
                <?php endif; ?>
            </figure>
        </section>
    <?php endwhile; ?>
<?php endif; ?>