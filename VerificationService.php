<?php
include_once './config_verify.php';
include_once './VerificationManager.php';

/**
 * Verification Service to verify a users phone number
 */
class VerificationService {
	private $number;
	private $areaCode;
	private $numHead;
	private $numTail;
	private $network;
	private $verifyKey;
	private $networkAdresses;
	private $networkValues;
	
	private $verificationManager;
	
	/**
	 * Setup proper settings to send notification
	 */
	public function __construct($number, $network) {
		$this->number = $number;
		$this->areaCode = intval(substr($number, 0, 3));
		$this->numHead = intval(substr($number, 3, 3));
		$this->numTail = intval(substr($number, 6, 4));
		$this->network = $network;
		
		$this->networkAdresses = array( "T-Mobile" => "tmomail.net" );
		$this->networkValues = array( "T-Mobile" => 1 );
		
		$this->verificationManager = new VerificationManager();
	}
	
	public static function getVID($number){
		return md5(MD5_VID.$number);
	}
	
	/*
	 * Generate and store a new verification code
	 */ 
	public function generateVerificationKey(){
		$t = intval(((time() % 13589) + rand(0, 99999)) / 2);
		$sec1 = ($this->areaCode + $this->numHead + $this->numTail) % 482;
		$sec2 = intval(($this->networkValues[$this->network] + rand(0, 99)) / 2);
		$sec3 = $t % 61335;
		
		$code = sprintf("%03s", $sec1).sprintf("%02s", $sec2).sprintf("%05s", $sec3);
		
		$this->verifyKey = $code;
		
		$vid = $this->getVID($this->number);
		return $this->verificationManager->addVerification($vid, $this->verifyKey);
	}
	
	/**
	 * Send Verification Message
	 */
	public function send()
	{
		$address = $this->networkAdresses[$this->network];
		$email = $this->number."@".$address;
		
		mail($email, "", "verification code:\n".$this->verifyKey, "From: <inser email address here>\r\n", "-f<inser email address here>");
	}
}

?>