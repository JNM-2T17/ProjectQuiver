<?php
/**
 * class.database.php
 * @author Austin Fernandez
 * @20151031
 * This class manages database access.
 */
if( !$sandbox && !defined(BASE_PATH) ) {
	header("Location: ../");
	die();
}

class Database {
	private $db;

	public function __construct($dbType,$dbHost,$dbName,$dbUser,$dbPass) {
		try {
			$this->db = new PDO("$dbType:host=$dbHost;dbname=$dbName",$dbUser	
								,$dbPass,array(
									PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
								));
		} catch( PDOException $pe ) {
			die( $pe->getMessage() );
		}
	}
	
	/**
	 * executes an sql statement over the database
	 * @param $type type of statement (SELECT,INSERT,UPDATE)
	 * @param $sql sql statement
	 * @param $param [optional] associative array of parameters
	 * @return object comprising of
	 * 		status -> true if successful, false otherwise
	 *		data -> array of associative arrays with all the data
	 *      count -> number of rows returned
	 *      error -> error returned
	 */
	public function query($type,$sql,$param = array()) {
		$res = array(
			'status' => false,
		);
		try {
			$stmt = $this->db->prepare($sql);
			if( !empty($param) ) {
				foreach($param as $k=>$v) {
					$stmt->bindValue($k,$v);
				}
			}	
			$stmt->execute();
			$res['status'] = true;
			if( $type === "SELECT") {
				$res['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$res['count'] = count($res['data']);
			} elseif( $type == "INSERT_ID") {
				$res['data'] = $this->db->lastInsertId();
			}
		} catch( PDOException $e ) {
			$res['error'] = $e->getMessage();
		} finally {
			return $res;
		}
	}
}
?>