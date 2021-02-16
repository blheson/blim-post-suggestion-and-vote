<?php

$options = get_option('blim_options');
$options = $options['feature'];
?>
<style>

</style>
<div class="container wrap">
    <div class="blim_dashboard_box">
        <h2><?= _e('Thank you for installing Blim post modifier') ?></h2>
    </div>
    <div class="row2">
        <div class="blim_dashboard_box">
            <h2><?= _e('Toggle Blim Feature') ?></h2>
            <div>
                <div class="group_input">
                    <label for="">
                        <input type="checkbox" name="showsuggestion" value="suggestion" <?= ($options == 'both' || $options == 'suggestion') ? 'checked' : '' ?>><?= _e('Show Post Suggestion') ?></label>
                </div>
                <div class="group_input">
                    <label for="">
                        <input type="checkbox" name="vote" value="vote" <?= ($options == 'both' || $options == 'vote') ? 'checked' : '' ?>><?= _e('Vote') ?></label>
                </div>
                <!-- admin_url('options.php') -->
                <form action='options.php' method="post">
                    <?php settings_fields('blim_options_group');?>
                    <div class="">
                        <?php
                        do_settings_sections('blim_option_settings');
                        submit_button(); ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="blim_dashboard_box" style="background-color:#fff">
        </div>
    </div>
</div>
<script>
    let suggestion = document.querySelector('input[name=showsuggestion]');
    let vote = document.querySelector('input[name=vote]');
    let last = document.querySelector('input#blim_options_check');
    suggestion.addEventListener('change', (e) => {
        if (last.value == 'vote' && vote.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && vote.checked == true)
            last.value = 'vote';
        else if (last.value == 'none' && vote.checked == false)
            last.value = 'suggestion';
        else
            last.value = 'none';
    })
    vote.addEventListener('change', (e) => {
        if (last.value == 'suggestion' && suggestion.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && suggestion.checked == true)
            last.value = 'suggestion';
        else if (last.value == 'none' && suggestion.checked == false)
            last.value = 'vote';
        else
            last.value = 'none';

    })
</script>