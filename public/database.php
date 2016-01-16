<?php

class Database {
	const USERNAME = 'doomsday_website';
	const PASSWORD = 'iv2+qM}AFP-$';

	private $lastInsertedId;

	/**
	 * Perform a database query and return the result
	 * @param  string $query Query to perform
	 * @return mysqli_result The query result
	 */
	public function query($query) {
		$mysqli = new mysqli("localhost", self::USERNAME, self::PASSWORD, "doomsday_forum");
		$result = $mysqli->query($query);
		$this->lastInsertedId = $mysqli->insert_id;

		return $result;
	}

	public function getLastInsertedId() {
		return $this->lastInsertedId;
	}
}
