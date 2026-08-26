<?php
	ob_start();
	session_start();
    header("Content-type: text/javascript");
    require_once("config.php");
    require_once("emo.php");
    if($_GET) $_POST = $_GET;
	if(empty($_POST['fbid'])){
		$JSON = array(
            "error" => "Thiếu trường fbid",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}else if(empty($_POST['access_token'])){
		$JSON = array(
            "error" => "Thiếu trường access_token",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else if(empty($_POST['limit'])){
		$JSON = array(
            "error" => "Thiếu trường limit",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else if(empty($_POST['type'])){
		$JSON = array(
            "error" => "Thiếu trường type",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
     $fbid = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['fbid']));
     $access_token = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['access_token']));
     $limit = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['limit']));
     $text = Emo(500000);
     #htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['text']));
     $type = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['type']));
	if(strlen($uid) < 0 || strlen($uid) > 100){
		$JSON = array(
			"error" => "Yêu cầu UID tối thiểu từ 1 > 100",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}else if(strlen($access_token) < 0 || strlen($access_token) > 100){
		$JSON = array(
			"error" => "Yêu cầu access_token tối thiểu từ 1 > 100",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}else if(strlen($limit) < 0 || strlen($limit) > 100){
		$JSON = array(
			"error" => "Yêu cầu limit tối thiểu từ 1 > 100",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}else if(strlen($text) < 0 || strlen($text) > 500){
		$JSON = array(
			"error" => "Yêu cầu text tối thiểu từ 1 > 500",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	$kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE token ='$access_token'");
	if(mysqli_num_rows($kiemtra) != 1){
        $JSON = array(
            "error" => "Access_token không hơp lệ!",
            "type" => "Truy cập https://dichvufbvn.net/settings để lấy mã",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }
    $GET_POST = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$fbid'");
    if(mysqli_num_rows($GET_POST) != 1){
        $JSON = array(
            "error" => "Fbid không hơp lệ!",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    if($limit == 'all'){
        $getaccount = mysqli_query($kunloc,"SELECT * FROM account ORDER BY RAND() LIMIT 0,1");
        while($kunloc_buff = mysqli_fetch_object($getaccount)){
            $tokens = $kunloc_buff->token;
            if($type == 'like'){
                like($fbid,$tokens,$kunloc,$now);
            }else if($type == 'cmt'){
                cmt($fbid,$tokens,$kunloc,$now,$text);
            }
            
        }
    }
    #=============================================
    function like($fbid,$matoken,$kunloc,$now){
    $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE token ='$matoken'");
	if(mysqli_num_rows($kiemtra) != 1){
        $JSON = array(
            "error" => "Access_token không hơp lệ!",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $GET_POST = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$fbid'");
    if(mysqli_num_rows($GET_POST) != 1){
        $JSON = array(
            "error" => "Fbid không hơp lệ!",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $getinfo = mysqli_fetch_object($kiemtra);
    $getpost = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `uid` ='$fbid'"));
    $array = array(
        $getpost->username,
        $getinfo->fullname,
        "Đã thích bài viết của bạn.",
        "story.php?fbid=$fbid"
    );
    /*if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM log WHERE uid ='$fbid' AND uid = '".$getinfo->id."' AND type='like' "))){
      $JSON = array(
            "name" => $getinfo->fullname,
            "error" => "flase",
        );
      die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM lich_su_hoat_dong WHERE post ='$fbid' AND uid = '".$getinfo->id."' AND type='like' "))){
      $JSON = array(
            "name" => $getinfo->fullname,
            "error" => "flase",
        );
      die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }*/
    $up = mysqli_query($kunloc,"UPDATE user_post_feed SET `like` = `like` + 5000000 WHERE uid= '$fbid'");         
    $loglike = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(username,uid,tieude,noidung,post,type,url,time) VALUES ('".$array[0]."','".$getinfo->id."','".$array[1]."','".$array[2]."','$fbid','like','".$array[3]."','$now')");
    $log =  mysqli_query($kunloc,"INSERT INTO log(username,uid,type,time) VALUES ('".$array[0]."','$fbid','like','$now')");    
    if($up && $loglike && $log){
        $JSON = array(
            "name" => $getinfo->fullname,
            "success" => "true",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else{
         $JSON = array(
            "name" => $getinfo->fullname,
            "error" => "flase",
        );
      die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
function cmt($fbid,$matoken,$kunloc,$now,$text){
    $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE token ='$matoken'");
	if(mysqli_num_rows($kiemtra) != 1){
        $JSON = array(
            "error" => "Access_token không hơp lệ!",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $GET_POST = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$fbid'");
    if(mysqli_num_rows($GET_POST) != 1){
        $JSON = array(
            "error" => "Fbid không hơp lệ!",
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    $getinfo = mysqli_fetch_object($kiemtra);
    $getpost = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `uid` ='$fbid'"));
    $array = array(
        $getpost->username,
        $getinfo->fullname,
        "Đã bình luận về bài viết của bạn.",
        "story.php?fbid=$fbid",
    );
    /*if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM log WHERE uid ='$fbid' AND uid = '".$getinfo->id."' AND type='like' "))){
      $JSON = array(
            "name" => $getinfo->fullname,
            "error" => "flase",
        );
      die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM lich_su_hoat_dong WHERE post ='$fbid' AND uid = '".$getinfo->id."' AND type='like' "))){
      $JSON = array(
            "name" => $getinfo->fullname,
            "error" => "flase",
        );
      die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }*/
    $send = mysqli_query($kunloc,"INSERT INTO comment_post(`username`, `text`, `time`, `uid`,`keycode`) VALUES ('".$getinfo->username."','$text','$now','$fbid','".RandomString(20)."')");
    if($send){
        $add = mysqli_query($kunloc,"UPDATE user_post_feed SET cmt = cmt + '1' WHERE `uid` = '$fbid'");
        $log = mysqli_query($kunloc,"INSERT INTO lich_su_hoat_dong(`username`,`uid`,`tieude`,`noidung`,`post`,`type`,`url`,`time`) VALUES ('".$array[0]."','".$getinfo->id."','".$array[1]."','".$array[2]."','$fbid','cmt','".$array[3]."','$now')");
                if($add && $log){
                    $JSON = array(
                        "name" => $getinfo->fullname,
                        "success" => "Đã bình luận thành công",
                        "text" => $text,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                     $JSON = array(
                         "name" => $getinfo->fullname,
                        "error" => "Đã bình luận thất bại",
                        "text" => $text,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }

            }else{
                $JSON = array(
                "error" => "Đã bình luận thất bại",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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