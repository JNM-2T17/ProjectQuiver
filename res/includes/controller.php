<?php
/**
 * controller.php
 * @author Austin Fernandez
 * @20150722
 * This class manages requests.
 * Each form must have an input field with name "request" that corresponds to 
 * a case in the switch statement
 */
session_start();
define("BASE_PATH","Quiver");

if( empty($_POST) && !isset($_SERVER['HTTP_REFERER'])) {
	header("Location: ../");
	die();
}

require_once "image-functions.php";
require_once "project-functions.php";
require_once "user-functions.php";

$request = $_SERVER['REQUEST_METHOD'] == "POST" ? $_POST : $_GET;

$usr = usr_get_session();
if( $usr ) {
	$now = strtotime("now");
	if( $now >= $_SESSION['idleExpiry'] || $now >= $_SESSION['sessExpiry'] ) {
    	$request['request'] = 'logout';
    } else {
    	$_SESSION['idleExpiry'] = $now;
    }
}

switch($request['request']) {
	case "addProject":
		if(checkAuth("addProject") === 1 ) {
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
					$image = array(
						"name" 		=> $_FILES["images"]["name"][$i],
						"type" 		=> $_FILES["images"]["type"][$i],
						"tmp_name" 	=> $_FILES["images"]["tmp_name"][$i],
						"error" 	=> $_FILES["images"]["error"][$i],
						"size" 		=> $_FILES["images"]["size"][$i]
					);
					$images[] = $image;
				}
				// echo $id;
				//save images in db
				$result = proj_add_images($id,img_upload($id,$images));
				if( $result === false ) {
					header("Location: ../add-project.php?status=error");
				} else {
					header("Location: ../add-project.php?status=success");
				}
			}
		} else {
			header("Location: ../.");
		}
		break;
	case "confirmPassword":
		$usr = usr_get_session();
		$result = usr_check($usr['email'],$request['password']);
		echo $result == $usr['id'] ? "true" : "false";
		break;
	case "createUser":
		if(checkAuth("createUser")) {
			$request['userPassword'] = $request['confirmPassword'];
			if( validateDLSUEmail($request['emailAdd'])) {
				if( preg_match("/^[a-z ,.'-]+ [a-z ,.'-]+$/i"
								,$request['firstName']." ".$request['lastName'])) {
					$fName = $request['firstName'];
					$lName = $request['lastName'];
					$password = $request['userPassword'];
					$email = $request['emailAdd'];
					$type = $request['accountType'];
					if( usr_add($email,$password,$fName,$lName,$type) ) {
						// echo "Success";
						header("Location: ../create-account.php?status=success");
					} else {
						// echo "Cannot add";
						header("Location: ../create-account.php?status=failure");
					}
				} else {
					// echo "Invalid NAME";
					header("Location: ../create-account.php?status=failure");
				}
			} else {
				// echo "Invalid EMAIL";
				header("Location: ../create-account.php?status=failure");
			}
		}
		break;
	case "login":
		$res = usr_check($request['email'],$request['password']);
		if(is_numeric($res)) {
			session_unset();
			session_destroy();
			session_start();
			session_regenerate_id(true);

			$_SESSION['session_user'] = $res;

			$_SESSION['sessExpiry'] = strtotime("+1 week",$now);
		    $_SESSION['idleExpiry'] = strtotime("+1 day",$now);
			header("Location: ../");
		} else {
			header("Location: ../login.php?status=error");
		}
		break;
	case "logout":
		session_unset();
		session_destroy();
		session_start();
		if(session_regenerate_id(true) === TRUE) {
			header("Location: ../");
		} else {
			die();
		}
		break;
	case "reviewProject":
		if( checkAuth("judgeProject")) {
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
					header("Location: ../index.php?status=success");
				} else {
					header("Location: ../judge-project.php?id=$id&status=error");
				}
			// }
		}
		break;
	default:
}
?>