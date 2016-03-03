<?php
define("BASE_PATH","PMS");

if( empty($_POST) && !isset($_SERVER['HTTP_REFERER'])) {
	header("Location: ../");
	die();
}

require_once "project-functions.php";
require_once "user-functions.php";

$request = $_SERVER['REQUEST_METHOD'] == "POST" ? $_POST : $_GET;

switch($request['request']) {
	case "login":
		$res = usr_check($request['email'],$request['password']);
		if($res === true) {
			header("Location: ../");
		} else {
			header("Location: ../login.php?status=$res");
		}
		break;
	case "submitProject":
		print_r($request);
		proj_add($request["projname"],"web",$request["projabstract"],
					$request["projstudentreview"]);
					// ,$students = null
					// ,$grades = null,$images = null,$recogs = null
					// ,$tags = null)
		header("Location: ../addproject.php");
		break;
	default:
}
?>