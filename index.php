<?php
	ob_start();
	session_start();
	include('config.php');
	include_once('main/header.php'); 
	if($username && $trangthai == 'disabled'){
        header('Location: checkpoint.php');
        exit();
    }
?>
<body aria-busy="true">
<!-- Start wrapper-->
<?php 
if($username && ($_REQUEST['Home'] == 'profile')){ 
    include_once('main/core/navbar_user.php');
    }else if(empty($username) && ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/trang-chu')){
        include_once('main/core/navbar_login.php');
    }else{
        include_once('main/core/navbar.php');
}
?>
<div class="">
<?php include_once('main/core/main_content.php'); ?>
</div>
