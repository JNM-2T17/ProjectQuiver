<?php
/**
 * security-functions.php
 * @author Austin Fernandez
 * @20160705
 * This file handles authorization.
 */
session_start();
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
?>