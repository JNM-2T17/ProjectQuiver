<?php
/**
 * controller.php
 * @author Austin Fernandez
 * @20150722
 * This class manages requests.
 * Each form must have an input field with name "request" that corresponds to 
 * a case in the switch statement
 */
if(session_status() == PHP_SESSION_NONE ) {
	session_start();
}
define("BASE_PATH","Quiver");

$request = $_SERVER['REQUEST_METHOD'] == "POST" ? $_POST : $_GET;

if( empty($_POST) && !isset($_SERVER['HTTP_REFERER']) && $request['request'] != 'logout') {
	header("Location: ../");
	die();
}

require_once "image-functions.php";
require_once "project-functions.php";
require_once "audit-functions.php";
require_once "security-functions.php";


$usr = usr_get_session();
if( $usr ) {
	$now = strtotime("now");
	if( $now >= $_SESSION['idleExpiry'] || $now >= $_SESSION['sessExpiry'] ) {
		if( $_SESSION['idleExpiry'] > $_SESSION['sessExpiry'] ) {
			audit_add("has their session expire.");
		} else {
			audit_add("was idle for too long.");
		}
		$request['request'] = 'logout';
    } else {
    	$_SESSION['idleExpiry'] = strtotime("+1 day");
    }
}

switch($request['request']) {
	case "addProject":
		if(checkAuth("addProject") === 1 ) {
			if( checkToken($request['token'])) {
				$members = array();
				$error = false;
				if( count($request['idNo']) == 0 || count($request['tags']) == 0 ) {
					header("Location: ../add-project.php?status=error");
					die();
				}
				for($i = 0; $i < count($request['idNo']); $i++) {
					$idNo = $request['idNo'][$i];
					$fName = $request['fName'][$i];
					$lName = $request['lName'][$i];
					$email = $request['email'][$i];

					if(!preg_match("/^[0-9]{8}$/",$idNo) || !preg_match("/^[a-z ,.'-]+$/i",$fName) 
						|| !preg_match("/^[a-z ,.'-]+$/i",$lName) 
						|| !preg_match("/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/",$email)) {
						$error = true;
					}

					$members[] = array(
						"idNo"  => $idNo,
						"fName" => $fName,
						"lName" => $lName,
						"email" => $email
					);
				}

				if($error) {
					audit_add("ran into data validation errors on add project.");
					header("Location: ../add-project.php?status=error");
				} else {
					$id = proj_add($request["projname"],$request['category'],$request["abstract"]
								,$request["description"]
								,$members
								,isset($request['tags']) ? $request['tags'] : null);
					
					//upload images
					$images = array();
					$imgCtr = count($_FILES['images']['name']);
					// echo "IMGCTR: $imgCtr<br/>";
					for($i = 0; $i < $imgCtr; $i++) {
						if( strlen($_FILES['images']['name'][$i]) > 0 ) {
							$image = array(
								"name" 		=> $_FILES["images"]["name"][$i],
								"type" 		=> $_FILES["images"]["type"][$i],
								"tmp_name" 	=> $_FILES["images"]["tmp_name"][$i],
								"error" 	=> $_FILES["images"]["error"][$i],
								"size" 		=> $_FILES["images"]["size"][$i]
							);
							$images[] = $image;
						}
					}
					
					// echo $id;
					//save images in db
					if( count($images) > 0 ) {
						$result = proj_add_images($id,img_upload($id,$images));
						if( $result === false ) {
							// echo "FAIL IMG";
							audit_add("ran into image adding errors in add project.");
							header("Location: ../add-project.php?status=error");
						} else {
							// echo "SUCCESS";
							audit_add("added project $request[projname].");
							header("Location: ../add-project.php?status=success");
						}
					} else {
						// echo "SUCCESS";
						audit_add("added project $request[projname].");
						header("Location: ../add-project.php?status=success");
					}
				}
			} else {
				// echo "FAIL TOKEN";
				audit_add("had an invalid token on add account.");
				header("Location: ../add-project.php?status=error");
			}
		} else {
			// echo "FAIL AUTH";
			audit_add("tried to add project but was not authorized to.");
			header("Location: ../.");			
		}
		break;
	case "confirmPassword":
		if( checkToken($request['token'])) {
			$usr = usr_get_session();
			$result = usr_check($usr['email'],$request['password']);
			audit_add($result == $usr['id'] ? "verified their identity." : "failed to verify their identity.");
			echo $result == $usr['id'] ? "true" : "false";
		} else {
			audit_add("had an invalid token on reauthentication.");
			echo "false";
		}
		break;
	case "createUser":
		if(checkAuth("createUser")) {
			if( checkToken($request['token'])) {
				$request['userPassword'] = $request['confirmPassword'];
				if( validateDLSUEmail($request['emailAdd'])) {
					if( preg_match("/^[a-z ,.'-]+ [a-z ,.'-]+$/i"
									,$request['firstName']." ".$request['lastName']) &&
						checkPass($request['userPassword'])) {
						$fName = $request['firstName'];
						$lName = $request['lastName'];
						$password = $request['userPassword'];
						$email = $request['emailAdd'];
						$type = $request['accountType'];
						if( usr_add($email,$password,$fName,$lName,$type) ) {
							// echo "Success";
							audit_add("created account for $request[emailAdd].");
							header("Location: ../create-account.php?status=success");
						} else {
							// echo "Cannot add";
							audit_add("failed to create account for $request[emailAdd].");
							header("Location: ../create-account.php?status=failure");
						}
					} else {
						// echo "Invalid NAME";
						audit_add("ran into data validation errors on create account");
						header("Location: ../create-account.php?status=failure");
					}
				} else {
					// echo "Invalid EMAIL";
					audit_add("ran into data validation errors on create account");
						header("Location: ../create-account.php?status=failure");
				}
			} else {
				audit_add("had an invalid token on create account.");
				header("Location: ../create-account.php?status=failure");
			}
		}
		break;
	case "login":
		$usr = usr_get_session();
		if( $usr === null ) {
			if( checkToken($request['token'])) {
				$res = usr_check($request['email'],$request['password']);
				if(is_numeric($res)) {
					session_unset();
					session_destroy();
					session_start();
					session_regenerate_id(true);
					$_SESSION['session_user'] = $res;
					genToken($_SERVER['REMOTE_ADDR']);					
					$_SESSION['sessExpiry'] = strtotime("+1 week");
				    $_SESSION['idleExpiry'] = strtotime("+1 day");
				    audit_add("logged in.");
				    setcookie("pqSessionToken",$_SESSION['pqSessionToken'],
				    	strtotime("+1 week"),"/ProjectQuiver","",
				    	false,true);
					header("Location: ../");
				} else {
					audit_add("failed to log in as $request[email].");
				    header("Location: ../login.php?status=error");
				}
			} else {
				audit_add("had an invalid token on login.");
				header("Location: ../login.php?status=error");
			}
		} else {
			audit_add("tried to logged in but was already logged in.");
			header("Location: ../.");
		}
		break;
	case "logout":
		audit_add("logged out.");
		session_unset();
		session_destroy();
		unset($_COOKIE['pqSessionToken']);
		setcookie("pqSessionToken",null,-1,"/ProjectQuiver","",
				    	false,true);					
		session_start();
		if(session_regenerate_id(true) === TRUE) {
			genToken();
			header("Location: ../");
		} else {
			die();
		}
		break;
	case "reviewProject":
		if( checkAuth("judgeProject")) {
			if( checkToken($request['token'])) {
				$id = $request['id'];
				$review = $request['review'];
				$grades = array(10,10,10,10);
				// $gradeok = true;
				// foreach($grades as $g) {
				// 	$gradeok = $gradeok && ($g >= 0 && $g <= 10);
				// 	if( !$gradeok ) {
				// 		break;
				// 	}
				// }
				// if( $gradeok ) {
					//$recogs = $request['recogs'];
					$res = proj_review($id,$_SESSION['session_user'],$review,$grades);
					if( $res ) {
						audit_add("reviewed project $request[id].");
						header("Location: ../index.php?status=success");
					} else {
						audit_add("failed to review project $request[id].");
						header("Location: ../judge-project.php?id=$id&status=error");
					}
				// }
			} else {
				audit_add("had an invalid token on judge project.");
				header("Location: ../judge-project.php?id=$id&status=error");
			}
		}
		break;
	default:
}
?>