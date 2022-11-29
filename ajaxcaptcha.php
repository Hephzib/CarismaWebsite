<?php
session_start();

if(isset($_POST["captcha_code"]) && !empty($_POST["captcha_code"]))
{
    if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
		$msg="0";// Captcha verification is incorrect.		
	}else{// Captcha verification is Correct. Final Code Execute here!		
		$msg="1";		
	}
	echo $msg;
}
?>