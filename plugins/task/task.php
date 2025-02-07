<?php
/**
 * Plugin Name: Noor's Task
 * Plugin URI:  #
 * Description: Plugin Created for task.
 * Version:     1.0.0
 * Author:      Noor ur Rehman
 * Author URI:  #
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: noors-task
 * Domain Path: /languages
 */

 if (!defined('ABSPATH')) {
    exit;
}
// Register activation hook
register_activation_hook(__FILE__, 'damascus_activate');
function damascus_activate() {
    noor_task_register_project_posttype();
    flush_rewrite_rules();
}

// Register deactivation hook
register_deactivation_hook(__FILE__, 'damascus_deactivate');
function damascus_deactivate() {
    unregister_post_type('damascus_product');
    flush_rewrite_rules();
}


if(!defined('NOORS_TASK_PLUGIN_FILE')) {
    define( 'NOORS_TASK_PLUGIN_FILE', __FILE__ );
}
if(!defined('NOORS_PLUGIN_PATH')) {
    define( "NOORS_PLUGIN_PATH", plugin_dir_path(__FILE__) );
}
if(!defined('NOORS_ASSETS_PATH')) {
    define( "NOORS_ASSETS_PATH", plugins_url( 'assets/', __FILE__ ) );
}
require NOORS_PLUGIN_PATH.'plugin-loader.php';
