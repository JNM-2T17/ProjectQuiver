<?php
session_start();
define("BASE_PATH","PMS");

if( empty($_POST) && !isset($_SERVER['HTTP_REFERER'])) {
	header("Location: ../");
	die();
}

require_once "image-functions.php";
require_once "project-functions.php";
require_once "user-functions.php";

$request = $_SERVER['REQUEST_METHOD'] == "POST" ? $_POST : $_GET;

switch($request['request']) {
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
			$_SESSION['user'] = $res;
			header("Location: ../");
		} else {
			header("Location: ../login.php?status=$res");
		}
		break;
	case "reviewProject":
		$id = $request['id'];
		$review = $request['review'];
		$grades = $request['grades'];
		$gradeok = true;
		foreach($grades as $g) {
			$gradeok = $gradeok && ($g >= 0 && $g <= 10);
			if( !$gradeok ) {
				break;
			}
		}
		if( $gradeok ) {
			$recogs = $request['recogs'];
			proj_review($id,$_SESSION['user'],$review,$grades);
		}
		break;
	case "addProject":
		$id = proj_add($request["projname"],$request['category'],$request["abstract"]
					,$request["description"]
					,null// ,$request['members']
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
		header("Location: ../add-project.php");
		break;
	default:
}
?>