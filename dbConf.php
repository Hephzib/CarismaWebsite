<?php
ob_start();
define('TIMEZONE', 'Asia/Calcutta'); // INDIA
date_default_timezone_set(TIMEZONE);
error_reporting(0);

//$dbhost = 'localhost';
$dbhost = 'mysql-6.carisma-solutions.com.au';
$dbuser = 'mycari1004';
$dbpass = 'vW1ogHQu';
$dbname = 'carisma_carisma_solutions_com_au';
 
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>