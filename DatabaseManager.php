<?
class DatabaseManager{
	//set up the object
	private $host;
	private $db;
	private $dbuser;
	private $dbpassword;
	private $dbopenstatus;
	private $dbconnection;
	
	function getHost() {
		return $this->dbhost;
	}
	
	function setHost($req_host) {
		$this->dbhost = $req_host;
	}
	
	function getDatabase() {
		return $this->db;
	}
	
	function setDatabase($req_db) {
		$this->db = $req_db;
	}
	
	function getUser() {
		return $this->dbuser;
	}
	
	function setUser($req_user) {
		$this->dbuser = $req_user;
	}
	
	function setConnection($req_dbconnection) {
		$this->dbconnection = $req_connection;
	}
	
	function getConnection() {
		return $this->dbconnection;
	}
	
	function __construct($HOST, $DB, $USER, $PASSWORD) {
		$this->sethost($HOST);
		$this->setDatabase($DB);
		$this->setUser($USER);
		$this->dbpassword = $PASSWORD;
		$this->setConnection(false);
	}

	function opendbconnection() {
		$this->dbconnection = mysql_connect($this->dbhost, $this->dbuser, $this->dbpassword);
		
		if ($this->dbconnection == true) {
			$this->db = mysql_select_db($this->db);
			
			$this->setConnection(true);
		} else {
			$this->setConnection(false);
			return false;
		}
			return true;
	}
	
	function closedbconnection() {
		if ($this->dbconnection = true) {
			mysql_close($this->dbconnection);
		}
	}
	
	/*
	 * Returns SQl results
	 * 
	 * Null if no results exists 
	 */
	function selectquery($select, $from, $where) {
		if ($this->dbconnection == false) {
			$this->opendbconnection();
		}
		
		if($where == null){
			$where = "";
		}else{
			$where = "WHERE ".$where;
		}
		
		$sql = "SELECT ".$select." FROM ".$from." ".$where;
		$qry = mysql_query($sql);
		
		if (!$qry) {
			return false;
		} else {
			$numberrows = mysql_num_rows($qry);
			
			if ($numberrows >= 0) {
				return $qry;
			} else {
				return null;
			}
		}
	}
	
	/*
	 * Insert entry into the database
	 */
	function insertquery($table, $values) {
		if ($this->dbconnection == false) {
			$this->opendbconnection();
		}
		
		$sql = "INSERT INTO ".$table." VALUES (".$values.")";
		$qry = mysql_query($sql);
		
		if (!$qry) {
			return false;
		} else {
			return true;
		}
	}
	
	function updatequery($table, $colVal, $where) {
		if ($this->dbconnection == false) {
			$this->opendbconnection();
		}
		
		$sql = "UPDATE ".$table." SET ".$colVal." WHERE ".$where;
		$qry = mysql_query($sql);
		
		if (!$qry) {
			return false;
		} else {
			return true;
		}
	}

	function deletequery($table, $where) {
		if ($this->dbconnection == false) {
			$this->opendbconnection();
		}
		
		$sql = "DELETE FROM ".$table." WHERE ".$where;
		$qry = mysql_query($sql);
		
		if (!$qry) {
			return false;
		} else {
			return true;
		}
	}
	
}

?>