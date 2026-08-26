<?php
	ob_start();
	session_start();
	include('../config.php');
    include_once('../main/header.php'); 
    if($username && $trangthai == 'disabled'){
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
.col-sm-8{
      padding:10px;
}
.card{
    border-radius:15px;
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
<!-- /./ -->
<div class="h5 font-weight-bold p-3">Yêu cầu xem xét</div>
<div class="card" type="button" onclick="Reload()">
<div class="card-body row">
<image height="100%" width="100%" src="img/button/thongbao.png" style="height: 40px; width: 40px;"></image>
<div class="ml-3">
<span class="font-weight-bold">TỔNG HỘP THƯ ĐANG CÓ: <font color="red"><?= mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM hop_thu_ho_tro WHERE username ='$username' AND trangthai='0' ")); ?></font></span>
<p><small>Click để xem báo cáo</small></p>
</div>

</div>
</div>
<!-- /./ -->
<!-- /./ -->
<div id="list_thu">
</div>
<div id="loading" style="display:none">
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
<script>
$(document).ready(function() {
   setTimeout(function() {
    getTintuc();
   },1000)
    
})
function Reload() {
    $("#loading").show();
    $("#list_thu").html(null);
    setTimeout(() => {
        getTintuc()
    }, 1000);
}
function View(id) {
    $("#loading").show();
    $("#list_thu").html(null);
    setTimeout(() => {
        getView(id)
    }, 1000);
}
function getTintuc(){
      $.post("API/api_hotro.php", { type: "LIST" }, function(data){
        Data = JSON.parse(data);
        kunloc_list = '';
        if(Data == null || !Data.length){
            $("#list_thu").html('<center><small>Không có báo cáo.</small></center>');
            $("#loading").hide();
            return false;
        }
        for(var i=0;i<Data.length;i++){
            id = Data[i].id;
            avatar = Data[i].avatar
            username = Data[i].username;
            fullname = Data[i].fullname;
            type = Data[i].type;
            tieude = Data[i].tieude;
            noidung = Data[i].noidung;
            time = Data[i].time;
            trangthai = Data[i].trangthai;
            if(id){
            kunloc_list +='<div class="card mt-2" onclick="View('+id+')">\n';
            kunloc_list +='<div class="card-body row">\n';

            kunloc_list +='<img class="avtbn" height="100" width="100" src="'+avatar+'" ></img>\n';
            kunloc_list +='<div class="ml-3"> Case #'+id+': \n';
            kunloc_list +='<span>Xin chào, <b style="color:green">'+fullname+'</b></span><br>\n';
            if(trangthai > 0){
                kunloc_list +='Đã xem xét: <del class="font-weight-bold text-primary">'+tieude+'</del>\n';
            }else{
                kunloc_list +='<span class="font-weight-bold">'+tieude+'</span>\n';
            }
            kunloc_list +='<p>Lúc, <small>'+time+'</small></p>\n';
            kunloc_list +='</div></div></div>\n';
           }
        }
        $("#loading").hide();
        $("#list_thu").html(kunloc_list);

      })
}

function getView(id){
        $.post("API/api_hotro.php", { type: "View",id: id }, function(data){
        Data = JSON.parse(data);
        kunloc_thu = '';
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
            kunloc_thu +='<div class="card mt-2">\n';
            kunloc_thu +='<div class="card-body row mb-0 pb-0">\n';
            kunloc_thu +='<i class="iconfb"></i>\n';
            kunloc_thu +='<p class="ml-2"><small>'+time+'</small></p>\n';
            kunloc_thu +='</div>\n';

            kunloc_thu +='<div class="card-body ml-4 pt-0 mt-0">\n';
            kunloc_thu +='<span class="font-weight-bold">Câu trả lời của chúng tôi</span>\n';
            kunloc_thu +='<p class="mt-2 text-left">Bạn đã báo cáo: <b style="color:blue">'+fullname+'</b></p>\n';
            kunloc_thu +='<p class="mt-2 text-left">Lý do: <small>'+type+'</small></p>\n';
            kunloc_thu +='<p class="mt-2 text-left">Vào lúc: <small>'+time+'</small></p>\n';
            kunloc_thu +='<p class="mt-2 text-left">Trạng thái: <b style="color:red">'+trangthai+'</b></p>\n';
            kunloc_thu +='<p class="mt-2 text-left">'+noidung+'</p>\n';
            kunloc_thu +='</div>\n';
            //kunloc_thu +='<div class="card-footer bg-white">\n';
            //kunloc_thu +='<button class="btn btn-block btn-primary story">Xóa Tin Nhắn</button>\n';
            //kunloc_thu +='</div>
            kunloc_thu +='</div></div>\n';
           }
        }
        $("#loading").hide();
        $("#list_thu").html(kunloc_thu);
      })
}
</script>
<!-- /./ -->
<?php  include("../main/footer.php"); ?>  
