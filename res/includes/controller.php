<?php
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

switch($request['request']) {
	case "addProject":
		$members = array();
		$error = false;
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
			echo "IMGCTR: $imgCtr<br/>";
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
			echo $id;
			//save images in db
			proj_add_images($id,img_upload($id,$images));
		}
		header("Location: ../add-project.php");
		break;
	case "add_user":
		if( validateEmail($request['input_email'])) {
			if( preg_match("/^[A-Za-z](([A-Za-z\s] | -[A-Za-z])|\"([A-Za-z\s] | -[A-Za-z])*\")*$/"
							,$request['input_firstname']." ".$request['input_lastname'])) {
				$fName = $request['input_firstname'];
				$lName = $request['input_lastname'];
				$password = $request['input_password'];
				$email = $request['email'];
				$type = $request['type'];
				if( usr_add($email,$password,$fName,$lName,$type) ) {
					header("Location: ../add_user.php?status=success");
				} else {
					header("Location: ../add_user.php?status=failure");
				}
			} else {
				header("Location: ../add_user.php?status=failure");
			}
		} else {
			header("Location: ../add_user.php?status=failure");
		}
		break;
	case "login":
		$res = usr_check($request['email'],$request['password']);
		if(is_numeric($res)) {
			$_SESSION['session_user'] = $res;
			header("Location: ../");
		} else {
			header("Location: ../login.php?status=error");
		}
		break;
	case "logout":
		session_unset();
		session_destroy();
		header("Location: ../");
		break;
	case "reviewProject":
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
			proj_review($id,$_SESSION['session_user'],$review,$grades);
			header("Location: ../index.php");
		// }
		break;
	default:
}
?>