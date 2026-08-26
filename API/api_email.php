<?php
session_start();
include_once("../config.php");
if($_GET) $_POST=$_GET;
if(empty($username)){
    session_destroy();
    header("location: $domain_url");
    exit();
}else if(empty($_POST) && empty($_POST['confirm'])){
    header("location: $domain_url");
    exit();
}
$conlai = time() -$_SESSION['start'];
$delay = $conlai - $_SESSION['lock'] ;
$phut = abs($delay-30/60);
$giay = abs($phut/60);
$trim = str_replace('0', '', date("i",$phut));
if(!isset($_SESSION['start']) || !isset($_SESSION['lock'])) {
    $_SESSION['start'] = time();
    $_SESSION['lock'] = 300;
}else if($trim < 5) {
  #session_regenerate_id(true);    //thay đổi ID phiên cho phiên hiện tại và làm mất hiệu lực ID phiên cũ
  $JSON = array(
    "status" => "Chờ: ".date("i:s",$phut)." để gửi lại",
    "delay" => abs($delay)
  );
  die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}else{
    unset($_SESSION['start']);
    unset($_SESSION['lock']);
}
include("../Mailer/PHPMailerAutoload.php");
#include("Mailer/class.phpmailer.php");
#include("Mailer/class.smtp.php");
#--------------------------------------------------
  $message = '<body style="background:#ccc">';
  $message .= '<div style="padding-top:25px;padding-bottom:25px">';
  $message .= '<table align="center" width="512" border="0" cellspacing="0" cellpadding="0">';
  $message .= '<td align="center" style="background-color:#fdfdfe;padding-top:15px;padding-bottom:15px">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tr>';
  $message .= '<td align="left" width="46">';
  $message .= '<img src="https://cdn.iconscout.com/icon/free/png-512/facebook-logo-2019-1597680-1350125.png" width="45" height="45"></td>';
  $message .= '<td align="left><h style="font-weight:bold;margin-left:5px;font-size:26px"><b>Facebook <b></h> </td>';
  $message .= '</tr>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:#f5f5f6">';
  $message .= '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody>';
  $message .= '<tr>';
  $message .= '<td style="border-top:1px solid #f5f5f6"></td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  #----------------------------------------------------------------   
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white;padding-top:25px;padding-bottom:0">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody><tr>';
  $message .= '<td>';
  $message .= '<h1 style="font-size:22px;line-height:28px;letter-spacing:-.20px;margin:10px 0 16px 0;font-family:Helvetica Neue,Arial,sans-serif;color:#1b75f2;text-align:left">';
  $message .= 'Xác nhận mã code</h1>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td>';
  $message .= '<p style="margin:0 0 15px 0;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:24px">';
  $message .= 'Xin chào bạn,<br>';
  $message .= 'Chúng tôi đã gửi 1 mã code về email: <code><?= $email ?></code>';
  $message .= '</p> Click để xác nhận: <a target="_blank" href="'.$domain_url.'/xac-nhan-tai-khoan?code='.$veri_code.'">'.$domain_url.'/xac-nhan-tai-khoan?code='.$veri_code.'</a>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  #----------------------------------------------------------------   
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white;padding-top:15px;padding-bottom:10px">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody><tr>';
  $message .= '<td style="font-size:16px;font-family:Helvetica Neue,Arial,sans-serif;color:#969696;text-align:center">';
  $message .= 'Nhập mã code bên dưới</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td style="padding-top:5px;font-size:28px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:center;line-height:1.2em;font-weight:500">';
  $message .= "$veri_code";
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  #----------------------------------------------------------------   
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white;padding-top:10px;padding-bottom:10px">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody><tr>';
  $message .= '<td style="font-size:13px;font-family:Helvetica Neue,Arial,sans-serif;color:#969696;text-align:left;font-weight:bold;padding-bottom:5px">';
  $message .= 'THÔNG TIN CHI TIẾT TÀI KHOẢN</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white">';
  $message .= '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody>';
  $message .= '<tr>';
  $message .= '<td style="border-top:1px solid #ececec"></td>';
  $message .= '</tr>';
  $message .= '</tbody>';
  $message .= '</table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody></table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white;padding-top:0;padding-bottom:20px">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody><tr>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="70%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:normal;font-size:15px;padding-right:10px">';
  $message .= 'Họ và tên:</div>';
  $message .= '</td>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="30%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:normal;font-size:15px">';
  $message .= "$fullname</div>";
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="70%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:20px;font-weight:normal;font-size:15px;padding-right:10px">';
  $message .= 'Ngày tham gia:</div>';
  $message .= '</td>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="30%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:normal;font-size:15px">';
  $message .= "".date("d/m/Y",$ngay_tham_gia_)."</div>";
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="70%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:20px;font-weight:normal;font-size:15px;padding-right:10px">';
  $message .= 'Username:</div>';
  $message .= '</td>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="30%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:normal;font-size:15px">';
  $message .= "$username</div>";
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="70%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:bold;font-size:15px;padding-right:10px">';
  $message .= 'Người theo dõi:</div>';
  $message .= '</td>';
  $message .= '<td style="padding-top:5px;padding-bottom:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em" width="30%">';
  $message .= '<div style="color:#3c4043;margin:0px;font-size:12px;line-height:22px;font-weight:bold;font-size:15px">';
  $message .= "".number_format($followers)."</div>";
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody></table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td align="center" style="background-color:white;padding-top:0;padding-bottom:20px">';
  $message .= '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">';
  $message .= '<tbody><tr>';
  $message .= '<td style="padding-top:5px;font-size:14px;font-family:Helvetica Neue,Arial,sans-serif;color:#3c4043;text-align:left;line-height:1.55em">';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody></table>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</tbody></table>';
  $message .= '</div></body>';
