<?php

class mysql_lib {
	
	private $host = 'localhost';
	private $username = 'ocs';
	private $password = 'njmqCTmWNKJKhD4p';
	private $database = 'ocs';
	private $con = null;
	
	public function mysql_lib() {
		// constructor
	}
	
	public function getConnection() {
		return $this->con;
	}
	
	public function connectToDatabase() {
		@$this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
		if ($this->con->connect_errno) {
			echo "Can't connect to database.";
			exit();
		}
	}
}

?>