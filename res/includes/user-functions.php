<?php
/**
 * user-functions.php
 * @author Austin Fernandex
 * @20160303
 */
require "main-functions.php";

function usr_add($email,$password,$fname,$lname,$usrType) {
	global $db;

	$sql = "INSERT INTO pq_user(email,password,fName,lName,userType) 
				VALUES (:email,:password,:fname,:lname,:usrType)";
	$param = array(
		":email" => $email,
		":password" => password_hash($password,PASSWORD_BCRYPT),
		":fname" => $fname,
		":lname" => $lname,
		":usrType" => $usrType
	);

	$res = $db->query("INSERT",$sql,$param);
	return $res['status'];
}

function usr_check($email,$password) {
	global $db;

	$sql = "SELECT password FROM pq_user WHERE email = :email";
	$param = array(":email" => $email);
	$res = $db->query("SELECT",$sql,$param);
	
	if( $res['status'] ) {
		if( $res['count'] == 0 ) {
			return "No Such User";
		} else if(password_verify($password,$res['data'][0]['password'])) {
			return true;
		} else {
			return "Wrong password";
		}
	} else {
		return false;
	}
}
?>