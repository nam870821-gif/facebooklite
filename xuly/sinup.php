<?php
    session_start();
	require_once("../config.php");
	if($_GET) $_POST =$_GET;
    if( empty($_POST['username']) || empty($_POST['password']) || empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone'])){
        $JSON = array(
            "title" => "Yêu cầu thông tin",
            "text" => "Bạn chưa điền đầy đủ thông tin",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } 
    $sinup_username = htmlspecialchars(addslashes($_POST['username']));
    $sinup_password = md5(addslashes($_POST['password']));
    $sinup_fullname = htmlspecialchars(addslashes($_POST['fullname']));
    $sinup_email = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['email'])));
    $sinup_phone = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['phone'])));
    #==========================================================
	    if(strlen($sinup_username) < 6 || strlen($sinup_username) > 55){
            $JSON = array(
                "title" => "Yêu cầu username",
                "text" => "Bạn cần nhập tối thiểu từ 6 > 55",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }  
        if(strlen($sinup_fullname) < 6 || strlen($sinup_fullname) > 55){
            $JSON = array(
                "title" => "Yêu Cầu Họ Tên",
                "text" => "Tên phải tối thiểu 6 > 50 chữ",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	    } 
        if(strlen($sinup_phone) < 9 || strlen($sinup_phone) > 11){
            $JSON = array(
                "title" => "Số Điện Thoại",
                "text" => "Yêu cầu nhập đúng số điện thoại",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	    }
	    if(strlen($sinup_password) < 6 || strlen($sinup_password) > 100){
            $JSON = array(
                "title" => "Yêu cầu thông tin",
                "text" => "Yêu cầu mật khẩu 6 > 100 kí tự",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	    }
        if(!preg_match("#[0-9]+#", $sinup_password) ) {
            $JSON = array(
                "title" => "Yêu cầu thông tin",
                "text" => "Mật khẩu phải có 1 con số ",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        if(!preg_match("#[a-z]+#", $sinup_password) ) {
            $JSON = array(
                "title" => "Yêu cầu thông tin",
                "text" => "Mật khẩu phải có 1 chữ cái",
                "type" => "info",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        $pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
        if(preg_match($pattern, $sinup_email, $match) != 1){
            $JSON = array(
                "title" => "Yêu cầu thông tin",
                "text" => "Địa chỉ email không hợp lệ",
                "type" => "error",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '$sinup_username'"))){
            $JSON = array(
                "title" => "Tài Khoản Đã Tồn Tại",
                "text" => "Xin hãy thử lại với tên khác",
                "type" => "error",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE phone = '$sinup_phone'"))){
            $JSON = array(
                "title" => "Số điện thoại đã tồn tại",
                "text" => "Xin hãy thử lại với số khác",
                "type" => "error",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE email = '$sinup_email'"))){
            $JSON = array(
                "title" => "Email Đã Tồn Tại",
                "text" => "Xin hãy thử lại với email khác",
                "type" => "error",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        $sinup_token = RandomString(30); 
        $vericode = RandomNumber(6); 
        $sinup_avatar = 'data/none.jpg';
        $sinup_bg = 'null';
        $kiemtra_account = mysqli_query($kunloc,"SELECT * FROM account WHERE username ='$sinup_username'");
        if(mysqli_num_rows($kiemtra_account) < 1){
        	$kunloc_info = mysqli_fetch_object($kiemtra_account);
            $created = mysqli_query($kunloc,"
            INSERT 
            INTO account(username, password, fullname, email, phone,avatar,background, noi_lam_viec, noi_o_hien_tai, tinh_trang, followers, ip, token, veri_code, confirm_status, trangthai, ngay_tham_gia) 
            VALUES ('$sinup_username','$sinup_password','$sinup_fullname','$sinup_email','$sinup_phone','$sinup_avatar','$sinup_bg','0','0','0','0','$ip','$sinup_token','$vericode','false', 'normal','$now')");
            if($created == 1){
              $_SESSION['username'] = $kunloc_info->username;
              $_SESSION['ip'] = $kunloc_info->ip;
              $JSON = array(
                    "title" => "Tham Gia Thành Công",
                    "text" => "Chờ chuyển hướng...",
                    "type" => "success",
                    "url" => "trang-chu",
                    "time" => $time_swal,
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));  
            }else{
                 $JSON = array(
                    "title" => "Đã xảy ra lỗi khi tạo tài khoản",
                    "text" => "Xin thử lại sau",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
                
            }else{
                $JSON = array(
                    "title" => "Có lỗi xảy ra",
                    "text" => "Xin thử lại sau",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
function RandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}
function RandomNumber($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
   return $randomString;
}
?>