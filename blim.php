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
define('BLIM_FILE',__FILE__);

//constants 
require_once dirname(BLIM_FILE) . DIRECTORY_SEPARATOR . 'constant.php';

// loader
require_once dirname(BLIM_FILE) . DIRECTORY_SEPARATOR . 'loader.php';
// =========================================================================
// = All app initialization is done in BlimMainController __constructor =
// =========================================================================
$main_controller = new Controller\BlimMainController();

