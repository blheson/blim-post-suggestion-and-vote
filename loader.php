<?php

/**
 * This is where all the classes are loaded
 */
//controller class
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'BlimExportController.class.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'BlimAdminController.class.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'BlimMainController.class.php';

//view
require_once BLIM_SUGGESTIONVIEW_PATH .
    DIRECTORY_SEPARATOR . 'SuggestionMain.php';

    // require_once BLIM_ADMINVIEW_PATH .
    // DIRECTORY_SEPARATOR . 'AdminMain.php';