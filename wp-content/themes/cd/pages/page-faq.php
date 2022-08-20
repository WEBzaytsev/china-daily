<?php
/**
 * Template Name: FAQ
 */

get_header();
?>

    <main class="relative z-10 container grid gap-y-4 mb-4">
        <?php get_template_part('/template-parts/main-banner'); ?>

        <?php if (have_rows('questions')) : ?>
            <div class="accordion grid gap-y-2"
                 id="accordionExample5">
                <?php
                $question_count = 0;
                while (have_rows('questions')) : the_row(); ?>
                    <div class="bg-white border border-grey-200 rounded-30 overflow-hidden">
                        <p class="mb-0"
                           id="heading<?php echo $question_count; ?>">
                            <button class="relative flex items-center w-full py-3 px-7 text-left border-0 rounded-none transition text-white text-xl font-semibold focus:outline-none <?php echo $question_count == 0 ? '' : 'collapsed'; ?>"
                                    style="background-color: <?php the_sub_field('color') ?>;"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="<?php esc_attr_e(
                                        sprintf('#collapse%s', $question_count)
                                    ); ?>"
                                    aria-expanded="<?php esc_attr_e($question_count == 0); ?>"
                                    aria-controls="<?php esc_attr_e(
                                        sprintf('collapse%s', $question_count)
                                    ); ?>">
                                <?php the_sub_field('question'); ?>
                            </button>
                        </p>
                        <div id="collapse<?php echo $question_count; ?>"
                             class="<?php esc_attr_e(
                                 sprintf(
                                     'accordion-collapse collapse %s',
                                     $question_count == 0 ? 'show' : ''
                                 )
                             ); ?>"
                             aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <p class="p-7 font-medium text-grey-900/60 tracking-small">
                                <?php the_sub_field('answer'); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    $question_count++;
                endwhile; ?>
            </div>
        <?php endif; ?>

        <?php get_template_part('/template-parts/feedback-btn') ?>
    </main>

<?php
get_footer();

function bg_class($color_name): string
{
    $color = $color_name;

    if ($color == 'grey' || $color == 'green') {
        $color .= '-600';
    }

    return 'bg-' . $color;
}