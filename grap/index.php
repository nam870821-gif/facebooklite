
<?php
	ob_start();
	session_start();
    header("Content-type: text/javascript");
    require_once("config.php");
    if($_GET) $_POST = $_GET;
	if(empty($_POST['id'])){
		$JSON = array(
            "error" => "Bạn chưa nhập UID",
            "status" => "Đây là trang api . Hãy truy cập trang chính =>  fb-vn.com"
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}else{
      $uid = htmlspecialchars(mysqli_real_escape_string($kunloc,$_POST['id']));
    }
    if(date("H",time()) < 23  && date("H",time()) > 6){
       $JSON = array(
			"Lịch open sub" => "23:00 > 6:00",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $rand = rand(5000,5001);
    }else{
        $rand = rand(9999,99999);
    }
	if(strlen($uid) < 0 || strlen($uid) > 100){
		$JSON = array(
			"error" => "Yêu cầu UID tối thiểu từ 1 > 100",
		);
		die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	$kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM account WHERE id ='$uid'"));
	
	if($kiemtra == 1){
		
        $profile = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id ='$uid'"));
	    $kiemtra_time = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM block WHERE uid ='$uid'"));
	    if($kiemtra_time->uid){
            $conlai = time() - $kiemtra_time->time;
            $delay =  60 - $conlai;
            $phut = abs($delay-30/60);
            $giay = abs($phut/60);
            $trim = str_replace('0', '', date("i",$phut));
            if($delay > 0){
                $JSON = array(
                    "error" => "false",
                    "name" => $profile->fullname,
                    "Follower hiện tại" => number_format($profile->followers),
                    "Rate" => $rand,
                    "ip" => $profile->ip,
                    "time" => "Chờ: ".date("i:s",$phut)." để gửi lại",
                    "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
                );
                die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }else{
                mysqli_query($kunloc,"DELETE FROM block WHERE uid='$uid'");
                
                $buff = mysqli_query($kunloc,"UPDATE account SET followers = followers + $rand WHERE id='$uid'");
                if($buff){
                    mysqli_query($kunloc,"INSERT INTO `block`(`uid`, `time`) VALUES ('$uid','".time()."')");
                    $JSON = array(
                        "success" => "true",
                        "Follower hiện tại" => number_format($profile->followers),
                    	"Rate" => $rand,
                        "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "error" => "flase",
                        "name" => $profile->fullname,
                        "Bạn đầu" => number_format($profile->followers),
                    	"Rate" => $rand,
                        "ip" => $profile->ip,
                        "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            }
	    }else{
                $buff = mysqli_query($kunloc,"UPDATE account SET followers = followers + $rand  WHERE id='$uid'");
                
				if($buff){
                    mysqli_query($kunloc,"INSERT INTO `block`(`uid`, `time`) VALUES ('$uid','".time()."')");
                    $JSON = array(
                        "success" => "true",
                        "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }else{
                    $JSON = array(
                        "error" => "flase",
                        "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
                    );
                    die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
        }
	      
    }else{
        $JSON = array(
            "error" => "UID không tồn tại!",
            "status" => "Đây là trang api . Hãy truy cập trang chính =>  mvipfb.com"
        );
        die(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
?>