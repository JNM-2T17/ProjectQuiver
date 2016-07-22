 function checkForm() {
    console.log($("#review").val().length);
    if( $("#review").val().length == 0 ) {
        showError("Review cannot be empty.");
        console.log("HEY");
        return false;
    }
    return true;
}