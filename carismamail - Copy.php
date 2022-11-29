<?php
ob_start();
error_reporting(0);
session_start();
include 'smtpmail/library.php'; // include the library file
include "smtpmail/classes/class.phpmailer.php"; // include the class name



if( (empty($_POST['contactemail'])) && ($_SESSION['captcha_code'] == $_POST['captcha_code']) && (strlen($_POST['captcha_code']) >=1)) {
  header('Location: index.html'); 
}

//echo $_POST['contactname'];
//echo $_POST['contactemail'];
//echo $_POST['contactmessage'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carisma Solutions:Knowledge Process Outsourcing (KPO) unit</title>
    <meta name="Description" content="Carisma Solutions is a Knowledge Process Outsourcing (KPO) unit, with its operations facility in India and Melbourne, Australia. A Strategic Business Unit offering support service to overseas clients, who wish to outsource their business process. ">
    <meta content="Accounting KPO India,australian accounting kpo, Financial KPO in India,finance knowledge process outsourcing" name="keywords">
    <meta name="classification" content="Carisma Accounting Solutions">
    <meta name="author" content="Carisma Solutions">
    <meta name="distribution" content="Global">
    <meta name="coverage" content="Worldwide">
    <meta name="rating" content="General">
    <meta name="ROBOTS" content="ALL">
    <meta name="robots" content="index, follow">
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

     <script src="assets/js/modernizr.custom.js"></script>

    <link href="assets/css/stylecpt.css" rel="stylesheet">

    <!-- google map -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script>
    var myCenter=new google.maps.LatLng(-20.031713,145.788548);

    function initialize()
    {
    var mapProp = {
      center:myCenter,
      zoom:15,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
      position:myCenter,
      });

    marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  <!-- google map -->
<script type='text/javascript'>
function refreshCaptcha(){
    alert("dfhfg");
  var img = document.images['captchaimg'];
  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
  alert(substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000);

}
</script>
</head>

<body>
    <!-- preloader area start -->
  
    <!-- preloader area end -->
    <!-- header area start -->
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-6 text-center">
                    <a href="index.html" class="logo">
                        <img src="assets/img/icons/carisma-logo.png" class="img-fluid" alt="logo">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                     <nav class="main-menu">
                        <ul id="navigation">
                            <li><a href="index.html" class="active-link">HOME </a></li>
                            <li><a href="whyus.html">WHY US</a></li>
                            <li><a href="#">SERVICES</a>
                           <ul>
                           <li><a href="service.html">SUPERANNUATION</a></li>
                           <li><a href="business.html">BUSINESS SERVICES</a></li>
                           <li><a href="financial.html">FINANCIAL PLANNING</a></li>
                           <li><a href="bookkeeping.html">BOOKKEEPING</a></li>
                           <li><a href="consulting.html">CONSULTING</a></li>
                           </ul>
                           </li> 
                            <li><a href="#">EVENTS</a>
                            <ul>
                           <li><a href="classconnect.html">CLASSCONNECT</a></li>
                           <li><a href="consulting.html">XEROCON</a></li>
                           </ul>
                            </li>
                            <li><a href="careers.html">CAREERS</a>
                                <ul>
                                <li><a href="job-details.html">CURRENT OPENINGS</a></li>    
                                </ul>
                            </li>
                            <li><a href="http://carisma-solutions.com.au/blog/">BLOG</a></li>
                          <!--   <button class="button button2">Contact Us</button>
                           <li class="work"><a href="#">WM</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 col-6 text-right">
                     <button onclick="window.location.href = 'http://www.carisma-solutions.com.au/carismademo/contact.html';"  class="button"> Contact Us</button>
                     <li class="work"><a href="#">WM</a></li>
                </div> 
                <div class="col-12">
                    <div class="mobile_menu"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- our Team Page
    ==========================================-->
    <section class="contact-area section-padding">
        <div class="container">
            <div class="row"> 
              <div class="section-heading">
      <h2>Hi <?php echo $_POST['contactname']; ?></h2> 
      <?php if ( (!empty($_POST['contactemail'])) && ($_SESSION['captcha_code'] == $_POST['captcha_code']) && (strlen($_POST['captcha_code']) >=1) ) {
       ?>
      <p>
      We will get back to you on this shortly.
      </p>
      <?php
      $message= sendcontactdetails();  //echo $message; 
      }
      else
      {
        echo '<p>Invalid details.</p>';
      }
      ?>
    </div>
      </div>      
  </div>
    </section>
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="pull-left fnav">
                    <img src="assets/img/footer/carisma_footer.png">
                </div>
                </div>

                <div class="col-md-6">
                <div class="pull-right fnav">
                    <p>ALL RIGHTS RESERVED. COPYRIGHT © <script>document.write(new Date().getFullYear())</script>.</p>
                <p>DISCLAIMER</p>
                </div>
              </div>
            </div>
        </div>
    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- copyright area end -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/fontawesome.min.js"></script> -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>
