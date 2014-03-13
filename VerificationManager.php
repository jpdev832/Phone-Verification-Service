<?php
include_once './config_verify.php';
include_once './DatabaseManager.php';

/**
 * Manage DB verification processes 
 */
class VerificationManager {
	private $db;
	private $dbTable;
	
	function __construct($debug = FALSE) {
		if($debug == TRUE){
			$this->dbTable = VERIFY_DB_TABLE."_QA";
		}else{
			$this->dbTable = VERIFY_DB_TABLE;
		}
		
		$this->db = new DatabaseManager(VERIFY_DB_HOST, VERIFY_DB_DATABASE, VERIFY_DB_USER, VERIFY_DB_PASS);
	}
	
	/*
	 * Check if verification code exist
	 * 
	 * Returns: Boolean
	 */
	public function checkVerification($vid, $vCode)
	{
		$result = $this->db->selectquery("*", $this->dbTable, KEY_VID."='".$vid."' AND ".KEY_V_CODE."='".$vCode."'");
		
		if($result == null){
			return FALSE;
		}
		
		return TRUE;
	}
	
	/*
	 * Add a verification code
	 * 
	 * Returns: JSON Status
	 */
	public function addVerification($vid, $vCode)
	{
		$values = "'".$vid."','".$vCode."',NULL,NULL,NULL";
		
		if($this->db->insertquery($this->dbTable, $values)){
			$output = array(
				"status" => "SUCCESS",
				"status_code" => 200,
				"message" => "Verification code successfully added");
			return $output;
		}else{
			$output = array(
				"status" => "FAIL",
				"status_code" => 400,
				"message" => "failed to add verification code");
			return $output;
		}
	}
	
	/*
	 * Remove verification code
	 * 
	 * Returns: Status array
	 */
	public function removeVerification($vid)
	{
		$where = KEY_VID."='".$vid."'";
		if($this->db->deletequery($this->dbTable, $where)){
			$output = array(
				"status" => "SUCCESS",
				"status_code" => 200,
				"message" => "Verification code has been purged");
			return $output;
		}else{
			$output = array(
				"status" => "FAIL",
				"status_code" => 200,
				"message" => "Failed to purge verification code");
			return $output;
		}
	}
}

?>