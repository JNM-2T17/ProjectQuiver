<?php
/**
 * security-functions.php
 * @author Austin Fernandez
 * @20160705
 */
session_start();
require_once "user-functions.php";

function checkAuth($feature) {
	if( isset($_SESSION['session_user'])) {
		$user = usr_get($_SESSION['session_user']);
		if( $user === null ) {
			return FALSE;
		} else {
			if(isset($user[$feature])) {
				return $user[$feature];
			} else {
				return 0;
			}
		}
	} else {
		return FALSE;
	}
}
?>