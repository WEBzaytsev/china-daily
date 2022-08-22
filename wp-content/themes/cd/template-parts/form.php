<?php
$is_modal = $args['is-modal'] ?? false;
$input_class = 'block w-full px-4.5 py-2.5 border border-solid border-grey-400 focus:border-grey-600 rounded-13 font-medium placeholder:text-grey-600 tracking-small leading-huge';
?>

<form class="bg-white rounded-30 md:pb-16.5 pb-11.5 md:pt-17.5 pt-5 md:px-13 px-2.5 w-full feedback-form"
      method="post">
    <?php wp_nonce_field() ?>
    <input type="hidden" name="_wpcf7" value="<?php esc_attr_e(6); ?>">
    <div class="md:mb-12 mb-3.5 flex items-center justify-between">
        <div>
            <p class="font-semibold md:text-3.3xl text-2.6xl tracking-tight md:-mb-2 md:pr-0 pr-10">
                <?php echo sprintf(
                    '<span class="text-orange">%s</span>%s',
                    esc_html('Если остались вопросы'),
                    esc_html(', мы поможем'),
                ); ?>
            </p>
            <p class="font-medium text-grey-900/50">
                <?php esc_html_e('Оставьте свои контакты — мы перезвоним в течение нескольких часов
', 'cd'); ?>
            </p>
        </div>
        <?php if ($is_modal && !wp_is_mobile()) {
            get_template_part('/template-parts/logo');
        } ?>
    </div>

    <div class="lg:flex items-stretch">
        <div class="grid lg:grid-cols-2 gap-x-2 md:gap-y-6 gap-y-2 grow relative">
            <div class="grid gap-y-2">
                <label for="feedback-name" class="block w-full">
                    <input type="text"
                           id="feedback-name"
                           name="feedback-name"
                           placeholder="Имя"
                           class="<?php esc_attr_e($input_class); ?>">
                </label>
                <label for="feedback-phone" class="block w-full">
                    <input type="tel"
                           id="feedback-phone"
                           name="feedback-phone"
                           placeholder="Телефон"
                           class="<?php esc_attr_e($input_class); ?>">
                </label>
                <label for="feedback-email" class="block w-full">
                    <input type="text"
                           id="feedback-email"
                           name="feedback-email"
                           placeholder="Почта"
                           class="<?php esc_attr_e($input_class); ?>">
                </label>
            </div>
            <label for="feedback-question" class="block w-full">
                <textarea type="text"
                          id="feedback-question"
                          name="feedback-question"
                          placeholder="Вопрос"
                          class="resize-none h-full <?php esc_attr_e($input_class); ?>"></textarea>
            </label>
            <button type="submit"
                    class="col-start-1 md:col-end-3 bg-grey-900 rounded-13 text-center text-white tracking-small font-medium leading-huge py-2.5 shadow-btn transition-all duration-300 hover:bg-zinc-800">
                <?php esc_html_e('Отправить', 'cd'); ?>
            </button>
            <p class="absolute text-center -bottom-8 w-full left-0 form-note font-semibold"></p>
        </div>
        <?php if (!$is_modal) : ?>
            <div class="lg:ml-18.5 lg:mt-0 mt-8.5 flex flex-col justify-between">
                <div class="lg:mb-0 mb-7.5">
                    <div class="font-semibold tracking-tight leading-huge md:text-3.3xl text-2.6xl md:mb-3.5 mb-6">
                        <a href="tel:<?php the_field('phone', 'option'); ?>"
                           class=" block  md:mb-4 mb-3 underline hover:no-underline">
                            <?php the_field('phone', 'option'); ?>
                        </a>
                        <a href="mailto:<?php the_field('email', 'option'); ?>"
                           class=" block md:mb-4 mb-3 underline hover:no-underline">
                            <?php the_field('email', 'option'); ?>
                        </a>
                        <p>
                            <?php the_field('address', 'option'); ?>
                        </p>
                    </div>
                    <p class="text-grey-900/50">
                        <?php the_field('schedulle', 'option'); ?>
                    </p>
                </div>
                <?php get_template_part('/template-parts/socials', null, array('icon-size' => 58)); ?>
            </div>
        <?php endif; ?>
    </div>
</form>