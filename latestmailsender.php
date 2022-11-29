<?php
         if($_POST['button'] && isset($_FILES['attachment'])) 
{ 

	$from_email		 = 'pooja.r@purplequay.com'; //from mail, sender email addrress 
	$recipient_email = 'gobim@stephenventures.com'; //recipient email addrress 
	
	//Load POST data from HTML form 
	$sender_name = $_POST["sender_name"] //sender name 
	$reply_to_email = $_POST["sender_email"] //sender email, it will be used in "reply-to" header 
	$subject	 = $_POST["subject"] //subject for the email 
	$message	 = $_POST["message"] //body of the email 
	

	/*Always remember to validate the form fields like this 
	if(strlen($sender_name)<1) 
	{ 
		die('Name is too short or empty!'); 
	} 
	*/
	
	//Get uploaded file data using $_FILES array 
	$tmp_name = $_FILES['my_file']['tmp_name']; // get the temporary file name of the file on the server 
	$name	 = $_FILES['my_file']['name']; // get the name of the file 
	$size	 = $_FILES['my_file']['size']; // get size of the file for size validation 
	$type	 = $_FILES['my_file']['type']; // get type of the file 
	$error	 = $_FILES['my_file']['error']; // get the error (if any) 

	//validate form field for attaching the file 
	if($file_error > 0) 
	{ 
		die('Upload error or No files uploaded'); 
	} 

	//read from the uploaded file & base64_encode content 
	$handle = fopen($tmp_name, "r"); // set the file handle only for reading the file 
	$content = fread($handle, $size); // reading the file 
	fclose($handle);				 // close upon completion 

	$encoded_content = chunk_split(base64_encode($content)); 

	$boundary = md5("random"); // define boundary with a md5 hashed value 

	//header 
	$headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version 
	$headers .= "From:".$from_email."\r\n"; // Sender Email 
	$headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email addrress to reach back 
	$headers .= "Content-Type: multipart/mixed;\r\n"; // Defining Content-Type 
	$headers .= "boundary = $boundary\r\n"; //Defining the Boundary 
		
	//plain text 
	$body = "--$boundary\r\n"; 
	$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n"; 
	$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
	$body .= chunk_split(base64_encode($message)); 
		
	//attachment 
	$body .= "--$boundary\r\n"; 
	$body .="Content-Type: $file_type; name=".$file_name."\r\n"; 
	$body .="Content-Disposition: attachment; filename=".$file_name."\r\n"; 
	$body .="Content-Transfer-Encoding: base64\r\n"; 
	$body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n"; 
	$body .= $encoded_content; // Attaching the encoded file with email 
	
	$sentMailResult = mail($recipient_email, $subject, $body, $headers); 

	if($sentMailResult ) 
	{ 
	echo "File Sent Successfully."; 
	unlink($name); // delete the file after attachment sent. 
	} 
	else
	{ 
	die("Sorry but the email could not be sent. 
					Please go back and try again!"); 
	} 
} 

      ?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
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
      <!-- <link rel="stylesheet" href="assets/css/fontawesome.css">	-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> -->
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/slicknav.min.css">
      <link rel="stylesheet" href="assets/css/default.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- font style -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
      <!-- font end -->
      <!--test-->
      
      <!--test-->
      <style type="text/css">
         .box{
         color: black;
         padding: 20px;
         display: none;
         margin-top: 20px;
         }
         .red{ background: white; }
         .green{ background: white; }
         .blue{ background: white; }
         label{ margin-right: 15px; }
         .btn-style1{
         padding: 10px 20px 10px 20px;
         }
         .padding-t{
         padding-top:15px;
         }
         .btn-primary:hover {
         color: #fff;
         background-color: #7c376d;
         border-color: #7c376d;
         }
         .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
         color: #fff;
         background-color: #7c376d;
         border-color: #7c376d;
         }
         .mr0{
         margin-right:0px !important;
         }
      </style>
      <!--The job application section-->
      <!--<script type="text/javascript">
         $(document).ready(function(){
             $('input[type="radio"]').click(function(){
                 var inputValue = $(this).attr("value");
                 var targetBox = $("." + inputValue);
                 $(".box").not(targetBox).hide();
                 $(targetBox).show();
             });
         });
         </script>-->
   </head>
   <body>
      <!-- preloader area start -->
      <!-- preloader area end -->
      <!-- header area start -->
      <nav class="navbar navbar-expand-md navbar-light bg-light">
         <div class="container">
            <a href="/index" class="navbar-brand">
            <img src="assets/img/icons/carisma-logo.png" class="img-fluid" alt="logo">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
               <div class="navbar-nav">
                  <a href="/index" class="nav-item nav-link">ABOUT</a>
                  <a href="/whyus" class="nav-item nav-link">WHY US</a>
                  <div class="dropdown">
                     <a href="#" class="color">
                     <button class="dropbtn dropdown-toggle">SERVICES</button>
                     </a>
                     <div class="dropdown-content">
                        <a href="/business#busines" class="color">BUSINESS SERVICES</a>
                        <a href="/annuation#annuation" class="color">SUPERANNUATION</a>
                        <a href="/financial#finance" class="color">FINANCIAL PLANNING</a>
                        <a href="/bookkeeping#book" class="color">VCFO & BOOKKEEPING (OSS)</a>
                        <a href="/consulting#consult" class="color">CONSULTING & PROJECTS</a>
                        <a href="/technology#tech" class="color">TECHNOLOGY & AUTOMATION</a>
                     </div>
                  </div>
                  <div class="dropdown">
                     <a href="#" class="color">
                     <button class="dropbtn dropdown-toggle">EVENTS</button>
                     </a>
                     <div class="dropdown-content">
                        <a href="/events#classconnect" class="color">CLASSCONNECT 2019</a>
                        <a href="/events#xerocon" class="color">XEROCON 2019</a>
                        <a href="/events#rada" class="color">RADA</a>
                     </div>
                  </div>
                  <a href="coe" class="nav-item nav-link">COE</a>
                  <a href="careers" class="nav-item nav-link active">CAREERS</a>
                  <a href="team" class="nav-item nav-link">TEAM</a>
                  <a href="https://carisma-solutions.com.au/blog/" class="nav-item nav-link">BLOG</a>
                  <!--  <a href="http://carisma-solutions.com.au/blog/" class="nav-item nav-link">BLOG</a> -->
               </div>
               <div class="navbar-nav">
                  <button onclick="window.location.href = 'https://www.carisma-solutions.com.au/contact';"  class="button"> CONTACT US</button>
                  <a href="worksmanager" class="nav-item nav-link work" style="margin-top: 2.6%;">WM</a>
               </div>
            </div>
         </div>
      </nav>
      <!-- header area end -->
      <!-- hero crumbs area start -->
      <section class="careers crumbs">
         <div class="row">
         <div class="col-lg-4 column1 text-center trans" style="background-color: #f1a642;">
            <div class="centered bcd">
               <h3>Job Openings </h3>
               <p> Chennai, India</p>
               <br/>
               <!-- <button class="button6" id="myjob">Apply Now</button> -->
            </div>
         </div>
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-12 text-center"></div>
            </div>
         </div>
      </section>
      <!-- hero crumbs area end -->
      <!-- why us area start -->
      <section class="why-us-area section-padding">
         <div class="container">
            <div class="career-heading">
               <h3>Current Job Openings</h3>
            </div>
            <div class="row" style="padding-top: 4%;">
               <!-- <button class="tablinks" onclick="openCity(event, 'London'),myRole()" id="defaultOpen">Role Overview</button><button class="tablinks" onclick="openCity(event, 'Paris'),myFunction()">Apply Here</button> -->
               <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="careertabcontent">
                     <button class="accordion">Junior Accountant      ( Job posted date 10/02/2020 )</button>
                     <div class="panel">
                        <p class="intro">
                           <b>Qualification:</b> B.Com/M.Com/MBA/CMA(Inter)/CA(Inter)
                        </p>
                        <p class="intro">
                           <b>Experience:</b> 0-1 year 
                        </p>
                        <p class="intro">
                           <b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills
                        </p>
                        <div class="portfolio-item det">
                           <div class="row">
                              <div class="col-sm-6 col-md-5 col-lg-5">
                                 <!--<button onclick="window.location.href = 'https://www.carisma-solutions.com.au/jobs-in-chennai';" class="button3">APPLY NOW</button>-->
                                 <button type="button" class="button button5" data-toggle="modal" data-target="#myModal">APPLY NOW</button>
                              </div>
                              <!--  <div class="col-sm-6 col-md-5 col-lg-5"><a href="mailto:biz@carisma-solutions.com.au" class="button button5">REFER A FRIEND</a></div> -->
                           </div>
                        </div>
                     </div>
                     <!--test-->
                     <!--modal1-->
                     <!-- Modal1 -->
                     <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="opacity: 2;">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title" id="exampleModalLabel">Candidate details</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <!-- <form class="row g-3" enctype="multipart/form-data" method="POST" action="sendmail.php">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Subject Title">Subject Title</label>
                                          <select class="form-control" name="SubjectTitle" id="SubjectTitle1">
                                             <option value="">Select</option>
                                             <option value="Mr">Mr</option>
                                             <option value="Ms">Ms</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="First Name">First Name</label>
                                          <input type="text" class="form-control" required id="firstname" placeholder="First Name"  name="sender_name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Last Name">Last Name</label>
                                          <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="Last Name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Phone No">Phone No</label>
                                          <input type="number" class="form-control"  id="PhoneNo" placeholder="Phone No" name="Phone No">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Email Id">Email Id</label>
                                          <input type="email" class="form-control" id="EmailId" placeholder="Email Id" name="sender_email">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Percentage">Year of Passing</label>
                                          <input type="date" class="form-control"  id="yearofpassed" placeholder="" name="Yerar of Passed">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Percentage">Qualification</label>
                                          <select class="form-control"  name="Qualification" id="qualification">
                                             <option value="0">Select</option>
                                             <option value="1">B.Com</option>
                                             <option value="2">M.Com</option>
                                             <option value="3">M.B.A</option>
                                             <option value="4">CMA(Intern)</option>
                                             <option value="5">CA(Intern)</option>
                                             <option value="6">Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label  for="Experiance">Years of Experiance</label>
                                          <select class="form-control"  name="YearsofExperiance" id="Experiance">
                                             <option value="0">Select</option>
                                             <option value="1">0</option>
                                             <option value="2">1</option>
                                             <option value="3">2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label  for="Applying">Applying For</label>
                                       <input type="text" value="Junior Accountant" class="form-control" disabled  id="Applying" name="Applying">
                                    </div>
                                    <div class="col-md-4">
                                       <label  for="Applying">Upload Resume</label>
                                       <input type="file" class="form-control-file" id="UploadResume">
                                    </div>
                                    <div class="col-md-12 padding-t">
                                       <div class="form-group">
                                          <label  for="Skills">Skills</label>
                                          <textarea class="form-control"  rows="4" id="comment"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-4 text-right">
                                       <button class="button btn-primary mr0" type="submit" value="send" method="post" name="button">Submit</button>
                                       
                                       <button type="button" class="button btn-default btn-style1" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </form> -->
                                 <form enctype="multipart/form-data" method="POST" action=""> 
                                    <label>Your Name <input type="text" name="sender_name" /> </label>  
                                    <label>Your Email <input type="email" name="sender_email" /> </label>  
                                    <label>Subject <input type="text" name="subject" /> </label>  
                                    <label>Message <textarea name="message"></textarea> </label>  
                                    <label>Attachment <input type="file" name="attachment" /></label> 
                                    <label><input type="submit" name="button" value="Submit" /></label> 
                                </form> 
                              </div>
                              <!--<button type="submit" class="btn btn-default btn-style1">Submit</button><button type="button" class="btn btn-default btn-style1" data-dismiss="modal">Close</button>-->
                           </div>
                        </div>
                     </div>
                     <!--modal1-->
                     <!--modal2-->
                     <div class="modal fade" id="myModal1" role="dialog" style="opacity: 2;">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Candidate details</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <form class="row g-3">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="First Name">First Name</label>
                                          <input type="text" class="form-control" required id="txtfirstname" placeholder="First Name" name="First Name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Last Name">Last Name</label>
                                          <input type="text" class="form-control" required id="txtlastname" placeholder="Last Name" name="Last Name">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Phone No">Phone No</label>
                                          <input type="number" class="form-control" required id="txtPhoneNo" placeholder="Phone No" name="Phone No">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Email Id">Email Id</label>
                                          <input type="email" class="form-control" required id="txtEmailId" placeholder="Email Id" name="Email Id">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Percentage">Qualification</label>
                                          <select class="form-control" name="Qualification" id="ddlqualification">
                                             <option value="">Select</option>
                                             <option value="">B.Com</option>
                                             <option value="">M.Com</option>
                                             <option value="">M.B.A</option>
                                             <option value="">CMA(Intern)</option>
                                             <option value="">CA(Intern)</option>
                                             <option value="">Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label  for="Experiance">Years of Experiance</label>
                                          <select class="form-control" name="YearsofExperiance" id="ddlExperiance">
                                             <option value="">Select</option>
                                             <option value="">0</option>
                                             <option value="">1</option>
                                             <option value="">2</option>
                                             <option value="">3</option>
                                             <option value="">4</option>
                                             <option value="">5</option>
                                             <option value="">6</option>
                                             <option value="">7</option>
                                             <option value="">8</option>
                                             <option value="">9</option>
                                             <option value="">10</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label  for="Applying">Applying For</label>
                                       <input type="text" value="Accountant" class="form-control" disabled  id="txtAccountant" name="Applying">
                                    </div>
                                    <div class="col-md-4">
                                       <label  for="Applying">Upload Resume</label>
                                       <input type="file" required class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <div class="col-md-12 padding-t">
                                       <div class="form-group">
                                          <label  for="Skills">Skills</label>
                                          <textarea class="form-control" required rows="4" id="comment"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-4 text-right">
                                       <button class="button btn-primary mr0" type="submit"  value="Send">Submit</button>
                                       <button type="button" class="button btn-default btn-style1" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- modal2-->
                     <!--test-->
                     <button class="accordion">Accountant</button>
                     <div class="panel">
                        <p class="intro">
                           <b>Qualification:</b> B.Com/M.Com/MBA/CMA(Inter)/CA(Inter)
                        </p>
                        <p class="intro">
                           <b>Experience:</b> 1-2 years  
                        </p>
                        <p class="intro">
                           <b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills, Strong knowledge in Accounting Concepts, Experience in any accounting software  
                        </p>
                        <div class="portfolio-item det">
                           <div class="row">
                              <div class="col-sm-6 col-md-5 col-lg-5">
                                 <!-- <button onclick="window.location.href = 'https://www.carisma-solutions.com.au/jobs-in-chennaiacc';" class="button3">APPLY NOW</button> -->
                                 <button type="button" class="button button5" data-toggle="modal" data-target="#myModal1">APPLY NOW</button>
                              </div>
                              <!--  <div class="col-sm-6 col-md-5 col-lg-5"><a href="mailto:biz@carisma-solutions.com.au" class="button button5">REFER A FRIEND</a></div>-->
                           </div>
                        </div>
                     </div>
                     <!--     <button class="accordion">Senior Accountant</button><div class="panel"><p class="intro"><b>Qualification:</b> B.Com/M.Com/MBA/CMA/ CA(Inter)/Final</p><p class="intro"><b>Experience:</b> 3+ years </p><p class="intro"><b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills, Strong knowledge in Accounting Concepts, Experience in any Indian / International accounting software Candidates with CA – Articleship experience will be preferred </p><div class="portfolio-item det"><div class="row"><div class="col-sm-6 col-md-5 col-lg-5"><button onclick="window.location.href = 'https://www.carisma-solutions.com.au/jobs-in-chennai';" class="button3">APPLY NOW</button></div><div class="col-sm-6 col-md-5 col-lg-5"><a href="mailto:biz@carisma-solutions.com.au" class="button button5">REFER A FRIEND</a></div></div></div></div> -->
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-6">
                  <h4> Roles & Responsibilities</h4>
                  <ul class="careerdet">
                     <li>Bank, debtor, creditor reconciliation</li>
                     <li>Build and drive territary / account sales plan for assigned geographic territory / verticals / named
                        accounts and meet and exceed sales goals through value selling.
                     </li>
                     <li>Payroll processing </li>
                     <li>Month end closing entries</li>
                     <li>GL posting</li>
                     <li>Maintaining fixed register</li>
                     <li>Reconciliation of loans</li>
                     <li>Preparation of Annual Financial Statements and Tax Returns</li>
                     <li>MIS Reporting</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!-- why us area end -->
      <!-- contact area start -->
      <section class="contact-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-1 col-lg-1"></div>
               <div class="col-sm-12 col-md-10 col-lg-10">
                  <div class="section-title center">
                     <h2>Reach us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-1 col-md-1"></div>
               <div class="col-lg-4 col-md-4">
                  <h6>
                     <i class="fa fa-pencil" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;
                     <span>Write to us</span>
                  </h6>
                  <h6>
                     <a href="contact#write" class="button button7" >Contact form</a>
                  </h6>
                  <!-- <h6 style="padding: 10px 10px;font-weight: 500;"><a href="contact.html#write" style="color: #000000;">&nbsp;&nbsp;&nbsp;Contact us here</h6> -->
                  <h6 style="padding: 0px 10px;; font-weight: 500; "> &nbsp;
                     <a href="mailto:biz@carisma-solutions.com.au" style="color: #000000;">&nbsp;&nbsp;biz@carisma-solutions.com.au</a>
                  </h6>
                  <!-- <p style="font-size: small;"> &nbsp; +91 44 2826 0205, +91 44 2826 0208 </p> -->
               </div>
               <div class="col-lg-3 col-md-3">
                  <h6>
                     <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;
                     <span style="padding: 0 6px;">India</span>
                  </h6>
                  <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Chennai & Bangalore</h6>
                  <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +91 44 2826 0205 </h6>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6>
                     <i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;
                     <span style="padding: 0 6px;">Australia</span>
                  </h6>
                  <h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Melbourne</h6>
                  <!-- <h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +61 390269190 </h6> -->
               </div>
               <div class="col-lg-2 col-md-2 col-6">
                  <p> &nbsp;&nbsp; 
                     <a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd">
                     <img src="assets/img/icons/ca_ln.png" alt="carisma-linkedin">
                     </a>
                  </p>
               </div>
               <!-- old footer <div class="Bangalore" style="padding:20px;"><div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents"><h6><i class="fa fa-pencil" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span>Write to us</span></h6><h6><a href="/contact#write" class="button button7" >Contact form</a></h6><h6 style="padding: 0px 10px;; font-weight: 500; "> &nbsp;<a href="mailto:biz@carisma-solutions.com.au" style="color: #000000;">&nbsp;&nbsp;biz@carisma-solutions.com.au</a></h6></div></div><div class="Bangalore" style="padding:20px;"><div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents"><h6><i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">India</span></h6><h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Chennai & Bangalore</h6><h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +91 44 2826 0205 </h6></div></div><div class="Melbourne" style="padding:20px;"><div class="col-lg-3 col-md-4 col-6" style="margin-right:20px;display:contents"><h6><i class="fa fa-map-marker" aria-hidden="true" style="color: #fcac45; font-size: 22px;"></i>&nbsp;<span style="padding: 0 6px;">Australia</span></h6><h6 style="font-weight: 500; padding: 17px 10px;">&nbsp;&nbsp;&nbsp;Melbourne</h6><h6 style="font-weight: 500; padding: 0px 10px;"> &nbsp;&nbsp; +61 390269190 </h6></div></div><div class="Melbourne" style="padding:20px;padding-left:56px;"><div class="col-lg-4 col-md-4 col-6" style="margin-right:20px;display:contents"><p> &nbsp;&nbsp; <a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd"><img src="assets/img/icons/ca_ln.png" alt="carisma-linkedin"></a></p></div></div> -->
            </div>
            <div class="line">
               <hr>
            </div>
            <div class="row">
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="index">About</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="index#intro">Introduction</a>
                        </li>
                        <li>
                           <a href="index#testimonial">Testimonials</a>
                        </li>
                        <li>
                           <a href="index#technology">Accounting Platforms</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="/whyus">Why Us</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="/whyus#carisma">Why Carisma</a>
                        </li>
                        <li>
                           <a href="/whyus#accreditation">Accreditation</a>
                        </li>
                        <li>
                           <a href="/team#team">Our Team</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="/services">Services</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="/business#busines">Business Services</a>
                        </li>
                        <li>
                           <a href="/annuation#annuation">Superannuation</a>
                        </li>
                        <li>
                           <a href="/financial#finance">Financial Planning</a>
                        </li>
                        <li>
                           <a href="/bookkeeping#book">VCFO & BookKeeping (OSS) </a>
                        </li>
                        <!-- <li><a href="internal.html">Internal Accounting</a></li> -->
                        <li>
                           <a href="/consulting#consult">Consulting & Projects</a>
                        </li>
                        <li>
                           <a href="/technology#tech">Technology & Automation</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="/events">Events</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="/events#classconnect">Classconnect 2019</a>
                        </li>
                        <li>
                           <a href="/events#xerocon">Xerocon 2019</a>
                        </li>
                        <li>
                           <a href="/events#rada">RADA</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="/coe">COE</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="/coe#coe">Why COE</a>
                        </li>
                        <li>
                           <a href="/coe#intiate">Projects & Initiatives</a>
                        </li>
                        <li>
                           <a href="/coe#training">Training</a>
                        </li>
                        <li>
                           <a href="https://carisma-solutions.com.au/blog/">Blog</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h5>
                     <a href="/careers">Careers</a>
                  </h5>
                  <nav class="footer-nav">
                     <ul>
                        <li>
                           <a href="/applychennai">Chennai</a>
                        </li>
                        <li>
                           <a href="/applybangalore">Bangalore</a>
                        </li>
                        <li>
                           <a href="/applymelbourne">Melbourne</a>
                        </li>
                        <li>
                           <a href="/careers#culture">Life at Carisma</a>
                        </li>
                     </ul>
                  </nav>
               </div>
               <!--  <div class="col-lg-2"><h5><a href="http://carisma-solutions.com.au/blog/">Blog</a></h5><nav class="footer-nav"><ul><li><a href="http://carisma-solutions.com.au/blog/why-its-better-to-be-special/">Special Professionals</a></li><li><a href="http://carisma-solutions.com.au/blog/tax-office-priorities-for-tax-returns-2019/">ATO tax return priorities for 2019</a></li><li><a href="http://carisma-solutions.com.au/blog/australian-federal-budget-2019-20-our-take-on-it/">Federal Budget</a></li></ul></nav></div> -->
               <!--  <div class="col-lg-1"><a target="_blank" href="https://www.linkedin.com/company/carisma-solutions-pvt-ltd"><i class="fa fa-linkedin-square" style="background-color: #ffffff;color: #0077B5; font-size: 28px;border-radius: 4px;"></i></a></div> -->
            </div>
         </div>
      </section>
      <!-- contact area end -->
      <!-- copyright area start -->
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
                     <p>
                        © 
                        <script>document.write(new Date().getFullYear())</script> | ALL RIGHTS RESERVED | POWERED BY PURPLEQUAY
                     </p>
                     <a href="disclaimer">
                        <p>DISCLAIMER & PRIVACY POLICY</p>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- copyright area end -->
      <script type="text/javascript">    
         function openCity(evt, cityName) {
          if(cityName=="London"){
            document.getElementById("3tabs").style.display = "none";
          }
          else if(cityName=="Paris"){
            document.getElementById("3tabs").style.display = "unset";
          } 
          else{
            //alert('n');
          }
         var i, careertabcontent, tablinks;
         careertabcontent = document.getElementsByClassName("careertabcontent");
         for (i = 0; i < careertabcontent.length; i++) {
          careertabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
         }
         
         // Get the element with id="defaultOpen" and click on it
         //document.getElementById("defaultOpen").click();
              
         																																							
      </script>
      <script>
         // Add active class to the current button (highlight it)
         //var header = document.getElementById("myDIV");
         //var btns = header.getElementsByClassName("btn");
         //for (var i = 0; i < btns.length; i++) {
          // btns[i].addEventListener("click", function() {
           //var current = document.getElementsByClassName("active");
           //if (current.length > 0) { 
            // current[0].className = current[0].className.replace(" active", "");
          // }
           //this.className += " active";
           //});
         //}
         
         																																										
      </script>
      <script>
         function myRole() {
           var x = document.getElementById("myjob");
           if (x.style.display === "block") {
             x.style.display = "block";
           } else {
             x.style.display = "block";
           }
         }
      </script>
      <script>
         function myFunction() {
           var x = document.getElementById("myjob");
           if (x.style.display === "none") {
             x.style.display = "block";
           } else {
             x.style.display = "none";
           }
         }
      </script>
      
      <script type="text/javascript">
         //$('.count').each(function () {
           //  $(this).prop('Counter',0).animate({
             //    Counter: $(this).text()
             //}, {
               //  duration: 4000,
                 //easing: 'swing',
                 //step: function (now) {
                     //$(this).text(Math.ceil(now));
                 //}
            // });
         //});
      </script>
      <script type="text/javascript">
         // Material Select Initialization
         //$(document).ready(function() {
         //$('.mdb-select').materialSelect();
         //});
      </script>
      <!--<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>-->
      <script id="rendered-js">
         function yesnoCheck() {
         if (document.getElementById('yesCheck').checked) {
         document.getElementById('ifYes').style.display = 'unset';
         } else
         document.getElementById('ifYes').style.display = 'none';
         
         }
         function yesnoCheck1(){
         if (document.getElementById('yesCheck1').checked) {
         document.getElementById('ifYes').style.display = 'unset';
         } else
         document.getElementById('ifYes').style.display = 'none'; 
         }
         //# sourceURL=pen.js
      </script>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script>
         window.console = window.console || function(t) {};
      </script>
      <script>
         if (document.location.search.match(/type=embed/gi)) {
           window.parent.postMessage("resize", "*");
         }
      </script>
      <script>
         var acc = document.getElementsByClassName("accordion");
         var i;
         
         for (i = 0; i < acc.length; i++) {
           acc[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var panel = this.nextElementSibling;
             if (panel.style.maxHeight){
               panel.style.maxHeight = null;
             } else {
               panel.style.maxHeight = panel.scrollHeight + "px";
             } 
           });
         }
         
         																																										
      </script>
      <script type="text/javascript">
         $(function() {
           $('#option').change(function(){
             $('.options').hide();
             $('#' + $(this).val()).show();
           });
         });
      </script>
      <!-- Google Tracking code starts 
         ================================================== -->
      <script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', 'UA-19985953-8']);
         _gaq.push(['_trackPageview']);
         
         (function() {
             var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
             ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
             var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
         
      </script>
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-54649885-1', 'auto');
         ga('send', 'pageview');
         
      </script>
      <!-- Schema.org 
         ================================================== -->
      <script type="application/ld+json">
         {
           "@context": "http://schema.org",
           "@type": "WebSite",
           "url": "http://www.carisma-solutions.com.au/",
           "potentialAction": {
           "@type": "SearchAction",
           "target": "http://www.carisma-solutions.com.au/",
           "query-input": "required name=search_term_string"
           }
         }
      </script>
      <!-- Schema.org  -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             // Show hide popover
             $(".dropdown").click(function(){
                 $(this).find(".dropdown-content").slideToggle("fast");
             });
         });
         $(document).on("click", function(event){
             var $trigger = $(".dropdown");
             if($trigger !== event.target && !$trigger.has(event.target).length){
                 $(".dropdown-content").slideUp("fast");
             }            
         });
      </script>
      <script src="assets/js/jquery-3.3.1.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- <script src="assets/js/fontawesome.min.js"></script> -->
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/isotope.pkgd.min.js"></script>
      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <script src="assets/js/jquery.barfiller.js"></script>
      <script src="assets/js/jquery.slicknav.min.js"></script>
      <script src="assets/js/scripts.js"></script>
      <script src="https://smtpjs.com/v3/smtp.js"></script>
      <script>
         // mailsender
    document.getElementById('candidate-form').addEventListener('submit',function(e){
        sendEmail(e)
    })

         function sendEmail(e) {
             e.preventDefault()
             
         let SubjectTitle = document.getElementById("SubjectTitle1").value;
             let message1= document.getElementById("firstname").value;
             let lastname1 = document.getElementById('lastname').value;
         let PhoneNo1 = document.getElementById('PhoneNo').value;
         let EmailId1 = document.getElementById('EmailId').value;
         let yearofpassed1 = document.getElementById('yearofpassed').value;
         let qualification1 = document.getElementById('qualification').value;
         let Experiance1 = document.getElementById('Experiance').value;
         let UploadResume1 = document.getElementById('UploadResume').value;
         let comment1 = document.getElementById('comment').value
             Email.send({
                     Host: "smtpout.asia.secureserver.net",
                     Username: "gobim@stephenventures.com",
                     Password: "vasantha@123",
                     From: 'EmailId1',
                     To: "gobim@stephenventures.com",
                     Subject: "Candidate details",
                     Body: message1,
                     Attachments : [
                     {
                        name : UploadResume1,
                        //data : pdfBase64 

                     }]
         // Body: lastname1,
         // Body: PhoneNo1,
         // Body: EmailId1,
         // Body: yearofpassed1,
         // Body: qualification1,
         // Body: Experiance1,
         // Body: UploadResume1,
         // Body: comment1,
                 })
                 .then(function(message) {
                     alert("mail sent successfully")
                     location.reload()
                 });
         }
         // mailsender
      </script>
   </body>
</html>