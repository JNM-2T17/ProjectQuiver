<?php

require_once "main-functions.php";
require_once "student-functions.php";

function proj_get_all() {
	global $db;

	$query = "SELECT id 
				FROM pq_project 
				WHERE status = 1 AND forJudging = 0 
				ORDER BY name";
	$res = $db->query("SELECT",$query);
	if( $res['status']) {
		$projects = array();
		foreach($res['data'] as $project) {
			$projects[] = proj_get($project['id']);
		}
		return $projects;
	} else {
		return false;
	}
}

function proj_get_pending() {
	global $db;

	$query = "SELECT id
				FROM pq_project
				WHERE status = 1 AND forJudging = 1
				ORDER BY dateAdded DESC";
	$res = $db->query("SELECT",$query);

	if($res['status']) {
		$pending = array();
		foreach($res['data'] as $val) {
			$pending[] = proj_get($val['id']);
		}
		return $pending;
	} else {
		return false;
	}
}

function proj_get_best() {
	global $db;

	$query = "SELECT id
				FROM (SELECT recog, grade,dateAdded
						FROM (SELECT recog,grade,MAX(A.dateAdded) dateAdded
								FROM (SELECT name, class, abstract, description
												, AVG(grade) AS grade, recog
												, P.dateAdded
										FROM pq_project P 
										INNER JOIN pq_project_grades PG 
											ON P.id = PG.id AND P.status = 1 
												AND PG.status = 1 
												AND P.forJudging = 0
										INNER JOIN pq_project_recogs PR 
											ON P.id = PR.id
										WHERE forJudging = 0
										GROUP BY P.id) A
						GROUP BY recog, grade) B NATURAL JOIN 
						(SELECT recog,MAX(grade) as grade
							FROM (SELECT name, class, abstract, description
											, AVG(grade) AS grade, recog
											, P.dateAdded
									FROM pq_project P 
									INNER JOIN pq_project_grades PG 
										ON P.id = PG.id AND P.status = 1 
											AND PG.status = 1
											AND P.forJudging = 0
									INNER JOIN pq_project_recogs PR 
										ON P.id = PR.id
									WHERE forJudging = 0
									GROUP BY P.id) A
							GROUP BY recog)C)A2
						NATURAL JOIN 
				        (SELECT P.id,AVG(grade) AS grade, recog, P.dateAdded
								FROM pq_project P 
								INNER JOIN pq_project_grades PG 
									ON P.id = PG.id AND P.status = 1 
										AND PG.status = 1
										AND P.forJudging = 0
								INNER JOIN pq_project_recogs PR 
									ON P.id = PR.id
								WHERE forJudging = 0
								GROUP BY P.id)B
				ORDER BY B.grade DESC";
	$res = $db->query("SELECT",$query);

	if($res['status']) {
		$projects = array();
		foreach($res['data'] as $project) {
			$projects[] = proj_get($project['id']);
		}
		return $projects;
	} else {
		return false;
	}
}

function proj_get($id) {
	global $db;

	$query = "SELECT P.id,name, class, abstract, description,review,forJudging
					,concat(fname, ' ',lName) As reviewer, AVG(grade) AS grade
				FROM pq_project P LEFT JOIN pq_project_grades PG 
					ON P.id = PG.id AND P.status = 1 AND PG.status = 1
					LEFT JOIN pq_user U ON P.reviewer = U.id AND U.status = 1
				WHERE P.id = :id
				GROUP BY P.id";
	$params = array(
		":id" => $id
	);
	$project = array();
	$res = $db->query("SELECT",$query,$params);
	if( $res['status']) {
		foreach($res['data'][0] as $key=>$val) {
			$project[$key] = $val;
		}

		$query = "SELECT criteriaNo, grade
					FROM pq_project_grades
					WHERE id = :id";
		$res = $db->query("SELECT",$query,$params);
		$grades = array();
		if( $res['status'] && $res['count'] > 0 ) {
			foreach( $res['data'] as $grade) {
				$grades[] = $grade['grade'];
			}
		} 
		$project['grades'] = $grades;
		
		$query = "SELECT image
					FROM pq_project_images
					WHERE id = :id";
		$res = $db->query("SELECT",$query,$params);
		$images = array();
		if( $res['status'] && $res['count'] > 0 ) {
			foreach( $res['data'] as $image) {
				$images[] = $image['image'];
			}
		}
		$project['images'] = $images;
		
		$query = "SELECT recog
					FROM pq_project_recogs
					WHERE id = :id";
		$res = $db->query("SELECT",$query,$params);
		$recogs = array();
		if( $res['status'] && $res['count'] > 0 ) {
			foreach( $res['data'] as $recog) {
				$recogs[] = $recog['recog'];
			}
		}
		$project['recogs'] = $recogs;

		$query = "SELECT tag
					FROM pq_project_tags
					WHERE id = :id";
		$res = $db->query("SELECT",$query,$params);
		$tags = array();
		if( $res['status'] && $res['count'] > 0 ) {
			foreach( $res['data'] as $tag) {
				$tags[] = $tag['tag'];
			}
		}
		$project['tags'] = $tags;

		$query = "SELECT idNo, fName, lName, email
					FROM pq_project_students PS INNER JOIN pq_student S 
						ON PS.studentId = S.id 
							AND PS.status = 1 AND S.status = 1
					WHERE PS.projectId = :id";
		$res = $db->query("SELECT",$query,$params);
		$team = array();
		if( $res['status'] && $res['count'] > 0 ) {
			foreach( $res['data'] as $student) {
				$temp = array();
				foreach($student as $key=>$val) {
					$temp[$key] = $val;
				}
				$team[] = $temp;
			}
		}
		$project['team'] = $team;

		return $project;
	} else {
		return false;
	}
}

