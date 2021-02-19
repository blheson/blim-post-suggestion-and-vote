<?php

// $setInputIntofield = settings_fields('blim_options_group');
// $setInputIntofield = '';
/**
 * Show view
 * @param array $vote_data
 * @return string
 */
function vote_show ($vote_data)
{
    global $setInputIntofield;
?>

    <!-- // $set = settings_fields('blim_options_group');
        // $nonce = wp_create_nonce( 'my-action_'.get_the_ID());
         -->

    <div>
        <p>Was this helpful?</p>
        <span class="blim-vote blim-vote-up">Up: <span class="vote-number"><?= $vote_data['voteup'] ?> </span></span>
        <span class="blim-vote blim-vote-down">Down <span class="vote-number"><?= $vote_data['votedown']  ?></span></span>
    </div>
    <input id='blim_votes' name='' type='hidden' value='' />
    <?= $setInputIntofield ?>
    </form>
    
<?php
}
