<?php
   session_start();
   include_once("../config.php");
   #$timer = date("h:i");
   if($_POST && isset($_POST['mess'])){ 
   		$message = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST["mess"])));
       if($username == $admin && $message == '#xoa'){
   			mysqli_query($kunloc,"DELETE FROM chatbox");
   	   }else if($username == ''){
        	mysqli_query($kunloc,"INSERT INTO chatbox(username,message,ip,location,time) VALUES ('none','$message','$ip','".location($ip)['cityName']."','$now')");

       }else{
          mysqli_query($kunloc,"INSERT INTO chatbox(username,message,ip,location,time) VALUES ('$username','$message','$ip','".location($ip)['cityName']."','$now')");
       }
    }
    function location($ip) {
        $jsoncont = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=cf045aab1317aa046c3c58bc5d3522ee21a17ccdaef249fabd956b79b648837c&ip=$ip&format=json");
        $getdecoded = json_decode($jsoncont, true);
        return $getdecoded;
    }
    ?>
    <div class="table-responsive">
            <?php
            $SQL_Chat = mysqli_query($kunloc,"SELECT * FROM chatbox ORDER BY id DESC LIMIT 0,100");
                if(mysqli_num_rows($SQL_Chat) == 0):
            ?>
            <p align="center" class="m-4">Xin Lỗi Chatbox đã bị cấm do có nhiều người phát ngôn tục tiểu!!! </p>
            <?php else: while ($echo = mysqli_fetch_assoc($SQL_Chat)):
                $SQL = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$echo['username']."'"));
                $get_profile = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username ='".$echo['username']."' "));
                $uid = $SQL['id']; 
                $image = $SQL['avatar']; 
                $names = $SQL['fullname']; 
                $verify_chat = verifed($SQL['confirm_status']);
             ?>

            <?php if($echo['username'] == $admin){ ?>
        <li class="list-group mt-2">
        <div class="media d-block d-md-flex" id="d-none">
        <a href="profile.php?id=<?= $uid ?>">
        <img class="card-img-64 d-flex mx-auto mb-3" src="<?php if($image == ''){ echo $avt_macdinh; }else{ echo $image;} ?>">
        </a>
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
        <div class="comment-text">
        <p class="font-weight-bold my-0 tencmt"><?= $names ?> <?= $verify_chat ?></p>
        <span class="ndcmt"><?= $echo['message']; ?></span> · <small><?= _ago($echo['time'],$rcs = 0) ?></small></div>
        </li>
            <?php }else{ ?>
            	
		<li class="list-group mt-2">
        <div class="media d-block d-md-flex" id="d-none">
        <a href="profile.php?id=<?= $uid ?>">
        <img class="card-img-64 d-flex mx-auto mb-3" src="<?php if($image == ''){ echo $avt_macdinh; }else{ echo $image;} ?>">
        </a>
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
        <div class="comment-text">
        <p class="font-weight-bold my-0 tencmt"><?= $names ?> <?= $verify_chat ?></p>
        <span class="ndcmt"><?= $echo['message']; ?></span> · <small><?= _ago($echo['time'],$rcs = 0) ?></small></div>
        </li>
            
    <?php } ?>

   <?php $i++; endwhile; endif; ?>
</div>
