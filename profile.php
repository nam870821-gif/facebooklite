<?php
ob_start();
session_start();
include_once("config.php");
if($username && $trangthai == 'disabled'){
        header('Location: checkpoint.php');
        exit();
}
/*if($username && ($trangthai == 0) || ($image == 'data/none.jpg')){
        header("Location: xac-nhan-tai-khoan");
        exit();
}*/
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta http-equiv="content-language" content="vi">
    <meta name="theme-color" content="">
    <meta name="title" content="">
    <meta name="revisit-after" content="1 days">
    <meta name="copyright" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="vi-VN"/>   
    <meta property="og:image" content="<?= $domain_url ?>/favicon.ico">
    <meta name="search engines" content="Aeiwi, Alexa, AllTheWeb, AltaVista, AOL Netfind, Anzwers, Canada, DirectHit, EuroSeek, Excite, Overture, Go, Google, HotBot. InfoMak, Kanoodle, Lycos, MasterSite, National Directory, Northern Light, SearchIt, SimpleSearch, WebsMostLinked, WebTop, What-U-Seek, AOL, Yahoo, WebCrawler, Infoseek, Excite, Magellan, LookSmart, bing, CNET, Googlebot" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= $domain_url ?>/favicon.ico">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/bootstrap.min.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/mdb.min.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/theme.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/user.css?<?= time() ?>">   
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/giaodien.css?<?= time() ?>">
    <!-- Font CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link class="tempLink" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Fullpage CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $subdomain ?>/assets/plugins/fancybox/css/jquery.fancybox.min.css"/>
    <!-- Toastr CSS - JS -->
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/toastr.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        #wrapper {
            height:auto;
            width: 100%;
        }
        #scroller {
            
            transform: translate3d(0px, -1300px, 0px);
            transition-duration: 500ms;
        }
        #footer {
            width: 100%;
            height: 40px;
            position: absolute;
            bottom: 0;
            background-color: #293f54;
        }
        .mam {
            margin-top: 0px;
        }
        .md-tabs .nav-link {
            color: #464646e0;
            border: 0;
            border: 1;
            padding: 18px;
            margin-right: 0px;
            -webkit-transition: none;
            transition: none;
        }
        .md-tabs .nav-link.active {
            display: block!important;
        }
        .md-tabs .nav-link.active, .md-tabs .nav-item.open .nav-link {
            color: #005cf7;
            background-color: #fff;
            border-radius: .25rem;
            -webkit-transition: none;
            border-radius: 0;
            transition: none;
            border-bottom: 3px solid #005ffd;
        }
        .md-tabs {
            align-items: center;
            position: relative;
            z-index: 1;
            padding: 0;
            margin-right: 0;
            background-color: #ffffff !important;
            margin-bottom: 0;
            border-bottom: 0px solid #ececec!important;
            margin-left: 0;
            border: inherit;
            border-radius: 0;
            -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
            box-shadow: none;
            display: flex;
        }
        @media only screen and (max-width: 600px){
          .md-tabs {
            display: none;
          }
          #menu-profile {
            display: none;
          }
        }
    </style>
    <script type="text/javascript">
        function toarst(status, msg, title) {
                Command: toastr[status](msg, title)
                toastr.options = {
                "closeButton": false,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "onclick": true,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
                }
            }
    </script>
</head>
<body>
<?php
if($username && ($_REQUEST['Home'] == 'profile')){ 
    include_once('main/core/navbar_user.php');
}else if(empty($username) || ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/trang-chu') ){
    include_once('main/core/navbar_login.php');
}else{
    include_once('main/core/navbar_user.php');
}
?>
<div class="">
<?php if(empty($username)){
  require_once("data_profile_login.php");
}else{
  require_once("data_profile.php"); 
}
?>
</div>