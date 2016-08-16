<?php 
/**
 * student-functions.php
 * @author Austin Fernandez
 * @20160705
 * This file handles student related operations.
 */
require_once "main-functions.php";

/**
 * adds a student to the database
 * @param $idNo id number
 * @param $fName first name
 * @param $lName last name
 * @param $email email address
 * @param id of student if successful, FALSE otherwise
 */
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

/**
 * gets a students' details
 * @param $idNo id number
 * @return associative array of the student with
 * 		id - id of student in database
 * 		idNo - id number
 * 		fName - first name
 * 		lName - last name
 * 		email - email address
 */
function student_get($idNo) {
	global $db;

	$query = "SELECT id,idNo,fName,lName,email FROM pq_student 
				WHERE idNo = :idNo AND status = 1";
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