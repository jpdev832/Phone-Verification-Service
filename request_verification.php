<?php
include_once './config_verify.php';
include_once './VerificationService.php';

$message = $_POST['verify'];
$messageData = json_decode(stripslashes($message), TRUE);

if($messageData == null){
	$output = array(
		"status" => "FAIL",
		"status_code" => STATUS_CODE_BAD_REQUEST,
		"message" => "Bad Request");
	die(json_encode($output));
}

$verify = new VerificationService($messageData[TO_UID], $messageData[DATA][NETWORK]);
$result = $verify->generateVerificationKey();
$result["message"] = "verification status";
if($result["status_code"] == 200){
	$verify->send();
}

echo json_encode($result);
?>