<?php
/**
 * main-functions.php
 * @author Austin Fernandez
 * @20151102
 * This file handles all unclasssified functions.
 */
require_once 'globals.php';
require_once 'class.database.php';

if( !$sandbox && !defined(BASE_PATH) ) {
	header("Location: ../");
	die();
}

$db = new Database(DBTYPE,DBHOST,DBNAME,DBUSER,DBPASS);

/**
 * converts YYYY-MM-DD format to Month Day, Year
 * @param $date date to convert
 * @return date in correct format
 */
function formatDate($date) {
	$parts = explode("-",$date);
	$year = $parts[0];
	$month = $parts[1];
	if( $month < 1 || $month > 12 ) {
		throw new Exception("Invalid Month");
	}
	$day = $parts[2];
	$months = array("January","February","March","April","May","June","July"
						,"August","September","October","November","December");
	$month = $months[$month - 1];
	return $month." ".$day.", ".$year;
}

/**
 * validates that a date is in YYYY-MM-DD format
 * $param $date date to validate
 * @return true if valid, false otherwise
 */
function validateDate($date) {
	$pattern = '/20[1-9][0-9]-(0?[1-9]|1[0-2])-(0?[1-9]|[1-2][0-9]|3[0-1])/';

	return preg_match($pattern,$date);
}

/**
 * validates an email address
 * @param $email email to validate
 * @return true if valid, false otherwise
 */
function validateEmail($email) {
	$pattern = "/[A-Za-z0-9_.]+@([A-Za-z0-9]+.)+[A-Za-z]+/";

	return preg_match($pattern,$email);
}

/**
 * validates an email address
 * @param $email email to validate
 * @return true if valid, false otherwise
 */
function validateDLSUEmail($email) {
	$pattern = "/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/";

	return preg_match($pattern,$email);
}

function getGrade($grade) {
	if( $grade >= 9.4) {
		return "4.0";
	} elseif($grade >= 8.9) {
		return "3.5";
	} elseif($grade >= 8.3) {
		return "3.0";
	} elseif($grade >= 7.8) {
		return "2.5";
	} elseif($grade >= 7.2) {
		return "2.0";
	} elseif($grade >= 6.6) {
		return "1.5";
	} elseif($grade >= 6.0) {
		return "1.0";
	} else {
		return "0.0";
	}
}
?>