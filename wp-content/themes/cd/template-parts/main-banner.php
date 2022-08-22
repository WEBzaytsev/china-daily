<?php if (have_rows('main-banner')) : ?>
    <?php while (have_rows('main-banner')) : the_row();
        $img = get_sub_field('img');
        ?>
        <section class="mt-1 md:pt-11.5 pt-5.5 md:pb-12.5 pb-5.5 rounded-30 relative <?php echo $img['url'] ? 'md:h-[551px] h-[330px]' : '' ?>"
                 style="background-color:<?php the_sub_field('color'); ?>">
            <p class="text-white font-bold text-center tracking-mini md:text-[60px] text-[30px] leading-none relative z-20 <?php echo $img['url'] ? 'mb-3.5' : '' ?>">
                <?php the_title(); ?>
            </p>
            <?php if ($img) : ?>
                <figure class="absolute w-full bottom-0 left-0">
                    <img src="<?php echo esc_url($img['url']); ?>"
                         class="block max-w-full mx-auto"
                         alt="<?php echo esc_attr($img['alt']); ?>"/>
                </figure>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>