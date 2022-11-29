<?php
include_once('dbConf.php');

require 'mailer/phpmailer/PHPMailerAutoload1.php';
require 'mailer/mailerdetail.php';

if(isset($_POST['sbmt_registration']))
{
	$error = false;
	mysqli_autocommit($con,FALSE);
	$documentpath = "onlineregistration/freshers/"; // Upload directory

	foreach ($_FILES['filesresume']['name'] as $f => $name) {     
	    if ($_FILES['filesresume']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['filesresume']['error'][$f] == 0) {
                // start document
					list($txt, $ext) = explode(".", $name);
					date_default_timezone_set ("Asia/Calcutta"); 
					$currentdate=date("d M Y");  
					$file= time().substr(str_replace(" ", "_", $txt), 0);
					$info = pathinfo($file);
					$filename1 = "1".$file.".".$ext;
					$filename = $documentpath.$filename1;
		            if(!move_uploaded_file($_FILES["filesresume"]["tmp_name"][$f], $documentpath.$filename1)) {
		            	$error=true;
		            } else {
		            	$sqlresume = $filename;
		            }
                // end document
	    }
	    else{
	    	$error=true;
	    }
	}

	foreach ($_FILES['filespicture']['name'] as $f => $name) {
	    if ($_FILES['filespicture']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['filespicture']['error'][$f] == 0) { 
                // start picture
					list($txt, $ext) = explode(".", $name);
					date_default_timezone_set ("Asia/Calcutta"); 
					$currentdate=date("d M Y");  
					$file= time().substr(str_replace(" ", "_", $txt), 0);
					$info = pathinfo($file);
					$filename1 = "2".$file.".".$ext;
					$filename = $documentpath.$filename1;
		            if(!move_uploaded_file($_FILES["filespicture"]["tmp_name"][$f], $documentpath.$filename1)) {
		            	$error=true;
		            } else {
		            	$sqlpicture = $filename;
		            }
                // end picture
	    }
	    else{
	    	$error=true;
	    }
	}	

	if($error == false) {
		//start reg no

		$queryreg = "SELECT * FROM tbl_registration  order by Id desc LIMIT 1 ";
		$retval = mysqli_query($con ,$queryreg);
		if($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) 
		{
		   $regsno = "CSFR";
		   $retregno = $row['Registerid'];
		   $lnthregno = strlen($retregno);
		   $lnthregnoso = $lnthregno - 4;
		   $regsnocomnvarreg = substr($retregno, 0, $lnthregnoso);
		   $regnolength = substr($retregno, 4);
		   
		   $dataidlength = strlen($regnolength);
		   if(substr("$retregno",$lnthregnoso, 3) == "000")
		   {
		   $lnthregnosocont = $lnthregnoso + 3;
		   $regnolength = substr($retregno, $lnthregnosocont);
		   $srtr="000";
	   			if ($regnolength >= "9" && $regnolength <= "99")
				{
				$srtr="00";
				}
		   
		   }
		   elseif(substr("$retregno",$lnthregnoso, 2) == "00")
		   {
		   $lnthregnosocont = $lnthregnoso + 2;
		   $regnolength = substr($retregno, $lnthregnosocont);
		   $srtr="00";
	   			if ($regnolength >= "99" && $regnolength <= "999")
				{
				$srtr="0";
				}
		   }
		   elseif(substr("$retregno",$lnthregnoso, 1) == "0")
		   {
		   $lnthregnosocont = $lnthregnoso + 1;
		   $regnolength = substr($retregno, $lnthregnosocont);
		   $srtr="0";
	   			if ($regnolength >= "999" && $regnolength <= "9999")
				{
				$srtr="";
				}
		   }
		   else
		   {
		   $regnolength = substr($retregno, $lnthregnoso );
		   $srtr="";
		   }
		   
	   $regnolength = $regnolength + 1;  
	   $regno = $regsnocomnvarreg.$srtr.$regnolength;
	   
	   }
	   else
	   {
		$regno1 = "CSFR";
		$snoini = "000";
		$ano = "1";
		$regno = $regno1.$snoini.$ano;
	   }

	   if (($_POST["referredby"] == 1) or ($_POST["referredby"] == 2) or ($_POST["referredby"] == 8)) {
	   	$otherrefer = mysqli_real_escape_string($con,$_POST["otherrefer"]);
	   }
	   else{
	   	$otherrefer = "";
	   }

	   if (($_POST["course"] == 8) or ($_POST["course"] == 15)) {
	   	$othercourse = mysqli_real_escape_string($con,$_POST["course"]);
	   }
	   else{
	   	$othercourse = "";
	   }

		//end reg no
	    $datetime = date("Y-m-d H:i:s",time());
	    $sqlidins="INSERT INTO tbl_registration(Registerid, Firstname, Lastname, Mobile, Email, Age, Qualification, Course, Courseothers, Percentage, Passedout, State, City, Referred, Refertext, Technicalcourse, Resume, Picture,Datetime)VALUES(
	    '".$regno."',
	    '".mysqli_real_escape_string($con,$_POST["firstname"])."', 
	    '".mysqli_real_escape_string($con,$_POST["lastname"])."', 
	    '".mysqli_real_escape_string($con,$_POST["mobile"])."', 
	    '".mysqli_real_escape_string($con,$_POST["email"])."', 
	    '".mysqli_real_escape_string($con,$_POST["age"])."', 
	    '".mysqli_real_escape_string($con,$_POST["qualification"])."', 
	    '".mysqli_real_escape_string($con,$_POST["course"])."', 
	    '".$othercourse."', 
	    '".mysqli_real_escape_string($con,$_POST["percentage"])."', 
	    '".mysqli_real_escape_string($con,$_POST["yearpassed"])."', 
	    '".mysqli_real_escape_string($con,$_POST["state"])."', 
	    '".mysqli_real_escape_string($con,$_POST["city"])."', 
	    '".mysqli_real_escape_string($con,$_POST["referred"])."',
	    '".$otherrefer."', 
	    '".mysqli_real_escape_string($con,$_POST["technicalcourse"])."', 
	    '".$sqlresume."', 
	    '".$sqlpicture."', 
	    '".$datetime."')";
		if (!mysqli_query($con,$sqlidins)) {
			$error=true;
		} else {
				$prmid = mysqli_insert_id($con);
		}

	}
	else {
	    $error=true;
	}

	if($error == false) {
	    mysqli_commit($con);
	    /*
	    
			    $headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: webcontact@carisma-solutions.com.au" . "\r\n";
*/
                $to_id = $_POST["email"];
                $subject = "Confirmation from Carisma Solutions";
				$message="Dear ".$_POST["firstname"].", <br> <br>
				Thank you for registration.<br> We will get back to you on this shortly.<br>
				";
				//$mail= mail($to_id, $subject, $message, $headers);
				$mail = new PHPMailer;

                $mail->isSMTP();

                $mail->Host = "smtpout.asia.secureserver.net";

                $mail->Port = "587";

                //$mail->SMTPSecure = $smtpsecure;

                $mail->SMTPAuth = true;

                $mail->Username = "gobim@stephenventures.com";

                $mail->Password = "Vasantha@123";

                $mail->setFrom("gobim@stephenventures.com", 'Carisma Solutions');

                $mail->addReplyTo("gobim@stephenventures.com", 'Carisma Solutions');

                $mail->addAddress($to_id);
                //$mail->addAttachment($pathfile);

                $mail->Subject = $subject;

                $mail->msgHTML($message);
               
               /*  if ($mail->send()) {
                   //$error = "Mailer Error: " . $mail->ErrorInfo;
                   //$error=true;
                	header('Location: fresher-registration-thankyou.php?regid='.$regno.'&sts=1');
                } */
                

               if (!$mail->send()) {
                   $error = "Mailer Error: " . $mail->ErrorInfo;
                   $error=true;
                   echo $error;
                }
                else {
                    echo "Mail Send";
                } 
               

	    // header('Location: fresher-registration-thankyou.php?regid='.$regno.'&sts=1');
	}
	else {
	    mysqli_rollback($con);
	    //header('Location: fresher-registration-thankyou.php?regid='.$regno.'&sts=2');
	}

}
?>