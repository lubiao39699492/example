    (function(){

    	var float = function(wrap, img){
        	
    		wrap.css('overflow','hidden');
    		
    		if(wrap.width()/img.width() > wrap.height()/img.height()){
    			
    			var h = img.height()*(wrap.width()/img.width());
    			var t = (h-wrap.height())/2;
    			
    			img.css({
    				'height':'auto',
    				'width':'100%',
    				'margin-top':-t
    			});
    		}else{
    			
    			var w = img.width()*(wrap.height()/img.height());
    			var l = (w-wrap.width())/2;
    			
    			img.css({
    				'height':'100%',
    				'width':'auto',
    				'margin-left':-l
    			});
    		}
    	};

        var resize = function(img, options){
            var wrap = img.parent('div.img-wrap');
            if(wrap.length > 0){
                img.unwrap();
            }
            
        	img.wrap('<div class="img-wrap"></div>');
        	var wrap = img.parent('div.img-wrap');
            
        	if(!options.width){
        		options.width = img.data('width');
        	}
        	if(!options.height){
        		options.height = img.data('height');
        	}
    		if(options.width && options.height){
    			var width = img.width();
    			var height = (options.height/options.width)*width;
    			wrap.css({
					'width':width,
					'height':height
    			});

    			float(wrap, img);
    		}
    	};
        
    	var scale = function(options){
    		options = $.extend({width:0,height:0}, options);
			var img = $(this);
			resize(img, options);
			$(window).resize(function(){
				resize(img, options);
			});
    	}
    	
    	$.fn.extend({
    		scale:scale
    	});
    })();
