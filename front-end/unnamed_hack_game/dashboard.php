<?php

require_once 'C:\xampp\unnamed_hack_game\check_not_auth.php';
require_once 'C:\xampp\unnamed_hack_game\classes\Player.php';

$userID = $session->getSessionValue('user_id');

if (empty($userID)) {
	session_destroy();
	header('Location: /unnamed_hack_game/index.php');
}

$player = new Player($userID);

include_once 'C:\xampp\unnamed_hack_game\views\dashboard.php';