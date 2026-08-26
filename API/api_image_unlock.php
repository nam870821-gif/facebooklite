<?php
 #print_r($_FILES);
 session_start();
 include_once("../config.php");
 foreach($_FILES as $file){
   $name = $file['name'];
   $link_data = "../unlock/$name";
   $sizeFile = $file['size'];
   $uploaded_tmp = $file['tmp_name'];
   $info = substr($name, strrpos($name, '.' ) + 1);
   if(empty($sizeFile)){
    echo json_encode(array("error" => "Chưa có ảnh")); 
   }else{
    if((strtolower($info) == "jpg" || strtolower($info) == "jpeg") && getimagesize($uploaded_tmp)){
        if(file_exists($link_data)){
          $JSON = array(
            "title" => "",
            "text" => "Đã tải lên",
            "url" => "unlock/$name",
            "type" => "success",
            );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else if($sizeFile > 800000){
          $JSON = array(
                "title" => "",
                "text" => "Ảnhh upload không được quá 8MB",
                "type" => "error",
                );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else{
          if(move_uploaded_file($uploaded_tmp,$link_data)){
            $JSON = array(
                  "title" => "",
                  "text" => "Đã tải lên",
                  "type" => "success",
                  "url" => "unlock/$name"
                  );
            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
          }else{
            $JSON = array(
                "title" => "",
                "text" => "File không hỗ trợ, bạn vui lòng chọn hình ảnh",
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