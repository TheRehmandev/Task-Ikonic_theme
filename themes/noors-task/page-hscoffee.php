<?php

/**
 * Template Name: HS Coffee
 * Description: A Template to display random coffee image.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="center">
        <?php
        echo '<img src="' . hs_give_me_coffee() . '" alt="Random Coffee" class="coffee-img">';
        ?>
    </div>

</main>

<?php get_footer(); ?>