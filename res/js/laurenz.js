/*
    AUTHOR: LAURENZ (laurenz@outlook.ph)
*/

$(document).ready(
    function()
    { 
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
