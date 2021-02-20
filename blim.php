<?php
/**
 * @package Blim
 * 
 * Plugin Name: Blim
 * Plugin URI: https://businesstosales.com/
 * Description: Suggest next post based on user current posts
 * Author: Udor Blessing
 * Author URI: https://udorblessing.com/
 * Version: 1.0.0
 * Text Domain: blim-plugin
 * Text Path: blessing
 * Network: True
 * License: GPLv2 or later
 * */

//If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'Normal humans go through the door' );

define( 'BLIM_FILE', __FILE__ );
define('MIN_PHP', '5.6.0');


// Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
if ( version_compare( PHP_VERSION, MIN_PHP, '<' ) ) {
    deactivate_plugins( plugin_basename( BLIM_FILE ) );
    wp_die( 'This plugin requires a minimum PHP Version of ' . MIN_PHP );
}
// loader
require_once dirname( BLIM_FILE ) . DIRECTORY_SEPARATOR . 'loader.php';


// =========================================================================
// = All app initialization is done in BlimMainController __constructor =
// =========================================================================
// Check the minimum required PHP version and run the plugin.
if (version_compare(PHP_VERSION, MIN_PHP, '>=')) {
    $main_controller = new Controller\Blim_Main_Controller();
}
