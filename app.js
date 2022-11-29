$('#submit').click(function(e) {
		// e.preventDefault(); 
		console.log('clicked submit');

		var $errors = $('#errors'),
			$status = $('#status'),

			name = $('#name').val().replace(/<|>/g, ""), // no xss
			email = $('#email').val().replace(/<|>/g, ""),
			msg = $('#message').val().replace(/<|>/g, "");

		if (name == '' || email == '' || msg == '') {
			valid = false;
			errors = "All fields are required.";
		}

		console.log('captcha response: ' + grecaptcha.getResponse()); // pretty sure the problem is in this line

		if (!errors) {
			// hide the errors
			$errors.slideUp();
			// ajax to the php file to send the mail
			$.ajax({
				type: "POST",
				url: "https://www.carisma-solutions.com.au/sendmail.php",
				data: "email=" + email + "&name=" + name + "&msg=" + msg + "&g-recaptcha-response=" + grecaptcha.getResponse()
			}).done(function(status) {
				if (status == "ok") {
					// slide down the "ok" message to the user
					$status.text('Thanks! Your message has been sent, and I will contact you soon.');
					$status.slideDown();
					// clear the form fields
					$('#name').val('');
					$('#email').val('');
					$('#message').val('');
				}
			});
		} else {
			$errors.text(errors);
			$errors.slideDown();
		}
	});