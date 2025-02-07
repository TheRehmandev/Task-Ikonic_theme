<?php

/**
 * The template for displaying Project archive 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noors-task
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $paged = max(1, get_query_var('paged', get_query_var('page', 1)));
    $args = array(
        'post_type'      => 'project',
        'paged'          => $paged,
        'posts_per_page' => 6,
    );
    $loop = new WP_Query($args);
    ?>
    <?php if ($loop->have_posts()) : ?>

        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header><!-- .page-header -->
        <div class="project-wrapper">
        <?php
        while ($loop->have_posts()) :
            $loop->the_post();
            get_template_part('template-parts/content', get_post_type());
        endwhile;
        ?>
        </div>

        <div class="wp-pagenavi row">
            <div id="wp_page_numbers text-center col-sm-6 center-margin">
                <?php if ($loop->max_num_pages > 1) : ?>
                    <ul>
                        <?php if (get_previous_posts_link()) : ?>
                            <li><?php previous_posts_link('Previous Page'); ?></li>
                        <?php endif; ?>

                        <?php if (get_next_posts_link('', $loop->max_num_pages)) : ?>
                            <li><?php next_posts_link('Next Page', $loop->max_num_pages); ?></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

    <?php else : ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>

    <?php wp_reset_postdata(); 
    ?>
</main>

<?php
get_sidebar();
get_footer();
