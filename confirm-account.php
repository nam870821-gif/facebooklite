<?php
	ob_start();
	session_start();
	include('config.php');
    include_once('main/header.php'); 
    if(empty($username)){
        header("Location: $domain_url/dang-nhap");
        exit();
    }
    if($username && ($trangthai != 0) && ($avatar != 'data/none.jpg')){
        header("Location: trang-chu");
        exit();
    }
?>
<body>
<!-- Start wrapper-->
<?php 
if($username && ($_REQUEST['Home'] == 'profile')){ 
    include_once('main/core/navbar_user.php');
    }else if(empty($username) && ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/trang-chu') ){
        include_once('main/core/navbar_login.php');
    }else{
        include_once('main/core/navbar.php');
}
?>

<div class="container">
<div class="card m-3">
    <div class="card-body">
        <b><i class="fa fa-check-circle"></i> 
        <?php 
        if($avatar != 'data/none.jpg'){ 
        echo '<del>STEP 1: Tải lên ảnh đại diện</del> <br><h class="text-success">Đã Hoàn Thành</h>';
        }else{
        echo 'STEP 1: Tải lên ảnh đại diện <br><h class="text-danger">Chưa xong</h>';
        } 
        ?>
        </b>
        <div class="row updateprofile">
            <div class="col-8">
                <b>Tải ảnh đại diện lên</b>
                <p>Thêm ảnh để bạn bè dễ dàng nhận ra bạn.</p>
                <p></p>
                <?php if($avatar == 'data/none.jpg'){  ?>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="file-field">
                        <button type="button" class="btn btn-primary nuttheodoi waves-effect waves-light"><input name="image" type="file" id="image" />Thêm ảnh</button>
                    </div>
                </form>
                <?php } ?>
                <p></p>
            </div>
            <div class="col-4">
                <img src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" id="profilepicdemo" class="img-fluid" />
                
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
$("#image").change(function (){
        var form = $('#uploadimage')[0];
        var formData = new FormData(form);
        var get_image = $("#image").val();
        if(get_image.length !== ''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        })
        $.ajax({
        url: "API/api_image.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
        Data = JSON.parse(data);
        if(Data.type == 'error'){
           toarst(Data.type,Data.text,'')
           return false;
        }else if(Data.type == 'success'){
           $("#profilepicdemo").attr('src',''+Data.url+''); 
           toarst(Data.type,Data.text,'')
           return false;
        }else{
           $("#profilepicdemo").attr('src','<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>');
        }
        },
        error: function () {

        }
    })

    }else{
        toastr.warning('Bạn chưa tải ảnh lên');
        return false;
    }
})
})
</script>
<div class="card m-3">
    <div class="card-body">
        <b><i class="fa fa-check-circle"></i> 
        <?php 
        if($trangthai != 0){ 
        echo '<del>STEP 2: Xác nhận email tài khoản</del><br> <h class="text-success">Đã Hoàn Thành</h>';
        }else{
        echo 'STEP 2: Xác nhận email tài khoản<br> <h class="text-danger">Chưa xong</h>';
        } 
        ?>
        </b>
        <hr>
        <div class="mess-user-body" style="height:300px;overflow: auto;" id="panel">
            <div id="noti_1" class="media m-3">
                <div class="tinnhan">
                    <img class="card-img-65 d-none d-sm-block mess-user-none mb-0 " src="/img/support.svg"/>
                    <div class="mess-user-you bg-white" style="border: 1px solid green">
                       <span class="font-weight-bold text-success">Facebook</span>
                        <small>Ngay bây giờ</small>
                        <br>
                        <span class="mess-user-text"><b>Hệ thống sẽ gửi mã xác nhận tới email của bạn!!!!!</b></span>
                    </div>
                </div>
            </div>
            <!--/./-->
            <div id="noti_2" class="media m-3" >
                <div class="tinnhan">
                    <img class="card-img-65 d-none d-sm-block mess-user-none mb-0" src="img/support.svg"/>
                    <div class="mess-user-you bg-white" style="border: 1px solid green">
                       <span class="font-weight-bold text-success">Facebook</span>
                        <small>Ngay bây giờ</small>
                        <br>
                        <span class="mess-user-text">
                                <div id="loading_css" class="mt-1 text-left">
                                <div class="spinner-grow text-primary"></div>
                                <div class="spinner-grow text-success"></div>
                                <div class="spinner-grow text-info"></div>
                                <div class="spinner-grow text-warning"></div>
                                <div class="spinner-grow text-danger"></div>
                            </div>
                      </span>
                    </div>
                </div>
            </div>
            <!--/./-->
            <div id="noti_3" class="media m-3" style="display:none">
                <div class="tinnhan row">
                    <img class="card-img-65 d-none d-sm-block mess-user-none mb-0" src="img/support.svg"/>
                    <div class="mess-user-you bg-white" style="border: 1px solid green">
                       <span class="font-weight-bold text-success"><b>Hệ thống đã gửi 1 mã xác nhận tới email của bạn:</b> <code><?= $email ?></code></span>
                        <br>
                        <span class="mess-user-text">
                        <b class="text-danger">Trạng thái:</b> <span id="status">Xin hãy nhấn gửi mã bên dưới?</span>
                      </span>
                    </div>
                </div>
            </div>
         </div>
         <div id="form-confirm">
         <form action="javascript:volid()" method="POST">
            <div class="input-mess">
            <div class="input-group">
                <input type="text" id="code"  class="form-control feed-comment-input" placeholder="Nhập mã xác nhận của bạn..."/>
                <button id="submit-confirm" class="btn-floating deep-purple send-comment-btn waves-effect waves-light"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
        </div>
        </form>
        </div>
        <div id="form-change" style="display: none;">
         <form action="javascript:volid()" method="POST">
            <div class="input-mess">
            <div class="input-group">
                <input type="text" id="change"  class="form-control feed-comment-input" placeholder="Nhập email mới của bạn..."/>
                <button id="submit-change" class="btn-floating deep-purple send-comment-btn waves-effect waves-light"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
        </div>
        </form>
       </div>

        <div class="mt-4" id="btn-resend">
            <span class="dark-color d-inline-block line-height-2">Chưa có mã xác nhận? <a class="badge badge-info text-white" type="button" onclick="resend()" id="resend">Gửi lại!</a></span>
        </div>


    </div>
