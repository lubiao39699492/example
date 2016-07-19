(function(){
	var flat = function(){
		var _this = $(this);
		_this.css('overflow','hidden');
		
		var _img = _this.find('img');
		if(_this.width()/_img.width() > _this.height()/_img.height()){
			
			var h = _img.height()*(_this.width()/_img.width());
			var t = (h-_this.height())/2;
			
			_img.css({
				'height':'auto',
				'width':'100%',
				'margin-top':-t
			});
		}else{
			
			var w = _img.width()*(_this.height()/_img.height());
			var l = (w-_this.width())/2;
			
			_img.css({
				'height':'100%',
				'width':'auto',
				'margin-left':-l
			});
		}
	};
	
	$.fn.extend({
		flat:flat
	})
})();
