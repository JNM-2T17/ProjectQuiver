var auth = false;
function checkSubmit() {
	var message = "";
	var firstName = $("#firstName").val();
	var lastName = $("#lastName").val();
	var emailAdd = $("#emailAdd").val();
	var accountPass = $("#accountPass").val();
	var confirmPass = $("#confirmPass").val();
	var accType = $("input[name='accountType']:checked").attr("id");
	console.log(accType);
	var idNo = $("#idNo").val();
	var message = "";
	if( !/^[a-z ,.'-]+$/i.test(firstName)) {
		message += (message.length == 0 ? "" : "<br/>")
					+ "First Name is invalid.";
	}
	if( !/^[a-z ,.'-]+$/i.test(lastName)) {
		message += (message.length == 0 ? "" : "<br/>")
					+ "Last Name is invalid.";
	}
	if(accountPass.length == 0 ) {
		message += (message.length == 0 ? "" : "<br/>")
					+ "Password cannot be empty.";	
	} else if(accountPass !== confirmPass) {
		message += (message.length == 0 ? "" : "<br/>")
					+ "Passwords don't match.";	
	}
	if( !/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/.test(emailAdd)) {
			message += (message.length == 0 ? "" : "<br/>")
					+ "Email Address is invalid. Make sure you are inputting a valid DLSU email.";
	}
	if( message.length == 0 ) {
		if( !auth && accType === "admin") {
			$("#confirm-password-overlay").show();
			$("#confirm-password-box").show();
			return false;
		}
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
				showSuccess("User successfully created.");
				break;
			case "error":
				showError("Failed to add project.");
				break;
			default:
		}
	}
	$('select').material_select();

	$("#confirm-password-overlay").hide();
	$("#confirm-password-box").hide();
	$("#confirm-password-overlay").click(function(event){
		$("#confirm-password-overlay").fadeOut(2000);
		$("#confirm-password-box").fadeOut(2000);
	});
	$("#authPassConfirm").click(function() {
		var pass = $("#adminPassword").val();
		$.ajax({
			url : "includes/controller.php",
			method : "POST",
			data : {
				"request" : "confirmPassword",
				"password" : pass
			},
			success : function(a) {
				console.log(a);
				if( a == "true") {
					auth = true;
					$("#createAccountForm").submit();
				} else {
					showError("Failed authentication");
				}
			}
		});
	});
});
