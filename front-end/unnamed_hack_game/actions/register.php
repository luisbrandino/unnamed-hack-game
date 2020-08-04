<?php

require_once 'C:\xampp\unnamed_hack_game\check_auth.php';

require_once '../../../unnamed_hack_game/classes/Session.php';
require_once '../../../unnamed_hack_game/classes/Database.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('Location: /unnamed_hack_game/index.php');
}

$db = new Database();

$flashResult = $db->registerUser($_POST['username'], $_POST['email'], $_POST['password']);

$session->setSessionValue('flash', $flashResult);

header('Location: /unnamed_hack_game/register.php');