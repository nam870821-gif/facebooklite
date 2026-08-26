<?php
 #print_r($_FILES);
 session_start();
 include_once("../config.php");
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
    if((strtolower($info) == "jpg" || strtolower($info) == "jpeg" || strtolower($info) == "gif") && getimagesize($uploaded_tmp)){
        if(file_exists($link_data)){
          $update_avatar = mysqli_query($kunloc, "UPDATE account SET avatar= 'data/$link_up' WHERE username='$username'");
          $upload = mysqli_query($kunloc,"INSERT INTO uploads SET img_url = 'data/$link_up',img_name = '$update_name',size='$sizeFile',type='$info', username= '$username'");
          #------------------------
          $randuid = RandomNumber(15);
          $randphoto = RandomNumber(16);
          $addpost = mysqli_query($kunloc,"INSERT INTO user_post_feed(`username`, `text`,`time`, `trangthai`, `uid`, `like`, `cmt`, `share`,`type`) VALUES ('$username','null','$now','0','$randuid','0','0','0','avatar')");    
          if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randuid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
           $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randuid','$randphoto','data/$link_up','$now','0','0','0')");
          }
          if($update_avatar && $upload && $addpost && $addphoto){
            $JSON = array(
              "title" => "Notication",
              "text" => "Đã cập nhật ảnh đại diện",
              "url" => "data/$link_up",
              "type" => "success",
              );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
          }else{
            $JSON = array(
              "title" => "Notication",
              "text" => "Tải lên thất bại",
              "type" => "error",
              );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
          }
          
        }else if($sizeFile > 8000000){
          $JSON = array(
                "title" => "Notication",
                "text" => "File bạn upload không được quá 8MB",
                "type" => "error",
                );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else if(move_uploaded_file($uploaded_tmp,$link_data)){
            $update_avatar = mysqli_query($kunloc, "UPDATE account SET avatar= 'data/$link_up' WHERE username='$username'");
            $upload = mysqli_query($kunloc,"INSERT INTO uploads SET img_url = 'data/$link_up',img_name = '$update_name',size='$sizeFile',type='$info', username= '$username'");
            #------------------------
            $randuid = RandomNumber(15);
            $randphoto = RandomNumber(16);
            $addpost = mysqli_query($kunloc,"INSERT INTO user_post_feed(`username`, `text`,`time`, `trangthai`, `uid`, `like`, `cmt`, `share`,`type`) VALUES ('$username','null','$now','0','$randuid','0','0','0','avatar')");    
            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid`= '$randuid' AND `fbid` = '$randphoto' AND username ='$username'")) != 1){
            $addphoto = mysqli_query($kunloc,"INSERT INTO photo(`username`, `uid`, `fbid`, `img_url`,`time`,`like`, `cmt`, `share`) VALUES ('$username','$randuid','$randphoto','data/$link_up','$now','0','0','0')");
            }
            if($update_avatar && $upload && $addpost && $addphoto){
              $JSON = array(
                "title" => "Notication",
                "text" => "Cập nhật thành công",
                "type" => "success",
                "url" => "data/$link_up"
                );
              die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
              $JSON = array(
                "title" => "Notication",
                "text" => "Tải lên thất bại",
                "type" => "error",
                );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            
        }else{
          $JSON = array(
            "title" => "Notication",
            "text" => "Tải lên thất bại",
            "type" => "error",
            );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
      
   }else{
    $JSON = array(
      "title" => "Notication",
      "text" => "File không hỗ trợ, bạn vui lòng chọn hình ảnh",
      "type" => "error",
      );
    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
   }
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
/*
 Array
(
    [image] => Array
        (
            [name] => xxxxx.jpg
            [type] => image/jpeg
            [tmp_name] => xxxxxx
            [error] => 0
            [size] => xxxxx
        )

)*/
?> 