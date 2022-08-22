<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'img-gradient-text-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'img-gradient-text-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$caption = get_field('caption') ?: '';
$text = get_field('text') ?: 'Введите текст...';
$text_width = get_field('text_width');
$background_image = get_field('background_image')['url'];
$gradient_color = get_field('gradient_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>"
     class="<?php echo esc_attr($className); ?> rounded-30 p-9 bg-cover">
    <div class="<?php echo esc_attr($className); ?>-content">
        <?php if ($caption) : ?>
            <p class="font-semibold tracking-tight text-5xl leading-[58px] mb-12">
                <?php echo $caption; ?>
            </p>
        <?php endif; ?>
        <?php if ($text) : ?>
            <div class="">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
    </div>
    <style type="text/css">
        <?php echo '#' . $id; ?> {
            background: linear-gradient(
                    100.94deg,
                    rgba(<?php echo formatColor($gradient_color); ?> 1) 32.74%,
                    rgba(<?php echo formatColor($gradient_color); ?> 0) 60.15%
            ),
            url("<?php echo $background_image; ?>") no-repeat center;
            color: <?php echo $text_color; ?>;
        }
        <?php echo '.' . $className . '-content'; ?> {
            max-width: <?php echo $text_width; ?>%;
        }
        @media (max-width: 768px) {
            <?php echo '#' . $id; ?> {
                background: linear-gradient(
                        129.26deg,
                        rgba(<?php echo formatColor($gradient_color); ?> 1) 54.29%,
                        rgba(<?php echo formatColor($gradient_color); ?> 0) 95.99%
                ),
                url("<?php echo $background_image; ?>") no-repeat center;
            }
            <?php echo '.' . $className . '-content'; ?> {
                max-width: unset;
            }
        }
    </style>
</div>