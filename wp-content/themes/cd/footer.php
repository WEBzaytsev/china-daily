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
                <a target="_blank" class="mr-3" href="https://webzaytsev.ru/"><?php esc_html_e('with webzaytsev', 'cd'); ?></a>
            </div>
        </div>
    </div>
</footer>

</div>

<?php get_template_part('/template-parts/modal'); ?>
<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   var z = null;m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(90099584, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/90099584" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
