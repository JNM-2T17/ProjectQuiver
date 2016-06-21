<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/add-project-style.css">
	<link rel="stylesheet" type="text/css" href="css/styles-2.css">

  <!-- Compiled and minified JavaScript -->
  <script src="js/materialize.min.js"></script>

	<!--Import jQuery before materialize.js-->
 <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 

	</head>
	<body>
		<!-- belowNav provides an effect for the nav bar-->
		<!--
				NAVBAR
		-->
		<nav class="white fixed nav" style="position: fixed; z-index: 99; padding-top: -2px; margin-top: -2px;">
				<div class="nav-wrapper nav">
						<!-- Left Part of the NavBar-->
						<div class="valign-wrapper pushleft-5p">
								<a href="index.html">
										<img src="assets/images/quiver-badge-only.png" class="valign moveLeft" style="width: 45px;">
								</a>
								<a href="index.html">
										<h4 class="white-to-quiver valign pushleft-10p moveLeft" style="color: black;">
												QUIVER
										</h4>
								</a>
								<span class="right" style="position: absolute; right: 0px;">
										<!-- Only visible when screensize is desktoplike or larger -->
										<a href="#" data-activates="mobile-demo" class="button-collapse">
												<i class="material-icons">
														menu
												</i>
										</a>
										<ul class="right hide-on-med-and-down" style="padding-right: 20px;">
												<li class="moveLeft">
														<a class="white-to-quiver " href="#">
																FAQ
														</a>
												</li>
												<li class="moveLeft">
														<a class="white-to-quiver " href="#">
																Requirements
														</a>
												</li>
												<li>
														<a id="submitBtn" href="mobile.html" class="quiver-green-text"
															 style="border-radius: 40px; height: 35px; margin-top: 15px; line-height: 35px; color: white; background: #0a1b20;">
																Submit
														</a>
												</li>
										</ul>
								</span>
						</div>
						<!-- Only shown when screen size == mobile or similar-->
						<ul class="side-nav" id="mobile-demo">
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Requirements</a></li>
								<li><a href="#">Submit</a></li>
						</ul>
				</div>
		</nav>
		<!-- \NAVBAR -->

		<div class="row add-project-form-container">
			<h1> Add Project </h1>
			<form action = "includes/controller.php" method= "post" enctype="multipart/form-data">
			<input type="hidden" name='request' value="addProject"/>
			<div class = "row">
				<div class="input-field col s6">
			      <input placeholder="Placeholder" id="name" name="projname" type="text" class="validate">
			      <label for="first_name">Name</label>
			    </div>
			</div>
			<div class = "row">
				<div class="input-field col s12">
	    			<select name="category">
		      			<option value="" disabled selected>Choose your option</option>
		      			<option value="Web Application">Web</option>
		      			<option value="Mobile Application">Mobile</option>
		      			<option value="Desktop Application">Desktop</option>
						<option value="Hardware Project">Hardware</option>
	    			</select>
	    			<label>Category</label>
			 	</div>
			</div>

			<div class = "row">
					<ul id = "memlist">
					</ul>
					<div class="input-field col s6">
		        <input placeholder="ID Number" id="idNo" type="text" class="validate">
		        <input placeholder="First Name" id="firstName" type="text" class="validate">
		        <input placeholder="Last Name" id="lastName" type="text" class="validate">
		        <input placeholder="Email Address" id="emailAdd" type="text" class="validate">
		        <label for="members">Add Member name here</label>
						<button type="button" class="btn-flat grey lighten-2" id = "add-member">Add Member</button>
		    	</div>
			</div>
		
			<div class="row">
				<div class="input-field col s12">
		          <textarea name = "abstract" id="abstract" name="projabstract" class="materialize-textarea"></textarea>
		          <label for="Abstract">Abstract</label>
		        </div>
			</div>
			<div class="row">
				<div class="input-field col s12">
		          <textarea name = "description" id="description" name="projdescription" class="materialize-textarea"></textarea>
		          <label for="Description">Description</label>
		        </div>
			</div>
			<div class = "row">
				<ul id = "taglist"></ul>
				<div class="input-field col s6">
			        <input placeholder="Algocom" id="tags" type="text" class="validate">
			        <label for="tags">Add Tag here</label>
					<button type="button" class="btn-flat grey lighten-2" id = "add-tag">Add Tag</button>
		    	</div>
			</div>
			<div class = "row">
				<div class="file-field input-field">
			      <div class="btn">
			        <span>File</span>
			        <input type="file" name="images[]" multiple>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" placeholder="Upload one or more files">
			      </div>
			    </div>
			</div>
		<div class="row">
			<button class="btn green accent-3" type="submit" name="action" id = "submit">Submit</button>
		</div>
	</div>

	<!-- Script for changing navbar color. I know it's primitive. -->
	<script src="js/addProject.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/laurenz.js"></script>
</body>
</html>
