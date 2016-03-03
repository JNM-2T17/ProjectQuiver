<?php
define("BASE_PATH","PMS");

if( empty($_POST) && !isset($_SERVER['HTTP_REFERER'])) {
	header("Location: ../");
	die();
}

$request = $_SERVER['REQUEST_METHOD'] == "POST" ? $_POST : $_GET;

switch($request['request']) {
	default:
}
?>