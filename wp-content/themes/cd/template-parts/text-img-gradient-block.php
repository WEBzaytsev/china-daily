<?php
$block_selector = $args['selector'];

if (have_rows($block_selector)) : ?>
    <?php while (have_rows($block_selector)) : the_row(); ?>
        <?php $img = get_sub_field('img'); ?>
        <?php $color = get_sub_field('color'); ?>
        <div class="pt-12.5 pb-6 pl-9 min-h-[600px] bg-white rounded-30 bg-cover text-white"
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
<?php endif;