<?php
// - - -   BASE MODEL for mySQLi   - - - - 
class Model {
	private $database;
	private $host;
	private $username;
	private $password;
	private $port;
	function __construct() {
		$this -> database = 'readreplica1';
		$this -> host = 'rm1s0tfcnbbs40p.cisgn95exije.us-east-1.rds.amazonaws.com';
		$this -> username = 'readreplica1';
		$this -> password = 'readreplica1';
		$this -> port = '3306';
	}

	public function getDatabase() {
		return $this -> database;
	}

	public function setDatabase($database) {
		$this -> database = $database;
	}

	public function connect() {
		//mysql_connect($this -> host, $this -> username, $this -> password);
		//$link = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

		$con = mysqli_connect($this -> host, $this -> username, $this -> password, $this-> database, $this -> port);
		return $con;
	}

	public function exe_sql($con, $sql, $return = "") {
		$res = mysqli_query($con, $sql);
		
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		  
		if (gettype($res) == "boolean") {
			//INSERT creates a boolean for $res
			//return last id
			return mysqli_insert_id($con);
		}
		// L E F T   O F F   H E R E   switching over to mysqli
		$data = "";
		while ($row = mysqli_fetch_assoc($res)) {
			$data[] = $row;
		}
		// Free result set
		mysqli_free_result($res);
		mysqli_close($con);
		
		if ($return == "json") {
			return json_encode($data);
		} else {
			return $data;
		}
	}

}
?>