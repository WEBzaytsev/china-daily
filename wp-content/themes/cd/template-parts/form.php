<?php
$is_modal = $args['is-modal'] ?? false;
$input_class = 'block w-full px-4.5 py-2.5 border border-solid border-grey-400 focus:border-grey-600 rounded-13 font-medium placeholder:text-grey-600 tracking-small leading-huge';
?>

<form class="bg-white rounded-30 pb-16.5 pt-17.5 px-13 w-full">
    <div class="mb-12 flex items-center justify-between">
        <div>
            <p class="font-semibold text-3.3xl tracking-tight -mb-2">
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
        <?php if ($is_modal) : ?>
            <?php $logo = get_field('logo', 'option'); ?>
            <?php if ($logo) : ?>
                <figure>
                    <img src="<?php echo esc_url($logo['url']); ?>"
                         alt="<?php echo esc_attr($logo['alt']); ?>"/>
                </figure>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="flex items-stretch">
        <div class="grid grid-cols-2 gap-x-2 gap-y-6 grow">
            <div class="grid gap-y-2">
                <label for="feedback-name" class="block w-full">
                    <input type="text"
                           id="feedback-name"
                           name="feedback-name"
                           placeholder="Имя"
                           class="<?php esc_attr_e($input_class); ?>">
                </label>
                <label for="feedback-phone" class="block w-full">
                    <input type="text"
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
                    class="col-start-1 col-end-3 bg-grey-900 rounded-13 text-center text-white tracking-small font-medium leading-huge py-2.5 shadow-btn transition-all duration-300 hover:bg-zinc-800">
                <?php esc_html_e('Отправить', 'cd'); ?>
            </button>
        </div>
        <?php if (!$is_modal) : ?>
            <div class="ml-18.5 flex flex-col justify-between">
                <div>
                    <a href="tel:<?php the_field('phone', 'option'); ?>"
                       class="font-semibold block tracking-tight leading-huge mb-4 text-3.3xl underline hover:no-underline">
                        <?php the_field('phone', 'option'); ?>
                    </a>
                    <a href="mailto:<?php the_field('email', 'option'); ?>"
                       class="font-semibold block tracking-tight leading-huge mb-4 text-3.3xl underline hover:no-underline">
                        <?php the_field('email', 'option'); ?>
                    </a>
                    <p class="font-semibold tracking-tight leading-huge mb-3.5 text-3.3xl">
                        <?php the_field('address', 'option'); ?>
                    </p>
                    <p class="text-grey-900/50">
                        <?php the_field('schedulle', 'option'); ?>
                    </p>
                </div>
                <?php get_template_part('/template-parts/socials', null, array('icon-size' => 58)); ?>
            </div>
        <?php endif; ?>
    </div>
</form>