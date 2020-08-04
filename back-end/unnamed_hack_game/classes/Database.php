<?php

define('DB_DSN', 'mysql:host=localhost;dbname=db_hack_game');
define('DB_USER', 'root');
define('DB_PASS', '');

class Database {
	private $connection;

	public function __construct() {
		try {
			$this->connection = new PDO(DB_DSN, DB_USER, DB_PASS);
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getCode() . ' Message: ' . $e->getMessage();
		}
	}

	public function loginUser($username, $password, $session) {
		$flashContent = [
			'type' => '',
			'message' => ''
		];

		if ((empty($username) || strlen($username) < 3 ) || empty($password)) {
			$flashContent['type'] = 'error';
			$flashContent['message'] = 'Username or password invalid';

			return $flashContent;
		}

		$query = 'SELECT * FROM tb_users WHERE username = :username';

		try {
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':username', $username);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$flashContent['type'] = 'error';
			$flashContent['message'] = $e->getMessage();

			return $flashContent;
		}

		if (is_array($user)) {
			if (password_verify($password, $user['password'])) {
				$session->setSessionValue('login', true);
				$session->setSessionValue('user_id', $user['id']);
				$session->setSessionValue('user_email', $user['email']);
				$session->setSessionValue('admin', $user['admin']);

				return;
			}
		}

		$flashContent['type'] = 'error';
		$flashContent['message'] = 'Incorrect username/password';

		return $flashContent;
	}

	public function registerUser($username, $email, $password) {
		$flashContent = [
			'type' => '',
			'message' => ''
		];

		if ((empty($username) || strlen($username) < 3 ) || empty($email) || empty($password)) {
			$flashContent['type'] = 'error';
			$flashContent['message'] = 'Invalid fields';

			return $flashContent;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$flashContent['type'] = 'error';
			$flashContent['message'] = 'Invalid e-mail';

			return $flashContent;
		}

		if (!$this->isUsernameAvailable($username)) {
			$flashContent['type'] = 'error';
			$flashContent['message'] = 'Username is not available';

			return $flashContent;
		}

		$hashPass = password_hash($password, PASSWORD_DEFAULT);

		$query = '
		INSERT INTO
			tb_users (username, email, password)
		VALUES
			(:username, :email, :password)
		';

		try {
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':username', htmlspecialchars($username));
			$stmt->bindValue(':email', htmlspecialchars($email));
			$stmt->bindValue(':password', $hashPass);
			$stmt->execute();

			$flashContent['type'] = 'success';
			$flashContent['message'] = 'Account created! Please log-in';
		} catch (PDOException $e) {
			$flashConten['type'] = 'error';
			$flashContent['message'] = $e->getMessage();
		}
		
		return $flashContent;
	}

	public function getUserInformation($userId) {
		$query = 'SELECT * FROM tb_users WHERE id = :id';

		$stmt = $this->connection->prepare($query);
		$stmt->bindValue(':id', $userId);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		return (is_array($user)) ? $user : null;
	}

	public function isUsernameAvailable($username) {
		$query = '
		SELECT
			username
		FROM
			tb_users
		WHERE
			username = :username
		';

		$stmt = $this->connection->prepare($query);
		$stmt->bindValue(':username', htmlspecialchars($username));
		$stmt->execute();

		$result = $stmt->fetch();

		return is_array($result) ? false : true;
	}

	public function savePlayer($player) {
		$query = '
			UPDATE 
				tb_users
			SET 
				username = :username, game_ip = :gameIP, money = :money, level = :level, exp = :exp, exp_needed = :expNeeded
			WHERE
				id = :id
		';

		$stmt = $this->connection->prepare($query);
		$stmt->bindValue(':username', $player->__get('username'));
		$stmt->bindValue(':gameIP', $player->__get('gameIP'));
		$stmt->bindValue(':money', $player->__get('money'));
		$stmt->bindValue(':level', $player->__get('level'));
		$stmt->bindValue(':exp', $player->__get('exp'));
		$stmt->bindValue(':expNeeded', $player->__get('expNeeded'));
		$stmt->bindValue(':id', $player->__get('id'));
		$stmt->execute();
	}
}