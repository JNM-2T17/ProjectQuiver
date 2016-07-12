function checkSubmit() {
	console.log($("#projname").val().length);
	console.log($("#projcat").val());
	console.log($("#projabstract").val().length);
	console.log($("#projdescription").val().length);
	if( $("#projname").val().length > 0 &&
		$("#projcat").val() != null &&
		$("#projabstract").val().length > 0 &&
		$("#projdescription").val().length > 0 ) {
		return true;
	} else {
		$("#alert-container p").html("Please fill out all fields.");
		$("#alert-container").show();
		setTimeout(function(){
			$("#alert-container").fadeOut("slow");
		}, 3000);
		return false;
	}
}


$(document).ready(function(){
	 $("#add-tag").click(function() {
		var tag = $("#tags").val();
		if( tag.length > 0 ) {
			$("#taglist").append("<div class='tag-entry'>" + tag
						+ "<input type='hidden' name='tags[]' value='"
						+ tag + "' /></div>");
			$("#tags").val("");
		} else {
			$("#alert-container p").html("Tag cannot be empty.");
			$("#alert-container").show();
			setTimeout(function(){
				$("#alert-container").fadeOut("slow");
			}, 3000);
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
		} else {
			$("#alert-container p").html(message);
			$("#alert-container").show();
			setTimeout(function(){
				$("#alert-container").fadeOut("slow");
			}, 3000);
		}
	});

	$('select').material_select();
});
