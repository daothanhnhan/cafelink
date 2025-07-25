<?php 
include_once('__autoload.php');
$action = new action('VN');

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'sendContact':
			$action->sendContact();
			break;
		
		default:
			# code...
			break;
	}
}