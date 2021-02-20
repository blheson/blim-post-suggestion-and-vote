<?php

namespace Activator;

class Blim_Activator
{
    /**
     * Run when plugin is activated
     * @return void
     * 
     */
    function plugin_activation()
    {
        add_option('blim_options', ['feature' => 'both']);
    }
    /**
     * Run when plugin is deactivated
     * @return void
     */
    function plugin_deactivation()
    {
        delete_option('blim_options');
    }
}
