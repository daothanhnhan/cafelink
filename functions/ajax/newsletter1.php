<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../phpmailer/class.smtp.php";
	include_once dirname(__FILE__) . "/../phpmailer/class.phpmailer.php";
	include_once dirname(__FILE__) . "/../action_email.php";
	$send_email = new action_email();
    $send_email->newsletter_2();
    // echo json_encode($_POST);
?>