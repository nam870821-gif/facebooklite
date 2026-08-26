<?php
	ob_start();
	session_start();
	include('../config.php');
    include_once('../main/header.php'); 
    if(chucvu != 'support'){
        header("Location: $domain_url");
        exit();
    }else if($username && $trangthai == 'disabled'){
        header('Location: checkpoint.php');
        exit();
    }else if(empty($username)){
        header("Location: $domain_url/dang-nhap");
        exit();
    }
?>
<body class="">
<?php 
if($_SESSION['username'] && ($_REQUEST['Home'] == 'profile')){ 
    include_once('../main/core/navbar_user.php');
    }else if(empty($_SESSION['username']) && ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/trang-chu') ){
        
    }else{
     include_once('../main/core/navbar.php');
}
?>
<style>
.card{
    border-radius:15px;
}
.col-sm-8{
      padding:10px;
}
@media (max-width:600px){
   .col-sm-8{
      padding:0;
   }
   .card{
     padding:10px; 
  }   
  .card-body{
     padding:5px; 
  }   
}
</style>
<link rel="stylesheet" href="<?= $subdomain ?>/assets/css/support.css?<?= time() ?>">
<div class="row">
<div class="col-sm-3">
<div class="header-support">
<div class="text-left fb-post-title">Hộp thư hỗ trợ <b class="caidat-btn"><i class="caidat"></i></i></b></div>
<div class="mt-3">
<b>Chào mừng bạn!</b>
<p>Hộp thư hỗ trợ là nơi để bạn cập nhật thông tin mới về nội dung mình đã báo cáo, xem và trả lời tin nhắn của Đội ngũ hỗ trợ, cũng như đọc thông báo quan trọng về tài khoản của mình.</p>
</div>
<hr>
<div class="h5 mt-3 mr-3 font-weight-bold">Trung tâm trợ giúp</div>
<form class="menulog" action="#" method="GET">
    <div class="input-group">
       <div class="input-group-prepend">
      <span type="submit" class="input-group-text btn-search" id="basic-addon1"><i class="center fas fa-search"></i></span>
    </div>
      <input type="text" class="form-control timkiem" name="q" placeholder="Tìm kiếm trong Trung tâm trợ giúp"></div>

</form>
<div class="list-sp"><b class="caidat-btn"><i class="icon1"></i></b>
<div class="list-sp-header">
<span class="list-sp-title">Trung tâm trợ giúp</span>
<p class="list-sp-cap">Chính sách, công cụ và tài nguyên giúp bạn an toàn.</p>
</div>
</div>

<div class="list-sp"><b class="caidat-btn"><i class="icon2"></i></b>
<div class="list-sp-header">
<span class="list-sp-title">Trung tâm phòng ngừa bệnh tật</span>
<p class="list-sp-cap">Công cụ và mẹo dành cho thanh thiếu niên, phụ huynh.</p>
</div>
</div>

<div class="list-sp"><b class="caidat-btn"><i class="icon3"></i></b>
<div class="list-sp-header">
<span class="list-sp-title">Kiểm tra an toàn</span>
<p class="list-sp-cap">Kết nối với bạn bè và người thân yêu khi xảy ra thảm họa.</p>
</div>
</div>
<hr>
<div class="h5 mt-3 mr-3 font-weight-bold">Tiêu chuẩn cộng đồng</div>
<div class="list-sp"><b class="caidat-btn"><i class="icon4"></i></b>
<div class="list-sp-header">
<span class="list-sp-title">Xem  tiêu chuẩn cộng đồng của chúng tôi</span>
<p class="list-sp-cap">Tìm hiểu về loại chia sẻ nào <br>được cho phép trên Facebook <br> và loại nội dung nào có thể bị báo cáo và gỡ.</p>
</div>
</div>

</div>
</div>
<div class="col-sm-8">
<div class="m-4 text-center">
    <h5>Duyệt bậy sẽ tương tự như vi phạm và sẽ loại khỏi đơn vị Support Fbvn!</h5>
