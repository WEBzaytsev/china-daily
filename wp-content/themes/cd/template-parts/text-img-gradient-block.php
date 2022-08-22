<?php
$block_selector = $args['selector'];

if (have_rows($block_selector)) : ?>
    <?php while (have_rows($block_selector)) : the_row(); ?>
        <?php $img = get_sub_field('img'); ?>
        <?php $color = get_sub_field('color'); ?>
        <div class="md:pt-12.5 pt-5 md:pb-6 pb-5 md:px-9 px-5.5 md:min-h-[600px] bg-white rounded-30 bg-cover text-white text-img-gradient-block">
            <p class="font-semibold tracking-tight md:text-5xl text-2xl md:leading-[58px] md:mb-12 mb-2">
                <?php the_sub_field('caption'); ?>
            </p>
            <p class="font-medium md:text-xl leading-[26px]">
                <?php the_sub_field('text'); ?>
            </p>
        </div>
        <style>
            .text-img-gradient-block {
                background: linear-gradient(
                        100.94deg,
                        rgba(<?php echo formatColor($color); ?> 1) 32.74%,
                        rgba(<?php echo formatColor($color); ?> 0) 60.15%),
                url('<?php echo esc_url($img['url']); ?>') no-repeat center;
            }

            @media (max-width: 768px) {
                .text-img-gradient-block {
                    background: linear-gradient(
                            129.26deg,
                            rgba(<?php echo formatColor($color); ?> 1) 54.29%,
                            rgba(<?php echo formatColor($color); ?> 0) 95.99%),
                    url('<?php echo esc_url($img['url']); ?>') no-repeat center;
                }
            }
        </style>
    <?php endwhile; ?>
<?php endif; ?>
