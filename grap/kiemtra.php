<?php
    require_once("config.php");
    $so = 100;
    if(strlen($so) < 4){
        echo $so;
    }else if(strlen($so) == 4){
        echo substr($so,0,1)."K";
    }else if(strlen($so) == 5){
        echo substr($so,0,2)."K";
    }else if(strlen($so) == 6){
        echo substr($so,0,3)."K";
    }else if(strlen($so) == 7){
        echo substr($so,0,1)."tr";
    }else if(strlen($so) == 8){
        echo substr($so,0,2)."tr";
    }else if(strlen($so) == 9){
        echo substr($so,0,3)."tr";
    }
    $get_banbe = mysqli_query($kunloc,"SELECT uid,uid2 FROM friends");
    while($echo = mysqli_fetch_object($get_banbe)){
        if(checkid($kunloc,$echo->uid)  == false){
          mysqli_query($kunloc,"DELETE FROM account WHERE id='".$echo->uid."'");
          mysqli_query($kunloc,"DELETE FROM friends WHERE uid='".$echo->uid."'");
           echo $echo->uid;
        }else if(checkid($kunloc,$echo->uid2) == false){
          mysqli_query($kunloc,"DELETE FROM account WHERE id='".$echo->uid2."'");
          mysqli_query($kunloc,"DELETE FROM friends WHERE uid2='".$echo->uid2."'");
          echo $echo->uid2;
        }
    }
    $get_cmt = mysqli_query($kunloc,"SELECT username FROM comment_post");
    while($echo = mysqli_fetch_object($get_banbe)){
        if(checkuser($kunloc,$echo->username)  == false){
          mysqli_query($kunloc,"DELETE FROM account WHERE username='".$echo->username."'");
           echo $echo->username;
        }
    }
    function checkid($kunloc,$id){
        $kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM account WHERE id='$id'"));
        if($kiemtra == 1) return true;
        else return false;
    }
    function checkuser($kunloc,$username){
        $kiemtra = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM account WHERE username='$username'"));
        if($kiemtra == 1) return true;
        else return false;
    }
?>