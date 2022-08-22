<?php
$posts = $args['posts'];
$posts_count = count($posts);
?>

<!--    <div class="md:grid-rows-blog-posts-1 md:grid-rows-blog-posts-2 md:grid-rows-blog-posts-3">-->
<div class="grid md:grid-cols-3 gap-x-2 md:gap-y-4 gap-y-2.5 md:grid-rows-blog-posts-<?php echo set_rows($posts_count, 3); ?>">
    <?php while (have_posts()) :
        the_post();
        get_template_part('/template-parts/posts-list-item', null, array('post' => $post));
    endwhile;
    wp_reset_query(); ?>
</div>