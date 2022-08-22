<?php $current_post_type = get_post_type(); ?>

<div class="flex font-semibold md:my-4 my-2">
    <a href="/" class="underline hover:no-underline">
        <?php esc_html_e('Главная'); ?>
    </a>
    <p>&nbsp;>&nbsp;</p>
    <?php if ($current_post_type == 'page') : ?>
        <p>
            <?php the_title(); ?>
        </p>
    <?php endif; ?>

    <?php if ($current_post_type == 'service') : ?>
        <a href="<?php esc_attr_e('/uslugi'); ?>"
           class="underline hover:no-underline">
            <?php esc_html_e('Услуги'); ?>
        </a>
        <p>&nbsp;>&nbsp;</p>
        <p>
            <?php the_title(); ?>
        </p>
    <?php endif; ?>

    <?php if ($current_post_type == 'post') : ?>
        <a href="<?php esc_attr_e('/blog'); ?>"
           class="underline hover:no-underline">
            <?php esc_html_e('Блог'); ?>
        </a>
        <p>&nbsp;>&nbsp;</p>
        <p>
            <?php the_title(); ?>
        </p>
    <?php endif; ?>
</div>
