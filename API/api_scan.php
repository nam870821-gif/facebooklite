<?php

 foreach($_FILES as $file){
   $name = $file['name'];
   $sizeFile = $file['size'];
   $uploaded_tmp = $file['tmp_name'];
   $info = substr($name, strrpos($name, '.' ) + 1);
   $link_up = md5(rand()).".".$info;
   $link_data = "../data/$link_up";
   if(empty($sizeFile)){
    echo json_encode(array("error" => "Chưa có ảnh")); 
   }else{
    if((strtolower($info) == "jpg" || strtolower($info) == "jpeg") && getimagesize($uploaded_tmp)){
        if(file_exists($link_data)){
          $JSON = array(
			"title" => "",
            "text" => "Đã tải 1 ảnh x",
            "type" => "success",
            "name"=> $link_up,
            "type" => "success",
            "tmp_name"=> $uploaded_tmp,
            "size" => $sizeFile,
            );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else if($sizeFile > 800000){
          $JSON = array(
                "title" => "",
                "text" => "File bạn upload không được quá 8MB",
                "type" => "error",
                );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }else if(move_uploaded_file($uploaded_tmp,$link_data)){
            $JSON = array(
                "title" => "",
                "text" => "Đã tải 1 ảnh",
                "name"=> $link_up,
                "type" => "success",
                "tmp_name"=> $uploaded_tmp,
                "size" => $sizeFile,
                );
          die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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