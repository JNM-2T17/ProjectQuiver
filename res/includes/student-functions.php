<?php 
require_once "main-functions.php";

function student_add($idNo,$fName,$lName,$email) {
	global $db;

	$student = student_get($idNo);
	if( $student === false) {
		$query = "INSERT INTO pq_student(idNo,fName,lName,email) 
					VALUES (:idNo,:fName,:lName,:email)";
		$param = array(
			":idNo" => $idNo,
			":fName" => $fName,
			":lName" => $lName,
			":email" => $email
		);
		$res = $db->query("INSERT_ID",$query,$param);
		return $res['status'] ? $res['data'] : false;
	} else {
		return $student['id'];
	}
}

function student_get($idNo) {
	global $db;

	$query = "SELECT id,idNo,fName,lName,email FROM pq_student 
				WHERE idNo = :idNo";
	$param = array(
		":idNo" => $idNo
	);
	$res = $db->query("SELECT",$query,$param);
	if( $res['status'] ) {
		if( $res['count'] > 0 ) {
			return array(
				"id" => $res['data'][0]['id'],
				"idNo" => $res['data'][0]['idNo'],
				"fName" => $res['data'][0]['fName'],
				"lName" => $res['data'][0]['lName'],
				"email" => $res['data'][0]['email']
			);
		} else {
			return false;
		}
	}
}
?>