function proj_review($id,$reviewer,$review,$grades,$recogs = null) {
	global $db;

	$sql = "UPDATE pq_project SET review = :review, reviewer = :reviewer
					, forJudging = 0 WHERE id = :id";
	$param = array(
		":review" => $review,
		":reviewer" => $reviewer,
		":id" => $id
	);
	$res = $db->query("UPDATE",$sql,$param);
	if( $res['status'] ) {
		if( $grades !== null && count($grades) > 0) {
			$query = "INSERT INTO pq_project_grades(id,criteriaNo,grade) 
						VALUES ";
			$param = array(
				":id" => $id
			);
			$i = 0;
			foreach($grades as $g) {
				if( $i > 0 ) {
					$query .= ",";
				}
				$query .= "(:id,:crit_$i,:grade_$i)";
				$param[":crit_$i"] = $i;
				$param[":grade_$i"] = $g;
				$i++;
			}

			$res = $db->query("INSERT",$query,$param);
			if(!$res['status']) {
				echo $res['error'];
				return false;
			}
		}

		if( $recogs !== null && count($recogs) > 0) {
			$query = "INSERT INTO pq_project_recogs(id,recog) 
						VALUES ";
			$param = array(
				":id" => $id
			);
			$i = 0;
			foreach($recogs as $recog) {
				if( $i > 0 ) {
					$query .= ",";
				}
				$query .= "(:id,:recog_$i)";
				$param[":recog_$i"] = $recog;
				$i++;
			}

			$res = $db->query("INSERT",$query,$param);
			if(!$res['status']) {
				echo $res['error'];
				return false;
			}	
		} 
	}
}

// proj_review(5,1,"Beri Gud project",array(10,9,8,8));

function proj_add($name,$class,$abstract = null,$desc = null,$students = null
					,$tags = null) {
	global $db;

	$query = "INSERT INTO pq_project(name,class";
	$query2 = "VALUES (:name,:class";
	$param = array(
		":name" => $name,
		":class" => $class
	);

	if( $abstract != null ) {
		$query .= ",abstract";
		$query2 .= ",:abstract";
		$param[':abstract'] = $abstract;
	}

	if( $desc != null) {
		$query .= ",description";
		$query2 .= ",:description";
		$param[':description'] = $desc;	
	}

	$query .= ") ".$query2.")";

	$res = $db->query("INSERT_ID",$query,$param);

	if( $res['status'] ) {
		$id = $res['data'];

		if( $students != null && count($students) > 0) {
			$query = "INSERT INTO pq_project_students(projectId,studentId) 
						VALUES ";
			$params = array(
				":projectId" => $id
			);
			$i = 0;
			foreach($students as $student) {
				$student_id = student_add($student['idNo'],$student['fName']
											,$student['lName']
											,$student['email']);
				if( $student_id ) {
					if( $i > 0) {
						$query .= ",";
					}
					$query .= "(:projectId,:studentid_$i)";
					$params[":studentid_$i"] = $student_id;
					$i++;
				}
			}
			
			$res = $db->query("INSERT",$query,$params);
			if( !$res['status']) {
				echo $res['error'];
				return false;
			}
		}

		if( $tags !== null && count($tags) > 0) {
			$query = "INSERT INTO pq_project_tags(id,tag) 
						VALUES ";
			$param = array(
				":id" => $id
			);
			$i = 0;
			foreach($tags as $tag) {
				if( $i > 0 ) {
					$query .= ",";
				}
				$query .= "(:id,:tag_$i)";
				$param[":tag_$i"] = $tag;
				$i++;
			}

			$res = $db->query("INSERT",$query,$param);
			if(!$res['status']) {
				echo $res['error'];
				return false;
			}	
		} 

		return $id;
	} else {
		echo $res['error'];
		return false;
	}
}

