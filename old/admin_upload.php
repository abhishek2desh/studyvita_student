<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:400,500);

.button-demo { /*general styling for all buttons*/
  font-family: "Roboto";
  color: #244549;
  position: relative;
  background: white;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  -webkit-box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
  box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
  text-shadow: none;
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.button-demo.hovered { /*makes it 'elevate'*/
  -webkit-transform: scale(1.05) !important;
  -ms-transform: scale(1.05) !important;
  transform: scale(1.05) !important;
}

.ripple { /*stylings for the circular overlay*/
  position: absolute;
  border-radius: 100%;
  width: 0;
  height: 0;
  background: rgba(0,0,0, .05);
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.notransition { /*used to reset the ripple without an animatiion*/
  -webkit-transition: none !important;
  transition: none !important;
}

/*just the button stylings*/


.button-demo.big {
  position: absolute;
  left: 50%;
  margin-left: -200px;
  margin-top: 50px;
  width: 350px;
  height: 250px;
  font-size: 24px;
  line-height: 250px;
}

.button-demo.small {
  position: absolute;
  padding: 10px;
  margin-top: 50px;
  margin-left: 40px;
}

.button-demo.medium {
  position: absolute;
  padding: 10px;
  font-size: 24px;
  margin-top: 50px;
  margin-left: 200px;
}
</style>
</head>

<body>
<script>
$(document).ready( function (){
  //appends the overlay to each button
    $(".button-demo").each( function(){
       var $this = $(this);
    $this.append("<div class='ripple'></div>");
    });
  
  
    $(".button-demo").click(function(e){
      var $clicked = $(this);
      
      //gets the clicked coordinates
      var offset = $clicked.offset();
  var relativeX = (e.pageX - offset.left);
  var relativeY = (e.pageY - offset.top);
      var width = $clicked.width();
      
      
      var $ripple = $clicked.find('.ripple');
      
      //puts the ripple in the clicked coordinates without animation
      $ripple.addClass("notransition");
      $ripple.css({"top" : relativeY, "left": relativeX});
      $ripple[0].offsetHeight;
      $ripple.removeClass("notransition");
      
      //animates the button and the ripple
      $clicked.addClass("hovered");
      $ripple.css({ "width": width * 2, "height": width*2, "margin-left": -width, "margin-top": -width });
      
      setTimeout(function(){
          //resets the overlay and button
          $ripple.addClass("notransition");
          $ripple.attr("style", "");
          $ripple[0].offsetHeight;
          $clicked.removeClass("hovered");
        $ripple.removeClass("notransition");
      }, 300 );
    });
});         
</script>
</body>
</html>
