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
<body class="Bodysetting">
<?php 
if($_SESSION['username'] && ($_REQUEST['Home'] == 'profile')){ 
    include_once('../main/core/navbar_user.php');
    }else if(empty($_SESSION['username']) && ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/trang-chu') ){
        
    }else{
        include_once('../main/core/navbar.php');
}
?>
<style>
.form-control{
   float:left
   background: #60677038;
   color:#333;
}
.form-control:hover{
   background: #60677038;
   color:#333;
}
.form-control:focus{
   background: #60677038;
   color:#333;
}
@media only screen and (max-width: 600px){
    .input-group input {
        margin-top: 2px;
        background-color: #f0f2f5;
        border-radius: 0px!important;
    }
}
.btn-submit{
    border: 1px solid;
    border-radius: 2px;
    box-sizing: content-box;
    font-size: 12px;
    -webkit-font-smoothing: antialiased;
    font-weight: bold;
    justify-content: center;
    padding: 0 8px;
    position: relative;
    text-align: center;
    text-shadow: none;
    vertical-align: middle;
    margin-left: 4px;
    color: #fff;
    line-height: 22px; 
    background-color: #4267b2;
    border-color: #4267b2;
}
</style>
<div class="container">
<div class="row d-flex justify-content-center">

<div class="col-md-4">
<div class="Tieude ">Cài đặt</div>

   <a class="dropdown-item activee" href="#">
     <div class="row" onclick="showForm1()">
       <i class="caidatchung"></i> <span class="ml-2 mt-1"> Cài đặt chung</span>
     </div>
    </a>
    
    <a class="dropdown-item activee" href="#">
     <div class="row" onclick="showForm2()">
       <i class="baomat"></i> <span class="ml-2 mt-1"> Bảo mật và đăng nhập</span>
     </div>
    </a>
     <a class="dropdown-item activee" href="#">
     <div class="row" onclick="showForm3()">
       <i class="mobiles"></i> <span class="ml-2 mt-1"> Tùy chọn tài khoản</span>
     </div>
    </a>
    <script>
    function showForm1(){
        $("#form1").show();
        $("#form2").hide();
        $("#form3").hide();
    }
    function showForm2(){
        $("#form2").show();
        $("#form1").hide();
        $("#form3").hide();
    }
    function showForm3(){
        $("#form3").show();
        $("#form1").hide();
        $("#form2").hide();
    }
    </script>
</div>

<div class="col-md-8">

<!-- catdatchungn -->
<div id="form1" style="display: block">
<div class="Tieude2">Cài đặt tài khoản chung</div>
<hr>
<div class="irow row">
<div class="col-sm-3"><div class="header">Tên</div></div>
<div class="col-sm-6">
<div class="thongtin" id="thongtin"><?= $fullname ?></div>
<!-- /./ -->
<div class="form-chinhsua" id="form-chinhsua" style="display:none">
<h6 class="mt-2 ml-4 mr-4 mb-0" style="text-align:left">
Tên bạn sẽ thay đổi trên cả Facebook và Instagram. Hãy truy cập vào Trung tâm tài khoản trên ứng dụng Facebook hoặc Instagram để quản lý cài đặt đồng bộ.</h6>
<br>
<div class="float-right mt-0" style="margin-right:30px">
<b>Họ tên hiện tại: </b> <small><?= $fullname ?></small><br><br>
</div>
<form action="javascript:volid()" method="POST" class="ml-4">
<label>Xem trước tên của bạn: </label><span id="update"> <img class="uiLoadingIndicatorAsync img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yf/r/FhfpgTeI_e4.gif" alt="" width="16" height="11"></span>
<div class="input-group">
<input id="fullname" type="text" value="<?= $fullname ?>" class="form-control mr-3"/>
</div>
<div class="input-group">
<button class="btn-submit mt-2" id="submit" type="submit">Lưu thay đổi</button>
</div>
</form>
</div>
<!-- /./ -->
</div>

<div class="col-sm-3"><div class="link" id="btn-ten" style="display:block" onclick="Chinhhsua()">Chỉnh sửa</div></div>
<script>
function Chinhhsua(){
    $("#btn-ten").hide();
    $("#thongtin").hide()
    $("#form-chinhsua").show();
}
$('#fullname').change(function(){
    var name = $('#fullname').val();
    $("#update").text(name)
})
$("#submit").click(function(){
    var name = $("#fullname").val();
    $("#fulllname").prop('disabled',true);
    $.post("API/api_setting.php",{
        type: "Update",
        fullname: name
    },function(data){
    Data = JSON.parse(data);
        if(Data.type == "success"){
            $("#btn-ten").show();
            $("#thongtin").show().text(name);
            $("#form-chinhsua").hide();
        }
        toarst(Data.type,Data.text,Data.title)
        return false;
    })
})
</script>
</div>
<!-- token -->
<div class="irow row">

