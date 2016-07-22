<?php
/**
 * login.php
 * @author Angela Acorda
 * @20160303
 */
require_once "includes/security-functions.php";

$auth = checkAuth("addProject");
if( $auth === FALSE ) {
	header("Location: login.php");
} else if( $auth === 0 ) {
	header("Location: index.php");
}
?>
<?php require_once "commons/admin-header.php";?>
		<input id="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : "";?>"/>
		<div class="row add-project-form-container">
			<h1> Add Project </h1>
			<form action = "includes/controller.php" method= "post" onsubmit="return checkSubmit();" enctype="multipart/form-data">
			<input type="hidden" name='request' value="addProject"/>
			<div class = "row">
				<div class="input-field col s6">
			      <input placeholder="Placeholder" id="projname" name="projname" type="text" class="validate">
			      <label for="first_name">Name</label>
			    </div>
			</div>
			<div class = "row">
				<div class="input-field col s12">
	    			<select id="projcat" name="category">
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
		          <textarea name = "abstract" id="projabstract" name="projabstract" class="materialize-textarea"></textarea>
		          <label for="Abstract">Abstract</label>
		        </div>
			</div>
			<div class="row">
				<div class="input-field col s12">
		          <textarea name = "description" id="projdescription" name="projdescription" class="materialize-textarea"></textarea>
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

<?php require_once "commons/footer.php"; ?>
