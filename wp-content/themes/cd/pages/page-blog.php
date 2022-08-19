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

        <form class="grid grid-cols-[repeat(2,_394px)] gap-x-2">
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
        </form>

        <?php if (count($posts)) : ?>
            <div class="grid grid-cols-3 gap-x-2 gap-y-4 grid-rows-[703px] posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <?php $list_img = get_field('list-img'); ?>
                    <div class="group shadow-block">
                        <div class="rounded-30 bg-white h-full overflow-hidden">
                            <div class="relative pl-9 pr-6 pb-14.5 flex flex-col h-[420px] overflow-hidden justify-end">
                                <div class="absolute z-10 bg-cover bg-center inset-0 transition-all duration-300 group-hover:scale-105"
                                     style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 60%),
                                             url('<?php echo esc_url($list_img['url']); ?>');"></div>
                                <p class="text-white font-semibold tracking-tight text-xl relative z-20 group-hover:underline">
                                    <?php the_title(); ?>
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
    </main>

<?php
get_footer();
