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

        // // Sub-level Export menu
        // add_submenu_page(
        //     'ai1wm_export',
        //     __('Export', AI1WM_PLUGIN_NAME),
        //     __('Export', AI1WM_PLUGIN_NAME),
        //     'export',
        //     'ai1wm_export',
        //     'Ai1wm_Export_Controller::index'
        // );
    }
}
