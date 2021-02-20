<?php

namespace View\Vote;

class Vote_Main
{
    /**
     * Show view
     * @param array $vote_data
     * @return string
     */
    static function show($vote_data)
    {
        // $set = settings_fields('blim_options_group');
        // $nonce = wp_create_nonce( 'my-action_'.get_the_ID());
        return "
          
                <div>
                    <span class=\"blim-vote blim-vote-up\">Up: " . $vote_data['voteup'] . "</span>
                    <span class=\"blim-vote blim-vote-down\">Down " . $vote_data['votedown'] . "</span>
                </div>
                <input id='blim_votes' name='' type='hidden' value='' />
                ".$set ."
            </form>";
    }
}
