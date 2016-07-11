$('form').submit(function(e) {
	e.preventDefault();
	$.post($('form').attr('action'), {si:  parseInt($('#studentId').val())}, function(data) {
		data = $.parseJSON(data);
		if (data.res == 'invalid') {
			$('#message').removeClass().addClass('errorMessage').text("Student ID was not found or is invalid.");
		} else if (data.res == 'checkin') {
			$('#message').removeClass().addClass('successMessage').text("Checked in successfully. Don't forget to sign out at the end of the meeting.");			
		} else if (data.res == 'checkout') {
			$('#message').removeClass().addClass('successMessage').text("Checked " + data['name'] + " out successfully. You have " + data['hours'].toFixed(3) + " hours.");						
		}
	});
});