/*
    AUTHOR: LAURENZ (laurenz@outlook.ph)
*/

var a = 0;

function showError(message) {
  console.log("Error: " + message);
  $("#alert-container p").html(message);
  $("#alert-container h4").html("Error");
  $("#alert-container").show();
  setTimeout(function(){
    $("#alert-container").fadeOut("slow");
  }, 3000);
}

function showMessage(message) {
  console.log("Message: " + message);
  $("#alert-container p").html(message);
  $("#alert-container h4").html("Success");
  $("#alert-container").show();
  setTimeout(function(){
    $("#alert-container").fadeOut("slow");
  }, 3000);
}

function appendMessage(message, add) {
  return message + (message.length == 0 ? "" : "<br/>") + add;
}

function checkPass(pass) {
  var message = "";
  if( pass.length < 8 ) {
    message = appendMessage(message,"Password must be at least 8 characters long.");
  }
  
  var cap = false;
  var low = false;
  var num = false;
  var spec = false;
  
  for(var i = 0; i < pass.length; i++) {
    if( /[A-Z]/.test(pass.substring(i,i + 1))) {
      cap = true;
    } else if(/[a-z]/.test(pass.substring(i,i + 1))) {
      low = true;
    } else if(/[0-9]/.test(pass.substring(i,i + 1))) {
      num = true;
    } else {
      spec = true;
    }
  }
  
  if( !cap ) {
    message = appendMessage(message,"Password must contain at least one uppercase letter.");
  }
  if( !low ) {
    message = appendMessage(message,"Password must contain at least one lowercase letter.");
  }
  if( !num ) {
    message = appendMessage(message,"Password must contain at least one number.");
  }
  if( !spec ) {
    message = appendMessage(message,"Password must contain at least one non-alphanumeric character.");
  }
  
  return message.length == 0 ? true : message;
}

$(".button-collapse").sideNav();

$(document).scroll(function(){
    
    // console.log($(this).scrollTop() + " " + a);
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

$(document).ready(function(){
        $("#alert-container").hide();

        var message = $("#message").val();
        console.log("Message: " + message)
        if( message && message.length > 0 ) {
          showMessage(message);
        }
        var error = $("#error").val();
        console.log("Error: " + error + " " + (error && error.length > 0 ));
        if( error && error.length > 0 ) {
          console.log("HERE NIGGA");
          showError(error);
        }
        a = $("nav").offset() ? $("nav").offset().top + 200 : 0 ;

        var bodyheight = $(window).height();
        $(".windowheight").css('max-height', bodyheight);

        $(window).resize(
            function()
            {
                var bodyheight = $(window).height();
                $(".windowheight").css('max-height', bodyheight);
            }
        );
});