<?php 

/**
* 
*/
include_once('database.php');

define('SITE_NAME', $_SERVER["HTTP_HOST"]);

class action extends database
{
	
	function __construct($lang){
		$this->connectdb($lang);
	}

	public function SendContact(){
		// echo 'Bắt đầu gửi mail';
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$type = isset($_POST['type']) ? $_POST['type'] : '';
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$note = isset($_POST['note']) ? $_POST['note'] : '';

		$title = 'Thông tin khách hàng từ '.SITE_NAME;
	    $content = 'Thông tin khách hàng đăng ký dịch vụ:<br>Họ tên:  '.$name.'<br>Lĩnh vực:  '.$type.'<br>Số điện thoại:  '.$phone.'<br>Email:  '.$email.'<br>Ghi chú:  '.$note;
	    $nTo = $name;
	    $mTo = 'kinhdoanh@goldbridgevn.com';
	    // $diachicc = 'xcc@gmail.com';
	    //test gui mail
	    if($mail = $this->sendMail($title, $content, $name, $mTo)){
	    	echo json_encode(array('success'=>'Cảm ơn bạn đã gửi thông tin, chuyên viên của chúng tôi sẽ liên lạc lại sớm nhất!'));
	    }else{
	    	echo json_encode(array('error'=>'Lỗi, mời thử lại'));
	    }
	    // if($mail==1){
	    // 	echo json_encode(array('success'=>'Gửi mail thành công'));
	    // }else{
	    // 	echo json_encode(array('error'=>'Lỗi mời thử lại'));
	    // }
	}

	public function sendMail($title, $content, $nTo, $mTo, $diachicc=''){
		include('PHPMailer/class.smtp.php');
    	include "PHPMailer/class.phpmailer.php"; 

	    $nFrom = 'GoldBridge Việt Nam';
	    $mFrom = 'kinhdoanh@goldbridgevn.com';  //dia chi email cua ban 
	    // $mPass = 'gbvn@121208';       //mat khau email cua ban
	    $mPass = 'gbvn$x18AB';
	    $mail             = new PHPMailer();
	    $body             = $content;
	    $mail->IsSMTP(); 
	    $mail->CharSet   = "utf-8";
	    // $mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
	    $mail->SMTPAuth   = true;                    // enable SMTP authentication
	    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	    $mail->Host       = "smtp.zoho.com";        
	    $mail->Port       = 465;
	    $mail->Username   = $mFrom;  // GMAIL username
	    $mail->Password   = $mPass;               // GMAIL password
	    $mail->SetFrom($mFrom, $nFrom);
	    //chuyen chuoi thanh mang
	    $ccmail = explode(',', $diachicc);
	    $ccmail = array_filter($ccmail);
	    if(!empty($ccmail)){
	        foreach ($ccmail as $k => $v) {
	            $mail->AddCC($v);
	        }
	    }
	    $mail->Subject    = $title;
	    $mail->MsgHTML($body);
	    $address = $mTo;
	    $mail->AddAddress($address, $nTo);
	    // $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
	    $mail->AddReplyTo($mFrom, $nFrom);
	    if(!$mail->Send()) {
	        //echo $mail->ErrorInfo;
	        return false;
	    }else{
	    	return true;
	    }
	}
}