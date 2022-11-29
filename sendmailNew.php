
  
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
				'emailid' => 'biz@carisma-solutions.com.au', // Your Email Address
				'cliname' => 'Carisma Solutions' // Your Name

			);

// Form Processing Messages
$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

// Add this only if you use reCaptcha with your Contact Forms
//$recaptcha_secret = 'your-recaptcha-secret-key'; // Your reCaptcha Secret

$mail = new PHPMailer(true);
$autoresponder = new PHPMailer();

//If you intend you use SMTP, add your SMTP Code after this Line



//$mail->SMTPDebug  = 3;
//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( $_POST['email'] != '' ) {

		$name = isset( $_POST['name'] ) ? $_POST['name'] : '';
        $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		$phone = isset( $_POST['contact'] ) ? $_POST['contact'] : '';
		$company = isset( $_POST['company'] ) ? $_POST['company'] : '';
		$servicesbk = implode(", ", $_POST['services']);
		//$servicespara = isset( $_POST['paraplanning'] ) ? $_POST['paraplanning'] : '';
		//$servicessup = isset( $_POST['superannuation'] ) ? $_POST['superannuation'] : '';
		//$servicesbs = isset( $_POST['businessservices'] ) ? $_POST['businessservices'] : '';
		$message = isset( $_POST['comment'] ) ? $_POST['comment'] : '';

		$subject = 'New request for trial';

		$botcheck = $_POST['name'];

		if( $botcheck !== '' ) {

            //$mail->sendEmailTo( $toemail['email'] , $toemail['name'] );
			$mail->SetFrom( $email , $name );
			$mail->AddReplyTo( 'biz@carisma-solutions.com.au' , 'Carisma Solutions' ); 
            $mail->AddAddress( 'biz@carisma-solutions.com.au' , 'Carisma Solutions'  );           
			// foreach( $toemails as $toemail ) {
			// 	$mail->AddAddress( $toemail['emailid'] , $toemail['cliname'] );
			// }
			$mail->Subject = $subject;

			// AutoResponder Settings
			$autoresponder->SetFrom( 'biz@carisma-solutions.com.au' , 'Carisma Solutions' );
			$autoresponder->AddReplyTo( 'biz@carisma-solutions.com.au' , 'Carisma Solutions' );
			$autoresponder->AddAddress( $email , $name );
			$autoresponder->Subject = 'Greetings from Carisma Solutions - Let\'s get your trial started!';

			$name = isset($name) ? "First Name: $name<br><br>" : '';
            $lastname = isset($lastname) ? "Last Name: $lastname<br><br>" : '';
			$email = isset($email) ? "Email: $email<br><br>" : '';
			$phone = isset($phone) ? "Phone: $phone<br><br>" : '';
			//$servicesbk = isset($servicesbk) ? $servicesbk : '';
			//$servicespara = isset($servicespara) ? $servicespara : '';
			//$servicessup = isset($servicessup) ? $servicessup : '';
			//$servicesbs = isset($servicesbs) ? $servicesbs : '';
			$message = isset($message) ? "Message: $message<br><br>" : '';
			
			$custname = $_POST['name'] ;
			//$selectedservices = implode(',',$servicesbk);

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = " <b> Form Details: </b> <br><br> $name $lastname $email $phone I'm interested in : $servicesbk <br><br> $message ";
            $yourURL="http://carisma-solutions.com.au/cpa-thank-you#thankyoupage";

			// AutoResponder Message
			$ar_body = "<p>Hi $custname, </p>We are delighted to connect with you today. <br><br>We are happy to share more information about Carisma Solutions' 360<sup>o</sup> services in the areas of $servicesbk.
            <br><p>One of our client managers who have enabled many Accounting Firms will reach out to you within 24-48 hrs. If you have any questions at all, you can reply directly to this email any time and we will be happy to assist you!  
            <br><br>
			<b>A brief note about us </b>
            <ul>            
            <li>Since 2006 Carisma has delivered comprehensive accounting and financial planning services and solutions to over 100 plus accounting and financial advisory firms in Australia & New Zealand. </li>
            <li>Unique 360<sup>o</sup> Services including Business Services, SMSF Compliance & Audit Support, VCFO, Bookkeeping, Payroll Management, Firm Internal Admin and Para-Planning.</li>
            <li>At Carisma, the beginning of every client engagement is an opportunity to build long lasting partnership. We strive to move from support to lead - to enable our clients to take up new challenges and grow the business.</li>
            <li>We serve clients across Australia including Melbourne, Sydney, Adelaide, Armidale, Tamworth, Echuca, Perth, Gunnedah, Brisbane, Gold Coast etc. </li>
            <li>Our team is 250+ strong working out of three offices in India and one in Australia. </li>
            </ul>

            <div style='fontsize:9px; '>
            Kevin P<br>Team Marketing
            <br> <span>Carisma Solutions P Ltd</span>
            <br>T : +61 03 9075 6705
            <br>409 Waverley Road Malvern East VIC 3145 Australia           
            </div> ";

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
			$autoresponder->MsgHTML( $ar_body );
			$sendEmail = $mail->Send();

			if( $sendEmail == true ): $send_arEmail = $autoresponder->Send();
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