</div>
</div>
<script>
<?php if(isset($_GET['code'])){ ?>
$(document).ready(function(){
   $('#noti_1').hide();
   $('#noti_2').hide()
   $('#noti_3').show()
   $('#code').val(<?= $_GET['code']?>);
})
<?php }else{ ?>
$(document).ready(function(){
   resend()
})
<?php } ?>
function change(){
  $('#form-confirm').hide()
  $('#form-change').show()
}
$('#submit-change').click(function() {
    var email = $('#change').val();
    if(email == ''){
         toarst("error","Chưa điền email mới");
          return false;
    }
    $('#change').prop('disabled', true);
    $('#submit-change').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
    $.post('xuly/confirm.php', {
        type: 'change',
        email: email,
    }, function(data, status) {
           Data = JSON.parse(data);
          if(Data.url){
              setTimeout(() => { location.href = Data.url }, Data.time)
          }
          $('#change').prop('disabled', false);
          $('#submit-change').prop('disabled', false).html('Nhận mã')
          $('.ring-tone').html('<audio src="ring.mp3" autoplay></audio>')
          toarst(Data.type,Data.text,Data.title)
          return false;      
    })
})
$('#submit-confirm').click(function() {
    var macode = $('#code').val();
    if(macode == ''){
         toarst("error","Chưa điền mã xác nhận");
          return false;
    }
    $('#code').prop('disabled', true);
    $.post('xuly/confirm.php', {
        type: 'confirm',
        code: macode,
    }, function(data, status) {
           Data = JSON.parse(data);
          if(Data.url){
              setTimeout(() => { location.href = Data.url }, Data.time)
          }
          $('#code').prop('disabled', false);
          $('.ring-tone').html('<audio src="ring.mp3" autoplay></audio>')
          toarst(Data.type,Data.text,Data.title)
          return false;      
    })
})
function resend() {
    $('#noti_1').show()
    $('#noti_2').show()
    $('#noti_3').hide()
    $('#status').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
    $('#resend').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
    $.post('API/api_email.php', { confirm: '' }, function(data, status) {
      Data = JSON.parse(data);
      $('#status').text(Data.status)
      setTimeout(() => {
        $('#noti_1').fadeIn('slow').hide(); 
      },500);
      setTimeout(() => {
        $('#noti_2').fadeIn('slow').hide(); 
      },500);
      setTimeout(() => {
        $('#panel').css("height", "250px");
        $('.ring-tone').html('<audio src="ring.mp3" autoplay></audio>')
        $('#noti_3').fadeIn('slow').show();  
      },500);
      if(Data.delay){
          secondPassed(Data.delay)
      }else{
          $('#resend').prop('disabled', false).html('<i class="fa fa-check"></i> Nhấn để gửi lại');
      }
   })
}
function secondPassed(seconds) {
var minutes = Math.round((seconds - 30)/60);
var remainingSeconds = seconds % 60;
if (remainingSeconds < 10) {
remainingSeconds = "0" + remainingSeconds;  
}
if (seconds <= 0) {
  $('#btn-resend').show()
  $('#status').htm(NULL)
  $('#resend').prop('disabled', false).html('<i class="fa fa-check"></i> Nhấn để gửi lại');
} else {
  seconds--;
  countdownTimer(seconds)
  $('#status').prop('disabled', true).html("Xin chờ: <span class='text-danger font-weight-bold'>" + minutes + ":" + remainingSeconds+"</span> để gửi lại")
  $('#btn-resend').hide()
  //$('#resend')..prop('disabled', true).html("Xin chờ: <span class='text-danger font-weight-bold'>" + minutes + ":" + remainingSeconds+"</span>")
}
}
function countdownTimer(seconds){
  setTimeout('secondPassed('+seconds+')', 1000);
}
</script>
<?php include("main/footer.php"); ?>