function proj_add_images($id,$images) {
	global $db;

	if( $images !== null && count($images) > 0) {
		$query = "INSERT INTO pq_project_images(id,image) 
					VALUES ";
		$params = array(
			":id" => $id
		);
		$i = 0;
		foreach($images as $image) {
			if( $i > 0 ) {
				$query .= ",";
			}
			$query .= "(:id,:image_$i)";
			$params[":image_$i"] = $image;
			$i++;
		}

		$res = $db->query("INSERT",$query,$params);
		if(!$res['status']) {
			echo $res['error'];
			return false;
		}	
	} 
}
// echo proj_add("ShareZone v2","Mobile Application","ShareZone allows you to share and transfer files from multiple different devices with each other with just a web browser and your smartphone.","Simpatico is a text simplification system that makes us of lexical and syntactic simplification methods in order to simplify legalese to plain English in which a majority of the Philippine population can understand. It makes use of various existing NLP tools in order to carry out tasks like multiword extraction and word sense disambiguation.",array(
// 		array(
// 			"idNo" => "11312121",
// 			"fName" => "John",
// 			"lName" => "Collantes",
// 			"email" => "johncollantes@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312122",
// 			"fName" => "John",
// 			"lName" => "Hipe",
// 			"email" => "johnHipe@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312123",
// 			"fName" => "John",
// 			"lName" => "Sorilla",
// 			"email" => "johnSorilla@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312124",
// 			"fName" => "John",
// 			"lName" => "Tolentino",
// 			"email" => "johnTolentino@dlsu.edu.ph"
// 		)
// 	),array(10,9,10,9),null,array("Best in Mobile"),array("CS-ST","Thesis","NLP","Lexical Simplification","Text Simplification","Standford NLP"));
// echo proj_add("HackerCup","Web Application","This amazing website is more than just a registration page, it's a piece of modern art. With flying particles in the background, eye-catching color palette, and useless once the event is finished, the site is still a reminder of what can be achieved through highly practiced procrastination techniques from one of the nation's best procrastinators.",null,array(
// 		array(
// 			"idNo" => "11312121",
// 			"fName" => "John",
// 			"lName" => "Collantes",
// 			"email" => "johncollantes@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312122",
// 			"fName" => "John",
// 			"lName" => "Hipe",
// 			"email" => "johnHipe@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312123",
// 			"fName" => "John",
// 			"lName" => "Sorilla",
// 			"email" => "johnSorilla@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312124",
// 			"fName" => "John",
// 			"lName" => "Tolentino",
// 			"email" => "johnTolentino@dlsu.edu.ph"
// 		)
// 	),array(10,9,10,9),null,array("Best in Category"),array("CS-ST","Thesis","NLP","Lexical Simplification","Text Simplification","Standford NLP"));
// echo proj_add("Optimus Prime","Robotics Hardware","Optimus Prime is consistently depicted as having strong moral character, excellent leadership, and sound decision-making skills, and possesses brilliant military tactics, powerful martial arts, and advanced alien weaponry. Optimus Prime has a strong sense of honor and justice, being dedicated to building peaceful and mutually beneficial co-existence with humans, the protection of life and liberty of all sentient species.",null,array(
// 		array(
// 			"idNo" => "11312121",
// 			"fName" => "John",
// 			"lName" => "Collantes",
// 			"email" => "johncollantes@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312122",
// 			"fName" => "John",
// 			"lName" => "Hipe",
// 			"email" => "johnHipe@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312123",
// 			"fName" => "John",
// 			"lName" => "Sorilla",
// 			"email" => "johnSorilla@dlsu.edu.ph"
// 		),
// 		array(
// 			"idNo" => "11312124",
// 			"fName" => "John",
// 			"lName" => "Tolentino",
// 			"email" => "johnTolentino@dlsu.edu.ph"
// 		)
// 	),array(10,9,10,9),null,array("Best in Category"),array("CS-ST","Thesis","NLP","Lexical Simplification","Text Simplification","Standford NLP"));
// print_r(proj_get_best());
?>