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
            <?php if (count($posts)) :
                get_template_part('/template-parts/posts-list', null, array('posts' => $posts));
            else : ?>
                <p>Ничего не найдено</p>
            <?php endif; ?>
        </div>
    </main>

<?php
get_footer();
