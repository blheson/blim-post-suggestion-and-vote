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
        return "
            <form>
                <div>
                    <span class=\"blim-vote blim-vote-up\">Up: " . $vote_data['voteup'] . "</span>
                    <span class=\"blim-vote blim-vote-down\">Down " . $vote_data['votedown'] . "</span>
                </div>
                <input id='blim_votes' name='' type='hidden' value='' />
                ".settings_fields('blim_options_group')."
            </form>";
    }
}
