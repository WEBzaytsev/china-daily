<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package china-daily
 */

?>

<footer class="footer relative z-10 container pb-24">
    <?php get_template_part('/template-parts/form'); ?>
    <div class="grid md:grid-cols-footer items-start mt-4 pt-5">
        <div class="font-medium text-sm max-w-[200px] md:order-1 order-2 md:mb-0 mb-11 xxx">
            <?php echo __(get_field('footer-info', 'option')); ?>
        </div>
        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_id' => 'footer-menu',
                    'container_class' => 'xl:ml-[114px] lg:ml-9 md:ml-4 md:order-2 order-1 md:mb-0 mb-11',
                    'menu_class' => 'flex flex-col gap-y-4.5 lg:max-h-[140px] md:max-h-[200px] flex-wrap',
                    'add_li_class' => 'relative w-fit before:block before:absolute before:bg-grey-900 before:bottom-0 before:left-1/2 before:w-full before:max-w-0 before:h-px before:-translate-x-1/2 before:transition-all before:duration-300 hover:before:max-w-full',
                    'link_class' => 'font-medium'
                )
            );
        }
        ?>
        <div class="flex flex-col h-full justify-between md:items-end font-medium order-3">
            <div>
                <a href="tel:<?php the_field('phone', 'option'); ?>" class="block mb-4.5">
                    <?php the_field('phone', 'option'); ?>
                </a>
                <a href="mailto:<?php the_field('email', 'option'); ?>" class="block">
                    <?php the_field('email', 'option'); ?>
                </a>
            </div>
            <div class="flex items-center">
                <a class="mr-3" href="#"><?php esc_html_e('Разработка сайта', 'cd'); ?></a>
                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18.1004" cy="18.1004" r="18.1004" fill="#333333"/>
                    <path d="M20.6228 13.9199V11.1478H19.2787C18.2841 11.1478 17.3836 11.3141 16.5772 11.6329C16.174 11.7992 15.7977 12.0071 15.4482 12.2428V11.1478H11.0264V13.9199H12.7602V23.0264H11.0264V25.7985H17.1686V23.0264H15.4482V18.4662C15.4482 17.6761 15.5423 16.9554 15.717 16.3594C15.8918 15.805 16.1337 15.3614 16.4428 15.001C17.0611 14.2803 18.0288 13.9199 19.2787 13.9199H20.6228Z"
                          fill="white"/>
                    <path d="M26.006 22.3333C25.0786 22.3333 24.3259 23.1095 24.3259 24.0659C24.3259 25.0223 25.0786 25.7985 26.006 25.7985C26.9334 25.7985 27.686 25.0223 27.686 24.0659C27.686 23.1095 26.9334 22.3333 26.006 22.3333Z"
                          fill="#FF0000"/>
                </svg>
            </div>
            <div class="flex items-center">
                <a target="_blank" class="mr-3" href="https://webzaytsev.ru/"><?php esc_html_e('with webzaytsev', 'cd'); ?></a>
                <svg width="37" height="37" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 394.9 395.79"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#528cff;}</style></defs><g id="Слой_2" data-name="Слой 2"><g id="Слой_1-2" data-name="Слой 1"><path class="cls-1" d="M-20.48,160.78h366.4a0,0,0,0,1,0,0V165a66.83,66.83,0,0,1-66.83,66.83H-87.31a0,0,0,0,1,0,0V227.6a66.83,66.83,0,0,1,66.83-66.83Z" transform="translate(-105.53 185.95) rotate(-54.1)"/><path class="cls-2" d="M115.81,164h366.4a0,0,0,0,1,0,0v4.23A66.83,66.83,0,0,1,415.38,235H49a0,0,0,0,1,0,0v-4.23A66.83,66.83,0,0,1,115.81,164Z" transform="translate(582.92 101.29) rotate(125.9)"/></g></g></svg>
            </div>
        </div>
    </div>
</footer>

</div>

<?php get_template_part('/template-parts/modal'); ?>
<?php wp_footer(); ?>

</body>
</html>
