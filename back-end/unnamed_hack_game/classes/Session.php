<?php

class Session {
	public function __construct() {
		session_start();
	}

	public function isUserLogged() {
		return isset($_SESSION['login']) && $_SESSION['login'] ? true : false;
	}

	public function isUserAdmin() {
		return $_SESSION['admin'];
	}

	public function getSessionValue($assoc) {
		return isset($_SESSION[$assoc]) ? $_SESSION[$assoc] : null;
	}

	public function setSessionValue($assoc, $value) {
		$_SESSION[$assoc] = $value;
	}

	public function unsetValue($assoc) {
		unset($_SESSION[$assoc]);
	}

	public function destroySession() {
		session_destroy();
	}
}