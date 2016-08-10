<?php
/**
 * user-functions.php
 * @author Austin Fernandex
 * @20160810
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
 * Returns the session user or null if none. If no user is set, it tries to use
 * a cookie to restore a session
 * @return session user object or NULL if none
 */
function usr_get_session() {
	if(!isset($_SESSION['session_user'])) {
		if(isset($_COOKIE['pqSessionToken'])) {
			$token = $_COOKIE['pqSessionToken'];
			$index = strpos($token,'$');
			if( $index !== false) {
				$userId = substr($token,0,$index );
				$usr = usr_get($userId);
				if( $usr === null) {
					return null;
				} else {
					$hash = $userId.'$'.hash("sha256",$usr['id'].$usr['email'].$_SERVER['REMOTE_ADDR']);
					if( $hash === $token) {
						session_unset();
						session_destroy();
						session_start();
						session_regenerate_id(true);
						$_SESSION['session_user'] = $userId;
						genToken($_SERVER['REMOTE_ADDR']);					
						$_SESSION['sessExpiry'] = strtotime("+1 week");
					    $_SESSION['idleExpiry'] = strtotime("+1 day");
						return $usr;
					} else {
						return null;
					}
				}
			} else {
				return null;
			}
		} else {
			return null;
		}
	} else {
		return usr_get($_SESSION['session_user']);
	}
}

/**
 * gets the details of one user
 * @param $id id of user in database
 * @return user containing
 * 		id - id of user in db
 * 		email - email address of user
 * 		fName - first name of user
 * 		lName - last name of user
 * 		addProject - 1 if user can add project, 0 otherwise
 * 		judgeProject - 1 if user can judge project, 0 otherwise
 * 		createUser - 1 if user can create User, 0 otherwise
 * 		deleteUser - 1 if user can delete User, 0 otherwise
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
 * gets user details using email
 * @param $email email address of user
 * @return user containing 
 * 		id - id of user in db
 * 		email - email address of user
 * 		fName - first name of user
 * 		lName - last name of user
 * 		addProject - 1 if user can add project, 0 otherwise
 * 		judgeProject - 1 if user can judge project, 0 otherwise
 * 		createUser - 1 if user can create User, 0 otherwise
 * 		deleteUser - 1 if user can delete User, 0 otherwise
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