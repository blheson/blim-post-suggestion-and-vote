<?php

namespace Controller;

use View\Suggestion as Suggestion;
use WP_Post;

class BlimMainController
{
    function __construct()
    {
        $this->activate_add_action();
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
