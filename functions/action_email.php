<?php 
// link huong dan: https://www.sitepoint.com/sending-emails-php-phpmailer/
	
/**
* 
*/
class action_email 
{
        function email_send ($email_to, $title = "", $content = "") {
                $nFrom = "cafelink.org";    //mail duoc gui tu dau, thuong de ten cong ty ban
                $mFrom = 'kinhdoanh@cafelink.org';  //dia chi email cua ban 
                $mPass = 'cafeLink@68$';       //mat khau email cua ban
                $nTo = 'YOU'; //Ten nguoi nhan
                //$mTo = $_POST['email_dichvu'];   //dia chi nhan mail
                $mTo = $email_to;
                $mail             = new PHPMailer();
                //$body             = "<p>Kế toán thuế trọn gói: $ktttg</p><p>Kê khai thuế online: $kktol</p><p>Rà soát sổ sách: $rsss</p><p>Hoàn thiện sổ sách: $htss</p><p>Quyết toán thuế: $qtt</p>";   // Noi dung email
                //$title = 'Nguyên Anh Tax kính gửi';   //Tieu de gui mail
                $mail->IsSMTP();             
                $mail->CharSet  = "utf-8";
                $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
                $mail->SMTPAuth   = true;    // enable SMTP authentication
                $mail->SMTPSecure = "tls";   // sets the prefix to the servier
                $mail->Host       = "smtp.zoho.com";    // sever gui mail.
                $mail->Port       = 587;         // cong gui mail de nguyen
                // xong phan cau hinh bat dau phan gui mail
                $mail->Username   = $mFrom;  // khai bao dia chi email
                $mail->Password   = $mPass;              // khai bao mat khau
                $mail->SetFrom($mFrom, $nFrom);
                $mail->AddReplyTo('kinhdoanh@cafelink.org', 'me'); //khi nguoi dung phan hoi se duoc gui den email nay
                $mail->Subject    = $title;// tieu de email 
                $mail->MsgHTML($content);// noi dung chinh cua mail se nam o day.
                // $mail->AddAddress($mTo, $nTo);
                $mail->AddAddress('kinhdoanh@cafelink.org');

                $mail->Send();
        }
        
        function gui_email () {
                if (isset($_POST['send_email'])) {
                    // $email = new action_email();
                    $gui = $this->email_send($_POST['email'], 'test', 'noi dung test');
                    echo '<script type="text/javascript">alert(\'ban đã gửi email thành công.\');</script>';
                }
        }

        function lien_he () {
            global $conn_vn;
                if (isset($_POST['lien_he'])) {
                        $name = $_POST['reservation_name'];
                        $phone = $_POST['reservation_phone'];
                        $email = $_POST['reservation_email'];
                        $address = $_POST['address'];
                        $note = $_POST['form_message'];
                        $sql = "INSERT INTO lien_he (name, email, phone, address, comment) VALUES ('$name','$email','$phone','$address','$note')";
                        $result = mysqli_query($conn_vn, $sql);
                        $str = $this->form($name, $phone, $email, $note);
                        //echo $str;die;
                        $this->email_send($email, $name, $str);
                        echo '<script type="text/javascript">alert(\'Bạn đã đăng ký tư vấn miễn phí thành công.\');</script>';
                }
        }

        public function lien_he_1 () {
            global $conn_vn;
                if (isset($_POST['reservation_name'])) {
                        $name = $_POST['reservation_name'];
                        $phone = $_POST['reservation_phone'];
                        $email = $_POST['reservation_email'];
                        $address = $_POST['address'];
                        $note = $_POST['form_message'];
                        $sql = "INSERT INTO lien_he (name, email, phone, address, comment) VALUES ('$name','$email','$phone','$address','$note')";
                        $result = mysqli_query($conn_vn, $sql);
                        $str = $this->form($name, $phone, $email, $note);
                        //echo $str;die;
                        $this->email_send($email, $name, $str);
                        echo 'Bạn đã đăng ký tư vấn miễn phí thành công.';
                }
        }

        function form ($name, $phone, $email, $note) {
                $str = "
                        <ul>
                                <li>Tên: $name</li>
                                <li>Số điện thoại: $phone</li>
                                <li>Thư điện tử: $email</li>
                                <li>Nội dung: $note</li>
                        </ul>
                ";
                return $str;

        }

        function form_1 ($phone, $email, $note) {
                $str = "
                        <ul>
                                <li>Số điện thoại: $phone</li>
                                <li>Thư điện tử: $email</li>
                                <li>Nội dung: $note</li>
                        </ul>
                ";
                return $str;

        }

        function form_2 ($name, $birthday, $link, $phone, $email, $note) {
                $str = "
                        <ul>
                                <li>Đường link: $link</li>
                                <li>Họ và tên: $name</li>
                                <li>Năm sinh: $birthday</li>
                                <li>Số điện thoại: $phone</li>
                                <li>Thư điện tử: $email</li>
                                <li>Nội dung: $note</li>
                        </ul>
                ";
                return $str;

        }

        public function newsletter () {
            global $conn_vn;
            if (isset($_POST['send_newsletter'])) {
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];
                $sql = "INSERT INTO newsletter (email, phone, note) VALUES ('$email', '$phone', '$note')";
                $result = mysqli_query($conn_vn, $sql);
                if ($result) {
                    echo '<script type="text/javascript">alert(\'Bạn đã đăng ký nhận tin thành công.\');</script>';
                } else {
                    echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\');</script>';
                }
            }
        }

        public function newsletter_1 () {
            global $conn_vn;
            if (isset($_POST['send_newsletter_1'])) {
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];
                $name = isset($_POST['name']) ? $_POST['name'] : '';
                $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
                $link = isset($_POST['link']) ? $_POST['link'] : '';
                $sql = "INSERT INTO newsletter (email, phone, note) VALUES ('$email', '$phone', '$note')";
                $result = mysqli_query($conn_vn, $sql);
                if ($name == '') {
                    $str = $this->form_1($phone, $email, $note);
                } else {
                    $str = $this->form_2($name, $birthday, $link, $phone, $email, $note);
                }
                
                $this->email_send($email, $name, $str);
                if ($result) {
                    echo '<script type="text/javascript">alert(\'Bạn đã đăng ký nhận tin thành công.\');</script>';
                } else {
                    echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\');</script>';
                }
            }
        }

        public function newsletter_2 () {
            global $conn_vn;
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];
                $name = isset($_POST['name']) ? $_POST['name'] : '';
                $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
                $link = isset($_POST['link']) ? $_POST['link'] : '';
                $sql = "INSERT INTO newsletter (email, phone, note) VALUES ('$email', '$phone', '$note')";
                $result = mysqli_query($conn_vn, $sql);
                if ($name == '') {
                    $str = $this->form_1($phone, $email, $note);
                } else {
                    $str = $this->form_2($name, $birthday, $link, $phone, $email, $note);
                }
                
                $this->email_send($email, $name, $str);
                if ($result) {
                    echo 'Bạn đã đăng ký nhận tin thành công.';
                } else {
                    echo 'Có lỗi xảy ra.';
                }
            }
        }

        public function test () {
            echo 'test';
        }
}
?>