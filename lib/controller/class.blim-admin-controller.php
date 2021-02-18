<?php

namespace Controller;
use Controller\Blim_Export_Controller;
class Blim_Admin_Controller
{

    static function admin_menu()
    {
        // Top-level WP Migration menu
        add_menu_page(
            'Blim Page Modifier',
            'Blim Page Modifier',
            'export',
            'blim_modify',
            'Controller\Blim_Export_Controller::plugin_options_page',
            '',
            '77.295'
        );
    }
}
