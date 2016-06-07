<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){

			    $("#btn2").click(function(){
			    	var x = $("#tae").val();
			        $("test").append("<li>" + x +"</li>");
			        console.log(x);
			    });
			});
		</script>
		<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Compiled and minified JavaScript -->
  <script src="js/materialize.min.js"></script>

	<!--Import jQuery before materialize.js-->
 <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script>
		$(document).ready(function() {
			 $('select').material_select();
	 });
 </script>

	</head>
	<body>
		<div class="row">

			<h1> Add Project </h1>
			<form action = "includes/controller.php" method= "post" enctype="multipart/form-data">
			<div class = "row">


			<div class="input-field col s6">
	        <input placeholder="Placeholder" id="name" type="text" class="validate">
	        <label for="first_name">Name</label>
	    </div>

			</div>
			<div class = "row">
				<div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="web">Web</option>
      <option value="mobile">Mobile</option>
      <option value="desktop">Desktop</option>
			<option value="hardware">Hardware</option>
    </select>
    <label>Category</label>
  </div>
			</div>
			<div class="row">
				<div class="input-field col s12">
          <textarea name = "abstract" id="abstract" class="materialize-textarea"></textarea>
          <label for="Abstract">Abstract</label>
        </div>
			</div>
			<div class = "row">

			<ul id = "test">

			</ul>

			<div class="input-field col s6">
	        <input placeholder="Algocom" id="tags" type="text" class="validate">
	        <label for="tags">Add Tag here</label>
					<button class="waves-effect waves-light btn" id = "tae">Add Tag</button>
	    </div>

		</div>



			<div class="row">
							<label>Images of project</label>
							<div class="file-field input-field">
								 <div class="btn">
										<span>Browse</span>
										<input type="file" multiple>
								 </div>
								 <div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload multiple Images">
								 </div>
							</div>
				</div>

</div>
	</body>
</html>
