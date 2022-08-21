<?php
$posts = $args['posts'];
$posts_count = count($posts);
?>

<!--    <div class="grid-rows-blog-posts-1 grid-rows-blog-posts-2 grid-rows-blog-posts-3">-->
<div class="grid grid-cols-3 gap-x-2 gap-y-4 grid-rows-blog-posts-<?php echo set_rows($posts_count, 3); ?>">
    <?php while (have_posts()) :
        the_post();
        get_template_part('/template-parts/posts-list-item', null, array('post' => $post));
    endwhile;
    wp_reset_query(); ?>
</div>