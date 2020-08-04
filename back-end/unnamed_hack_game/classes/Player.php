<?php

require_once 'C:\xampp\unnamed_hack_game\classes\Database.php';

class Player {
	private $id;
	private $username;
	private $gameIP;
	private $money;
	private $level;
	private $exp;
	private $expNeeded;

	public function __construct($id) {
		$this->id = $id;

		$db = new Database();

		$userInformation = $db->getUserInformation($id);

		if (is_null($userInformation)) {
			throw Exception("ID not found in database");
		}

		$this->username = $userInformation['username'];
		$this->money = $userInformation['money'];
		$this->level = $userInformation['level'];
		$this->exp = $userInformation['exp'];
		$this->expNeeded = $userInformation['exp_needed'];

		if (empty($userInformation['game_ip'])) {
			$this->gameIP = $this->generateNewIP();
			$this->save();
		} else {
			$this->gameIP = $userInformation['game_ip'];
		}
	}

	function __destruct() {
		$this->save();
	}

	public function __get($attr) {
		return $this->$attr;
	}

	public function __set($attr, $value) {
		$this->$attr = $value;
	}

	public function generateNewIP() {
		$newIP = long2ip(mt_rand());

		return $newIP;
	}

	public function save() {
		$db = new Database();

		$db->savePlayer($this);
	}
}