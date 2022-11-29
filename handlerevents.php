<?php

date_default_timezone_set('Etc/UTC');
require './vendor/autoload.php';

require_once('./vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
require_once('./vendor/phpmailer/phpmailer/class.phpmailer.php');
require_once('./vendor/phpmailer/phpmailer/class.smtp.php');


$toemails = array();

$toemails[] = array(
				'email' => 'rada@carisma-solutions.com.au', // Your Email Address
				'name' => 'Carisma Solutions' // Your Name
			);

// Form Processing Messages
$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

// Add this only if you use reCaptcha with your Contact Forms
$recaptcha_secret = 'your-recaptcha-secret-key'; // Your reCaptcha Secret

$mail = new PHPMailer();

// If you intend you use SMTP, add your SMTP Code after this Line


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( $_POST['email'] != '' ) {

		$name = isset( $_POST['name'] ) ? $_POST['name'] : '';
        $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		$phone = isset( $_POST['contact'] ) ? $_POST['contact'] : '';
		$company = isset( $_POST['company'] ) ? $_POST['company'] : '';
		$message = isset( $_POST['comment'] ) ? $_POST['comment'] : '';

		$subject = isset($subject) ? $subject : 'Request copy for RADA yearbook';

		$botcheck = $_POST['name'];

		if( $botcheck !== '' ) {

			//$mail->sendEmailTo( $toemail['email'] , $toemail['name'] );
			$mail->SetFrom( $email , $name );
			$mail->AddReplyTo( 'rada@carisma-solutions.com.au' , 'Carisma Solutions'); 
            $mail->AddAddress( 'rada@carisma-solutions.com.au' , 'Carisma Solutions');           
			// foreach( $toemails as $toemail ) {
			// 	$mail->AddAddress( $toemail['emailid'] , $toemail['cliname'] );
			// }
			$mail->Subject = $subject;

			$name = isset($name) ? "First Name: $name<br><br>" : '';
            $lastname = isset($lastname) ? "Last Name: $lastname<br><br>" : '';
			$email = isset($email) ? "Email: $email<br><br>" : '';
			$phone = isset($phone) ? "Phone: $phone<br><br>" : '';
			$company = isset($company) ? "Service: $company<br><br>" : '';
			$message = isset($message) ? "Message: $message<br><br>" : '';

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = " <b> Form Details: </b> <br><br> $name $lastname $email $phone $message ";
            $yourURL="http://carisma-solutions.com.au/events-thank-you#thankyoupage";

			// Runs only when File Field is present in the Contact Form
			if ( isset( $_FILES['template-contactform-file'] ) && $_FILES['template-contactform-file']['error'] == UPLOAD_ERR_OK ) {
				$mail->IsHTML(true);
				$mail->AddAttachment( $_FILES['template-contactform-file']['tmp_name'], $_FILES['template-contactform-file']['name'] );
			}

			// Runs only when reCaptcha is present in the Contact Form
			if( isset( $_POST['g-recaptcha-response'] ) ) {
				$recaptcha_response = $_POST['g-recaptcha-response'];
				$response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response );

				$g_response = json_decode( $response );

				if ( $g_response->success !== true ) {
					echo '{ "alert": "error", "message": "Captcha not Validated! Please Try Again." }';
					die;
				}
			}

			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();

			if( $sendEmail == true ):
				echo ("<script>location.href='$yourURL'</script>");
			else:
				echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
			endif;
		} else {
			echo '{ "alert": "error", "message": "Bot <strong>Detected</strong>.! Clean yourself Botster.!" }';
		}
	} else {
		echo '{ "alert": "error", "message": "Please <strong>Fill up</strong> all the Fields and Try Again." }';
	}
} else {
	echo '{ "alert": "error", "message": "An <strong>unexpected error</strong> occured. Please Try Again later." }';
}

?>