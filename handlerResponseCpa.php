<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */

//require_once './src/FormHandlerCpa.php';
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandlerResponseCpa;


$pp = new FormHandlerResponseCpa(); 

 //if(!isset($_SESSION)) 
   // { 
       // session_start(); 
	// $emailid = "";
	// $emailid = $_SESSION["emailid"];
//$nameclie = $_SESSION["cliname"];
   // } 

$emailid = $_POST['email'];


//$pp->attachFiles(['image']);


$pp->sendEmailTo($emailid); // ← Your email here

echo $pp->process($_POST);