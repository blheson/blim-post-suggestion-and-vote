<?php

use Controller\Blim_Vote_Controller as vote;

if (!isset($_GET['voteup'])) return;

$voteup = (int) $_GET['voteup'];
$votedown = (int) $_GET['votedown'];
try {
    header('Content-type: application/json');
    $result = vote::update('', $voteup, $votedown);
    echo json_encode(['data' => $result]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->message]);
}
