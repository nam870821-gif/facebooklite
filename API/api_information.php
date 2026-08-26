<?php
	session_start();
	require_once("../config.php");
	if(empty($_POST['email']) || empty($_POST['fullname']) || empty($_POST['phone']) || empty($_POST['noi_o']) || empty($_POST['noi_lam']) || empty($_POST['tinhtrang']) < 0){
		$JSON = array(
            "title" => "Điền đầy đủ thông tin",
            "text" => "Người dùng chưa nhập đầy đủ",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
    $up_fullname = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['fullname'])));
    $up_email = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['email'])));
    $up_phone = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['phone'])));
    $up_noi_o = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['noi_o'])));
    $up_noi_lam = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST['noi_lam'])));
    $get_tinh_trang = $_POST['tinhtrang'];
    $value = array("Độc thân","Đang tìm hiểu","Hẹn hò","Đã kết hôn");
    $up_tinh_trang = $value[$get_tinh_trang];
	if(strlen($up_fullname) < 6 || strlen($up_fullname) > 55){
        $JSON = array(
            "title" => "Yêu Cầu Họ Tên",
            "text" => "Tên phải tối thiểu 6 > 50 chữ",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } 
    if(strlen($up_noi_o) < 6 || strlen($up_noi_o) > 55){
        $JSON = array(
            "title" => "Yêu Cầu Nơi ở",
            "text" => "Tên phải tối thiểu 6 > 50 chữ",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } 
    if(strlen($up_noi_lam) < 6 || strlen($up_noi_lam) > 55){
        $JSON = array(
            "title" => "Yêu Cầu Nơi làm",
            "text" => "Tên phải tối thiểu 6 > 50 chữ",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } 
    if(strlen($up_phone) < 9 || strlen($up_phone) > 11){
        $JSON = array(
            "title" => "Số Điện Thoại",
            "text" => "Yêu cầu nhập đúng số điện thoại",
            "type" => "info",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
    if(preg_match($pattern, $up_email, $match) != 1){
            $JSON = array(
                "title" => "Yêu cầu thông tin",
                "text" => "Địa chỉ email không hợp lệ",
                "type" => "error",
            );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
	$kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE username ='$username'"));
	if($kiemtra == 1){
        if($get_tinh_trang > 3){
            $udpate = mysqli_query($kunloc,"UPDATE account SET email='$up_email',fullname='$up_fullname',phone='$up_phone',noi_o_hien_tai='$up_noi_o',noi_lam_viec='$up_noi_lam' WHERE username='$username'");
        }else{
            $udpate = mysqli_query($kunloc,"UPDATE account SET email='$up_email',fullname='$up_fullname',phone='$up_phone',noi_o_hien_tai='$up_noi_o',noi_lam_viec='$up_noi_lam',tinh_trang='$up_tinh_trang' WHERE username='$username'");
        }
        if($udpate){
            $JSON = array(
                "title" => "$get_tinh_trang - $tinh_trang Cập nhật thông tin thành công",
                "text" => "",
                "type" => "success",
            );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

    }else{
        $JSON = array(
			"title" => "Tài khoản không tồn tại",
			"text" => "Hệ thống không nhận dạng được tài khoản này!",
			"type" => "error",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
?>