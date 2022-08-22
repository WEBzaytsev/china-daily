<?php

/**
 * Testimonial Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'simple-images-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'simple-images';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$images = get_field('images');
$images_count = count($images);

?>

<div id="<?php echo esc_attr($id); ?>"
     class="<?php echo esc_attr($className); ?> grid md:grid-cols-<?php echo $images_count; ?> gap-2">
    <?php if (have_rows('images')) : ?>
        <?php while (have_rows('images')) : the_row(); ?>
            <figure class="rounded-30 overflow-hidden flex items-center justify-center">
                <?php $image = get_sub_field('image'); ?>
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>"
                         class="block min-h-full min-w-full w-auto h-auto"
                         alt="<?php echo esc_attr($image['alt']); ?>"/>
                <?php endif; ?>
            </figure>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
