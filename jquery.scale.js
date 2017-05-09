(function(){

        var resize = function(el, options){
        	if(!options.width){
        		options.width = el.data('width');
        	}
        	if(!options.height){
        		options.height = el.data('height');
        	}
    		if(options.width && options.height){
    			var width = el.width();
    			var height = (options.height/options.width)*width;
    			el.height(height);
    		}
    	};
        
    	var scale = function(options){
    		options = $.extend({width:0,height:0}, options);
			var $this = $(this);
			resize($this, options);
			$(window).resize(function(){
				resize($this, options);
			});
    	}
    	
    	$.fn.extend({
    		scale:scale
    	});
    })();
