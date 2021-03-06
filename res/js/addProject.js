function checkSubmit() {
	console.log($("#projname").val());
	console.log($("#projmembers").val());
	console.log($("#projabstract").val());
	console.log($("#projstudentreview").val());
	console.log($("#projreview").val());
	if( $("#projname").val().length > 0 &&
		$("#projmembers").val().length > 0 &&
		$("#projabstract").val().length > 0 &&
		$("#projstudentreview").val().length > 0 &&
		$("#projreview").val().length > 0 ) {
		return true;
	} else {
		alert("Please fill out all fields.");
		return false;
	}
}
$(".button-collapse").sideNav();

var a = $(".nav").offset().top;

$(document).ready(function(){
	$("#alert-container").hide();
	if($(this).scrollTop() > a)
	{
			$('.nav').css({"background":"rgb(10, 27, 32)"});
			$('.white-to-quiver').css({"color":"white"});
			$('#submitBtn').css({"color":"#0a1b20", "background":"#00e676"});
			$('.moveLeft').css({"transform":"translate(0px,0px)", "transition":"transform 0.4s ease-in-out"});

	} else {
			$('.nav').css({"background":"white"});
			$('.white-to-quiver').css({"color":"#0a1b20"});
			$('#submitBtn').css({"color":"white", "background":"#0a1b20"});
			$('.moveLeft').css({"transform":"translate(-30px,0px)"});
	}

   $("#add-tag").click(function() {
		var tag = $("#tags").val();
		if( tag.length > 0 ) {
			$("#taglist").append("<div class='tag-entry'>" + tag
						+ "<input type='hidden' name='tags[]' value='"
						+ tag + "' /></div>");
			$("#tags").val("");
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
