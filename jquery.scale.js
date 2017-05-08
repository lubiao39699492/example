(function(){

	var scale = function(el, options){
		if(options.width && options.height){
			var width = el.width();
			var height = (options.height/options.width)*width;
			el.height(height);
		}
	}
	
	$.fn.extend({
		scale:function(options){
			var $this = $(this);
			scale($this, options);
			$(window).resize(function(){
				scale($this, options);
			});
		}
	});
})();
