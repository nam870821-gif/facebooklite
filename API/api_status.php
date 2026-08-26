<?php
	session_start();
	require_once("../config.php");
	if(empty($_POST['captent'])){
		/*$JSON = array(
            "title" => "Yêu cầu tiểu sử",
            "text" => "Người dùng chưa nhập tiểu sử",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));*/
        $captent = '';
	}else{
        $captent = mysqli_real_escape_string($kunloc,$_POST['captent']);
    }
	if(strlen($captent) < 0 || strlen($captent) > 300){
		$JSON = array(
			"title" => "Yêu cầu tiểu sử",
			"text" => "Bạn cần nhập tối thiểu từ 1 > 300",
			"type" => "info",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	$kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_status WHERE username ='$username'"));
	if($kiemtra == 1){
        mysqli_query($kunloc,"UPDATE user_status SET status='$captent' WHERE username='$username'");
        $JSON = array(
            "title" => "Cập nhật tiểu sử thành công",
            "text" => "",
            "type" => "success",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else{
        mysqli_query($kunloc,"INSERT INTO user_status(status, username, date) VALUES ('$captent','$username','$today')");
        $JSON = array(
            "title" => "Thêm tiểu sử thành công",
            "text" => "",
            "type" => "success",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
?>