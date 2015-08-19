(function($) {
	$(function() {
		$(".date").each(function() {
			var date = $(this).html().split(" ");
			for (var i=0;i<date.length;i++) {
				date[i] = date[i].replace(/[^\d]/g,"");
			}
			$(this).html(date.join("."))
		});
	});
})(jQuery);
