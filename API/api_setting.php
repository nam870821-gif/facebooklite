    <?php
        session_start();
        header("Content-type: text/javascript");
        require_once("../config.php");
        if($_GET) $_POST = $_GET;
        if($_REQUEST && isset($_REQUEST['type'])){
            switch($_REQUEST['type']){
            case 'Update':
                if(empty($_POST['fullname']) ){
                    $JSON = array(
                        "title" => "Yêu cầu họ và tên",
                        "text" => "Người dùng chưa nhập họ và tên",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $fullnames = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['fullname']));
                }
                if(strlen($fullnames) < 0 || strlen($fullnames) > 55){
                    $JSON = array(
                        "title" => "Yêu cầu họ và tên",
                        "text" => "Bạn cần nhập tối thiểu từ 1 > 55",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
                $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE username ='$username'");
                if(mysqli_num_rows($kiemtra) == 1){
                        $update = mysqli_query($kunloc,"UPDATE account SET fullname = '$fullnames' WHERE username ='$username'");
                        if($update){
                            $JSON = array(
                                "title" => "Thay đổi thành công",
                                "text" => "",
                                "type" => "success",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }else{
                            $JSON = array(
                                "title" => "Thay đổi thất bại",
                                "text" => "",
                                "type" => "error",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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
            case 'UpdateNgay':
                if(empty($_POST['ngay']) || empty($_POST['thang']) || empty($_POST['nam']) ){
                    $JSON = array(
                        "title" => "Yêu cầu thời gian tạo",
                        "text" => "Người dùng chưa nhập họ và tên",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $ngay = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['ngay']));
                    $thang = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['thang']));
                    $nam = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['nam']));
                    $format = "%H:%M:%S %d-%B-%Y";
                    $strTime = strftime($format, mktime(12,00,00,$ngay,$thang,$nam));
                    $thoigian = strtotime($strTime);

                }
                $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE username ='$username'");
                if(mysqli_num_rows($kiemtra) == 1){
                        $update = mysqli_query($kunloc,"UPDATE account SET ngay_tham_gia = '$thoigian' WHERE username ='$username'");
                        if($update){
                            $JSON = array(
                                "title" => "Thay đổi thành công",
                                "text" => "",
                                "type" => "success",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }else{
                            $JSON = array(
                                "title" => "Thay đổi thất bại",
                                "text" => "",
                                "type" => "error",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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
            case 'Pass':
                if(empty($_POST['pass1']) || empty($_POST['pass2']) ){
                    $JSON = array(
                        "title" => "Yêu cầu mật khẩu",
                        "text" => "Người dùng chưa nhậpmật khẩu",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $pass1 = md5(mysqli_real_escape_string($kunloc,$_POST['pass1']));
                    $pass2 = md5(mysqli_real_escape_string($kunloc,$_POST['pass2']));
                }
                if(strlen($pass1) < 0 || strlen($pass1) > 100 && strlen($pass2) < 0 || strlen($pass2) > 100){
                    $JSON = array(
                        "title" => "Yêu cầu mật khẩu",
                        "text" => "Bạn cần nhập tối thiểu từ 1 > 100",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
                if($pass1 == $pass2){
                    $JSON = array(
                        "title" => "Yêu cầu mật khẩu",
                        "text" => "2 mật khẩu không được giống nhau",
                        "type" => "info",
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
                $kiemtra = mysqli_query($kunloc,"SELECT * FROM account WHERE username = '$username' AND `password`='$pass1' ");
                if(mysqli_num_rows($kiemtra) == 1){
                    $update = mysqli_query($kunloc,"UPDATE account SET `password` = '$pass2' WHERE username ='$username'");
                        if($update){
                            $JSON = array(
                                "title" => "Thay đổi thành công",
                                "text" => "",
                                "type" => "success",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }else{
                            $JSON = array(
                                "title" => "Thay đổi thất bại",
                                "text" => "",
                                "type" => "error",
                            );
                            die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        }
                }else{
                    $JSON = array(
                        "title" => "Mật khẩu cũ không đúng",
                        //"text" => "Xin hãy hử lại!",
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