 var throttled = _.throttle(trackMove, 0);
 $(".alert").mousemove(throttled);


 function trackMove(event) {
     currentTarget = $(event.currentTarget)
     tooltip = currentTarget.find(".ytp-progress-tooltip")

     //  if the mouse pointer is between 
     currentTargetRight = currentTarget.offset().left + currentTarget.outerWidth()
     tooltipWidth = tooltip.outerWidth()

     $(".console").html("event.clientX = " + event.clientX.toString() + "<br/>");
     $(".console").append("currentTargetRight - (tooltip.outerWidth()) = " + (currentTargetRight - (tooltip.outerWidth())).toString() + "<br/>");
     $(".console").append("currentTargetRight = " + currentTargetRight + "<br/>");
     if (event.clientX < (currentTarget.offset().left + (tooltip.outerWidth() / 2))) {
         tooltip.css("left", "0px");
         tooltip.css("right", "");
        
     } else if (event.clientX > (currentTargetRight - (tooltip.outerWidth() / 1.5))) {
         tooltip.css("right", "0px");
         tooltip.css("left", "");
       

     } else if (event.clientX > (currentTarget.offset().left + (tooltip.outerWidth() / 2)) && event.clientX < (currentTargetRight - (tooltip.outerWidth() / 2))) {
        
         tooltip.css("left", parseInt(event.clientX) - (tooltip.outerWidth() / 2) + "px");
         tooltip.css("right", "");
         

     }

 }