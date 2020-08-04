<?php

require_once 'C:\xampp\unnamed_hack_game\check_auth.php';

require_once '../../../unnamed_hack_game/classes/Session.php';
require_once '../../../unnamed_hack_game/classes/Database.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('Location: /unnamed_hack_game/index.php');
}

$db = new Database();

$result = $db->loginUser($_POST['username'], $_POST['password'], $session);

if (is_array($result)) {
	$session->setSessionValue('flash', $result);

	header('Location: /unnamed_hack_game/login.php');
} else {
	header('Location: /unnamed_hack_game/dashboard.php');
}

?>