<?php

namespace Controller;

use View\Suggestion\SuggestionMain as Suggestion;
use Controller\Blim_Admin_Controller as Admin;
use Controller\Blim_Option_Controller as Option;

use WP_Post;

class Blim_Main_Controller
{
    function __construct()
    {
        $this->activate_add_action();
        $this->activate_filter_action();
        $this->enqueue_action();
    }

    /**
     * Enqueue all styles and assets
     */
    function enqueue_action(): void
    {
        wp_enqueue_style(PLUGIN_NAME, BLIM_MAINSTYLE_PATH, array(), VER, 'all');
    }

    /**
     * Activate hook action
     */
    function activate_add_action()
    {
        if (is_admin()) { // admin actions
            add_action('admin_menu', array('Controller\Blim_Option_Controller', 'blim_register_option_page'));
            // add_action('admin_menu', array('Controller\Blim_Admin_Controller', 'admin_menu'));
            
            //
            add_action('admin_init', array('Controller\Blim_Option_Controller', 'blim_register_settings'));
            // submit form to admin post
            // add_action( 'admin_post_update', array('Controller\Blim_Option_Controller', 'blim_feature_update'));
        } else {
            // non-admin enqueues, actions, and filters
        }
        register_activation_hook(BLIM_FILE, array('Controller\Blim_Option_Controller', 'plugin_activation'));
        /**
 * The code that runs during plugin deactivation.
 * This action is documented inc/core/class-deactivator.php
 */

register_deactivation_hook( BLIM_FILE, array('Controller\Blim_Option_Controller', 'plugin_deactivation') );
    }
    function activate_filter_action()
    {
        $options = get_option('blim_options');
        if(in_array($options['feature'],['both','suggestion']))
        add_filter('the_content', array($this, 'get_post_sibling'));
    }

    /**
     * Get similar post
     * @param string $content
     * @return string
     */
    function get_post_sibling($content)
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
     * Render suggested post into view
     * @param WP_Post 
     * @return string
     */
    function render(WP_Post $sibling_post)
    {
        return Suggestion::show($sibling_post);
    }
    /**
     * COnjure a new view from post category
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
        $sibling_post->image = BLIM_DEFAULT_IMAGE;
        return $this->render($sibling_post);
    }
}