<div class="col-sm-3">
<div class="header">Mã truy cập</div></div>
<div class="col-sm-6">
<input  id="access_token" type="text" class="thongtin" readonly value="<?= $access_token; ?>">
</div>
<!-- /./ -->
<div class="col-sm-3">
<div class="link" id="btn-token" style="display:block" onclick="Copy()">Copy</div>
</div>
</div>
<script>
 function Copy(){
     var noidung = $('#access_token').select();
     document.execCommand("copy");
     toarst('success','Đã copy access token')
     return false;
 }
</script>
<!-- token -->

</div>


<!-- baomat -->
<div id="form2" style="display: none">
<style>
.setting-header{
    padding: 8px;
    border-top: none;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    background-color: #f5f6f7;
}
</style>
<div class="p-3">
<div class="card">
<div class="setting-header"><span>Đăng nhập</span></div>
<li class="list-group-item">
<tbody>
<tr>
<td><i class="doimatkhau"></i></td>
<td><span class="title">Đổi mật khẩu</span></td>
<td><span class="title2">Bạn nên sử dụng mật khẩu mạnh mà mình chưa sử dụng ở đâu khác</span></td>
<td><button onclick="Doimatkhau()" class="chinhsuamatkhau">Chỉnh sửa</button></td>
<script>
function Doimatkhau(){
    var x = document.getElementById("doimatkhau");
    if(x.style.display === "none"){
        x.style.display = "block"; 
    }else{
        x.style.display = "none"; 
    }
}
</script>
<td>
<div class="card mt-2" id="doimatkhau" style="display: none">
<div class="setting-header p-5">
<form action="javascript:void(0);" method="post">
<div class="irow row mb-3">
<div class="col-sm-3"><label>Mật khẩu hiện tại</label></div>
<div class="col-sm-9"><input type="password" id="pass1" class="form-control"/></div>
</div>
<div class="irow row mb-3">
<div class="col-sm-3"><label>Mật khẩu mới</label></div>
<div class="col-sm-9"><input type="password" id="pass2" class="form-control"/></div>
</div>
<div class="irow row">
<div class="col-sm-3"><label>Nhập lại mật khẩu mới</label></div>
<div class="col-sm-9"><input type="password" id="repass2" class="form-control"/></div>
</div>
<div class="float-center">
<button class="btn-submit mt-4" id="submitpass"  type="submit">Lưu thay đổi</button>
</div>
</form>
<script>
$("#submitpass").click(function(){
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();
    var repass2 = $("#repass2").val();
    if(pass1 == '' || pass2 == '' || repass2 == ''){
        toarst("error","Vui lòng điền mật khẩu","")
        return false;
    }else if(pass2 != repass2){
        toarst("error","2 mật khẩu không khớp nhau","")
        return false;
    }
    $.post("API/api_setting.php",{
        type: "Pass",
        pass1: pass1,
        pass2: pass2
    },function(data){
        Data = JSON.parse(data);
        if(Data.type == "success"){
            $("#doimatkhau").hide()
        }
        toarst(Data.type,Data.text,Data.title)
        return false;
    })
})
</script>
</div>
</div>
</td>


</tr>
</tbody>

</li>
</div>

</div>

</div>

<!-- baomat -->
<!-- tuychontakhoan -->
<div id="form3" style="display: none">
<div class="Tieude2">Cài đặt thời gian tham gia</div>
<hr>
<div class="irow row">
<div class="col-sm-3"><div class="header">Thời gian tham gia</div></div>
<div class="col-sm-6 mt-2">
<div class="thongtin" id="thongtin-ngay">Vào lúc, <?= date("H:i:s d-m-Y",$ngay_tham_gia); ?></div>
<!-- /./ -->
<div class="form-chinhsua ml-4 pt-0 mt-0 mr-4 mb-0" style="text-align:left;display:none" id="form-chinh-sua-ngay">
<div class="irow row">
     <div class="col-sm-4">
        <h6 class="mt-1">Ngày tạo</h6>
          <select id="ngay">
                <?php 
                for ($i = 1; $i <= 30; $i++) {
                    echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                }
                ?>
          </select>
      </div>
      <div class="col-sm-4">
          <h6 class="mt-1">Tháng tạo</h6>
           <select id="thang">
                <?php 
                for ($i = 1; $i <= 12; $i++) {
                    echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                    
                }
                ?>
           </select>
       </div>
       <div class="col-sm-4">
        <h6 class="mt-1">Năm tạo</h6>
         <select id="nam">
                <?php 
                for ($i = 2004; $i <= 2021; $i++) {
                    
                    if($i == 2020){
                        echo '<option selected="" value="'.$i.'" class="form-control">'.$i.'</option>';
                    }else{
                        echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                    }
                }
                ?>
       </select>
      </div>
  </div>
