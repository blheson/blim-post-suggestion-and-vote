<?php

namespace Controller;

use Controller\Blim_Export_Controller as export;

class Blim_Vote_Controller
{
    static function get_votes()
    {
        $votes = get_option('blim_options');
        return export::vote($votes);
    }
}
