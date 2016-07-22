$(document).ready(function() {
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
});