<?php
Namespace View\Suggestion;
use WP_Post;
class Suggestion_Main
{
    /**
     * Show view
     * @param WP_Post $sibling_post
     * @return string
     */
    static function show(WP_Post $sibling_post)
    {
    
            $title = $sibling_post->post_title;
            $title = strlen($title) > 30 ? substr($title, 0, 30).'...': $title;
        return '
            <section class="suggested_post">
               <a href="' . $sibling_post->permalink . '"> <div><img src="'.$sibling_post->image.'"></div>
                <div class="blim_title">' . $title . '</div>
               <button> view post</button></a>
                <small>Suggested post</small>
            </section>';
    }
}
