function checkSubmit() {
	var message = "";
	console.log($("#firstName").val());
	console.log($("#lastName").val());
	console.log($("#projabstract").val());
	console.log($("#projstudentreview").val());
	console.log($("#projreview").val());
	if( $("#firstName").val().length > 0 ) &&
		$("#lastName").val().length > 0 &&
		$("#accountPass").val().length > 0 )
		message = "Please fill out all fields."
	}
	if( !/^([a-zA-Z0-9_\-\.]+)@(dlsu.edu.ph|delasalle.ph)$/.test(emailAdd)) {
			message += (message.length == 0 ? "" : "<br/>")
					+ "Email Address is invalid. Make sure you are inputting a valid DLSU email.";
	}
	if( message.length == 0 && document.getElementById("admin").checked == true) {
		$("#confirm-password-overlay").show();
		$("#firstName").val("");
		$("#lastName").val("");
		$("#emailAdd").val("");
	}
		else {
		$("#alert-container p").html(message);
		$("#alert-container").show();
		setTimeout(function(){
			$("#alert-container").fadeOut("slow");
		}, 3000);
	}
}


$(document).ready(function(){
	$("#create-account").click(function() {
		alert("hi");
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var emailAdd = $("#emailAdd").val();
		var message = "";
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
		if( message.length == 0 && document.getElementById("admin").checked == true) {
			$("#confirm-password-overlay").show();
			$("#firstName").val("");
			$("#lastName").val("");
			$("#emailAdd").val("");
		} else if( message.length == 0 && document.getElementById("faculty").checked == true

		}
		else {
			//alert(message);
			$("#alert-container p").html(message);
			$("#alert-container").show();
			setTimeout(function(){
				$("#alert-container").fadeOut("slow");
			}, 3000);
		}
	});

	$('select').material_select();
});