#----------------------------------------------------------------   
echo SendEmail($email_confirm,$password_confirm,$email_nhan,$subject,$message,$form);
#-------------------------------------------------------------------
function mailOLD($email_nhan,$subject,$message,$header){
            $header = "From:best.lee.kunloc@gmail.com\r\n";
            $header .= "Cc:<noreply@notify.cloudflare.com> \r\n";
            $header .= "Bcc:<noreply@notify.cloudflare.com> \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            $retval = mail ($email_nhan,$subject,$message,$header);
            if( $retval == true ) {
                $JSON = array(
                        "status" => "Đã gửi email xác nhận",
    
                    );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
             }else {
                $JSON = array(
                    "status" => "Gửi mã thất bại! xin thử lại",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
             }
} 
function SendEmail($email_confirm,$password_confirm,$email_nhan,$subject,$message,$form){
    #PHPMailer Modify 
    $mail = new PHPMailer(); // declare object PHPMailer
    $mail->SMTPDebug = 0;                // not debug                 
    $mail->isSMTP();                       // smtp connection             
    $mail->Host = 'smtp.gmail.com';   //smtp gmail
    $mail->SMTPAuth = true;                              // auth smtp 
    $mail->Username = $email_confirm;         // user gmail         
    $mail->Password = $password_confirm;                      // pass  gmail   
    $mail->SMTPSecure = 'tls';                           //tls protocol
    $mail->Port = 587;                                   // port
    $mail->setFrom('business-noreply@kunloc.com', $form); // address from
    $mail->addAddress($email_nhan);     // address email receive
    $mail->addReplyTo('business-noreply@kunloc.com', $form); // address and form from reply
    $mail->isHTML(true);   // set body with HTML
    $mail->Subject = $subject; // subject
    $mail->Body    = $message;
    $mail->CharSet = 'UTF-8';  // set unicode charset
    $send = $mail->send();
        if($send == true) {
            $_SESSION['start'] = time();
            $_SESSION['lock'] = 300;
            $JSON = array(
            "status" => "Đã gửi email xác nhận",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else{
         $JSON = array(
            "status" => "Gửi mã thất bại! xin thử lại",
            );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }
?>