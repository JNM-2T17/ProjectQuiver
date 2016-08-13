 function checkForm() {
    console.log($("#review").val().length);
    if( $("#review").val().length == 0 ) {
        showError("Review cannot be empty.");
        console.log("HEY");
        return false;
    }
    return true;
}

 var a = $(".nav").offset().top + 200;

            $(document).scroll(function(){
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
            });