<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandlerBang;


$pp = new FormHandlerBang(); 

$validator = $pp->getValidator();
$validator->fields(['name','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
// $validator->field('SubjectTitle1')->maxLength(6000);
// $validator->field('lastname')->maxLength(6000);
// $validator->field('PhoneNo')->maxLength(6000);
// $validator->field('yearofpassed')->maxLength(6000);
// $validator->field('qualification')->maxLength(6000);
// $validator->field('Experiance')->maxLength(6000);
// $validator->field('Applying')->maxLength(6000);
$validator->field('comment')->maxLength(6000);


$pp->attachFiles(['image']);


$pp->sendEmailTo('careers@carisma-solutions.com.au'); // ← Your email here

echo $pp->process($_POST);