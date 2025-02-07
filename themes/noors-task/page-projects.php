<?php
/**
 * Template Name: Architecture Projects
 * Description: A custom template to display latest "Architecture" projects via AJAX.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <h1>Latest Architecture Projects</h1>
    <button id="fetch-projects">Load Projects</button>
    <div id="project-list"></div>
</main>

<?php get_footer(); ?>
