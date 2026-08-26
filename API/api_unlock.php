<?php
    session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'SEND':
	if(empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['ngaysinh']) || empty($_POST['image'])){
		$JSON = array(
            "title" => "Yêu cầu thông tin mở khóa",
            "text" => "Người dùng chưa nhập thông tin mở khóa",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
    $fullname_ = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['fullname']));
    $email_ = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['email']));
    $ngaysinh = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['ngaysinh']));
    $image_ = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['image']));
	if(strlen($fullname_) < 0 || strlen($fullname_) > 100){
		$JSON = array(
			"title" => "Yêu cầu họ tên mở khóa",
			"text" => "Bạn cần nhập tối thiểu từ 1 > 100",
			"type" => "info",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    if(strlen($email_) < 0 || strlen($email_) > 100){
		$JSON = array(
			"title" => "Yêu cầu email mở khóa",
			"text" => "Bạn cần nhập tối thiểu từ 1 > 100",
			"type" => "info",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    if(strlen($ngaysinh) < 0 || strlen($ngaysinh) > 10){
		$JSON = array(
			"title" => "Yêu cầu email mở khóa",
			"text" => "Bạn cần nhập tối thiểu từ 1 > 10",
			"type" => "info",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    if(strlen($image) < 0 || strlen($image) > 100){
		$JSON = array(
			"title" => "Yêu cầu email mở khóa",
			"text" => "Bạn cần nhập tối thiểu từ 1 > 100",
			"type" => "info",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	$kiemtra =mysqli_query($kunloc,"SELECT * FROM `checkpoint` WHERE username ='$username'");
	if(mysqli_num_rows($kiemtra) >= 1){
        $JSON = array(
            "title" => "Đơn yêu cầu của bạn đã tồn tại",
            "text" => "",
            "type" => "error",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else{
        $checkpoint = mysqli_fetch_object($kiemtra);
        $form = mysqli_query($kunloc,"INSERT INTO `checkpoint`(`username`, `fullname`, `ngaysinh`, `email`, `image`, `active`, `support`, `time`) VALUES ('$username','$fullname_','$ngaysinh','$email_','$image_','0','0','$now')");
        if($form ){
            $JSON = array(
                "title" => "Đã gửi yêu cầu mở khóa ",
                "text" => "Đợi duyệt",
                "type" => "success",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else{
            $JSON = array(
                "title" => "Có lỗi khi gửi đơn",
                "text" => "Xin thử lại",
                "type" => "error",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        
    }
    break;
}
}
?>