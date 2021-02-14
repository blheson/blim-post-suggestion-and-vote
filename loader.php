<?php
/**
 * This is where all the classes are loaded
 */
//controller class
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'BlimMainController.class.php';

//vendor
require_once BLIM_BANDARVENDOR_PATH .
    DIRECTORY_SEPARATOR . 'lib'
    .
    DIRECTORY_SEPARATOR .
    'Bandar.php';

//view
require_once BLIM_SUGGESTIONVIEW_PATH .
    DIRECTORY_SEPARATOR . 'show.view.php';
