<?php

/**
 * This is where all the classes are loaded
 */
//activator
require_once BLIM_ACTIVATOR_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-activator.php';

//model
require_once BLIM_MODEL_PATH .
    DIRECTORY_SEPARATOR . 'class-wpdb.php';

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
    'class.blim-vote-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-main-controller.php';

//view
require_once BLIM_SUGGESTIONVIEW_PATH .
    DIRECTORY_SEPARATOR . 'suggestion_main.php';
require_once BLIM_VOTEVIEW_PATH .
    DIRECTORY_SEPARATOR . 'vote_main.php';
    
//Ajax
require_once BLIM_AJAX_PATH .
    DIRECTORY_SEPARATOR . 'update-vote.php';