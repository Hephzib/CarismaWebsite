<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require './vendor/autoload.php';

require_once('./vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
require_once('./vendor/phpmailer/phpmailer/class.phpmailer.php');
require_once('./vendor/phpmailer/phpmailer/class.smtp.php');

$toemails = array();

$toemails[] = array(
				'email' => 'pooja.r@purplequay.com', // Your Email Address
				'name' => 'Test' // Your Name
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
		$phone = isset( $_POST['PhoneNo'] ) ? $_POST['PhoneNo'] : '';
		$LastDateofGraduation = isset( $_POST['LastDateofGraduation'] ) ? $_POST['LastDateofGraduation'] : '';
		$Qualification = isset( $_POST['Qualification'] ) ? $_POST['Qualification'] : '';
		$YearsofRelevantExperience = isset( $_POST['YearsofRelevantExperience'] ) ? $_POST['YearsofRelevantExperience'] : '';
        $Applying = isset( $_POST['Applying'] ) ? $_POST['Applying'] : '';

		$subject = isset($subject) ? $subject : 'New Message From Contact Form';

		$botcheck = $_POST['name'];

		if( $botcheck !== '' ) {

			// $mail->SetFrom( $email , $name );
			// $mail->AddReplyTo( $email , $name );
			// foreach( $toemails as $toemail ) {
			// 	$mail->AddAddress( $toemail['email'] , $toemail['name'] );
			// }
            $mail->SetFrom( $email , $name );
			$mail->AddReplyTo( 'pooja.r@purplequay.com' , 'Carisma Solutions' ); 
            $mail->AddAddress( 'pooja.r@purplequay.com' , 'Carisma Solutions'  );   
			$mail->Subject = $subject;

            $name = isset($name) ? "First Name: $name<br><br>" : '';
        $lastname = isset($lastname) ? "Last Name: $lastname<br><br>" : '';
		$email = isset($email) ? "Email: $email<br><br>" : '';
		$phone = isset($phone) ? "Contact: $phone<br><br>" : '';
		$LastDateofGraduation = isset($LastDateofGraduation) ? "Last Date of Graduation: $LastDateofGraduation<br><br>" : '';
		$Qualification = isset($Qualification) ? "Qualification: $Qualification<br><br>" : '';
		$YearsofRelevantExperience = isset($YearsofRelevantExperience) ? "Years of Relevant Experience: $YearsofRelevantExperience<br><br>" : '';
        $Applying = isset($Applying) ? "Applying For: $Applying<br><br>" : '';

		

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = "$name $lastname $email $phone $LastDateofGraduation $Qualification $YearsofRelevantExperience $Applying";

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
				echo '{ "alert": "success", "message": "' . $message_success . '" }';
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