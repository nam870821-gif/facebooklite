<?php
    session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    #if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'INBOX':
        $message = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST["mess"])));
        $uid = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST["uid"])));
       	$data_profile = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$id_user'"));
        $i = "$id_user|$uid.php";
        $i2 = "$uid|$id_user.php";
        if($message == '#xoa'){
            #mysqli_query($kunloc,"DELETE FROM chatbox");
            unlink("../messenger/$i");
            unlink("../messenger/$i2");
        }
        if(file_exists("../messenger/$i")){
            $fp = fopen("../messenger/$i", 'a+');
            $noidung = '<div class="media d-block d-md-flex mt-3">'."\n";
            $noidung .= '<div class="tinnhan">'."\n";
      #     $noidung .= '<img class="card-img-64 d-flex mess-user-none mb-0" src="'.$data_profile->avatar.'"/>'."\n";
            $noidung .= '<div class="mess-user-you">'."\n";
            $noidung .= '<a href="profile.php?id='.$uid.'" class="font-weight-bold text-dark">'."\n";
            $noidung .= '<span style="font-size:16px">'.$data_profile->fullname.'</span>'."\n";
            if($data_profile->confirm_status == '1'){
              $noidung .= "<small>$verify_chat</small>"."\n";
            }
            $day = date("h:i d-m-Y");
            //$noidung .= "<small>".$day."</small>"."\n";
            $noidung .= '<br>';
            $noidung .= "<span class='mess-user-text'>$message</span> <small>".$day."</small>"."\n\n";
            $noidung .= '</a>';
            $noidung .= '</div></div></div>';
        }else if(file_exists("../messenger/$i2")){
            $fp = fopen("../messenger/$i2", 'a+');
            $noidung = '<div class="media d-block d-md-flex mt-3">'."\n";
            $noidung .= '<div class="tinnhan">'."\n";
         #  $noidung .= '<img class="card-img-64 d-flex mess-user-none mb-0" src="'.$data_profile->avatar.'"/>'."\n";
            $noidung .= '<div  class="mess-user-you">'."\n";
            $noidung .= '<a href="profile.php?id='.$id_user.'" class="font-weight-bold text-dark">'."\n";
            $noidung .= '<span style="font-size:16px">'.$data_profile->fullname.'</span>'."\n";
            if($data_profile->confirm_status == '1'){
              $noidung .= "<small>$verify_chat</small>"."\n";
            }
            $day = date("h:i d-m-Y");
            //$noidung .= "<small>".$day."</small>"."\n";
            $noidung .= '<br>';
            $noidung .= "<span class='mess-user-text'>$message</span> <small>".$day."</small>"."\n\n";
            $noidung .= '</a>';
            $noidung .= '</div></div></div>';
        }else{
            $fp = fopen("../messenger/$i", 'a+');
            $noidung = '<div class="media d-block d-md-flex mt-3">'."\n";
            $noidung .= '<div class="tinnhan">'."\n";
          # $noidung .= '<img class="card-img-64 d-flex mess-user-none mb-0" src="'.$data_profile->avatar.'"/>'."\n";
            $noidung .= '<div class="mess-user-you">'."\n";
            $noidung .= '<a href="profile.php?id='.$id_user.'" class="font-weight-bold text-dark">'."\n";
            $noidung .= '<span style="font-size:16px">'.$data_profile->fullname.'</span>'."\n";
            if($data_profile->confirm_status == '1'){
              $noidung .= "<small>$verify_chat</small>"."\n";
            }
            $day = date("h:i d-m-Y");
            //$noidung .= "<small>".$day."</small>"."\n";
            $noidung .= '<br>';
            $noidung .= "<span class='mess-user-text'>$message</span> <small>".$day."</small>"."\n\n";
            $noidung .= '</a>';
            $noidung .= '</div></div></div>';
        }
        $kiemtra = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM inbox WHERE uid ='$id_user' AND uid2 ='$uid'"));
        $kiemtra2 = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM inbox WHERE uid ='$uid' AND uid2 ='$id_user'"));
        if($kiemtra->uid == $id_user){
            $data_ib = mysqli_query($kunloc,"UPDATE inbox  SET seen = seen * 0, text= '".mysqli_real_escape_string($kunloc,$message)."', time='$now' WHERE uid ='$id_user' AND uid2 ='$uid'");
        }else{
            $data_ib = mysqli_query($kunloc,"UPDATE inbox SET seen = seen * 0, text= '".mysqli_real_escape_string($kunloc,$message)."', time='$now' WHERE uid ='$uid' AND uid2 ='$id_user'");
        }
        if($kiemtra2->uid == $id_user){
            $data_ib = mysqli_query($kunloc,"UPDATE inbox  SET seen = seen * 0, text= '".mysqli_real_escape_string($kunloc,$message)."', time='$now' WHERE uid ='$id_user' AND uid2 ='$uid'");
        }else{
            $data_ib = mysqli_query($kunloc,"UPDATE inbox SET seen = seen * 0, text= '".mysqli_real_escape_string($kunloc,$message)."', time='$now' WHERE uid ='$uid' AND uid2 ='$id_user'");
        }
        if(!$kiemtra->id){
            $data_ib = mysqli_query($kunloc,"INSERT INTO inbox(username,uid,uid2,text,time,seen) VALUES ('$username','$uid', '$id_user', '".mysqli_real_escape_string($kunloc,$message)."','$now','0')");
        }
        if(!$kiemtra2->id){
            $data_ib = mysqli_query($kunloc,"INSERT INTO inbox(username,uid,uid2,text,time,seen) VALUES ('$username','$id_user', '$uid', '".mysqli_real_escape_string($kunloc,$message)."','$now','0')");
        }
        fwrite($fp, "$noidung\n");
        fclose($fp);
        break;

        case 'SEEN_MESS':
        echo '<div class="table-responsive">';
        $uid = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST["uid"])));
        $data_thongbao = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM inbox WHERE uid ='$uid' AND uid2 = '$id_user'")); 
        if($data_thongbao->uid2 == $id_user){
            mysqli_query($kunloc,"UPDATE inbox SET seen = seen * 0 + 1 WHERE uid2 ='".$data_thongbao->uid."'"); 
        }
        $data_thongbao2 = mysqli_query($kunloc,"SELECT * FROM inbox WHERE uid ='$id_user' AND uid2 = '$uid'"); 
        if($data_thongbao2->uid == $id_user){
           mysqli_query($kunloc,"UPDATE inbox SET seen = seen * 0 + 1 WHERE uid ='".$data_thongbao2->uid."'"); 
        }
        $i = "$id_user|$uid.php";
        $i2 = "$uid|$id_user.php";
        if(file_exists("../messenger/$i") && filesize("../messenger/$i") > 0){
             $handle = fopen("../messenger/$i", "r");
             echo file($contents);
             $contents = fread($handle, filesize("../messenger/$i"));
             fclose($handle);
             
             echo $contents;
        }else if(file_exists("../messenger/$i2") && filesize("../messenger/$i2") > 0){
           $handle = fopen("../messenger/$i2", "r");
           echo file($handle);
           $contents = fread($handle, filesize("../messenger/$i2"));
           fclose($handle);
           
           echo $contents;
        }else{
            echo '<p align="center" class="m-4">Hãy gửi tin nhắn đầu tiên...  !!! </p>';
        }
            
        echo '</div>';
            
        break; 
        case 'SEEN_NOTI':
        $uid = htmlspecialchars(addslashes(mysqli_real_escape_string($kunloc,$_POST["uid"])));
        $data_thongbao = mysqli_query($kunloc,"SELECT * FROM lich_su_hoat_dong WHERE uid = '$uid' AND username = '$username'"); 
        if(mysqli_num_rows($data_thongbao)){
            mysqli_query($kunloc,"UPDATE lich_su_hoat_dong SET seen = '1' WHERE uid ='$uid' AND username = '$username'"); 
        }
        /*$data_thongbao2 = mysqli_query($kunloc,"SELECT * FROM lich_su_hoat_dong WHERE uid2 = '$uid' AND username = '$username'"); 
        if(mysqli_num_rows($data_thongbao2)){
            mysqli_query($kunloc,"UPDATE lich_su_hoat_dong SET seen = '1' WHERE uid2 ='$uid' AND username = '$username'"); 
        }*/
        break;
    }
}

?>

    