</div>
<?php if(chucvu == 'support'){ ?>
<!-- /./ -->
<div class="h5 font-weight-bold p-3">KIỂM DUYỆT - REPORT</div>
<div class="card" type="button" onclick="Reload_support()">
<div class="card-body row">
<img class="atvbn" height="100%" width="100%" src="img/button/thongbao.png" style="height: 40px; width: 40px;"></img>
<div class="ml-3">
<span class="font-weight-bold">Support ơi, có <font color="red"><?= mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM hop_thu_ho_tro WHERE trangthai='0' ")); ?></font> thư cần cần duyệt</span>
<p><small>Click để xem báo cáo</small></p>
</div>
</div>
</div>
<!-- /./ -->
<div id="loading_support" style="display:none">
<br>
<center>
 <div class="spinner-grow text-muted"></div>
 <div class="spinner-grow text-primary"></div>
 <div class="spinner-grow text-success"></div>
 <div class="spinner-grow text-info"></div>
 <div class="spinner-grow text-warning"></div>
 <div class="spinner-grow text-danger"></div>
 <div class="spinner-grow text-secondary"></div>
 <div class="spinner-grow text-dark"></div>
 <div class="spinner-grow text-light"></div>
 </center>
</div>
<br>
<div id="list_thu_support"></div>
<br>
<!-- /./ -->
<div class="card" type="button" onclick="Reload_Post()">
<div class="card-body row">
<image height="100%" width="100%" src="img/button/thongbao.png" style="height: 40px; width: 40px;"></image>
<div class="ml-3">
<span class="font-weight-bold">TỔNG BÀI VIẾT CẦN DUYỆT: <font color="red"><?= mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM user_post_feed WHERE trangthai='0' ")); ?></font></span>
<p><small>Click để xem báo cáo</small></p>
</div>

</div>
</div>
<div id="loading_post" style="display:none">
<br>
<center>
 <div class="spinner-grow text-muted"></div>
 <div class="spinner-grow text-primary"></div>
 <div class="spinner-grow text-success"></div>
 <div class="spinner-grow text-info"></div>
 <div class="spinner-grow text-warning"></div>
 <div class="spinner-grow text-danger"></div>
 <div class="spinner-grow text-secondary"></div>
 <div class="spinner-grow text-dark"></div>
 <div class="spinner-grow text-light"></div>
 </center>
</div>
<br>
<div id="list_thu_post"></div>
<!-- /./ -->
<script>
$(document).ready(function() {
   setTimeout(function() {
    //getSupport();
   },1000)
    
})
function Reload_support() {
    $("#loading_support").show();
    $("#list_thu_support").html(null);
    setTimeout(() => {
        getSupport()
    }, 1000);
}
function View_support(id) {
    $("#loading_support").show();
    $("#list_thu_support").html(null);
    setTimeout(() => {
        getViewSupport(id)
    }, 1000);
}

function getSupport(){
      $.post("API/api_hotro.php", { type: "LIST_SUPPORT" }, function(data){
        Data = JSON.parse(data);
        kunloc_list_support = '';
        if(Data == null || !Data.length){
            $("#list_thu_support").html('<center><small>Không có báo cáo.</small></center>');
            $("#list_thu_support").css('height','auto').css('overflow','auto');
            $("#loading_checkpoint").hide();
            return false;
        }
        for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            username = Data[i].username;
            avatar = Data[i].avatar;
            fullname = Data[i].fullname;
            type = Data[i].type;
            tieude = Data[i].tieude;
            noidung = Data[i].noidung;
            time = Data[i].time;
            trangthai = Data[i].trangthai;
            if(id){
            kunloc_list_support +='<div class="card mt-1" onclick="View_support('+id+')">\n';
            kunloc_list_support +='<div class="card-body row">\n';
            kunloc_list_support +='<img class="avtbn" height="100" width="100" src="'+avatar+'" ></img>\n';
            kunloc_list_support +='<div class="ml-3"> Case #'+id+': \n';
            kunloc_list_support +='<span><b style="color:green">'+fullname+'</b></span><br>\n';
            if(kunloc_list_support > 0){
                kunloc_list_support +='Đã xem xét: <del>Đã báo cáo 1 trang cá nhân mà cho là đã vi phạm nguyên tắc cộng đồng.</del>\n';
            }else{
                kunloc_list_support +='<span class="font-weight-bold">Đã báo cáo 1 trang cá nhân mà cho là đã vi phạm nguyên tắc cộng đồng.</span>\n';
            }
            kunloc_list_support +='<p>Lúc, <small>'+time+'</small></p>\n';
            kunloc_list_support +='</div></div></div>\n';
            $("#list_thu_support").css('height','250px').css('overflow','auto');
           }else{
            $("#list_thu_support").css('height','auto').css('overflow','auto');
           }
        }
        $("#loading_support").hide();
        $("#list_thu_support").html(kunloc_list_support);

      }).always(function(data){
          $("#loading_support").hide();
      })
}
function getViewSupport(id){
        $.post("API/api_hotro.php", { type: "ViewSupport",id: id }, function(data){
        Data = JSON.parse(data);
        kunloc_thu_support = '';
            for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            uid = Data[i].uid;
            uid2 = Data[i].uid2;
            username = Data[i].username;
            fullname = Data[i].fullname;
            type = Data[i].type;
            tieude = Data[i].tieude;
            noidung = Data[i].noidung;
            time = Data[i].time;
            link = Data[i].link;
            trangthai = Data[i].trangthai;
            if(id){
            kunloc_thu_support +='<div class="card">\n';
            kunloc_thu_support +='<div class="card-body row mb-0 pb-0">\n';
            kunloc_thu_support +='<i class="iconfb"></i>\n';
            kunloc_thu_support +='<p class="ml-2"><small>'+time+'</small></p>\n';
            kunloc_thu_support +='</div>\n';

            kunloc_thu_support +='<div class="card-body ml-4 pt-0 mt-0">\n';
            kunloc_thu_support +='<span class="font-weight-bold">Thông tin hộp thư</span>\n';
            kunloc_thu_support +='<p class="mt-2 text-left">Người báo cáo: <a target="_blank" href="profile.php?id='+uid+'">'+fullname+'</a></p>\n';
            kunloc_thu_support +='<p class="mt-2 text-left">Đường dẫn người bị báo cáo: <a target="_blank" href="profile.php?id='+uid2+'">Click xem</a></p>\n';
            kunloc_thu_support +='<p class="mt-2 text-left">Lý do: '+type+'</p>\n';
            kunloc_thu_support +='<p class="mt-2 text-left">Trạng thái: '+trangthai+'</p>\n';
            kunloc_thu_support +='</div>\n';
            if(trangthai == 'Đợi xem xét'){
                kunloc_thu_support +='<div class="card-footer bg-white">\n';
                kunloc_thu_support +='<button class="btn btn-sm xanh" type="button" onclick="Duyet('+id+')">Duyệt (Vô hiệu hóa tài khoản)</button>\n';
                kunloc_thu_support +='<button class="btn btn-sm red" type="button" onclick="KoDuyet('+id+')">(Không vi phạm)</button>\n';
                kunloc_thu_support +='</div>\n';
            }
            kunloc_thu_support +='</div></div>\n';
           }
        }
        $("#loading_support").hide();
        $("#list_thu_support").html(kunloc_thu_support);
      }).always(function(){
          $("#loading_support").hide();
      })
}

