<?php

namespace Controller;

use Controller\Blim_Export_Controller;

class Blim_Option_Controller
{
    function __controller()
    {
    }

    function plugin_activation()
    {
        // delete_option('Blim_Options');
        add_option('blim_options', ['feature' => 'both']);
    }
    function plugin_deactivation()
    {
        delete_option('blim_options');
    }
    function blim_register_option_page()
    {
        add_options_page('Blim settings', 'Blim Menu', 'manage_options', 'blim_option_settings', 'Controller\Blim_Export_Controller::plugin_options_page');
    }
    static function plugin_setting_field()
    {
        $options = get_option('blim_options');
        $name ="blim_options[feature]";
      
        echo "<input id='blim_options_check' name=\"{$name}\" type='hidden' value='{$options['feature']}' />";
    }
    static function plugin_section_text()
    {
    }
    // function blim_feature_update(){
    //     echo' yea';
    // }
    static function blim_register_settings()
    {
        register_setting('blim_options_group', 'blim_options');
        add_settings_section('plugin_main', '', 'Controller\Blim_Option_Controller::plugin_section_text', 'blim_option_settings');

        add_settings_field('blim_options_check', '', 'Controller\Blim_Option_Controller::plugin_setting_field', 'blim_option_settings', 'plugin_main');
    }
}