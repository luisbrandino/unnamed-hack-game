<?php

require_once 'C:\xampp\unnamed_hack_game\classes\Session.php';

$session = new Session();

if (!$session->isUserLogged()) {
	header('Location: /unnamed_hack_game/index.php');
}