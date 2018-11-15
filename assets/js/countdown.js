$(function(){
	$('.panel-countdown').each(function(){
		$(this).countdown($(this).attr('value'), function(event) {
    	$(this).text(
      	event.strftime('%D days %H:%M:%S')
      );
		});
	});
});