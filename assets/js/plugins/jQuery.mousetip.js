// Plugin: jQuery.mousetip
// Source: github.com/nathco/jQuery.mousetip
// Author: Nathan Rutzky
// Update: 1.00
    
$.fn.mousetip = function(tip, x, y) {
    
    var $this = $(this);
    
    $this.hover(function() {
        
        $(tip).show();
    
    }, function() {
    
        $(tip).hide().removeAttr('style');
    
    }).mousemove(function(e) {
        
        var mouseX = e.pageX + (x || 10);
        var mouseY = e.pageY + (y || 10);
    
        $(tip).show().css({
            
            top:mouseY, left:mouseX
            
        });
    });
};
