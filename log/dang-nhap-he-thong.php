<?php
session_start();
if(isset($_SESSION['username'])){
	header('location: trang-chu');
	die();
}
include('../config.php');
include('../main/header.php');
?>
<div class="modal fade show" id="dangky" style="margin-top:px;" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="fb-header">
          <h3 class="fb-title">Đăng ký</h3>
          <p class="fb-content">Nhanh chóng và dễ dàng.</p>
        </div>
        <b class="close-btn" data-dismiss="modal"><i class="close-modal"></i></b>
      </div> 
      <div class="modal-body ml-0 pl-0 mr-0 pr-0">
      <form action="javascript:volid()" method="POST">
        <div class="col-sm-12">
          <h6 class="fb-content"><i class="fa fa-check-circle"></i> Điền họ và tên của bạn </h6>
          <input type="text" id="sinup_fullname" style="background:#f5f6f7" class="form-control" placeholder="Họ và tên của bạn">
        </div>
        <div class="col-12 mt-2">
          <h6 class="fb-content"><i class="fa fa-gift"></i> Email</h6>
            <input type="email" id="sinup_email" style="background:#f5f6f7" class="form-control" placeholder="Email">
        </div>
        <div class="col-12 mt-2">
            <h6 class="fb-content"><i class="fa fa-user"></i> Tên tài khoản</h6>
            <input type="text" id="sinup_username" style="background:#f5f6f7" class="form-control" placeholder="Username">
        </div>
        <div class="col-12 mt-2">
          <h6 class="fb-content"><i class="fa fa-phone"></i> Số điện thoại</h6>
            <input type="tel" id="sinup_phone" style="background:#f5f6f7" class="form-control" placeholder="Số điện thoại">
        </div>
        <div class="col-12 mt-2">
          <h6 class="fb-content"><i class="fa fa-lock"></i> Mật khẩu</h6>
            <input type="password" id="sinup_password" style="background:#f5f6f7" class="form-control" placeholder="Mật khẩu">
        </div>
        <!-- /./ -->
        <div class="mt-3 text-center">
          <button id="sinup" type="submit" class="btn btn-sinup">Đăng ký</button>
        </div>
     </form>
      </div>

      </div>
    </div>
  </div>
<body>
<div class="container">
<div class="d-flex justify-content-center mt-3">
    <b class="text-primary font-weght-bold h2" id="facebook-logo">F a c e b o o k</b>
  <!--img src="/img/logo.svg" class="img logo" height="" alt="facebook"-->
</div>
<div class="row h-100 justify-content-center align-items-center mt-2">
    <div class="col-md-6 fb-panel">
        <small class="d-none">Lưu ý: Không phải tài khoản Facebook!!<br/><br/></small>
        <form method="POST">
          <div class="form-group">
            <input type="text" data-toggle="tooltip" data-placement="top" title="Tên tài khoản" class="form-control" id="username" placeholder="Tên tài khoản">
          </div>
          <div class="form-group">
            <input type="password" data-toggle="tooltip" data-placement="top" title="Mật khẩu" class="form-control" id="password" placeholder="Mật khẩu">
          </div>
          
          <div class="form-group">
          <center>
              <button id="login" type="login" class="btn btn-primary btn-block">Đăng nhập</button>
          </center>
          </div>
        </form>
<div id="login_reg_separator" class="_43mg _8qtf" data-sigil="login_reg_separator">
  <span class="_43mh">hoặc</span></div>
    <center>
    <a data-toggle="modal" data-target="#dangky" href="#"><button class="btn btn-success" data-toggle="modal">Tạo tài khoản mới</button></a>
    </center>
    Không phải tài khoản facebook nên không đăng nhập vô được
    Làm ơn mới chơi thì đăng ký xong mới đăng nhập
<div class="mt-3 mb-1 text-center">
<?= $ads_2x ?>
<?= $ads_auto ?>
</div>
</div>

