<?php
	session_start();
    //header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
     switch($_REQUEST['type']){
        case 'CREATE_':
           if(empty($_POST['text'])){
                $JSON = array(
                    "title" => "Yêu cầu bài viết",
                    "text" => "Người dùng chưa nhập bài viết",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $noidung = mysqli_real_escape_string($kunloc,$_POST['text']);
            if(empty($_POST['text']))  $image_list = 'null';
            else $image_list = mysqli_real_escape_string($kunloc,$_POST['image']);
            if(strlen($noidung) < 0 || strlen($noidung) > 5000){
                $JSON = array(
                    "title" => "Yêu cầu bài viết",
                    "text" => "Bạn cần nhập tối thiểu từ 1 > 5000",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `text` ='$noidung' AND username ='$username'"));
            if($kiemtra == 1){
                $JSON = array(
                    "title" => "Bài viết đã tồn tại",
                    "text" => "Xin thử lại sau",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                #---------------------------------------------
                $now = time();
                $randuid = RandomNumber(15);
                if($image_list != 'null') {
                    $tach_photo = explode("|",$image_list);
                    for($i=0;$i<count($tach_photo);$i++) {
                        $randphoto = RandomNumber(16);
                        if($tach_photo[$i] != NULL){
                            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randuid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
                                $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randuid','$randphoto','$tach_photo[$i]','$now','0','0','0')");
                            }
                        }
                    }
                }
                $add = mysqli_query($kunloc,"INSERT INTO user_post_feed(`username`, `text`,`time`, `trangthai`, `uid`, `like`, `cmt`, `share`,`type`) VALUES ('$username','$noidung','$now','0','$randuid','0','0','0','post')");
                if($add){
                    $JSON = array(
                        "title" => "Thêm bài viết thành công",
                        "text" => "",
                        "type" => "success",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                   $JSON = array(
                        "title" => "$image_list Thêm bài viết thất bại",
                        "text" => "",
                        "type" => "error",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); 
                }
                
            }
        break;
        case 'UPDATE_':
            if(empty($_POST['text']) || empty($_POST['uid'])){
                $JSON = array(
                    "title" => "Yêu cầu bài viết",
                    "text" => "Người dùng chưa nhập bài viết",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
               // $noidung = '';
            }
            $noidung =mysqli_real_escape_string($kunloc,$_POST['text']);
            $uid = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid']));
            if(strlen($noidung) < 0 || strlen($noidung) > 5000){
                $JSON = array(
                    "title" => "Yêu cầu bài viết",
                    "text" => "Bạn cần nhập tối thiểu từ 1 > 5000",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$uid'"));
            if($kiemtra == 1){
                $update = mysqli_query($kunloc,"UPDATE user_post_feed SET text= '$noidung' WHERE  uid ='$uid'");
                if($update){
                    $JSON = array(
                        "title" => "Cập nhập bài viết thành công",
                        "text" => "",
                        "type" => "success",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }

            }else{
                $JSON = array(
                    "title" => "Có lỗi khi chỉnh sửa",
                    "text" => "Xin hãy thử lại!",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;
        case 'DELETE_':
            if(empty($_POST['uid'])){
                $JSON = array(
                    "title" => "Yêu cầu bài viết",
                    "text" => "Người dùng chưa nhập bài viết",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $uid = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid']));
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid ='$uid'");
            if(mysqli_num_rows($kiemtra) == 1){
                $kiemtra1 = mysqli_fetch_object($kiemtra);
                $kiemtra2 = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM photo WHERE uid ='".$kiemtra1->uid."'"));
                $kiemtra3 = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE fbid ='".$kiemtra1->uid."'"));
                if($kiemtra2->uid){
                 if($kiemtra3->anh1 == $kiemtra2->img_url){
                   $delete_anhnoibat = mysqli_query($kunloc,"UPDATE anhnoibat SET anh1 = '0' WHERE anh1 ='".$kiemtra2->img_url."'");
                 }else if($kiemtra3->anh2 == $kiemtra2->img_url){
                   $delete_anhnoibat = mysqli_query($kunloc,"UPDATE anhnoibat SET anh2 = '0' WHERE anh2 ='".$kiemtra2->img_url."'");
                 }else if($kiemtra3->anh3 == $kiemtra2->img_url){
                   $delete_anhnoibat = mysqli_query($kunloc,"UPDATE anhnoibat SET anh3 = '0' WHERE anh3 ='".$kiemtra2->img_url."'");
                 }
                 $delete_upload = mysqli_query($kunloc,"DELETE FROM uploads WHERE img_url ='".$kiemtra2->img_url."'");
                 $delete_photo = mysqli_query($kunloc,"DELETE FROM photo WHERE img_url ='".$kiemtra2->img_url."'");
                }
                $delete = mysqli_query($kunloc,"DELETE FROM user_post_feed WHERE uid ='$uid'");
                if($delete){
                    $JSON = array(
                        "title" => "Xóa bài viết thành công",
                        "text" => "",
                        "type" => "success",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "title" => "Xóa bài viết thất bại",
                        "text" => "",
                        "type" => "error",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }

            }else{
                $JSON = array(
                    "title" => "Có lỗi khi xóa",
                    "text" => "Xin hãy thử lại!",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;
      }
}
function RandomNumber($length) {
        $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}
?>