<?php 
 function sendcontactdetails(){
  // echo "Success".$_POST['contactname'];
if(!empty($_POST['contactemail'])) {

$output1="
      <h4>Hi </h4>
      <p>Mr.<b>".$_POST['contactname']."</b> tried to reach us, regarding <b>".$_POST['contactmessage']."</b> </p>
      <p>Contact Email id : ".$_POST['contactemail']." <br/>Mobile No : ".$_POST['phoneno']." 
      </p>";
}
    //new attachment 
    // $attachment = chunk_split(base64_encode(file_get_contents($_FILES['resume']['tmp_name'])));
    // $filename = $_FILES['resume']['name'];
   
   
  //echo $output1;    
    /////
    $subject = "Carisma Contact Mail(Website)";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: webcontact@carisma-solutions.com.au" . "\r\n";
// Additional headers
$emailid = "biz@carisma-solutions.com.au";
//$emailid = "pounraj@purplequay.com";
//$emailid = "test@gmail.com"; test purpose
// Mail it

if ( ($emailid != "") && ($_SESSION['captcha_code'] == $_POST['captcha_code']) && (strlen($_POST['captcha_code']) >=1) )
{
$mail= mail($emailid, $subject, $output1, $headers);
$mail  = new PHPMailer; // call the class 
      $mail->IsSMTP(); 
      $mail->Host = SMTP_HOST; //Hostname of the mail server
      $mail->Port = SMTP_PORT; //Port of the SMTP like to be 25, 80, 465 or 587
      $mail->SMTPAuth = true; //Whether to use SMTP authentication
      $mail->Username = SMTP_UNAME; //Username for SMTP authentication any valid email created in your domain
      $mail->Password = SMTP_PWORD;
      $mail->AddReplyTo("projects@carisma-solutions.com.au", "Project Team"); //reply-to address
      $mail->SetFrom("projects@carisma-solutions.com.au", "Project Team"); //From address of the mail
      
      // put your while loop here like below,
      $mail->Subject = $subject; //Subject od your mail
    //  $recipients = array(
    //     'ranjithgnanasekaran@stephenventures.com' => 'Ranjith'
    //  );
      
      
        // it will display the emails of all users in their Mailbox 'To' area. Simple multiple mail.
      $mail->AddAddress($emailid); //To address who will receive this email  
      
      $mail->MsgHTML($output1); //Put your body of the message you can place html code here
      
      //$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line (usimg absolute path), 
      /*
      if(isset($_POST["contactemail"])){
      $send = $mail->Send(); //Send the mails
      }
      */
      if(isset($_POST["contactemail"])){
        $mail->Send();
          echo '<center><h4 style="color:#009933;">Mail sent successfully </h4></center>';
      }
      // if you want to does not show other users email addresses like newsletter, daily, weekly, subscription emails means use the below line to clear previous email address
      $mail->ClearAddresses();
      
        /*
        if($send){
          echo '<center><h4 style="color:#009933;">Mail sent successfully </h4></center>';
        }
        else{
          echo '<center><h4 style="color:#009933;">Mail not sent </h4></center>';//.$mail->ErrorInfo;
        }
        */
}
$emailid ="";

//mail("ranjithgnanasekaran@stephenventures.com", $subject, $output1, $headers);
    //return $output1;
 }


if(isset($_POST["contactemail"])){
        //store in the database
        //on successful storage
        unset($_POST["contactemail"]);
    }
?>