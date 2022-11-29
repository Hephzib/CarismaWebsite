<?php require_once('dbConf.php'); ?>
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
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">


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
</style>
<!--The job application section-->
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

  <style>
  .animate{
  width:100%;visibility: hidden;
  }
  .animate1{
  visibility: hidden;
  }
  .submitpost {
    float: left !important;
  }
  .span-clr {
    color: red;
  }

  </style>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <!-- google map -->

  </head>
  <body>
    <!-- Navigation
    ==========================================-->
<script src="js/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function(){
      $('#qualification').on('change',function(){
        var qlfctval = $('#qualification').val();

        $(".othercrs-option").hide();
          $('.crsother-req').removeAttr('required');
          $('.crsother-req').attr('placeholder','');

        $.ajax({
                type: 'post',
                url: 'ajax_course.php',
                data: 'qlfctval='+qlfctval+' ',
                success: function (html) {
                    $('#course').html(html);
                }
                });

      });

      $('#course').on('change',function(){
        var crsval = $('#course').val();

        if(crsval==8){
         // $(".clsother-optiontxt").html('Training Institute <span class="span-clr"><sup>*</sup></span>');
          $(".othercrs-option").show();
          $('.crsother-req').attr('required','required');
          $('.crsother-req').attr('placeholder','Others');
        }
        else if(crsval==15){
         // $(".clsother-optiontxt").html('Employee referrence <span class="span-clr"><sup>*</sup></span>');
          $(".othercrs-option").show();
          $('.crsother-req').attr('required','required');
          $('.crsother-req').attr('placeholder','Others');
        }
        else {
          $(".othercrs-option").hide();
          $('.crsother-req').removeAttr('required');
          $('.crsother-req').attr('placeholder','');
        }

      });

      $('#currentstate').on('change',function(){
        var crntctval = $('#currentstate').val();

        $.ajax({
                type: 'post',
                url: 'ajax_city.php',
                data: 'crntctval='+crntctval+' ',
                success: function (html) {
                    $('#currentcity').html(html);
                }
                });
      });

    });
</script>
<script type="text/javascript">
  var wasSubmitted = false;    
    function checkBeforeSubmit(){
    
      if(!wasSubmitted) {
        wasSubmitted = true;
        return wasSubmitted;
        alert("yes");
      }
      return false;
      alert("yes no");
    }    
