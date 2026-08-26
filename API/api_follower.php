<?php
	session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    #if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'kiemtra':
            if(empty($_POST['uid'])){
                $JSON = array(
                    "title" => "Yêu cầu uid",
                    "text" => "Người dùng chưa nhập uid",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $uid = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid']));
            }
            if(strlen($uid) < 0 || strlen($uid) > 100){
                $JSON = array(
                    "title" => "Yêu cầu uid",
                    "text" => "Uid không hợp lệ",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE id ='$uid'");
            if(mysqli_num_rows($kiemtra) == 1){
                 if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM log WHERE uid ='$uid' AND username = '$username' "))){
                     $un = mysqli_query($kunloc,"UPDATE account SET followers= followers - 1 WHERE id='$uid'");
                     $remove = mysqli_query($kunloc,"DELETE FROM log WHERE uid='$uid' AND username = '$username'");
                     if($un && $remove){
                        mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE uid='$uid' AND username = '$username'");
                        $JSON = array(
                            "title" => "Bỏ theo dõi",
                            "text" => "",
                            "type" => "error",
                            );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                     }

                }else{
                    $up = mysqli_query($kunloc,"UPDATE account SET followers= followers + 1 WHERE id='$uid'");
                    $add =  mysqli_query($kunloc,"INSERT INTO log(username,uid,type,time) VALUES ('$username','$uid','sub','$now')");
                    $get_data = mysqli_fetch_object($kiemtra);
                    $valux = array(
                            $get_data->username,
                            $fullname,
                            "Đã bắt đầu theo dõi bạn.",
                            "profile.php?id=$id_user"
                    );
                    $lich_su_hoat_dong = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`) VALUES ('$valux[0]','$id_user','$valux[1]','$valux[2]','$uid','sub','$valux[3]','$now')");
                    if($up && $add && $lich_su_hoat_dong){
                        $JSON = array(
                        "title" => "Theo dõi thành công",
                        "text" => "",
                        "type" => "success",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                     $JSON = array(
                        "title" => "Thao tác thất bại",
                        "text" => "",
                        "type" => "error",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));   
                    }
                    
                }

            }else{
               $JSON = array(
                    "title" => "Thao tác thất bại",
                    "text" => "",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;
    }
}
?>