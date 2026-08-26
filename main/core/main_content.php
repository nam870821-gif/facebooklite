<?php
    if($_SESSION['username'] && isset($_REQUEST['Home'])){
             #=============================
             $Home = $_REQUEST['Home'];
             if($username){
                if($trangthai == 'disabled'){
                    header('Location: checkpoint.php');
                }else{
                switch($Home){
                case 'profile': 
                    include 'system/profile.php'; 
                    break;
                case 'photo': 
                    include 'core/photo.php'; 
                    break;
                case 'xephang': 
                    include 'system/bang-xep-hang.php'; 
                    break;
                }
                
            }
            }else{
                header('Location: dang-nhap');
            }
            
    }else{
        if(empty($username)){
         session_destroy();
         include 'system/dang-nhap-he-thong.php';
         //header("Location: $domain_url/profile.php?id=1");
        }else if($trangthai == 'disabled'){
            header('Location: checkpoint.php');
        }else{ 
           include 'system/trang-chu-he-thong.php';
        }
    }
 ?>

<!--End footer-->
<?php require_once("main/footer.php"); ?>