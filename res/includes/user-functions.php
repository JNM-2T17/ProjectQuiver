<?php
/**
 * user-functions.php
 * @author Austin Fernandex
 * @20160303
 * This function manages user data in the database.
 */
require_once "main-functions.php";

/**
 * adds a user to the database
 * @param $email email address of user
 * @param $password password of user
 * @param $fname first name of user
 * @param $lname last name of user
 * @param $usrType type of user
 * @return true if success and false otherwise
 */
function usr_add($email,$password,$fname,$lname,$usrType) {
	global $db;

	$usr = usr_get_by_email($email);
	if( $usr == null ) {
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
	} else { //if user exists
		return false;
	}
}

/**
 * checks if a password is correct for an account
 * @param $email email address of account
 * @param $password password to check
 * @return id of user if correct password, FALSE otherwise
 */
function usr_check($email,$password) {
	global $db;

	$sql = "SELECT id,password FROM pq_user WHERE email = BINARY :email 
				AND status = 1";
	$param = array(":email" => $email);
	$res = $db->query("SELECT",$sql,$param);
	
	if( $res['status'] ) {
		if( $res['count'] == 0 ) {
			return false;
		} else if(password_verify($password,$res['data'][0]['password'])) {
			return $res['data'][0]['id'];
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 *
 */
function usr_get_session() {
	return isset($_SESSION['session_user']) ? usr_get($_SESSION['session_user']) : null;
}

/**
 *
 */
function usr_get($id) {
	global $db;

	$sql = "SELECT U.id, email, fName, lName, addProject, judgeProject, createUser, deleteUser
			FROM pq_user U LEFT JOIN pq_user_type UT ON U.userType = UT.id AND UT.status = 1
			WHERE U.status = 1 AND U.id = :id";
	$param = array(
		":id" => $id
	);
	$res = $db->query("SELECT",$sql,$param);
	if( $res['status'] ) {
		if( $res['count'] == 0 ) {
			return null;
		} else {
			return array(
				"id" => $res['data'][0]['id'], 
				"email" => $res['data'][0]['email'], 
				"fName" => $res['data'][0]['fName'], 
				"lName" => $res['data'][0]['lName'], 
				"addProject" => $res['data'][0]['addProject'] * 1, 
				"judgeProject" => $res['data'][0]['judgeProject'] * 1, 
				"createUser" => $res['data'][0]['createUser'] * 1, 
				"deleteUser" => $res['data'][0]['deleteUser'] * 1
			);
		}
	} else {
		return null;
	}
}

/**
 *
 */
function usr_get_by_email($email) {
	global $db;

	$sql = "SELECT U.id, email, fName, lName, addProject, judgeProject, createUser, deleteUser
			FROM pq_user U LEFT JOIN pq_user_type UT ON U.userType = UT.id AND UT.status = 1
			WHERE U.status = 1 AND email = :email";
	$param = array(
		":email" => $email
	);
	$res = $db->query("SELECT",$sql,$param);
	if( $res['status'] ) {
		if( $res['count'] == 0 ) {
			return null;
		} else {
			return array(
				"id" => $res['data'][0]['id'], 
				"email" => $res['data'][0]['email'], 
				"fName" => $res['data'][0]['fName'], 
				"lName" => $res['data'][0]['lName'], 
				"addProject" => $res['data'][0]['addProject'] * 1, 
				"judgeProject" => $res['data'][0]['judgeProject'] * 1, 
				"createUser" => $res['data'][0]['createUser'] * 1, 
				"deleteUser" => $res['data'][0]['deleteUser'] * 1
			);
		}
	} else {
		return null;
	}
}
?>