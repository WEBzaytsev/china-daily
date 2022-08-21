<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package china-daily
 */

get_header();
?>

    <main class="relative z-10 container grid gap-y-4 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <?php
        while (have_posts()) :
            the_post();

            the_content();

        endwhile;
        ?>

        <div class="bg-orange rounded-15 w-full px-7 py-3 text-white font-semibold">
            <?php esc_html_e('Читайте также'); ?>
        </div>

        <?php
        $posts_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
        );
        $posts = query_posts($posts_args);
        ?>

        <?php if (count($posts)) {
            get_template_part('/template-parts/posts-list', null, array('posts' => $posts));
        } ?>
    </main>

<?php
get_footer();
