$('form').submit(function(e) {
	e.preventDefault();
	if ($('#password').val() != $('#confirm').val()) {
		$('#errorBox').text('Passwords do not match!');
		$('#errorBox').removeClass('hidden');
		return;
	}
	this.submit();
});