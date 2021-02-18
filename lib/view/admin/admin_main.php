<?php

$options = get_option('blim_options');
$option = $options['feature'];

?>

<div class="wrap">
    <div class="blim_dashboard_box">
        <h2><?= _e('Thank you for installing Blim post modifier') ?></h2>
    </div>
    <div class="row2">
        <div class="blim_dashboard_box">
            <h2><?= _e('Toggle Blim Feature') ?></h2>
            <div>
                <div class="group_input">
                    <label for="">
                        <input type="checkbox" name="showsuggestion" value="suggestion" <?= ($option == 'both' || $option == 'suggestion') ? 'checked' : '' ?>><?= _e('Show Post Suggestion') ?></label>
                </div>
                <div class="group_input">
                    <label for="">
                        <input type="checkbox" name="vote" value="vote" <?= ($option == 'both' || $option == 'vote') ? 'checked' : '' ?>><?= _e('Vote') ?></label>
                </div>
                <!-- admin_url('options.php') -->
                <form action='options.php' method="post">
                    <?php settings_fields('blim_options_group'); ?>
                    <div class="">
                        <input id='blim_options_check' name="blim_options[feature]" type='hidden' value=<?= $option ?> />
                        <?php
                        // do_settings_sections('blim_option_settings');
                        submit_button(); ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="blim_dashboard_box" style="background-color:#fff">
        </div>
    </div>
</div>