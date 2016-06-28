<?php
/**
 * globals.php
 * @author Austin Fernandez
 * @20160212
 * This file defines globals for the system.
 */
$sandbox = true;
if( $sandbox) {
	define("DBTYPE","mysql");
	define("DBHOST","localhost");
	define("DBNAME","db_project_quiver");
	define("DBUSER","root");
	define("DBPASS","password");
	define("SALT_LEFT","20160211");
	define("SALT_RIGHT","20160212");
} else {
	define("DBTYPE","mysql");
	define("DBHOST","localhost");
	define("DBNAME","db_project_quiver");
	define("DBUSER","root");
	define("DBPASS","password");
	define("SALT_LEFT","20160211");
	define("SALT_RIGHT","20160212");
}
?>
