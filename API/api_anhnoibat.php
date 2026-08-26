<?php
 session_start();
 include("../config.php");
 $randfbid = RandomNumber(15);
 foreach($_FILES as $file){
   $name = $file['name'];
   $sizeFile = $file['size'];
   $uploaded_tmp = $file['tmp_name'];
   $update_name = $name;
   $info = substr($name, strrpos($name, '.' ) + 1);
   $link_up = md5(rand()).".".$info;
   $link_data = "../data/$link_up";
   if(empty($sizeFile)){
    echo json_encode(array("error" => "Chưa có ảnh")); 
   }else{
    if((strtolower($info) == "jpg" || strtolower($info) == "jpeg") && getimagesize($uploaded_tmp)){
        if(file_exists($link_data)){
            $kiemtra = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username='$username'"));
            if($kiemtra->anh1 == '0'){
                $type = 'anh1';
                $link = "data/$link_up";
            }else if($kiemtra->anh2 == '0'){
                $type = 'anh2';
                $link = "data/$link_up";
            }else if($kiemtra->anh3 == '0'){
                $type = 'anh3';
                $link = "data/$link_up";
            }
            if(($kiemtra->anh1 && $kiemtra->anh2 && $kiemtra->anh3) != '0'){
                $JSON = array(
                    "title" => "",
                    "text" => "Tối đa 3 ảnh thôi",
                    "name"=> $name,
                    "url"=> "data/$link_up",
                    "type" => "error",
                    );
              die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else if(upload($kunloc,$username,$type,$link,$randfbid)){
                #------------------------
                $data_anh = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anh_noi_bat WHERE username ='$username'"));
                $randphoto = RandomNumber(16);
                if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `fbid`= '$randfbid' username ='$username'")) == 1){
                    if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randfbid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
                    $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randfbid','$randphoto','data/$link_up','$now','0','0','0')");
                    }
                }else{
                   $addpost = mysqli_query($kunloc,"INSERT INTO user_post_feed(`username`, `text`,`time`, `trangthai`, `uid`, `like`, `cmt`, `share`,`type`) VALUES ('$username','null','$now','2','$randfbid','0','0','0','post')"); 
                    if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randfbid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
                    $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randfbid','$randphoto','data/$link_up','$now','0','0','0')");
                    }
                }
                $JSON = array(
                    "title" => "",
                    "text" => "Đã tải lên 1 ảnh nổi bật",
                    "name"=> $name,
                    "url"=> "data/$link_up",
                    "type" => "success",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $JSON = array(
                    "title" => "",
                    "text" => "Tải lên thất bại, xin thử lại",
                    "type" => "error",
                    );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
           
        }else if($sizeFile > 800000){
          $JSON = array(
                "title" => "",
                "text" => "File bạn upload không được quá 8MB",
                "type" => "error",
                );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else if(move_uploaded_file($uploaded_tmp,$link_data)){
            $kiemtra = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username='$username'"));
            if($kiemtra->anh1 == '0'){
                $type = 'anh1';
                $link = "data/$link_up";
            }else if($kiemtra->anh2 == '0'){
                $type = 'anh2';
                $link = "data/$link_up";
            }else if($kiemtra->anh3 == '0'){
                $type = 'anh3';
                $link = "data/$link_up";
            }
            if(($kiemtra->anh1 && $kiemtra->anh2 && $kiemtra->anh3) != '0'){
                $JSON = array(
                    "title" => "",
                    "text" => "Tối đa 3 ảnh thôi",
                    "name"=> $name,
                    "url"=> "data/$link_up",
                    "type" => "error",
                    );
              die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else if(upload($kunloc,$username,$type,$link,$randfbid)){
                #------------------------
                $data_anh = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anh_noi_bat WHERE username ='$username'"));
                $randphoto = RandomNumber(16);
                if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE `fbid`= '$randfbid' username ='$username'")) == 1){
                    if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randfbid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
                    $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randfbid','$randphoto','data/$link_up','$now','0','0','0')");
                    }
                }else{
                   $addpost = mysqli_query($kunloc,"INSERT INTO user_post_feed(`username`, `text`,`time`, `trangthai`, `uid`, `like`, `cmt`, `share`,`type`) VALUES ('$username','null','$now','2','$randfbid','0','0','0','post')"); 
                    if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randfbid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
                    $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randfbid','$randphoto','data/$link_up','$now','0','0','0')");
                    }
                }
                $JSON = array(
                    "title" => "",
                    "text" => "Đã tải lên 1 ảnh nổi bật",
                    "name"=> $name,
                    "url"=> "data/$link_up",
                    "type" => "success",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $JSON = array(
                    "title" => "",
                    "text" => "Tải lên thất bại, xin thử lại",
                    "type" => "error",
                    );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }
      }else{
        $JSON = array(
            "title" => "",
            "text" => "File không hỗ trợ, bạn vui lòng chọn hình ảnh",
            "type" => "error",
            );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
      } 
   }
}
function upload($kunloc,$username,$type,$link,$randfbid){
    $kiemtra_anh= mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username='$username'"));
    if($kiemtra_anh >= 1){
        return mysqli_query($kunloc,"UPDATE anhnoibat SET `$type` = '$link',fbid='$randfbid' WHERE username='$username'");
    }else{
        mysqli_query($kunloc,"INSERT INTO anhnoibat(username,fbid,anh1,anh2,anh3,`time`) VALUES ('$username','$randfbid','0','0','0','".time()."') ");
        return mysqli_query($kunloc,"UPDATE anhnoibat SET `$type` = '$link' WHERE username='$username'");
        
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