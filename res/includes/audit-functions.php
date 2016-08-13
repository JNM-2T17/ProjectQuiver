<?php
/**
 * audit-functions.php
 * @author Austin Fernandez
 * @20160810
 * This file is responsible for auditing user actions.
 */

require_once "user-functions.php";

function audit_add($action) {
	global $db;

	$usr = usr_get_session();
	$sql = "INSERT INTO pq_audit(log) VALUES (:log)";
	if( $usr === null ) {
		$action = "Anonymous user with IP Address $_SERVER[REMOTE_ADDR] $action";
	} else {
		$action = "User $usr[id] - $usr[fName] $usr[lName] with IP Address $_SERVER[REMOTE_ADDR] $action";
	}
	$param = array(
		":log" => $action
	);
	$res = $db->query("INSERT",$sql,$param);
	return $res['status'];
}

?>