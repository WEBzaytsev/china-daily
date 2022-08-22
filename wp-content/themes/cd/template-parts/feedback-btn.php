<?php
$css = $args['css-classes'] ?? '';
$default_classes = 'w-full block text-white md:py-9.5 py-5.5 bg-green-600 hover:bg-green-700 shadow-btn transition-all duration-300 font-medium text-xl tracking-small text-center rounded-30';
?>

<button type="button"
        data-bs-toggle="modal"
        data-bs-target="#exampleModalCenteredScrollable"
        class="<?php esc_attr_e($css ?: $default_classes); ?>">
    <?php esc_html_e('Оставить  заявку', 'cd'); ?>
</button>