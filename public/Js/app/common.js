function ShowAlert(message, type){
	$('#alert-' + type).find('.message').html(message);
	$('#alert-' + type).fadeIn().delay(5000).fadeOut();
}