</div>
<script>
$('#login').click(function(){
  var username = $("#username").val();
  var password = $("#password").val();
  if(username == '' || password == ''){
    toastr.error('Chưa điền đầy đủ thông tin.');
    return false;
  }
  $("#username").prop('disabled', true)
  $("#password").prop('disabled', true)
  $('#login').prop('disabled', true)
  var kunloc = {
					"async": true,
					"crossDomain": true,
					"url": "xuly/login.php",
					"method": "POST",
					"headers": {
						"content-type": "application/x-www-form-urlencoded",
						"cache-control": "no-cache"
					},
					"data": {
						"username": username,
						"password": password,
					}
		}
	 $.ajax(kunloc).done (function(data) {
        Data = JSON.parse(data)
        if(Data.url){
            setTimeout(() => { window.location = Data.url } , Data.time)
        }
        toarst(Data.type,Data.text,Data.title)
        $("#username").prop('disabled', false)
        $("#password").prop('disabled', false)
        $('#login').prop('disabled', false)
    })
})
$('#sinup').click(function(){
  var sinup_username = $("#sinup_username").val();
  var sinup_password = $("#sinup_password").val();
  var sinup_fullname = $("#sinup_fullname").val();
  var sinup_email = $("#sinup_email").val();
  var sinup_phone = $("#sinup_phone").val();
  if(sinup_fullname == '' || sinup_email == '' || sinup_username == '' || sinup_password == '' || sinup_phone == '') {
    toastr.error('Chưa điền đầy đủ thông tin.');
    return false;
  }
  $('#sinup').prop('disabled', true)
  var kunloc = {
					"async": true,
					"crossDomain": true,
					"url": "xuly/sinup.php",
					"method": "POST",
					"headers": {
						"content-type": "application/x-www-form-urlencoded",
						"cache-control": "no-cache"
					},
					"data": {
						"username": sinup_username,
						"password": sinup_password,
						"fullname": sinup_fullname,
            "email": sinup_email,
            "phone": sinup_phone
					}
		}
	 $.ajax(kunloc).done (function(data) {
        Data = JSON.parse(data)
        if(Data.url){
            setTimeout(() => { window.location = Data.url } , Data.time)
        }
        toarst(Data.type,Data.text,Data.title)
        $('#sinup').prop('disabled', false)
    })
})
/*$('#sinup').click(function(){
  var fullname = $("#sinup_fullname").val();
  var username = $("#sinup_username").val();
  var password = $("#sinup_password").val();
  var email = $("#sinup_email").val();
  var phone = $("#sinup_phone").val();
  if(fullname == '' || email == '' || username_ == '' || password_ == '' || phone == '') {
        toarst.error('Chưa điền đầy đủ thông tin.');
        return false;
   }
  $("#username_").prop('disabled', true)
  $("#password_").prop('disabled', true)
  $("#email").prop('disabled', true)
  $("#phone").prop('disabled', true)
  $("#fullname").prop('disabled', true)
  var kunloc = {
					"async": true,
					"crossDomain": true,
					"url": "xuly/sinup.php",
					"method": "POST",
					"headers": {
						"content-type": "application/x-www-form-urlencoded",
						"cache-control": "no-cache"
					},
					"data": {
						"username": username,
						"password": password,
						"fullname": fullname,
            "email": email,
            "phone": phone
					}
		}
	 $.ajax(kunloc).done (function(data) {
        Data = JSON.parse(data)
        if(Data.reload){
            setTimeout(() => { window.location = Data.reload } , Data.time)
        }
        toarst(Data.type,Data.text,Data.title)
        $("#username_").prop('disabled', false)
        $("#password_").prop('disabled', false)
        $("#email").prop('disabled', false)
        $("#phone").prop('disabled', false)
        $("#fullname").prop('disabled', false)
  })
})*/
</script>
<?php include("../main/footer.php"); ?>