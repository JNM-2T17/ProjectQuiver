var members = 0;
var tags = 0;
var imageOK = true;
var imageError = "";

function checkSubmit() {
	console.log($("#projname").val().length);
	console.log($("#projcat").val());
	console.log($("#projabstract").val().length);
	console.log($("#projdescription").val().length);
	var message = "";
	if( !($("#projname").val().length > 0 &&
		$("#projcat").val() != null &&
		$("#projabstract").val().length > 0 &&
		$("#projdescription").val().length > 0 ) ){
		message += "Please fill out all fields.";
	} 
	console.log(imageOK + "ERROR: \"" + imageError + "\"");
	if(!imageOK) {
		message += (message.length == 0 ? "" : "<br/>") + imageError;
	}
	if( members == 0 ) {
		message += (message.length == 0 ? "" : "<br/>") + "A project must have at least one member.";	
	}
	if( tags == 0 ) {
		message += (message.length == 0 ? "" : "<br/>") + "A project must have at least one tag.";	
	}
	console.log(message);
	if( message.length == 0 ) {
		return true;
	} else {
		showError(message);
		return false;
	}
}


$(document).ready(function(){
	var status = $("#status").val();
	if(status && status.length > 0 ) {
		switch(status) {
			case "success":
				showSuccess("Project successfully added.");
				break;
			case "error":
				showError("Failed to add project.");
				break;
			default:
		}
	}

	$("#projImages").bind('change',function() {
		console.log(this.files);
		imageError = "";
		for(x in this.files) {
			if(this.files[x].size > 10485760) {
				imageError += (imageError.length == 0 ? "" : "<br/>") + this.files[x].name + " is too large";
			}
		}

		if( imageError.length > 0 ) {
			imageOK = false;
			showError(imageError);
		} else {
			imageOK = true;
		}
	});

	 $("#add-tag").click(function() {
		var tag = $("#tags").val();
		if( tag.length > 0 ) {
			$("#taglist").append("<div class='tag-entry'>" + tag
						+ "<input type='hidden' name='tags[]' value='"
						+ tag + "' /></div>");
			$("#tags").val("");
			tags++;
		} else {
			showError("Tag cannot be empty.");
		}
	});

	$("#add-member").click(function() {
		var idNo = $("#idNo").val();
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var emailAdd = $("#emailAdd").val();
		var message = "";
		if( !/^[0-9]{8}$/.test(idNo) ) {
			message += "ID Number is invalid.";
		}
		if( !/^[a-z ,.'-]+$/i.test(firstName)) {
			message += (message.length == 0 ? "" : "<br/>")
						+ "First Name is invalid.";
		}
		if( !/^[a-z ,.'-]+$/i.test(lastName)) {
			message += (message.length == 0 ? "" : "<br/>")
						+ "Last Name is invalid.";
		}
		if( !/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/.test(emailAdd)) {
				message += (message.length == 0 ? "" : "<br/>")
						+ "Email Address is invalid. Make sure you are inputting a valid DLSU email.";
		}
		if( message.length == 0 ) {
			$("#memlist").append("<div class='mem-entry'>"
				+ idNo + " - " + firstName + " " + lastName + " - "
				+ emailAdd
				+ "<input type='hidden' name='idNo[]' value='"
				+ idNo + "' />"
				+ "<input type='hidden' name='fName[]' value='"
				+ firstName + "' />"
				+ "<input type='hidden' name='lName[]' value='"
				+ lastName + "' />"
				+ "<input type='hidden' name='email[]' value='"
				+ emailAdd + "' /></div>");
			$("#idNo").val("");
			$("#firstName").val("");
			$("#lastName").val("");
			$("#emailAdd").val("");
			members++;
		} else {
			showError(message);
		}
	});

	$('select').material_select();
});
