<?php
/**
 * addProject.php
 * @author Angelo Amadora
 * @20160225
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Materialize Example</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/materialize.min.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.min.js"></script>
	</head>
	<body>
		<div class="teal">
			<h2>Project Quiver</h2>
			<p>Its Just a testing</p>
		</div>
		<hr/>
		<script src="js/addProject.js"></script>
		<form action="includes/controller.php" method="POST" onSubmit="return checkSubmit();">
			<input type="hidden" name="request" value="submitProject"/>
			<div class="row">
				<div class="col m6 l6 yellow">
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<input placeholder="Project Name" value="Quiver" id="projname" name="projname" type="text" class="active validate" required>
						<label for="projname">Project Name</label>
					</div>
					<div class="input-field col s12 m12 l12">
						<input placeholder="Name" value="Angelo" id="projmembers" name="projmembers" type="text" class="active validate" required>
						<label for="projname">Members</label>
					</div>
				</div>

				<div class="input-field col s12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="projabstract" name="projabstract" class="materialize-textarea"></textarea>
					<label for="projabstract">Abstract</label>
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="projstudentreview" name="projstudentreview" class="materialize-textarea"></textarea>
					<label for="projstudentreview">Student Review</label>
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="projreview" name="projreview" class="materialize-textarea"></textarea>
					<label for="projreview">Review</label>
				</div>


				</div>
				<div class="col s6 m6 l6 grey">
					<p>This area is for the pictures that i dont know how to do lol.</p>
				</div>
			</div>
			<input type="submit" value="Submit Project"/>
		</form>
	</body>
</html>
