<?php

    /**
     * Show view
     * @param WP_Post $sibling_post
     * @return string
     */
    function suggestion_show( $sibling_post )
    {
            $title = $sibling_post->post_title;
            $title = strlen( $title ) > 30 ? substr( $title, 0, 30 ).'...': $title;
        ?>
            <section class="suggested_post">
               <a href="<?= $sibling_post->permalink ?>" class="suggest_row"> 
                    <div>
                        <img src="<?=$sibling_post->image?>"></div>
                    <div>
                        <div class="blim_title"><?= $title ?></div>
                        <button>Check it out</button>
                    </div>
                </a>
                <small style="font-size: 0.6em;">Suggested post</small>
            </section>
    <?php }
