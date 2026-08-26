<?php
    session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'Report':
            if(empty($_POST['link']) || empty($_POST['lydo'])){
                $JSON = array(
                    "title" => "Yêu cầu đường link báo cáo",
                    "text" => "Người dùng chưa nhập đường link báo cáo",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $link = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['link']));
                $loai = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['lydo']));
                $uid2 = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['uid2']));
                if($loai == 1){
                    $lydo = 'Giả mạo người khác';
                    $tieude = "Bạn đã báo cáo trang cá nhân mà bạn cho rằng đang giả mạo";
                }else if($loai == 2){
                    $lydo = 'Tên giả mạo';
                    $tieude = "Bạn đã báo cáo trang cá nhân mà bạn cho rằng Tên giả mạo";
                }else{
                    #exit();
                }
            }
            if(strlen($link) < 0 || strlen($link) > 55){
                $JSON = array(
                    "title" => "Yêu cầu đường link báo cáo",
                    "text" => "Bạn cần nhập tối thiểu từ 1 > 55",
                    "type" => "info",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            $kiemtra_account = mysqli_query($kunloc,"SELECT * FROM account WHERE username ='$username'");
            if(mysqli_num_rows($kiemtra_account) == 1){

            $kiemtra = mysqli_query($kunloc,"SELECT * FROM hop_thu_o_tro WHERE uid2='$uid2' AND username ='$username'");
            if(mysqli_num_rows($kiemtra) >= 1){
                $JSON = array(
                    "title" => "Bạn đã từng báo cáo người này",
                    "text" => "Bạn đã từng báo cáo người này",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                $getinfo = mysqli_fetch_object($kiemtra_account);
                $array = array(
                    "tieude" => $tieude,
                    "lydo"=> $lydo,
                    "noidung" => "Hi ".$getinfo->fullname.",<br> 
                     Chúng tôi sẽ xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>
                     Lưu ý: Nếu bạn cho rằng nội dung mình nhìn thấy trên trang cá nhân của một người nào đó không nên xuất hiện trên Facebook, hãy nhớ báo cáo nội dung đó (ví dụ: ảnh hoặc video), chứ không phải là toàn bộ trang cá nhân đó.<br>
                     Cảm ơn bạn! <br>
                     Đội ngũ Facebook",
                );
                $hothuhotro = mysqli_query($kunloc,"INSERT INTO `hop_thu_ho_tro`(`username`, `uid`,`uid2`,`link`,`type`, `tieude`, `noidung`, `time`, `trangthai`) VALUES ('$username','$id_user','$uid2','$link','".$array['lydo']."','".$array['tieude']."','".$array['noidung']."','$now','0')");
                $reported = mysqli_query($kunloc,"INSERT INTO `report`(`username`, `uid`,`uid2`, `link`, `time`, `lydo`) VALUES ('$username','$id_user','$uid2','$link','$now','".$array['lydo']."')");
                if($hothuhotro && $reported){
                    $JSON = array(
                        "title" => "Đơn báo cáo đã gửi",
                        "text" => "Đơn báo cáo đã gửi",
                        "type" => "success",
                    ); 
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "title" => "Đơn báo chưa được gửi",
                        "text" => "Đơn báo chưa được gửi",
                        "type" => "error",
                    );   
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }

            }


            }else{
                $JSON = array(
                    "title" => "Người dùng không tồn tại",
                    "text" => "Hệ thống không nhận dạng được người này!",
                    "type" => "error",
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        break;
        case 'LIST':
            $getlist = mysqli_query($kunloc,"SELECT * FROM hop_thu_ho_tro WHERE username='$username' ORDER BY id DESC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id ='".$data->uid2."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    $JSON[] = array(
                        "id" => $data->id,
                        "username" => $data->username,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "type" => $data->type,
                        "tieude" => $data->tieude,
                        "noidung" => $data->noidung,
                        "time" => $thoigian,
                        "trangthai" => $data->trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break;  
        case 'View':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM hop_thu_ho_tro WHERE id = '$id' AND username='$username' ORDER BY id ASC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id ='".$data->uid2."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    if($data->trangthai == 2){
                        $trangthai = "Không vi phạm";
                    }else if($data->trangthai == 1){
                        $trangthai = "Đã xem xét";
                    }else{
                        $trangthai = "Đợi xem xét";
                    }
                    $JSON[] = array(
                        "id" => $data->id,
                        "username" => $data->username,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "type" => $data->type,
                        "tieude" => $data->tieude,
                        "noidung" => $data->noidung,
                        "time" => $thoigian,
                        "trangthai" => $trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break;  
        case 'LIST_SUPPORT':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM hop_thu_ho_tro WHERE trangthai='0' ORDER BY id DESC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    $JSON[] = array(
                        "id" => $data->id,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "username" => $data->username,
                        "type" => $data->type,
                        "tieude" => $data->tieude,
                        "noidung" => $data->noidung,
                        "time" => $thoigian,
                        "trangthai" => $data->trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break; 
        case 'ViewSupport':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM hop_thu_ho_tro WHERE id = '$id' ORDER BY id ASC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    if($data->trangthai == 2){
                        $trangthai = "Không vi phạm";
                    }else if($data->trangthai == 1){
                        $trangthai = "Đã xem xét";
                    }else{
                        $trangthai = "Đợi xem xét";
                    }
                    $JSON[] = array(
                        "id" => $data->id,
                        "uid" => $data->uid,
                        "uid2" => $data->uid2,
                        "username" => $info->username,
                        "fullname" => $info->fullname,
                        "link" => $data->link,
                        "type" => $data->type,
                        "tieude" => $data->tieude,
                        "noidung" => $data->noidung,
                        "time" => $thoigian,
                        "trangthai" => $trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break;  
        case 'Duyet':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $set = mysqli_real_escape_string($kunloc,$_POST['value']);
            if($set == 2){
                $value = 2; #ko vi pham
                $noidung = "Chúng tôi đã xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>
                Chúng tôi nhận thấy người bạn báo cáo không vi phạm nguyên tắc cộng đồng.<br>
                Cảm ơn bạn! <br>
                Đội ngũ Facebook";
            }else if($set == 1){
                $value = 1; #vi pham
                $noidung = "Chúng tôi đã xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>
                Chúng tôi nhận thấy người bạn báo cáo đã vi phạm nguyên tắc cộng đồng.<br>
                Người bạn báo cáo sẽ bị xử lý theo nguyên tắc cộng đồng.<br>
                Chúng tôi cảm ơn bạn vì điều này.<br>
                Cảm ơn bạn! <br>
                Đội ngũ Facebook";
            }else{
                $value = 0; #doi duyet
                $noidung = "Chúng tôi vẫn đang xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>
                Cảm ơn bạn! <br>
                Đội ngũ Facebook";
            }
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM hop_thu_ho_tro WHERE id = '$id'");
            if(mysqli_num_rows($kiemtra)){
                $data_info = mysqli_fetch_object($kiemtra);
                $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '".$data_info->uid2."'"));
                $array = array(
                    "trangthai" => $value,
                    "noidung" => $noidung,
                );
                $duyet = mysqli_query($kunloc,"UPDATE hop_thu_ho_tro SET noidung='".$array['noidung']."', trangthai='".$array['trangthai']."' WHERE id ='$id' ");
                if($value == 1){
                 $duyet_account = mysqli_query($kunloc,"UPDATE `account` SET trangthai = 'disabled' WHERE username = '".$getinfo->username."' ");
                }else if($value == 2){
                 $duyet_account = mysqli_query($kunloc,"UPDATE `account` SET trangthai = 'normal' WHERE username = '".$getinfo->username."' ");
                }
                if($duyet && $duyet_account){
                    $JSON = array(
                        "title" => "Đã xử lý yêu cầu",
                        "text" => "Cảm ơn bạn đã đóng góp",
                        "type" => "success",
                        "url" => "admin",
                        "time" => $time_swal,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "title" => "Có lỗi khi duyệt báo cáo",
                        "text" => "Xin hãy thử lại",
                        "type" => "error",
                        "url" => "admin",
                        "time" => $time_swal,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            }
        break;
        #=-================================================================
        case 'LIST_CHECKPOINT':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM `checkpoint` WHERE active='0' ORDER BY id DESC LIMIT 0,4");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    
                    $JSON[] = array(
                        "id" => $data->id,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "username" => $data->username,
                        "email" => $data->email,
                        "ngaysinh" => $data->ngaysinh,
                        "image" => $data->image,
                        "time" => $thoigian,
                        "active" => $data->active,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break; 
        case 'ViewCheckpoint':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM `checkpoint` WHERE id = '$id' ORDER BY id ASC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    if($data->active == 0){
                        $trangthai = "Vẫn đang vi phạm";
                    }else if($data->active == 1){
                        $trangthai = "Đã mở khóa tài khoản";
                    }else{
                        $trangthai = "Đợi xem xét";
                    }
                    $JSON[] = array(
                        "id" => $data->id,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "username" => $data->username,
                        "email" => $data->email,
                        "ngaysinh" => $data->ngaysinh,
                        "image" => $data->image,
                        "time" => $thoigian,
                        "active" => $trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break;  
        case 'DuyetCp':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $set = mysqli_real_escape_string($kunloc,$_POST['value']);
            if($set == 1){
                $value = 1; #Unlock
            }else{
                $value = 0; #vi pham
            }
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM `checkpoint` WHERE id = '$id'");
            if(mysqli_num_rows($kiemtra)){
                $data_info = mysqli_fetch_object($kiemtra);
                $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$data_info->username."'"));
                $array = array(
                    "active" => $value,
                );
                $duyet = mysqli_query($kunloc,"UPDATE `checkpoint` SET active='".$array['active']."', support = '$username' WHERE id ='$id' ");
                if($value == 1){
                    $duyet_account = mysqli_query($kunloc,"UPDATE `account` SET trangthai = 'normal' WHERE username ='".$getinfo->username."' ");
                    $delete = mysqli_query($kunloc,"DELETE FROM `checkpoint` WHERE id = '$id'");
                }else if($value == 0 && $getinfo->username != $admin){
                    $duyet_account = mysqli_query($kunloc,"UPDATE `account` SET trangthai = 'disabled' WHERE username ='".$getinfo->username."' ");
                }
                if($duyet && $duyet_account){
                    $JSON = array(
                        "title" => "Đã duyệt báo cáo",
                        "text" => "Cảm ơn bạn đã đóng góp",
                        "type" => "success",
                        "url" => "admin",
                        "time" => $time_swal,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "title" => "Có lỗi khi duyệt báo cáo",
                        "text" => "Xin hãy thử lại",
                        "type" => "error",
                        "url" => "admin",
                        "time" => $time_swal,
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            }
        break;

        case 'LIST_POST':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE trangthai='0' ORDER BY id DESC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    $JSON[] = array(
                        "id" => $data->id,
                        "username" => $data->username,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "text" => $data->text,
                        "image" => $data->image,
                        "time" => $thoigian,
                        "trangthai" => $data->trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break; 
        case 'ViewPost':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $getlist = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE id = '$id' ORDER BY id ASC LIMIT 0,5");
                while($data = mysqli_fetch_object($getlist)){
                    $info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username='".$data->username."' "));
                    $ngay = date("d",$data->time);
                    $thang = date("m",$data->time);
                    $nam = date("Y",$data->time);
                    $thoigian = " Ngày $ngay, tháng $thang, năm $nam";
                    if($data->trangthai == 1){
                        $trangthai = "Đã được đăng lên";
                    }else{
                        $trangthai = "Đợi xem xét";
                    }
                    $JSON[] = array(
                        "id" => $data->id,
                        "username" => $data->username,
                        "uid" => $info->id,
                        "fullname" => $info->fullname,
                        "avatar" => $info->avatar,
                        "text" => $data->text,
                        "image" => $data->image,
                        "time" => $thoigian,
                        "trangthai" => $trangthai,
                    );
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
        break;  
        case 'DuyetPost':
            $id = mysqli_real_escape_string($kunloc,$_POST['id']);
            $set = mysqli_real_escape_string($kunloc,$_POST['value']);
            $kiemtra = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE id = '$id'");
            if(mysqli_num_rows($kiemtra)){
                $data_info = mysqli_fetch_object($kiemtra);
                $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$data_info->username."'"));
                if($set == 1){
                    $duyet = mysqli_query($kunloc,"UPDATE user_post_feed SET trangthai='$set' WHERE id ='$id' ");
                    if($duyet){
                        $JSON = array(
                            "title" => "Đã công khai bài viết",
                            "text" => "Cảm ơn bạn đã đóng góp",
                            "type" => "success",
                            "url" => "admin",
                            "time" => $time_swal,
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                        $JSON = array(
                            "title" => "Có lỗi khi duyệt bài đăng",
                            "text" => "Xin hãy thử lại",
                            "type" => "error",
                            "url" => "admin",
                            "time" => $time_swal,
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }
                }else if($set == 0){
                    $remove = mysqli_query($kunloc,"DELETE FROM user_post_feed WHERE id ='$id' ");
                    if($remove){
                        $JSON = array(
                            "title" => "Đã xoá khai bài viết",
                            "text" => "Cảm ơn bạn đã đóng góp",
                            "type" => "success",
                            "url" => "admin",
                            "time" => $time_swal,
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }else{
                        $JSON = array(
                            "title" => "Có lỗi khi xoá bài đăng",
                            "text" => "Xin hãy thử lại",
                            "type" => "error",
                            "url" => "admin",
                            "time" => $time_swal,
                        );
                        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    }
                }
                
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