</script>

    <!-- Contact Section
    ==========================================-->
    <section class="why-us-area">
        <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6 offset-lg-3">
                    <div class="careertab">
                       <button class="tablinks" onclick="openCity(event, 'London'),myRole()" id="defaultOpen">Role Overview</button>
                       <button class="tablinks" onclick="openCity(event, 'Paris'),myFunction()">Apply Here</button>
                    </div>
                 </div>
               </div>
                 <div class="row" style="margin: 15px 0;">
                <div class="col-sm-12 col-md-6 col-lg-6 offset-lg-3">
                  <div id="London" class="careertabcontent">
                    <button class="accordion">Junior Accountant</button>
                    <div class="panel">
                      <p class="intro"><b>Qualification:</b> B.Com/M.Com/MBA/CMA(Inter)/CA(Inter)</p>
                       <p class="intro"><b>Experience:</b> 0-1 year </p>
                       <p class="intro"><b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills</p>

                    <div class="portfolio-item det">
                     <h4>Roles & Responsibilities</h4>
                      <ul class="careerdet">
                          <li>Bank, debtor, creditor reconciliation</li>
                          <li>Build and drive territary/account sales plan for assigned geographic territory/verticals/named
                          accounts and meet and exceed sales goals through value selling.</li>
                          <li>Payroll processing </li>
                          <li>Month end closing entries</li>
                          <li>GL posting</li>
                          <li>Maintaining fixed register</li>
                          <li>Reconciliation of loans</li>
                          <li>Preparation of Annual Financial Statements and Tax Returns</li>
                          <li>MIS Reporting</li>
                      </ul>
                      <div class="row">
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button3">APPLY NOW</button>
                       </div>
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button button5">REFER A FRIEND</button>
                       </div>
                    </div>
                    </div>
                    </div>

                      <button class="accordion">Accountant</button>
                      <div class="panel">
                        <p class="intro"><b>Qualification:</b> B.Com/M.Com/MBA/CMA(Inter)/CA(Inter)</p>
                       <p class="intro"><b>Experience:</b> 1-2 years  </p>
                       <p class="intro"><b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills, Strong knowledge in Accounting Concepts, Experience in any accounting software  </p>

                    <div class="portfolio-item det">
                      <h4>Roles & Responsibilities</h4>
                     <ul class="careerdet">
                          <li>Bank, debtor, creditor reconciliation</li>
                          <li>Build and drive territary/account sales plan for assigned geographic territory/verticals/named
                          accounts and meet and exceed sales goals through value selling.</li>
                          <li>Payroll processing </li>
                          <li>Month end closing entries</li>
                          <li>GL posting</li>
                          <li>Maintaining fixed register</li>
                          <li>Reconciliation of loans</li>
                          <li>Preparation of Annual Financial Statements and Tax Returns</li>
                          <li>MIS Reporting</li>
                      </ul>
                      <div class="row">
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button3">APPLY NOW</button>
                       </div>
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button button5">REFER A FRIEND</button>
                       </div>
                    </div>
                    </div>

                      </div>

                      <button class="accordion">Senior Accountant</button>
                      <div class="panel">
                        <p class="intro"><b>Qualification:</b> B.Com/M.Com/MBA/CMA/ CA(Inter)/Final</p>
                        <p class="intro"><b>Experience:</b> 3+ years </p>
                        <p class="intro"><b>Preferred Skills:</b> MS Excel, Typing, Good Communication skills, Strong knowledge in Accounting Concepts, Experience in any Indian / International accounting software Candidates with CA – Articleship experience will be preferred </p>

                    <div class="portfolio-item det">
                      <h4>Roles & Responsibilities</h4>
                      <ul class="careerdet">
                          <li>Bank, debtor, creditor reconciliation</li>
                          <li>Build and drive territary/account sales plan for assigned geographic territory/verticals/named
                          accounts and meet and exceed sales goals through value selling.</li>
                          <li>Payroll processing </li>
                          <li>Month end closing entries</li>
                          <li>GL posting</li>
                          <li>Maintaining fixed register</li>
                          <li>Reconciliation of loans</li>
                          <li>Preparation of Annual Financial Statements and Tax Returns</li>
                          <li>MIS Reporting</li>
                      </ul>
                      <div class="row">
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button3">APPLY NOW</button>
                       </div>
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button button5">REFER A FRIEND</button>
                       </div>
                      </div>
                    </div>
                      </div>
                   <!--  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span> -->
                   
                    <!-- <div class="row">
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button3">APPLY NOW</button>
                       </div>
                       <div class="col-sm-6 col-md-5 col-lg-5">
                         <button class="button button5">REFER A FRIEND</button>
                       </div>
                    </div> -->
                </div>
   
