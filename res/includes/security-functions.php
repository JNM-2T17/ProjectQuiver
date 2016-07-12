<?php
/**
 * security-functions.php
 * @author Austin Fernandez
 * @20160705
 */
session_start();
require_once "user-functions.php";

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