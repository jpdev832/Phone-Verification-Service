<?php
include_once './config_verify.php';
include_once './DatabaseManager.php';

/**
 * Manage DB verification processes 
 */
class VerificationManager {
	private $db;
	
	function __construct() {
		$this->db = new DatabaseManager(DB_HOST, DB_DATABASE, DB_USER, DB_PASS);
	}
	
	/*
	 * Check if verification code exist
	 * 
	 * Returns: Boolean
	 */
	public function checkVerification($vid, $vCode)
	{
		$result = $this->db->selectquery("*", DB_TABLE, KEY_VID."='".$vid."' AND ".KEY_V_CODE."='".$vCode."'");
		
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
		
		if($this->db->insertquery(DB_TABLE, $values)){
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
	public function removeUser($vid)
	{
		$where = KEY_VID."='".$vid."'";
		if($this->db->deletequery(DB_TABLE, $where)){
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