/*
    AUTHOR: LAURENZ (laurenz@outlook.ph)
*/

function showError(message) {
  $("#alert-container p").html(message);
  $("#alert-container").show();
  setTimeout(function(){
    $("#alert-container").fadeOut("slow");
  }, 3000);
}

$(".button-collapse").sideNav();

var a = $("nav").offset().top;

$(document).ready(function(){
    $("#alert-container").hide();
    console.log($(this).scrollTop() + " " + a);
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
        var bodyheight = $(window).height();
        $(".windowheight").css('max-height', bodyheight);

        $(window).resize(
            function()
            {
                var bodyheight = $(window).height();
                $(".windowheight").css('max-height', bodyheight);
            }
        );
    }
);

/*
$(document).ready(function(){
   var scroll_start = 0;
   var startchange = $('.changeMe');
   var offset = startchange.offset();
   $(document).scroll(function() {
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $('.nav').css('background-color',
                        'rgb(10, 27, 32)');
       } else {
          $('.nav').css('background-color', 'transparent');
       }
   });
});
*/