function Duyet(id){
    $.post('API/api_hotro.php', { 
           type: 'Duyet', 
           value: '1',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_support()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
}
function KoDuyet(id){
    $.post('API/api_hotro.php', { 
           type: 'Duyet', 
           value: '2',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_support()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
return false;
}
//---------------------------------------------------------
function Reload_Post() {
    $("#loading_post").show();
    $("#list_thu_post").html(null);
    setTimeout(() => {
        getPost()
    }, 1000);
}
function View_post(id) {
    $("#loading_post").show();
    $("#list_thu_post").html(null);
    setTimeout(() => {
        getViewPost(id)
    }, 1000);
}

function getPost(){
      $.post("API/api_hotro.php", { type: "LIST_POST" }, function(data){
        Data = JSON.parse(data);
        kunloc_list_post = '';
        if(Data == null || !Data.length){
            $("#list_thu_post").html('<center><small>Không có báo cáo.</small></center>');
            $("#list_thu_post").css('height','auto').css('overflow','auto');
            $("#loading_checkpoint").hide();
            return false;
        }
        for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            username = Data[i].username;
            fullname = Data[i].fullname;
            avatar = Data[i].avatar;
            text = Data[i].text;
            image = Data[i].image;
            time = Data[i].time;
            trangthai = Data[i].trangthai;
            if(id){
            kunloc_list_post +='<div class="card mb-2" onclick="View_post('+id+')">\n';
            kunloc_list_post +='<div class="card-body row">\n';
            kunloc_list_post +='<img class="avtbn" height="100" width="100" src="'+avatar+'" ></img>\n';
            kunloc_list_post +='<div class="ml-3"> Bài viết bởi, \n';
            kunloc_list_post +='<span><b style="color:green">'+fullname+'</b></span><br>\n';
            if(kunloc_list_post > 0){
                kunloc_list_post +='Đã xem xét: <del> Đã đăng 1 bài viết mới.</del>\n';
            }else{
                kunloc_list_post +='<span class="font-weight-bold">Đã đăng 1 bài viết mới.</span>\n';
            }
            kunloc_list_post +='<p>Lúc, <small>'+time+'</small></p>\n';
            kunloc_list_post +='</div></div></div>\n';
            $("#list_thu_post").css('height','250px').css('overflow','auto');
           }else{
            $("#list_thu_post").css('height','auto').css('overflow','auto');
           }
        }
        $("#loading_post").hide();
        $("#list_thu_post").html(kunloc_list_post);

      }).always(function(){
          $("#loading_post").hide();
      })
}
function getViewPost(id){
        $.post("API/api_hotro.php", { type: "ViewPost",id: id }, function(data){
        Data = JSON.parse(data);
        kunloc_thu_post = '';
            for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            uid = Data[i].uid;
            username = Data[i].username;
            fullname = Data[i].fullname;
            avatar = Data[i].avatar;
            text = Data[i].text;
            image = Data[i].image;
            time = Data[i].time;
            trangthai = Data[i].trangthai;
            if(id){
            kunloc_thu_post +='<div class="card">\n';
            kunloc_thu_post +='<div class="card-body row mb-0 pb-0">\n';
            kunloc_thu_post +='<i class="iconfb"></i>\n';
            kunloc_thu_post +='<p class="ml-2"><small>'+time+'</small></p>\n';
            kunloc_thu_post +='</div>\n';

            kunloc_thu_post +='<div class="card-body ml-4 pt-0 mt-0">\n';
            kunloc_thu_post +='<span class="font-weight-bold">Thông tin bài viết</span>\n';
            kunloc_thu_post +='<div class="card mt-3 mb-2">\n';
            kunloc_thu_post +='<div class="card-body p-0">\n';
            kunloc_thu_post +='<div class="feed postc pb-0">\n';
            kunloc_thu_post +='<div class="feed-header">\n';
            kunloc_thu_post +='<img src="'+avatar+'" class="mt-1 rounded float-left img mr-2">\n';
            kunloc_thu_post +='<div class="row">\n';
            kunloc_thu_post +='<p class="font-weight-bold feed-name">'+fullname+'</p>\n';
            kunloc_thu_post +='</div></div>\n';
            kunloc_thu_post +='<b class="time-post">'+time+'<span aria-hidden="true"> · </span> <i class="public-icon" aria-label="Đã chia sẻ với Công khai"role="img"></i></b>\n';
            kunloc_thu_post +='</div>\n';
            kunloc_thu_post +='<div class="post-body">\n';
            kunloc_thu_post +='<div class="post-captent ml-3 m-2 font-size-25"><p>'+text+'</p></div>\n';
            if(image){
              kunloc_thu_post += '<div class="row">'+image+'</div>\n';
            }
            kunloc_thu_post +='</div></div></div>\n';
            
            kunloc_thu_post +='<p class="mt-2 text-left">Trạng thái: '+trangthai+'</p>\n';
            kunloc_thu_post +='</div>\n';
            if(trangthai == 'Đợi xem xét'){
                kunloc_thu_post +='<div class="card-footer bg-white">\n';
                kunloc_thu_post +='<button class="btn btn-sm xanh" type="button" onclick="DuyetPost('+id+')">Duyệt (Công khai bài viết)</button>\n';
                kunloc_thu_post +='<button class="btn btn-sm red" type="button" onclick="KoDuyetPost('+id+')">(Không duyệt)</button>\n';
                kunloc_thu_post +='</div>\n';
            }
            kunloc_thu_post +='</div></div>\n';
           }
        }
        $("#loading_post").hide();
        $("#list_thu_post").html(kunloc_thu_post);
      }).always(function(){
          $("#loading_post").hide();
      })
}
function DuyetPost(id){
    $.post('API/api_hotro.php', { 
           type: 'DuyetPost', 
           value: '1',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_Post()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
}
function KoDuyetPost(id){
    $.post('API/api_hotro.php', { 
           type: 'DuyetPost', 
           value: '0',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_Post()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
return false;
}
</script>

<!-- /./ -->
<div class="h5 font-weight-bold p-3">MỞ KHÓA - CHECKPOINT</div>
<div class="card" type="button" onclick="Reload_checkpoint()">
<div class="card-body row">
<img class="atvbn" height="100%" width="100%" src="img/button/thongbao.png" style="height: 40px; width: 40px;"></img>
<div class="ml-3">
<span class="font-weight-bold">Support ơi, có <font color="red"><?= mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM `checkpoint` WHERE active='0' ")); ?></font> thư cần cần duyệt</span>
<p><small>Click để xem báo cáo</small></p>
</div>

</div>
</div>
<!-- /./ -->

<!-- /./ -->
<div id="loading_checkpoint" style="display:none">
<br>
<center>
 <div class="spinner-grow text-muted"></div>
 <div class="spinner-grow text-primary"></div>
 <div class="spinner-grow text-success"></div>
 <div class="spinner-grow text-info"></div>
 <div class="spinner-grow text-warning"></div>
 <div class="spinner-grow text-danger"></div>
 <div class="spinner-grow text-secondary"></div>
 <div class="spinner-grow text-dark"></div>
 <div class="spinner-grow text-light"></div>
 </center>
</div>
<br>
<div id="list_checkpoint"></div>


<script>
$(document).ready(function() {
   setTimeout(function() {
    getCheckpoint();
   },1000)
    
})
function Reload_checkpoint() {
    $("#loading_checkpoint").show();
    $("#list_checkpoint").html(null);
    setTimeout(() => {
        getCheckpoint()
    }, 1000);
}
function View_checkpoint(id) {
    $("#loading_checkpoint").show();
    $("#list_checkpoint").html(null);
    setTimeout(() => {
        getViewCheckpoint(id)
    }, 1000);
}

function getCheckpoint(){
      $.post("API/api_hotro.php", { type: "LIST_CHECKPOINT" }, function(data){
        Data = JSON.parse(data);
        kunloc_checkpoint = '';
        if(Data == null || !Data.length){
            $("#list_checkpoint").html('<center><small>Không có báo cáo.</small></center>');
            $("#list_checkpoint").css('height','auto').css('overflow','auto');
            $("#loading_checkpoint").hide();
            return false;
        }
        for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            username = Data[i].username;
            avatar = Data[i].avatar;
            fullname = Data[i].fullname;
            email = Data[i].email;
            ngaysinh = Data[i].ngaysinh;
            image = Data[i].image;
            time = Data[i].time;
            active = Data[i].active;
            if(id){
            kunloc_checkpoint +='<div class="card mt-2" onclick="View_checkpoint('+id+')">\n';
            kunloc_checkpoint +='<div class="card-body row">\n';
            kunloc_checkpoint +='<img class="avtbn" height="100" width="100" src="'+avatar+'">\n';
            kunloc_checkpoint +='<div class="ml-3"> Case #'+id+',\n';
            kunloc_checkpoint +='<span><b style="color:green">'+fullname+'</b></span><br>\n';
            if(active > 0){
                kunloc_checkpoint +='Đã xem xét: <del class="text-primary font-weight-bold">'+fullname+', Đã gửi 1 chứng minh thư (Đơn yêu cầu).</del>\n';
            }else{
                kunloc_checkpoint +='<span class="font-weight-bold">Đã gửi 1 chứng minh thư (Đơn yêu cầu).</span>\n';
            }
            kunloc_checkpoint +='<p>Vào, <small>'+time+'</small></p>\n';
            kunloc_checkpoint +='</div></div></div>\n';
            $("#list_checkpoint").css('height','250px').css('overflow','auto');
           }else{
            $("#list_checkpoint").css('height','auto').css('overflow','auto');
           }
        }
        $("#loading_checkpoint").hide();
        $("#list_checkpoint").html(kunloc_checkpoint);

      }).always(function(){
          $("#loading_checkpoint").hide();
      })
}
function getViewCheckpoint(id){
        $.post("API/api_hotro.php", { type: "ViewCheckpoint",id: id }, function(data){
        Data = JSON.parse(data);
        kunloc_thu_checkpoint = '';
            for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            username = Data[i].username;
            avatar = Data[i].avatar;
            fullname = Data[i].fullname;
            email = Data[i].email;
            ngaysinh = Data[i].ngaysinh;
            image = Data[i].image;
            time = Data[i].time;
            active = Data[i].active;
            if(id){
            kunloc_thu_checkpoint +='<div class="card mt-2">\n';
            kunloc_thu_checkpoint +='<div class="card-body row mb-0 pb-0">\n';
            kunloc_thu_checkpoint +='<i class="iconfb"></i>\n';
            kunloc_thu_checkpoint +='<p class="ml-2"><small>'+time+'</small></p>\n';
            kunloc_thu_checkpoint +='</div>\n';

            kunloc_thu_checkpoint +='<div class="card-body ml-4 pt-0 mt-0">\n';
            kunloc_thu_checkpoint +='<span class="font-weight-bold ml-2 mt-2">Yêu cầu mở khóa tài khoản</span>\n';

            kunloc_thu_checkpoint +='<div class="irow row">\n';
            kunloc_thu_checkpoint +='<div class="col-sm-6">\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Họ và tên đầy đủ: <small>'+fullname+'</small></p>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Ngày sinh: <small>'+ngaysinh+'</small></p>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Email: <small>'+email+' </small></p>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Thời gian: <small>'+time+' </small></p>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Trang thái mở khóa: <small>'+active+' </small></p>\n';
            kunloc_thu_checkpoint +='</div>\n';
            kunloc_thu_checkpoint +='<div class="col-sm-6">\n';
            kunloc_thu_checkpoint +='Hình ảnh xác minh <br> <small>Click vào ảnh để zoom</small><br><img data-fancybox="#unlock'+id+'" href="'+image+'" style="width:40px;height:40px;border-radius:50px;" class="img-fluid" src="'+image+'">\n';
            kunloc_thu_checkpoint +='</div>\n';
            kunloc_thu_checkpoint +='</div>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Các support lưu ý, xem kỹ chúng minh thư và info nếu trùng với nhau và là cmnd thật thì mới duyệt nhé!</p>\n';
            kunloc_thu_checkpoint +='<p class="mt-2 text-left">Duyệt bậy sẽ tương tự như vi phạm và sẽ loại khỏi đơn vị Support Fbvn!</p>\n';
            kunloc_thu_checkpoint +='</div>\n';
            if(active == 'Vẫn đang vi phạm'){
                kunloc_thu_checkpoint +='<div class="card-footer bg-white">\n';
                kunloc_thu_checkpoint +='<button class="btn btn-sm xanh" type="button" onclick="DuyetCp('+id+')">Duyệt (Mở khóa tài khoản)</button>\n';
                kunloc_thu_checkpoint +='<button class="btn btn-sm red" type="button" onclick="KoDuyetCp('+id+')">(Vẫn vi phạm)</button>\n';
                kunloc_thu_checkpoint +='</div>\n';
            }
            kunloc_thu_checkpoint +='</div></div>\n';
           }
        }
        $("#loading_checkpoint").hide();
        $("#list_checkpoint").html(kunloc_thu_checkpoint);
      }).always(function(){
          $("#loading_checkpoint").hide();
      })
}
function DuyetCp(id){
    $.post('API/api_hotro.php', { 
           type: 'DuyetCp', 
           value: '1',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_checkpoint()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
}
function KoDuyetCp(id){
    $.post('API/api_hotro.php', { 
           type: 'DuyetCp', 
           value: '0',
           id: id
        }, function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                Reload_checkpoint()
            }
            toarst(Data.type,Data.text,Data.title)
            return false;
    })
return false;
}
</script>
</div>

</div>
</div>
<?php } ?>
<?php  include("../main/footer.php"); ?>  
