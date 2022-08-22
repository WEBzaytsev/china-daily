<figure>
    <?php $logo = get_field('logo', 'option'); ?>
    <?php if ($logo) : ?>
        <img src="<?php echo esc_url($logo['url']); ?>"
             alt="<?php echo esc_attr($logo['alt']); ?>"/>
    <?php endif; ?>
</figure>