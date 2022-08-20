<?php
/**
 * Template Name: Блог
 */

$posts_cat = $_GET['cat'] ?? '';
$posts_search = $_GET['q'] ?? '';
$posts_page = $_GET['pg'] ?? 1;
$posts_args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'orderby' => 'date',
    's' => $posts_search,
    'category_name' => $posts_cat == 'all' ? '' : $posts_cat,
    'paged' => $posts_page,
);
$posts = query_posts($posts_args);

$cats_args = array(
    'hide_empty' => true,
    'hierarchical' => false,
);
$cats = get_categories($cats_args);

$posts_count = (int)wp_count_posts()->publish;

get_header();
?>
    <main class="relative z-10 container mb-4 grid gap-y-4 blog-page">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php get_template_part('/template-parts/breadcrumbs'); ?>

        <form class="grid grid-cols-3 gap-x-2 mb-8">
            <label for="search" class="block w-full">
                <input type="text"
                       placeholder="<?php esc_attr_e('Поиск по статьям', 'cd'); ?>"
                       class="bg-white border border-solid border-grey-400 rounded-10 py-2.5 block px-7 w-full"
                       name="s"
                       id="search">
            </label>
            <label for="cat" class="block w-full">
                <select name="cat" id="cat">
                    <option value="all">Все направления</option>
                    <?php foreach ($cats as $cat) : ?>
                        <option value="<?php esc_attr_e($cat->slug); ?>"><?php esc_html_e($cat->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <button type="reset"
                    class="w-full block text-white bg-green-600 hover:bg-green-700 shadow-btn transition-all duration-300 font-medium text-xl tracking-small text-center rounded-10 posts-reset">
                <?php esc_html_e('Сбросить'); ?>
            </button>
        </form>

        <div class="posts-container">
            <?php if (count($posts)) : ?>
                <div class="grid grid-cols-3 gap-x-2 gap-y-4 grid-rows-blog-posts">
                    <?php while (have_posts()) : the_post();
                        $post_cat_ID = wp_get_post_categories($post->ID)[0];
                        $post_cat = get_the_category_by_ID($post_cat_ID);
                        ?>

                        <?php $list_img = get_field('list-img'); ?>
                        <div class="group shadow-block relative">
                            <a href="<?php esc_attr_e(get_permalink()); ?>"
                               class="absolute inset-0 z-20"></a>
                            <div class="rounded-30 relative z-10 bg-white h-full overflow-hidden grid grid-rows-blog-post">
                                <div class="relative pl-9 pr-6 pb-14.5 flex flex-col overflow-hidden justify-end">
                                    <div class="absolute z-10 bg-cover bg-center inset-0 transition-all duration-300 group-hover:scale-105"
                                         style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 60%),
                                                 url('<?php echo esc_url($list_img['url']); ?>');"></div>
                                    <p class="text-white font-semibold tracking-tight text-xl relative z-20">
                                        <?php esc_html_e($post_cat); ?>
                                    </p>
                                </div>
                                <div class="pt-5 pl-11 pb-8 pr-6 flex flex-col justify-between">
                                    <div>
                                        <p class="font-semibold tracking-tight text-2.9xl leading-huge mb-3.5 group-hover:underline">
                                            <?php the_title(); ?>
                                        </p>
                                    </div>
                                    <p class="hover:underline font-medium tracking-small">
                                        <?php esc_html_e('Подробнее →'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
            <?php else : ?>
                <p>Ничего не найдено</p>
            <?php endif; ?>
        </div>
    </main>

<?php
get_footer();