<div class="abc" id="3tabs">
<div id="Paris" class="careertabcontent">
               <!-- <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>    --> 
                    <form role="form" name="sendmail" action="sql_frmanage.php" onSubmit="return checkBeforeSubmit()" method="post" enctype="multipart/form-data">
                        
                        <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="1" id="noCheck" checked><label for="noCheck"> &nbsp; Junior Accountant</label>
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="2" id="yesCheck"><label for="yesCheck"> &nbsp; Accountant</label>
<input type="radio" onclick="javascript:yesnoCheck1();" name="yesno" value="3" id="yesCheck1"><label for="yesCheck1"> &nbsp; Senior Accountant</label>

                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactname"><div class="font">Full Name </div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="text" class="form-control" id="namenow" name="firstname" placeholder="" required>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font">Email </div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="email" class="form-control" name="email" placeholder="" required>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font">Mobile/Phone </div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="number" class="form-control" id="namenow" name="mobile" placeholder="" required>
                                </div>
                            </div>
                          </div>

                         
                        <!--   <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font">Location (City)</div> <span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="text" class="form-control" name="city" placeholder="" required>
                                </div>
                            </div>
                          </div> 

 -->
                          
                        <div class="row">     
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="qualification">Highest Qualification <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="qualification" id="qualification" class="form-control locat-require text-prop" required>
                                      <option value="">Select</option>
                                      <?php
                                      $sqlcnt="select * from tbl_qualificationmaster";
                                      $retvalcnt = mysqli_query($con,$sqlcnt);
                                      while($rowcnt = mysqli_fetch_array($retvalcnt, MYSQL_ASSOC))
                                      {
                                        echo '<option value="'.$rowcnt['Id'].'">'.$rowcnt['Name'].'</option>';
                                      }
                                      ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course">Course <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="course" id="course" class="form-control locat-require text-prop" required>
                                      <option value="">Select Qualification</option>
                                    </select>
                                    <input type="text" class="form-control crsother-req othercrs-option" name="othercourse" placeholder="" style="display: none; margin-top: 5px;">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactemail">Percentage <span class="span-clr"><sup>*</sup></span></label>
                                    <input type="text" class="form-control" name="percentage" placeholder="Percentage" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="yearpassed">Year Passed <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="yearpassed" id="yearpassed" class="form-control locat-require text-prop" required>
                                      <option value="">Select</option>
                                      <?php
                                      $sqlcnt="select * from tbl_passedout";
                                      $retvalcnt = mysqli_query($con,$sqlcnt);
                                      while($rowcnt = mysqli_fetch_array($retvalcnt, MYSQL_ASSOC))
                                      {
                                        echo '<option value="'.$rowcnt['Id'].'">'.$rowcnt['Name'].'</option>';
                                      }
                                      ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactemail">Technical Course </label>
                                    <input type="text" class="form-control" name="technicalcourse" placeholder="Technical Course">
                                </div>
                            </div>

                          </div>


                          <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cuurentstate">Current State <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="state" id="currentstate" class="form-control locat-require text-prop" required>
                                      <option value="">Select</option>
                                      <?php
                                      $sqlcnt="select * from tbl_state where Status=1 order by Name";
                                      $retvalcnt = mysqli_query($con,$sqlcnt);
                                      while($rowcnt = mysqli_fetch_array($retvalcnt, MYSQL_ASSOC))
                                      {
                                        echo '<option value="'.$rowcnt['Id'].'">'.$rowcnt['Name'].'</option>';
                                      }
                                      ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactemail">Current City <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="city" id="currentcity" class="form-control locat-require text-
                                    " required>
                                      <option value="">Select State</option>
                                    </select>

                                </div>
                            </div>

                            <script language="javascript">
                                $(document).ready(function(){
                                  $('#referredby').on('change',function(){
                                    var referredbyval = $('#referredby').val();
                                    
                                    if(referredbyval==1){
                                     // $(".clsother-optiontxt").html('Training Institute <span class="span-clr"><sup>*</sup></span>');
                                      $(".other-option").show();
                                      $('.clsother-req').attr('required','required');
                                      $('.clsother-req').attr('placeholder','Training Institute');
                                    }
                                    else if(referredbyval==2){
                                     // $(".clsother-optiontxt").html('Employee referrence <span class="span-clr"><sup>*</sup></span>');
                                      $(".other-option").show();
                                      $('.clsother-req').attr('required','required');
                                      $('.clsother-req').attr('placeholder','Employee referrence');
                                    }
                                    else if(referredbyval==8){
                                     // $(".clsother-optiontxt").html('Others <span class="span-clr"><sup>*</sup></span>');
                                      $(".other-option").show();
                                      $('.clsother-req').attr('required','required');
                                      $('.clsother-req').attr('placeholder','Others');
                                    }
                                    else {
                                      $(".other-option").hide();
                                      $('.clsother-req').removeAttr('required');
                                      $('.clsother-req').attr('placeholder','');
                                    }
                                  });
                                });
                            </script>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="referredby">Referred By <span class="span-clr"><sup>*</sup></span></label>
                                    <select name="referred" id="referredby" class="form-control locat-require text-prop" required>
                                      <option value="">Select</option>
                                      <?php
                                      $sqlcnt="select * from tbl_referrencemaster";
                                      $retvalcnt = mysqli_query($con,$sqlcnt);
                                      while($rowcnt = mysqli_fetch_array($retvalcnt, MYSQL_ASSOC))
                                      {
                                        echo '<option value="'.$rowcnt['Id'].'">'.$rowcnt['Name'].'</option>';
                                      }
                                      ?>
                                    </select>
                                    <input type="text" class="form-control submitpost clsother-req other-option" name="otherrefer" placeholder="" style="display: none; margin-top: 5px;">


                                </div>
                            </div>
                            <!--
                            <div class="col-md-6 other-option" style="display: none;">
                                <div class="form-group">
                                    <label for="otherrefer" class="clsother-optiontxt"></label>
                                    
                                </div>
                            </div>
                          -->
                            </div>
                        
                        
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="contactemail"><div class="font">Resume/CV </div><span class="span-clr"><sup>*</sup></span></label><br>
                                <input type="file" class="form-control" name="filesresume[]" accept=".doc,.docx,.pdf" id="resume" required>
                              </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="contactemail"><div class="font">Linkedin Profile</div> <span class="span-clr"><sup>*</sup></span></label><br>
                                <input type="url" class="form-control" name="url" id="url" required>
                              </div>
                            </div>
                        </div>      


                           <div id="ifYes" style="display: none;">
                           <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="contactemail"><div class="font">Years of Experience: &nbsp 
                                  <select name="experience">
                                    <option value="0">0 Year</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                    <option value="6">6 Years</option>
                                    <option value="7">7 Years</option>
                                    <option value="8">8 Years</option>
                                    <option value="9">9 Years</option>
                                    <option value="10">10 Years</option>
                                  </select>

                                  <select name="month">
                                    <option value="0">0</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="7">7 Months</option>
                                    <option value="8">8 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="10">10 Months</option>
                                    <option value="11">11 Months</option>
                                  </select>
                                  </div>
                                    <span class="span-clr"><sup>*</sup></span></label><br>
                                <!--<input type="url" class="form-control" name="url" aid="url" required>-->
                              </div>
                            </div>
                        </div>          
                           <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font">Current/Last Organization</div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="text" class="form-control" name="oraganisation" placeholder="">
                                </div>
                            </div>
                          </div>
          </div>
       <div id="ifYes1" style="display:none;">
            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font"> Years of experience </div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="number" class="form-control" name="yearexperience" placeholder="" >
                                </div>
                            </div>
                          </div>

                           <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contactemail"><div class="font"> Company Last Worked For</div><span class="span-clr"><sup>*</sup></span></label><br>
                                    <input type="number" class="form-control" name="lastworked" placeholder="" >
                                </div>
                            </div>
                          </div>
                       </div>   
                    <button type="Submit" class="button3 tf-btn submitpost btn-default" id="submit" value="submit" name="sbmt_registration">SUBMIT JOB APPLICATION</button>

                    </form>
               </div>
           </div>
       </div> 
   </div>
 </div>
</div>
</section>
    <!-- why us area end -->

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
document.getElementById("defaultOpen").click();
        </script>

  <script>           

 <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
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
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>

<script type="text/javascript">
    // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
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


                  <!--  -->
    <!-- <div id="googleMap" style="width:100%;height:380px;"></div> -->


  
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

    <!-- Javascripts
    ================================================== -->

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

  </body>
</html>