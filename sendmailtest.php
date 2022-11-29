<?php
	// my email
	$email_to = 'pooja.r@purplequay.com.au';

	// getting the data from the post
	$name = $_POST['name'];
	$email_from = $_POST['email'];
	$msg = $_POST['msg'];

	// subject of the email I'm going to get
	$subject = 'Message from $name';

	// make the message I'm going to see
	$finalMsg = 'Email from $email_from\n';
	$finalMsg .= 'Message:\n\n';
	$finalMsg .= '$msg';
	$finalMsg .= '\n\nTo respond, send him an email.';

	// getting the captcha
	$captcha;
	if (isset($_POST['g-recaptcha-response']))
		$captcha = $_POST['g-recaptcha-response'];
	echo 'captcha: '.$captcha;

	if (!$captcha)
		echo 'The captcha has not been checked.';
	// handling the captcha and checking if it's ok
	$secret = '6LdOPgYTAAAAAPSWpxQ7xks9yJPYNsNE0XNHSxTc';
	$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

	var_dump($response);

	// if the captcha is cleared with google, send the mail and echo ok.
	if ($response['success'] != false) {
		// send the actual mail
		@mail($email_to, $subject, $finalMsg);

		// the echo goes back to the ajax, so the user can know if everything is ok
		echo 'ok';
	} else {
		echo 'not ok';
	}

	// @mail($email_to, $subject, $finalMsg);
	// echo 'ok';	
?>