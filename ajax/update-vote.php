<?php

use Controller\Blim_Vote_Controller as vote;

if(!isset($_GET['voteup'])) return;

$voteup = (int) $_GET['voteup'];
$votedown = (int) $_GET['votedown'];
vote::update(get_the_ID(), serialize(['voteup' => $voteup, 'votedown' => $votedown]));
