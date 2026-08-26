<?php
session_start();
require_once("../config.php");
if(empty($_REQUEST) || empty($_REQUEST['type'])){
	$JSON = array(
        "title" => "Bạn không có quyền vào đây",
        "text" => "Chặn truy cập từ nguồn khác",
        "type" => "error",
    );
    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}else{
	$type = $_REQUEST['type'];
	switch($type){
		case "confirm":
			if(empty($_POST) || empty($_POST['code'])){
				$JSON = array(
					"title" => "Yêu cầu  mã xác nhận",
					"text" => "Bạn chưa điền mã xác nhận",
					"type" => "info",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
			$code = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['code'])));
			if(strlen($code) < 1 || strlen($code) > 6){
				$JSON = array(
					"title" => "Yêu cầu mã xác nhận",
					"text" => "Bạn cần nhập tối thiểu từ 1 > 6",
					"type" => "info",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
			$kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE veri_code= '$code' AND username ='$username'"));
				if($kiemtra == 1){
				   mysqli_query($kunloc,"UPDATE account SET trangthai = '1' WHERE username = '$username'");
				   $JSON = array(
								"title" => "Xác nhận thành công",
								"text" => "Cảm ơn bạn đã tham gia hệ thống của chúng tôi. Xin cảm ơn rất nhiều",
								"type" => "success",
								"url" => "trang-chu",
								"time" => $time_swal
					);
					die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
				}else{
				$JSON = array(
							"title" => "Mã xác nhận không kúng",
							"text" => "Kiểm tra lại mã của bạn!",
							"type" => "error",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
		break;
		#----------------------------------------------------------------
		case "change":
			if(empty($_POST) || empty($_POST['email'])){
				$JSON = array(
					"title" => "Yêu cầu email mới",
					"text" => "Bạn chưa điền email mới",
					"type" => "info",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
			$change_email = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['email'])));
			if(strlen($change_email) < 1 || strlen($change_email) > 100){
				$JSON = array(
					"title" => "Yêu cầu email mới",
					"text" => "Bạn cần nhập tối thiểu từ 1 > 100",
					"type" => "info",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
			$pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
			if(preg_match($pattern, $change_email, $match) != 1){
				$JSON = array(
					"title" => "Yêu cầu thông tin",
					"text" => "Địa chỉ email không hợp lệ",
					"type" => "error",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
			$kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE email= '$change_email' AND username ='$username'"));
				if($kiemtra != 1){
				   mysqli_query($kunloc,"UPDATE account SET email = '$change_email' WHERE username = '$username'");
				   $JSON = array(
								"title" => "Thêm email mới thành công",
								"text" => "Xin hãy kiểm tra hộp thư của bạn",
								"type" => "success",
								"url" => "xac-nhan-tai-khoan",
								"time" => $time_swal
					);
					die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
				}else{
				$JSON = array(
							"title" => "Email trùng với tài khoản đã có",
							"text" => "Kiểm tra lại email của bạn!",
							"type" => "error",
				);
				die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			}
		break;
	}
}
?>