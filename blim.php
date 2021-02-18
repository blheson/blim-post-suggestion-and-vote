<?php
/*
 * Plugin Name: Blim
 * Plugin URI: https://businesstosales.com/
 * Description: Suggest next post based on user current posts
 * Author: Udor Blessing
 * Author URI: https://udorblessinf.com/
 * Version: 1.0
 * Text Domain: blim
 * Text Path: /blessing
 * Network: True
 * */
// If this file is called directly, abort.
// if (!defined('WPINC')) {
   // die;
// }
define('BLIM_FILE', __FILE__);

//constants 
require_once dirname(BLIM_FILE) . DIRECTORY_SEPARATOR . 'constant.php';

// Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
if (version_compare(PHP_VERSION, MIN_PHP, '<')) {
    deactivate_plugins(plugin_basename(BLIM_FILE));
    wp_die('This plugin requires a minimum PHP Version of ' . MIN_PHP);
}
// loader
require_once dirname(BLIM_FILE) . DIRECTORY_SEPARATOR . 'loader.php';


// =========================================================================
// = All app initialization is done in BlimMainController __constructor =
// =========================================================================
// Check the minimum required PHP version and run the plugin.
if (version_compare(PHP_VERSION, MIN_PHP, '>=')) {
    $main_controller = new Controller\Blim_Main_Controller();
}
