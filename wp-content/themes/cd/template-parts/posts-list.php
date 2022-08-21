<?php
$posts = $args['posts'];
?>

<div class="grid grid-cols-3 gap-x-2 gap-y-4 grid-rows-blog-posts">
    <?php while (have_posts()) :
        the_post();
        get_template_part('/template-parts/posts-list-item', null, array('post' => $post));
    endwhile;
    wp_reset_query(); ?>
</div>