<?php $icon_size = $args['icon-size'] ?? 40; ?>

<?php if (have_rows('socials', 'option')) :
    $socials_count = count(get_field('socials', 'option'))
    ?>
    <div class="grid w-fit grid-cols-<?php echo $socials_count; ?> gap-2.5 mr-3.5">
        <?php while (have_rows('socials', 'option')) : the_row(); ?>
            <a href="<?php the_sub_field('url'); ?>"
               class="drop-shadow-icon">
                <?php $icon = get_sub_field('icon'); ?>
                <?php if ($icon) : ?>
                    <img src="<?php echo esc_url($icon['url']); ?>"
                         width="<?php esc_attr_e($icon_size); ?>"
                         height="<?php esc_attr_e($icon_size); ?>"
                         alt="<?php echo esc_attr($icon['alt']); ?>"/>
                <?php endif; ?>
            </a>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
