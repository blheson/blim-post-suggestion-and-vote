<?php

/**
 * This is where all the constants are defined
 */
// Basic constants
define('PLUGIN_NAME', 'BLIM');
define('VER', 'v1.0');
define('URL_SLASH', '/');

// Plugin Basename
define('BLIM_PLUGIN_BASENAME', basename(BLIM_FILE));

// Plugin Path & URL
define('BLIM_PATH', dirname(BLIM_FILE));
define('BLIM_URL', plugin_dir_url(BLIM_FILE));

// ===================
// = Top Paths =
// ===================
define('BLIM_LIB_PATH', BLIM_PATH . DIRECTORY_SEPARATOR . 'lib');
define('BLIM_ASSETS_PATH', BLIM_URL . 'assets');

// ===================
// = Controller Path =
// ===================
define('BLIM_CONTROLLER_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'controller');

// ===================
// = Vendor Path =
// ===================
define('BLIM_VENDOR_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor');
define('BLIM_BANDARVENDOR_PATH', BLIM_VENDOR_PATH . DIRECTORY_SEPARATOR . 'bandar');

// ===================
// = View Path =
// ===================
define('BLIM_VIEW_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'view');
define('BLIM_SUGGESTIONVIEW_PATH', BLIM_VIEW_PATH . DIRECTORY_SEPARATOR . 'suggestion');

// ===================
// = CSS Path =
// ===================
define('BLIM_ASSETSCSS_PATH', BLIM_ASSETS_PATH . URL_SLASH . 'css');
define('BLIM_MAINSTYLE_PATH', BLIM_ASSETSCSS_PATH . URL_SLASH . 'blim_mainstyle.css');

// ===================
// = IMAGE Path =
// ===================
define('BLIM_ASSETSIMG_PATH', BLIM_ASSETS_PATH . URL_SLASH . 'img');
define('BLIM_DEFAULT_IMAGE', BLIM_ASSETSIMG_PATH . URL_SLASH . 'default.jpg');
