/**
 * createAccount.js
 * @author Austin Fernandez
 * @20160813
 * This file handles the create account screen.
 */
var createAccount = (function() {
	var auth = false;

	$(document).ready(function(){
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
					"token" : $("input[name='token']").val(),
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
	return {
		/**
		 * checks the form if all fields' values are valid.
		 * @return true if everything is valid, false otherwise
		 */
		checkSubmit : function() {
			var message = "";
			var firstName = $("#firstName").val();
			var lastName = $("#lastName").val();
			var emailAdd = $("#emailAdd").val();
			var accountPass = $("#accountPass").val();
			var confirmPass = $("#confirmPass").val();
			var accType = $("input[name='accountType']:checked").attr("id");
			var accTypeVal = $("input[name='accountType']:checked").val();
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

			var passCheck = checkPass(accountPass);
			if(passCheck !== true ) {
				message += (message.length == 0 ? "" : "<br/>")
							+ passCheck;	
			} else if(accountPass !== confirmPass) {
				message += (message.length == 0 ? "" : "<br/>")
							+ "Passwords don't match.";	
			}
			if( !/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/.test(emailAdd)) {
					message += (message.length == 0 ? "" : "<br/>")
							+ "Email Address is invalid. Make sure you are inputting a valid DLSU email.";
			}
			if( !/^(1|2)$/.test(accTypeVal)) {
					message += (message.length == 0 ? "" : "<br/>")
							+ "Please select a valid account type.";
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
	};
})();
