<?php

namespace Controller;

use WP_Post;
use View\Suggestion\Suggestion_Main;

class Blim_Export_Controller
{
    /**
     * Render suggested post into view
     * @param WP_Post $sibling_post
     * @return string
     */
    static function suggestion( WP_Post $sibling_post )
    {
        return Suggestion_Main::show( $sibling_post );
    }
    /**
     * Render suggested post into view
     * @param array $vote_details
     * @return string
     */
    static function vote( $vote_data )
    {
        ob_start();
        vote_show( $vote_data );
        return ob_get_clean();
    }
    /**
     * Render suggested post into view
     * @return string
     */
    static function plugin_options_page()
    {
        ob_start();
        include_once BLIM_ADMINVIEW_PATH . '\admin_main.php';
        echo ob_get_clean();
    }
}
