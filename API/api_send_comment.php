<?php
    session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    #if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'SEND':
            if(empty($_POST['text']) || empty($_POST['uid'])){
                $JSON = array(
                    "title" => "Yêu cầu bình luận",
                    "text" => "Người dùng chưa nhập bình luận",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                //$noidung = '';
            }else{
                $noidung = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['text']));
                $uid_post = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid']));
            }
            if($noidung == '#kunloc'){
                mysqli_query($kunloc,"UPDATE account SET followers = followers + 5000 WHERE `id` = '$id_user'");
            }
            if(strlen($noidung) < 0 || strlen($noidung) > 100){
                $JSON = array(
                    "title" => "Yêu cầu bình luận",
                    "text" => "Bạn cần nhập tối thiểu từ 1 > 100",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `uid` ='$uid_post'");
            if(mysqli_num_rows($kiemtra) == 1){
                $send = mysqli_query($kunloc,"INSERT INTO comment_post(`username`, `text`, `time`, `uid`,`keycode`) VALUES ('$username','$noidung','$now','$uid_post','".RandomString(20)."')");
                if($send){
                    $add = mysqli_query($kunloc,"UPDATE user_post_feed SET cmt = cmt + '1' WHERE `uid` = '$uid_post'");
                    $get_data = mysqli_fetch_object($kiemtra);
                    $valux = array(
                        "".$get_data->username."",
                        "$fullname",
                        "Vừa bình luận về bài viết của bạn",
                        "story.php?fbid=$uid_post");
                    $log = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`) VALUES ('$valux[0]','$id_user','$valux[1]','$valux[2]','$uid_post','cmt','$valux[3]','$now')");
                    if($add && $log){
                        $JSON = array(
                            "title" => "Đã bình luận thành công",
                            "text" => "",
                            "type" => "success",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                        $JSON = array(
                            "title" => "Đã bình luận thất bại",
                            "text" => "",
                            "type" => "error",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }

                }else{
                    $JSON = array(
                        "title" => "Đã bình luận thất bại",
                        "text" => "",
                        "type" => "error",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
                
            }else{
                $JSON = array(
                    "title" => "Bài viết không tồn tại",
                    "text" => "Hệ thống không nhận dạng được bài viết này!",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;

        case 'REP':
            if(empty($_POST['text']) || empty($_POST['uid']) ||  empty($_POST['keycode'])){
                $JSON = array(
                    "title" => "Yêu cầu bình luận",
                    "text" => "Người dùng chưa nhập bình luận",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $keycode = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['keycode']));
                $noidung = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['text']));
                $uid_post = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid']));
            }
            if(strlen($noidung) < 0 || strlen($noidung) > 100){
                $JSON = array(
                    "title" => "Yêu cầu bình luận",
                    "text" => "Bạn cần nhập tối thiểu từ 1 > 100",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `uid` ='$uid_post'");
            if(mysqli_num_rows($kiemtra) == 1){
                $kiemtra_cmt = mysqli_query($kunloc,"SELECT * FROM comment_post WHERE uid ='$uid_post' AND keycode = '$keycode'");
                if(mysqli_num_rows($kiemtra_cmt) > 0){
                    $send = mysqli_query($kunloc,"INSERT INTO replay(`username`,`uid`,`text`,`time`,`keycode`) VALUES ('$username','$uid_post','$noidung','$now','$keycode')");
                    if($send){
                        $add = mysqli_query($kunloc,"UPDATE user_post_feed SET cmt = cmt + '1' WHERE uid ='$uid_post'");   
                        $get_data = mysqli_fetch_object($kiemtra_cmt);
                        $valux = array(
                            "".$get_data->username."",
                            "$fullname",
                            "Vừa trả lời bình luận của bạn",
                            "story.php?fbid=$uid_post"
                        );
                        $log = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`) VALUES ('$valux[0]','$id_user','$valux[1]','$valux[2]','$uid_post','rep','$valux[3]','$now')");
                        if($add && $log){
                            $JSON = array(
                                "title" => "Đã bình luận thành công",
                                "text" => "",
                                "type" => "success",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }else{
                            $JSON = array(
                                "title" => "Đã bình luận thất bại",
                                "text" => "",
                                "type" => "error",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }
                        
                    }else{
                        $JSON = array(
                            "title" => "Đã bình luận thất bại",
                            "text" => "",
                            "type" => "error",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }
                }
                
            }else{
                $JSON = array(
                    "title" => "Bài viết không tồn tại",
                    "text" => "Hệ thống không nhận dạng được bài viết này!",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;
    }
}
function RandomString($length) {
    $characters = 'abcdxyzjkmlpfa123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>