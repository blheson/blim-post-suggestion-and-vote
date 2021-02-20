<?php
$setInputIntofield = '';
if (function_exists('settings_fields'))
    $setInputIntofield = settings_fields('blim_options_group');
   // $set = settings_fields('blim_options_group');
        // $nonce = wp_create_nonce( 'my-action_'.get_the_ID());
        
/**
 * Show view
 * @param array $vote_data
 * @return string
 */
function vote_show($vote_data)
{
    global $setInputIntofield;
?>

    <div class="voting-box">
        <p>Was this helpful?</p>
        <span id="vote-up" class="blim-vote blim-vote-up">Up: <span class="vote-number"><?= $vote_data['voteup'] ?> </span></span>
        <span id="vote-down" class="blim-vote blim-vote-down">Down <span class="vote-number"><?= $vote_data['votedown']  ?></span></span>
    </div>
    <input type="hidden" name="voteup" value="<?= $vote_data['voteup'] ?>">
    <input type="hidden" name="votedown" value="<?= $vote_data['votedown'] ?>">
    <input id='ajax_vote_uri' name='' type='hidden' value='<?= BLIM_AJAX_URI.'/update-vote.php' ?>' />
    <?= $setInputIntofield ?>
    </form>
<?php
}
