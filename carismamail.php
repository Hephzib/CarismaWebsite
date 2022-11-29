<?php
ob_start();
error_reporting(0);
session_start();
include 'smtpmail/library.php'; // include the library file
include "smtpmail/classes/class.phpmailer.php"; // include the class name



if( (empty($_POST['contactemail'])) && ($_SESSION['captcha_code'] == $_POST['captcha_code']) && (strlen($_POST['captcha_code']) >=1)) {
  header('Location: index.html'); 
}

echo $_POST['contactname'];
echo $_POST['contactemail'];
echo $_POST['contactmessage'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=Edge" />
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

    <!-- google map -->
   
</head>

<body>
    <!-- preloader area start -->
  
    <!-- preloader area end -->
   
    <!-- header area end -->
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
        echo '<p>Mr.<b>".$_POST['contactname']."</b> tried to reach us, regarding <b>".$_POST['contactmessage']."</b> </p>
      <p>Contact Email id : ".$_POST['contactemail']." <br/>Mobile No : ".$_POST['phoneno']." 
      </p>";';
      }
      ?>
    </div>
      </div>      
  </div>
    </section>

<!-- contact area start -->
    <section class="contact-area section-padding">
        <div class="container">
            <div class="row"> 
                <div class="col-sm-12 col-md-1 col-lg-1">
                    </div>
                    <div class="col-sm-12 col-md-10 col-lg-10"> 
                    <div class="section-title center">
                        <h2>Contact Us</h2>
                    </div>
            </div>
        </div> 

    <div class="row">
        <div class="col-lg-1 col-md-1">
         </div>
         
         <div class="col-lg-4 col-md-4">
            <h6><i class="fa fa-pencil" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span>Write to us</span></h6>
            <h6><a href="contact#write" class="button button7" >Contact form</a></h6>
          <!-- <h6 style="padding: 10px 10px;font-weight: 500;"> <a href="contact.html#write" style="color: #000000;">&nbsp;&nbsp;&nbsp;Contact us here</h6> -->
          <h6 style="padding: 0px 10px;; font-weight: 500; "> &nbsp;<a href="mailto:biz@carisma-solutions.com.au" style="color: #000000;">&nbsp;&nbsp;biz@carisma-solutions.com.au</a></h6>
          <!-- <p style="font-size: small;"> &nbsp; +91 44 2826 0205, +91 44 2826 0208 </p> -->
         </div>

         <div class="col-lg-3 col-md-3">
             <h6> <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">India</span></h6>
           <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Chennai & Bangalore</h6>
            <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +91 44 2826 0205 </h6>
         </div>

         <div class="col-lg-2 col-md-2">
            <h6> <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">Australia</span></h6>
          <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Melbourne</h6>
          <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +61 390269190 </h6>
         </div>

         <div class="col-lg-2 col-md-2 col-6">
            <p> &nbsp;&nbsp; <a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd"><img src="assets/img/icons/ca_ln.png" alt="carisma-linkedin"></a></p>
         </div>

         <!-- old footer <div class="Bangalore" style="padding:20px;">
          <div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents">
            <h6><i class="fa fa-pencil" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span>Write to us</span></h6>
            <h6><a href="/contact#write" class="button button7" >Contact form</a></h6>
          <h6 style="padding: 0px 10px;; font-weight: 500; "> &nbsp;<a href="mailto:biz@carisma-solutions.com.au" style="color: #000000;">&nbsp;&nbsp;biz@carisma-solutions.com.au</a></h6>
            </div>
        </div>

            <div class="Bangalore" style="padding:20px;"> 
            <div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents">
           <h6> <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">India</span></h6>
           <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Chennai & Bangalore</h6>
            <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +91 44 2826 0205 </h6>
            </div>
        </div>

             <div class="Melbourne" style="padding:20px;">
            <div class="col-lg-3 col-md-4 col-6" style="margin-right:20px;display:contents">
            <h6> <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">Australia</span></h6>
          <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Melbourne</h6>
          <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +61 390269190 </h6>
            </div>
        </div>

         <div class="Melbourne" style="padding:20px;padding-left:56px;">
            <div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents">
            <p> &nbsp;&nbsp; <a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd"><img src="assets/img/icons/ca_ln.png" alt="carisma-linkedin"></a></p>
            </div>
        </div> -->

          </div>
           <div class="line">
              <hr>
           </div>


            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <h5><a href="index">Home</a></h5>
                     <nav class="footer-nav">
                        <ul>
                            <li><a href="/index#intro">Introduction</a></li>
                            <li><a href="/index#testimonial">Testimonial</a></li>
                            <li><a href="index#technology">Accounting Platforms</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h5><a href="/whyus">Why Us</a></h5>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="whyus#carisma">Why Carisma</a></li>
                            <li><a href="whyus#accreditation">Accreditation</a></li>
                            <li><a href="team#team">Our Team</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h5><a href="services">Services</a></h5>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="/business#busines">Business Services</a></li>
                            <li><a href="/annuation#annuation">Superannuation</a></li>
                            <li><a href="/financial#finance">Financial Planning</a></li>
                            <li><a href="/bookkeeping#book">VCFO & BookKeeping  </a></li>
                            <!-- <li><a href="internal.html">Internal Accounting</a></li> -->
                            <li><a href="/consulting#consult">Consulting & Projects</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h5><a href="events">Events</a></h5>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="/classconnect">Classconnect 2019</a></li>
                            <li><a href="/xerocon">Xerocon 2019</a></li>
                            <li><a href="/events#rada">RADA</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h5><a href="coe">COE</a></h5>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="/coe#coe">Why COE?</a></li>
                            <li><a href="/coe#intiate">Projects & Initiatives</a></li>
                            <li><a href="/coe#training">Training</a></li>
                            <li><a href="https://carisma-solutions.com.au/blog/">Blog</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                     <h5><a href="careers">careers</a></h5>
                     <nav class="footer-nav">
                        <ul>
                            <li><a href="/applychennai">Chennai</a></li>
                            <li><a href="/applybangalore">Bangalore</a></li>
                            <li><a href="/applymelbourne">Melbourne</a></li>
                            <li><a href="/careers#culture">Life at Carisma</a></li>
                        </ul>
                    </nav>
                </div>
               <!--  <div class="col-lg-2">
                     <h5><a href="http://carisma-solutions.com.au/blog/">Blog</a></h5>
                     <nav class="footer-nav">
                        <ul>
                            <li><a href="http://carisma-solutions.com.au/blog/why-its-better-to-be-special/">Special Professionals</a></li>
                            <li><a href="http://carisma-solutions.com.au/blog/tax-office-priorities-for-tax-returns-2019/">ATO tax return priorities for 2019</a></li>
                            <li><a href="http://carisma-solutions.com.au/blog/australian-federal-budget-2019-20-our-take-on-it/">Federal Budget</a></li>
                        </ul>
                    </nav>
                </div> -->
               <!--  <div class="col-lg-1">
                    <a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd"> <i class="fa fa-linkedin-square" style="background-color: #ffffff;color: #0077B5; font-size: 28px;border-radius: 4px;"></i></a>
                </div> -->
            </div>
        </div>
    </section>
    <!-- contact area end -->

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
                    <p>© <script>document.write(new Date().getFullYear())</script> | ALL RIGHTS RESERVED | POWERED BY PURPLEQUAY</p>
                <a href="/disclaimer"><p>DISCLAIMER & PRIVACY POLICY</p></a>
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
//$emailid = "gobim@stephenventures.com";
$emailid = "pooja.r@purplequay.com";
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