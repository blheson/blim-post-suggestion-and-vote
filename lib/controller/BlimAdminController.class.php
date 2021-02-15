<?php

namespace Controller;
use Controller\BlimExportController;
class BlimAdminController
{

    static function admin_menu()
    {
        // Top-level WP Migration menu
        add_menu_page(
            'Blim Page Modifier',
            'Blim Page Modifier',
            'export',
            'blim_modify',
            'Controller\BlimExportController::admin',
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
