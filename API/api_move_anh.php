<?php
    session_start();
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if(isset($_REQUEST['type']) && $_POST['value']){
        $Case_ = $_REQUEST['type'];
        switch($Case_){
            case 'MOVE':
                $value = $_POST['value'];
                $kiem_tra = mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username = '$username'");
                if(mysqli_num_rows($kiem_tra) >= 1){
                    $get_Info = mysqli_fetch_object($kiem_tra);
                    $remove = mysqli_query($kunloc,"UPDATE anhnoibat  SET $value = '0' WHERE username = '$username'");
                    if($remove){
                        $JSON = array(
                            "title" => "",
                            "text" => "Đã bỏ ảnh thành công",
                            "type" => "success",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                        $JSON = array(
                            "title" => "Đ",
                            "text" => "Bỏ ảnh thất bại",
                            "type" => "success",
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }
                }else{
                    $JSON = array(
                        "title" => "",
                        "text" => "Ảnh không tồn tại",
                        "type" => "error",
                        "reload" => "true",
                        "time" => $time_swal
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            break;
            
        }
    }else{
        $JSON = array(
            "title" => "",
            "text" => "Bạn không có quyền",
            "type" => "error"
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
?>