<?php

namespace Activator;

class Blim_Activator
{
    function plugin_activation()
    {
        add_option('blim_options', ['feature' => 'both', 'voteup' => 0, 'votedown' => 0]);
    }
    function plugin_deactivation()
    {
        delete_option('blim_options');
    }
}
