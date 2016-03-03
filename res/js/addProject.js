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