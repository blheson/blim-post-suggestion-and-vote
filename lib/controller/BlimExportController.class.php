<?php

namespace Controller;

use WP_Post;
use View\Suggestion\SuggestionMain;
use View\Admin\AdminMain;

class BlimExportController
{
    /**
     * Render suggested post into view
     * @param WP_Post $sibling_post
     * @return string
     */
    static function suggestion(WP_Post $sibling_post)
    {
        return SuggestionMain::show($sibling_post);
    }
    /**
     * Render suggested post into view
     * 
     * @return string
     */
    static function admin()
    {
        // echo BLIM_ADMINVIEW_PATH;
        ob_start();
        include BLIM_ADMINVIEW_PATH . '\AdminMain.php';
        echo ob_get_clean();
        // return AdminMain::dashboard();
    }
}
