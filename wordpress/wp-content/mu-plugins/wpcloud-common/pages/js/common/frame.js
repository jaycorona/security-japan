(function($){
	var	_frame	= $('#gmo-wpcloud-settings'),
		_wrap	= $('#wpwrap');
	
	$(window).on('load resize', function(){
		_frame.css('height', 'auto').css( 'height', _wrap.innerHeight() );
	});
})(jQuery);