<div class="input-group">
<button class="btn-submit ml-0 mt-2" id="submit-ngay" type="submit">Lưu thay đổi</button>
</div>
</form>
</div>
<!-- /./ -->
</div>

<div class="col-sm-3"><div class="link" id="btn-ngay" style="display:block" onclick="Chinhhsuangay()">Chỉnh sửa</div></div>
<script>
function Chinhhsuangay(){
    $("#btn-ngay").hide();
    $("#thongtin-ngay").hide()
    $("#form-chinh-sua-ngay").show();
}
$("#submit-ngay").click(function(){
    var ngay = $("#ngay").val();
    var thang = $("#thang").val();
    var nam = $("#nam").val();
    $("#submit-ngay").prop('disabled',true);
    $.post("API/api_setting.php",{
        type: "UpdateNgay",
        ngay:ngay,
        thang:thang,
        nam:nam,
    },function(data){
    Data = JSON.parse(data);
        if(Data.type == "success"){
            $("#btn-ngay").show();
            $("#thongtin-ngay").show().text(ngay+"-"+thang+"-"+nam)
            $("#form-chinh-sua-ngay").hide();
            $("#submit-ngay").prop('disabled',false);
        }
        toarst(Data.type,Data.text,Data.title)
        return false;
    })
})
</script>
</div>
</div>

<!-- tuychontakhoan -->


</div>


</div>
</div>
<style>
label {
    font-size: 15px;
    color: #606770;
    cursor: default;
    font-weight: 600;
    vertical-align: middle;
}
.chinhsuamatkhau{
    border: 1px solid;
    border-radius: 2px;
    box-sizing: content-box;
    font-size: 15px;
    -webkit-font-smoothing: antialiased;
    font-weight: bold;
    justify-content: center;
    padding: 0 18px;
    position: relative;
    text-align: center;
    text-shadow: none;
    vertical-align: middle;
    background-color: #f5f6f7;
    border-color: #ccd0d5;
    color: #4b4f56;
    cursor: pointer;
    display: inline-block;
    text-decoration: none;
    white-space: nowrap;
}
.Bodysetting .title, .Bodysetting .title {
    font-size: 15px;
    font-weight: 500;
    line-height: 20px;
    margin-bottom:10px;
}
.Bodysetting .title2, .Bodysetting .title2 {
    color: grey;
    display: block;
}
.col-md-4{
 border-right:solid 1px #bcbcbd73;
}
.dropdown-item.active {
    border-bottom: none;
    border-top: none;
    padding-left: 15px;
    border-radius: 15px;
    color: #16181b;
    width: 90%;
    margin-top: -15px;
    margin-left: 15px;
}
.dropdown-item.active:hover {
    color: #16181b;
    text-decoration: none;
    background-color: #f8f9fa;

}
.Bodysetting {
    background:#fff;
}
.Bodysetting .Tieude {
    margin: 15px;
    /* padding-bottom: 15px; */
    /* padding-left: 8px; */
    font-size: 24px;
    font-weight: 700;
    line-height: 28px;
}
.Tieude2 {
    margin:15px;
    color: #1c1e21; 
    font-size: 20px; 
    font-weight: 600;
    line-height: 24px;
}
.Bodysetting .header {
    margin:15px;
    color: #333;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    padding-bottom: 15px;
    padding-left: 8px;
    line-height: 28px;
}
.Bodysetting .thongtin {
    margin:15px;
    color: #65676b;
    font-size: 15px;
    letter-spacing: -0.24px;
    cursor: pointer;
    text-decoration: none;
    padding-bottom: 15px;
    padding-left: 8px;
    line-height: 28px;
}
.Bodysetting .link {
    margin:15px;
    color: #385898;
    cursor: pointer;
    text-decoration: none;
    padding-bottom: 15px;
    padding-left: 8px;
    line-height: 28px;
}
    
</style>

<?php  include("../main/footer.php"); ?>  
