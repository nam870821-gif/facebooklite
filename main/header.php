
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta http-equiv="content-language" content="vi">
    <meta name="theme-color" content="">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="vi-VN"/> 
    <meta name="copyright" content="<?= $name_admin ?>" />
    <meta name="title" content="Facesbook | Cộng đồng mạng Fb-vn">
    <meta property="og:image" content="<?= $domain_url ?>/favicon.ico">
    <meta name="search engines" content="Aeiwi, Alexa, AllTheWeb, AltaVista, AOL Netfind, Anzwers, Canada, DirectHit, EuroSeek, Excite, Overture, Go, Google, HotBot. InfoMak, Kanoodle, Lycos, MasterSite, National Directory, Northern Light, SearchIt, SimpleSearch, WebsMostLinked, WebTop, What-U-Seek, AOL, Yahoo, WebCrawler, Infoseek, Excite, Magellan, LookSmart, bing, CNET, Googlebot" />
    <title>Facesbook , Cộng Đồng Mạng Xã Hội Việt Nam</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= $domain_url ?>/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link class="tempLink" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/bootstrap.min.css?<?= time() ?>">
    <!--link rel="stylesheet" href="<?= $subdomain ?>/assets/cscs/mdbb-pro.scss"-->
    <?php if($username){ ?> 
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/mdb.min.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/theme.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/user.css?<?= time() ?>">    
    <?php }else if(empty($username) && ($_SERVER['REQUEST_URI'] == '/')   ||  ($_SERVER['REQUEST_URI'] == '/trang-chu')){ ?>
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/mdb.min.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/theme.css?<?= time() ?>">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/user.css?<?= time() ?>">    
    <?php }else{ ?>
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/login.css?<?= time() ?>">
    <?php } ?>
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/toastr.css">
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/giaodien.css?<?= time() ?>">    
    <!-- Font CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link class="tempLink" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Fullpage CSS-->
    <!--link rel="stylesheet" type="text/css" href="assets/css_tube/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="assets/css_tube/lightbox.css"-->
    <link rel="stylesheet" type="text/css" href="<?= $subdomain ?>/assets/plugins/fancybox/css/jquery.fancybox.min.css"/>
    <!-- Toastr CSS - JS -->
    <link rel="stylesheet" href="<?= $subdomain ?>/assets/css/toastr.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Sweet Alerts -->
    <link rel="stylesheet" type="text/css" href="<?= $subdomain ?>/assets/swal/sweetalert2.min.css">
    <script type="text/javascript" src="<?= $subdomain ?>/assets/swal/sweetalert2.min.js"></script>
    <style>
        #wrapper {
            height:auto;
            width: 100%;
        }
        #footer {
            width: 100%;
            height: 40px;
            position: absolute;
            bottom: 0;
            background-color: #293f54;
        }
        .mam {
            margin-top: 14px;
        }
        
        .md-tabs .nav-link {
            color: #464646;
            border: 0;
            border: 1;
            -webkit-transition: none;
            transition: none;
        }
        .md-tabs .nav-link.active {
            display: block!important;
        }
        .md-tabs .nav-link.active, .md-tabs .nav-item.open .nav-link {
            color: #4385f4;
            background-color: #fff;
            border-radius: .25rem;
            -webkit-transition: none;
            border-radius: 0;
            transition: none;
            border-bottom: 2px solid #4385f4;
        }
        
        .md-tabs {
            position: relative;
            z-index: 1;
            padding: 0;
            margin-right: 0;
            background-color: #ffffff !important;
            margin-bottom: 0;
            border-bottom: 1px solid #ececec!important;
            margin-left: 0;
            background-color: #2bbbad;
            border: inherit;
            border-radius: 0;
            -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
            box-shadow: none;
        }
        @media only screen and (max-width: 600px){
          .md-tabs {
              display: none;
          }
          #menu-profile {
            display: none;
          }
          .nav-tabs{
            display:flex;
        }
        }
        @media only screen and (min-width: 600px){
          .md-tabs {
              display: none;
          }
          .nav-tabs{
            display:none;
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
                "onclick": null,
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