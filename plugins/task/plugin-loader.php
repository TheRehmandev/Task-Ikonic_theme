<?php

/**
 * @category   Class
 * @package    Noor Task
 * @subpackage WordPress
 * @since      1.0.0
 * php version 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}
final class NOORTASK
{

    public function __construct()
    {
        function noor_task_register_project_posttype()
        {
            include_once NOORS_PLUGIN_PATH . 'inc/project.php';
            register_post_type('project', $args);
        }

        add_action('init', 'noor_task_register_project_posttype');

        function noor_task_register_project_type_taxonomy()
        {
            include_once NOORS_PLUGIN_PATH . 'inc/project-taxonomy.php';
            register_taxonomy('projecttype', array('project'), $args);
        }

        add_action('init', 'noor_task_register_project_type_taxonomy');

        require_once NOORS_PLUGIN_PATH . 'inc/ajax-handlers.php';
        require_once NOORS_PLUGIN_PATH . 'inc/hs-coffee.php';
        require_once NOORS_PLUGIN_PATH . 'inc/kanye-quotes.php';

        function noor_task_enqueue_ajax_projects()
        {
            wp_enqueue_script('task-project-ajax', plugin_dir_url(__FILE__) . 'inc/js/ajax-scripts.js', array('jquery'), null, true);

            wp_localize_script('task-project-ajax', 'ajax_object', array(
                'ajax_url' => admin_url('admin-ajax.php')
            ));
        }
        add_action('wp_enqueue_scripts', 'noor_task_enqueue_ajax_projects');
    }
}
new NOORTASK();
