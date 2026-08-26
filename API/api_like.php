<?php
	session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
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
            $kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$uid'"));
            if($kiemtra == 1){
                
                 if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM log WHERE uid ='$uid' AND username = '$username' AND `type`='like'"))){
                     $unlike = mysqli_query($kunloc,"UPDATE user_post_feed SET `like`= `like` - 1 WHERE uid='$uid' ");
                     $removelog = mysqli_query($kunloc,"DELETE FROM log WHERE uid='$uid' AND username = '$username' AND `type`='like' ");
                     $loglike = mysqli_query($kunloc,"DELETE FROM lich_su_hoat_dong WHERE uid='$uid' AND username = '$username' AND `type` ='like'");
                     $getpost = mysqli_fetch_object(mysqli_query($kunloc,"SELECT `like` FROM user_post_feed WHERE `uid` ='$uid'"));
                     if($unlike && $removelog && $loglike){
                        $JSON = array(
                            "title" => "Bỏ Like",
                            "text" => "",
                            "type" => "error",
                            "total" => formatnumber($getpost->like)
                            );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                     }else{
                        $JSON = array(
                            "title" => "Bỏ Like thất bại",
                            "text" => "",
                            "type" => "error",
                            "total" => formatnumber($getpost->like)
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }

                }else{
                    $uplike = mysqli_query($kunloc,"UPDATE user_post_feed SET `like` = `like` + 1 WHERE uid= '$uid'");
                    $array = array(
                        $getpost->username,
                        $fullname,
                        "Đã thích bài viết của bạn.",
                        "story.php?fbid=$uid"
                    );
                    $loglike = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(username,uid,tieude,noidung,post,type,url,time) VALUES ('$array[0]','$id_user','$array[1]','$array[2]','$uid','like','$array[3]','$now')");
                    $log =  mysqli_query($kunloc,"INSERT INTO log(username,uid,type,time) VALUES ('$username','$uid','like','$now')");
                    $getpost = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `uid` ='$uid'"));
                    if($uplike && $log && $loglike){
                        $JSON = array(
                        "title" => "Like",
                        "text" => "",
                        "type" => "success",
                        "total" => formatnumber($getpost->like)
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                        $JSON = array(
                            "title" => "Like thất bại",
                            "text" => "",
                            "type" => "error",
                            "total" => formatnumber($getpost->like)
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