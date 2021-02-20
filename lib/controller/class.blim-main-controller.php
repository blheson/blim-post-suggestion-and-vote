<?php

namespace Controller;

use View\Suggestion\Suggestion_Main as Suggestion;
use Controller\Blim_Admin_Controller as Admin;
use Controller\Blim_Option_Controller as Option;
use Controller\Blim_Export_Controller as export;
use Controller\Blim_Vote_Controller as vote;

use WP_Post;

class Blim_Main_Controller
{
    function __construct()
    {
        $this->activate_add_action();
        $this->activate_filter_action();
    }

    /**
     * Enqueue all styles and assets
     */
    function enqueue_action(): void
    {
        wp_enqueue_style(PLUGIN_NAME . 'main_style', BLIM_MAINSTYLE_PATH, array(), VER, 'all');
        wp_enqueue_script(PLUGIN_NAME . '_main_js', BLIM_MAINSCRIPT_PATH, array(), VER, 'all');
        wp_localize_script(
            PLUGIN_NAME . '_main_js',
            'ajax_object',
            array('ajax_url' => admin_url('admin-ajax.php'), 'post_id' => get_the_ID())
        );
    }

    /**
     * Activate hook action
     */
    function activate_add_action()
    {
        if (is_admin()) { // admin actions
            add_action('admin_menu', array('Controller\Blim_Option_Controller', 'blim_register_option_page'));
            // add_action('admin_menu', array('Controller\Blim_Admin_Controller', 'admin_menu'));



            // add_action('admin_init', array('Controller\Blim_Option_Controller', 'blim_register_settings'));
            add_action('wp_ajax_update_vote_count', array('Controller\Blim_Vote_Controller', 'update'));
            add_action('wp_ajax_nopriv_update_vote_count', array('Controller\Blim_Vote_Controller', 'update'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_action'));
        } else {
            // non-admin enqueues, actions, and filters
            add_action('wp_enqueue_scripts', array($this, 'enqueue_action'));
        }

        add_action('init', array('Controller\Blim_Option_Controller', 'blim_register_settings'));

        add_action('init', array($this, 'set_ajax_data'));

        register_activation_hook(BLIM_FILE, array('Activator\Blim_Activator', 'plugin_activation'));
        /**
         * The code that runs during plugin deactivation.
         * This action is documented activator/class.blim-activator.php
         */

        register_deactivation_hook(BLIM_FILE, array('Activator\Blim_Activator', 'plugin_deactivation'));
    }
    function set_ajax_data()
    {
    //    var_dump( wp_localize_script(
    //         PLUGIN_NAME . '_main_js',
    //         'ajax_object',
    //         array('ajax_url' => admin_url('admin-ajax.php'), 'post_id' => get_the_ID())
    //     ));
        // echo 'here';
    }
    /**
     * Filter hook
     */
    function activate_filter_action(): void
    {
        add_filter('the_content', array($this, 'show_feature'));
    }
    /**
     * Render feature to users
     * @param string $content
     */
    function show_feature($content): string
    {
        $options = get_option('blim_options');
        $blim_content = '';
        if (in_array($options['feature'], ['both', 'suggestion']))
            $blim_content .= $this->get_post_sibling();
        if (in_array($options['feature'], ['both', 'vote']))
            $blim_content .= vote::show(get_the_ID());
        return $content . $blim_content;
    }
    /**
     * Get similar post
     * @param string $content
     * @return string
     */
    function get_post_sibling($content = '')
    {
        if (is_single() && !empty($GLOBALS['post'])) {
            $current_post_id = get_the_ID();
            if ($GLOBALS['post']->ID == $current_post_id) {

                $content .= $this->generate(get_the_category()[0]->term_id, $current_post_id);
            }
        }
        return $content;
    }
    /**
     * Conjure a new view from post category
     * @param int $cat_id Category id
     * @param int $current_post_id Current post id
     */
    function generate(int $cat_id, int $current_post_id)
    {
        $args = array(
            'numberposts'   => 1,
            'category'         =>  $cat_id,
            'order'            => 'DESC',
            'exclude' => $current_post_id
        );
        $sibling_post = get_posts($args)[0];
        if (is_null($sibling_post))
            return '';
        $permalink = get_permalink($sibling_post);
        $sibling_post->permalink = $permalink ? $permalink : $sibling_post->guid;
        $thumbnail = get_the_post_thumbnail_url($sibling_post);
        $sibling_post->image = $thumbnail ? $thumbnail : BLIM_DEFAULT_IMAGE;
        return export::suggestion($sibling_post);
    }
}
