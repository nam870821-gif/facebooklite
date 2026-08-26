<?php
	session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'ON':
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
            $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM `account` WHERE `id` = '$uid'"));
            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM `request` WHERE `uid` = '$id_user' AND uid2 = '$uid'"))){
                    $request = mysqli_query($kunloc,"DELETE FROM `request` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                    $accept = mysqli_query($kunloc,"DELETE FROM `accept` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                    if($request && $accept){
                        #$unfollow = mysqli_query($kunloc,"UPDATE account SET followers= followers - 1 WHERE id='$uid'");
                        $lich_su_hoat_dong = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE `uid`='$uid' AND username = '$username' AND `type` ='add'");
                        $log =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$uid' AND username = '$username' AND `type` ='add' ");
                        $JSON = array(
                            "title" => "Bỏ lời mời thành công",
                            "text" => "",
                            "type" => "error",
                            );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                     }

            }else{
                $addrequest =  mysqli_query($kunloc,"INSERT INTO `request` (`username`,`uid`,`uid2`,`time`) VALUES ('$username','$id_user','$uid','$now')");
                $addaccept =  mysqli_query($kunloc,"INSERT INTO `accept` (`username`,`uid`,`uid2`,`time`) VALUES ('$username','$id_user','$uid','$now')");
                if($addrequest && $addaccept){
                        $array = array(
                            $getinfo->username,
                            "$fullname",
                            "Đã gửi cho bạn 1 lời mời kết bạn.",
                            "profile.php?id=$id_user"
                        );
                        $log = mysqli_query($kunloc,"INSERT INTO `log`(`username`,`uid`,`type`,`time`) VALUES ('$username','$uid','add','$now')");
                        $lich_su_hoat_dong = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`,`seen`) VALUES ('".$array[0]."','$id_user','".$array[1]."','".$array[2]."','null','add','".$array[3]."','$now','0')");
                        #$upfollow = mysqli_query($kunloc,"UPDATE account SET followers= followers + 1 WHERE id='$uid'");
                        $JSON = array(
                        "title" => "Gửi kết bạn thành công",
                        "text" => "",
                        "type" => "success",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
             }
                    
            }
        break;
        case 'OFF':
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
            $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM `account` WHERE `id` = '$uid'"));
            
            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM `friends` WHERE `uid` = '$uid' AND uid2 = '$id_user'"))){
                $request = mysqli_query($kunloc,"DELETE FROM `request` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                $accept = mysqli_query($kunloc,"DELETE FROM `accept` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                $movefriends = mysqli_query($kunloc,"DELETE FROM `friends` WHERE uid = '$uid' AND uid2 = '$id_user'");
                $movefriends2 = mysqli_query($kunloc,"DELETE FROM `friends` WHERE uid2 = '$uid' AND uid = '$id_user'");
                if($request && $accept && ($movefriends || $movefriends2)){
                    #$unfollow = mysqli_query($kunloc,"UPDATE account SET followers= followers + 1 WHERE id='$uid'");
                    $lich_su_hoat_dong = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE `uid`='$uid' AND username = '$username' AND `type` ='add'");
                    $lich_su_hoat_dong2 = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE `uid`='$id_user' AND username = '".$getinfo->username."' AND `type` ='add'");
                    $log =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$uid' AND username = '$username' AND `type` ='add' ");
                    $log2 =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$id_user' AND username = '".$getinfo->username."' AND `type` ='add' ");
                    
                    $JSON = array(
                        "title" => "Bỏ hủy kết bạn",
                        "text" => "",
                        "type" => "error",
                        );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                 }
            }else if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM `friends` WHERE `uid2` = '$uid' AND uid = '$id_user'"))){
                $request = mysqli_query($kunloc,"DELETE FROM `request` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                $accept = mysqli_query($kunloc,"DELETE FROM `accept` WHERE `uid`='$id_user' AND uid2 = '$uid'");
                $movefriends = mysqli_query($kunloc,"DELETE FROM `friends` WHERE uid = '$uid' AND uid2 = '$id_user'");
                $movefriends2 = mysqli_query($kunloc,"DELETE FROM `friends` WHERE uid2 = '$uid' AND uid = '$id_user'");
                if($request && $accept && ($movefriends || $movefriends2)){
                    #$unfollow = mysqli_query($kunloc,"UPDATE account SET followers= followers + 1 WHERE id='$uid'");
                    $lich_su_hoat_dong = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE `uid`='$uid' AND username = '$username' AND `type` ='add'");
                    $lich_su_hoat_dong2 = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE `uid`='$id_user' AND username = '".$getinfo->username."' AND `type` ='add'");
                    $log =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$uid' AND username = '$username' AND `type` ='add' ");
                    $log2 =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$id_user' AND username = ".$getinfo->username."' AND `type` ='add' ");
                    $JSON = array(
                        "title" => "Bỏ hủy kết bạn",
                        "text" => "",
                        "type" => "error",
                        );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                 }
            }else{
            $addfriends =  mysqli_query($kunloc,"INSERT INTO `friends` (`username`,`uid`,`uid2`,`time`) VALUES ('$username','$id_user','$uid','$now')");
            if($addfriends ){
                    #$unfollow = mysqli_query($kunloc,"UPDATE account SET followers= followers - 1 WHERE id='$uid'");
                    $request = mysqli_query($kunloc,"DELETE FROM `request` WHERE `uid`='$uid' AND uid2 = '$id_user'");
                    $accept = mysqli_query($kunloc,"DELETE FROM `accept` WHERE `uid`='$uid' AND uid2 = '$id_user'");
                    $log =  mysqli_query($kunloc,"DELETE FROM `log` WHERE `uid`='$id_user' AND username = '$username' AND `type` ='add' ");
                    $array = array(
                        $getinfo->username,
                        "$fullname",
                        "Đã chấp nhận lời mời kết bạn.",
                        "profile.php?id=$id_user"
                    );
                    $lich_su_hoat_dong = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`,`seen`) VALUES ('".$array[0]."','$id_user','".$array[1]."','".$array[2]."','null','add','".$array[3]."','$now','0')");
                    $JSON = array(
                    "title" => "Đồng ý kết bạn thành công",
                    "text" => "",
                    "type" => "success",
                    );
                 die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }       
        }
        break;

    }
}
?>