<?php

if (!defined('ABSPATH')) {
    exit; 
}

add_action('wp_ajax_get_projects', 'get_projects_ajax_handler');
add_action('wp_ajax_nopriv_get_projects', 'get_projects_ajax_handler');

function get_projects_ajax_handler()
{
    if (is_user_logged_in()) {
        $posts_per_page = 6;
    } else {
        $posts_per_page = 3;
    }

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'projecttype',
                'field'    => 'slug',
                'terms'    => 'architecture',
            ),
        ),
    );
    $query = new WP_Query($args);

    $response = array('success' => true, 'data' => array());

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $response['data'][] = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'link'  => get_permalink(),
            );
        }
    }

    wp_reset_postdata();

    wp_send_json($response);
}