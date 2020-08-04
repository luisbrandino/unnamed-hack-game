<?php
	include_once 'C:\xampp\unnamed_hack_game\classes\Session.php';

	$session = new Session();

	$session->destroySession();

	header('Location: index.php');
?>