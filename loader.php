<?php

/**
 * This is where all the classes are loaded
 */
//controller class
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-export-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-admin-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-option-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-main-controller.php';

//view
require_once BLIM_SUGGESTIONVIEW_PATH .
    DIRECTORY_SEPARATOR . 'suggestion_main.php';

    // require_once BLIM_ADMINVIEW_PATH .
    // DIRECTORY_SEPARATOR . 'AdminMain.php';