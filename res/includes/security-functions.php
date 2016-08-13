<?php
/**
 * security-functions.php
 * @author Austin Fernandez
 * @20160810
 * This file handles authorization.
 */
if(session_status() == PHP_SESSION_NONE ) {
	session_start();
}
require_once "user-functions.php";

/**
 * checks if a certain feature is allowed by the current user
 * @param $feature feature to be tested
 * @return 1 if allowed and 0 otherwise
 */
function checkAuth($feature) {
	$user = usr_get_session();
	if( $user === null ) {
		return FALSE;
	} else {
		if(isset($user[$feature])) {
			return $user[$feature];
		} else {
			return 0;
		}
	}
}

/**
 * checks if a password is secure
 * @param $pass password to check
 * @return true if secure, false otherwise
 */
function checkPass($pass) {
	$message = "";
	if( strlen($pass) < 8 ) {
		return false;
	}
	
	$cap = false;
	$low = false;
	$num = false;
	$spec = false;
	
	for($i = 0; $i < strlen($pass); $i++) {
		if( preg_match("/[A-Z]/",substr($pass,$i,1))) {
			$cap = true;
		} else if(preg_match("/[a-z]/",substr($pass,$i,1))) {
			$low = true;
		} else if(preg_match("/[0-9]/",substr($pass,$i,1))) {
			$num = true;
		} else {
			$spec = true;
		}
	}
	
	if( !$cap ) {
		return false;
	}
	if( !$low ) {
		return false;
	}
	if( !$num ) {
		return false;
	}
	if( !$spec ) {
		return false;
	}
	
	return true;
}

/**
 * generates a hash using ip address as client-side control
 * @param $ip ip address of client
 * @return hashed token
 */
function genHash($ip) {
	$user = usr_get_session();
	$str = "";
	if( $user === null  ) {
		$str = hash("sha256",uniqid().$ip);
	} else {
		$str = $user['id'].'$'.hash("sha256",$user['id'].$user['email'].$ip);
	}
	return $str;
}

/**
 * forcefully generates a new token
 * @param $ip ip address of client
 */
function genToken($ip) {
	$_SESSION['pqSessionToken'] = genHash($ip);
}

/**
 * restores the session token
 * @return new session token
 */
function restoreToken() {
	if(isset($_SESSION['pqSessionToken'])) {
		return $_SESSION['pqSessionToken'];
	} else {
		$hash = genHash($_SERVER['REMOTE_ADDR']);
		$_SESSION['pqSessionToken'] = $hash;
		return $hash;
	}
}

/**
 * checks if given token is equal to client side token
 * @param $token token to chec
 * @return true if tokens match, false otherwise
 */
function checkToken($token) {
	$hash = restoreToken();
	if( $token === $hash ) {
		return true;
	} else {
		return false;
	}
}
?>