<?php
if($_GET && isset($_GET['id']) ){ 
$uid = intval($_GET['id']);
$SQL_info = mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$uid'");
$data_profile = mysqli_fetch_object($SQL_info);
#Lấy username
$data_username = $data_profile->username;
#Lấy họ tên người dùng 
$data_fullname = $data_profile->fullname;
#Lấy UID
$data_id = $data_profile->id;
#Lấy ảnh bìa 
$data_background = $data_profile->background;
# Lấy ảnh đại diện
$data_avatar = $data_profile->avatar;
#Lấy trạng thái tài khoản
$data_trangthai = $data_profile->trangthai;
#-----------------------------------------
#Lấy tiểu sử
$data_tieu_su = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM user_status WHERE username = '$data_username'"));
#Lấy theo dõi
$data_follower = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM `log` WHERE uid = '$uid' AND username = '$username' "));
#Lấy bộ sưu tập
$data_anhnoibat = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username = '$data_username' "));
#--------------------------------------
$SQL_request = mysqli_query($kunloc,"SELECT * FROM request WHERE uid='$id_user' AND uid2 = '$data_id'");
$SQL_accept = mysqli_query($kunloc,"SELECT * FROM accept WHERE uid = '$data_id' AND uid2 = '$id_user'");
$SQL_frends  = mysqli_query($kunloc,"SELECT * FROM friends WHERE uid = '$id_user' AND uid2 = '$data_id'");
$SQL_frends2 = mysqli_query($kunloc,"SELECT * FROM friends WHERE uid = '$data_id' AND uid2 = '$id_user' ");
#Lấy danh sách lời mời
$request = mysqli_fetch_object($SQL_request);
#Lấy danh sách yêu cầu
$accept = mysqli_fetch_object($SQL_accept);
#Lấy danh sách bạn bè 1
$listfrends = mysqli_fetch_object($SQL_frends);
#Lấy danh sách bạn bè 2
$listfrends2 = mysqli_fetch_object($SQL_frends2);
#$check->id;
function getFbid($url,$kunloc){
    return $photo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM photo WHERE img_url = '$url'"));
}
if($data_trangthai == 'disabled'){ ?>
<title>Tài khoản đã bị vô hiệu hóa</title>
<div class="row text-center" style="margin-top: 6rem;">
 <div class="col-md-12">
     <h4>Tài khoản của người này đã bị vô hiệu hóa</h4>
</div>
</div> 
<?php }else if(empty($data_id)){ ?>
<title>Không tìm thấy tài khoản</title>
<div class="row text-center" style="margin-top: 6rem;">
 <div class="col-md-12">
     <h4>Không tìm thấy tài khoản</h4>
</div>
</div>
<?php }else{ ?>
<title><?= $data_fullname ?></title>
<style>
/*.chat-body {
    padding: 8px 15px;
    background: #ddddddab;
    color: #000;
    font-size: 15px;
    margin-top: 0px;
    align-self: center;
    display: block;
    border-right: 5px;
    border-radius: 20px;
    margin-bottom: 8px;
    width: auto;
}
.avatar-chat {
    width: 40px;
    float: left;
    margin-top: 0px!important;
    object-fit: cover;
    height: 40px;
    border-radius: 50%;
    border: 1px solid #d0d0d0;
}
.modal {
    top: 1%;
}*/
.mini-chat {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
}
@media only screen and (min-width:600px){
    .mini-chat {
    right:20%;
    height:450px;
    width:360px;
    overflow:auto;
    }
}
@media only screen and (max-width:600px){
    .mini-chat {
    height:360px;
    width:auto;
    overflow:auto;
    }
}
</style>
<!-- Modal 1 -->
<div class="modal modal-scrollings" id="modal-inbox" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-center" role="document">
        <div class="modal-content mini-chat">
            <div class="modal-body mess-user-body" style="height:400px;overflow:auto;" id="data-inbox"> 
            </div>
            <form action="javascript:volid()" method="POST">
              <div class="input-mess m-3">
                  <div class="input-group">
                      <input type="text" id="inbox" class="form-control feed-comment-input" placeholder="Nhập tin nhắn...">
                      <button type="submit" id="gui-inbox" class="btn-floating deep-purple send-comment-btn d-none"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
                  </div>

              </div>
              </form>
            <script>
            var user = <?= $data_id ?>;
            setInterval(() => {
                getMessenger(user)
            }, 1e3);
            function getMessenger(uid){
                $.post("API/api_inbox.php", {type: 'SEEN_MESS',uid: uid}, function(data){
                    $('#data-inbox').html(data)
                })
            }
              $('#gui-inbox').click(function(){
                var tinnhan = $('#inbox').val();
                var uid = user;
                if(tinnhan.length > 1000){
                    toastr.error('Chat không quá 1000 kí tự.');
                    return fasle;
                }
                if(tinnhan.length == 0){
                    toastr.error('Vui lòng nhập chat!');
                    return fasle;
                }
                
                $.post("API/api_inbox.php", {  
                    type: "INBOX",
                    mess: tinnhan,
                    uid: uid
                }, function(data){
                    $('#inbox').val('');
                    Data = JSON.parse(data);
                    toarst(Data.type,Data.text,Data.title)
                    return false;
                })
            }) 
        </script>
        </div>
    </div>
</div>
<!-- Modal 2 -->
<div class="modal fade modal-scrollings" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sides modal-bottom-center" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
            <h6 class="fb-post-title"> Báo cáo</h6>
            </div> 
            <div class="modal-body" id="data-report">
            
            <span>Vui lòng chọn vấn đề để tiếp tục</span>
            <p><span>Bạn có thể báo cáo trang cá nhân sau khi chọn vấn đề.</span></p>
            <br>
            <button class="button-report" id="report1" onclick="report1()">Giả mạo người khác</button>
            <button class="button-report" id="report2"  onclick="report2()">Tên giả mạo</button>
            <br>
            <from method="POST" action="javascript:void(0);" id="form1" style="display:none">
                <button class="button-report" id="me" onclick="me()">Tôi</button>
                <button class="button-report" id="you" onclick="you()">Khác</button>
                <div class="md-form">
                <input type="text" id="link1" style="display:none" class="form-control" placeholder="Điền url trang cá nhân bạn cho là giả mạo">
                </div>
                <div class="modal-footer">
                <button id="submit" class="float-right button-report active">Tiếp tục</button>
                </div>
            </from>
            <from method="POST" action="javascript:void(0);" id="form2" style="display:none">
                <div class="md-form">
                <input type="text" id="link2" class="form-control" placeholder="Điền url trang cá nhân bạn cho là tên giả mạo">
                </div>
                <div class="modal-footer">
                <button id="submit2" class="float-right button-report active">Tiếp tục</button>
                </div>
            </from>
            <div class="alert alert-secondary fade in alert-dismissible show mt-4" style="background-color:#f0f2f5">
            <i class="fas fa-exclamation-triangle"></i> Hãy liên hệ với cơ quan hành pháp tại khu vực bạn nếu ai đó đang gặp nguy hiểm.
            </div> 
            
            </div>
            <script>
            var user = '<?= $data_id ?>';
            var id_user = '4';
            function report1(){
                $("#form2").hide();
                $("#form1").show();
            }
            function report2(){
                $("#form1").hide();
                $("#form2").show();
            }
            function me(){
                $("#link1").hide();
                $("#me").addClass("active");
                $("#you").hide();
                $("#link1").val("profile.php?id="+id_user);
            }
            function you(){
                $("#link1").show();
                $("#you").addClass("active");
                $("#me").hide();
            }
            $("#submit").click(function(){
                var link1 = $("#link1").val();
                $.post("API/api_hotro.php",{
                        type: "Report",
                        lydo: '1',
                        link:link1,
                        uid2:user
                    },function(data){
                        Data = JSON.parse(data);
                        if(Data.type == 'success'){
                           kunloc_report = '<center><span class="report-success"><i class="fas fa-check mr-2"></i> Đã báo cáo</span></center>\n';
                           kunloc_report += '<p class="noti mt-2">Chúng tôi sử dụng ý kiến đóng góp của bạn để giúp hệ thống biết được khi có nội dung vi phạm.</p>\n';
                           $("#data-report").html(kunloc_report);
                        }
                        toarst(Data.type,Data.text);
                        return false;
                    })
            })
            $("#submit2").click(function(){
                var link2 = $("#link2").val();
                $.post("API/api_hotro.php",{
                        type: "Report",
                        lydo: '2',
                        link:link2,
                        uid2:user
                    },function(data){
                        Data = JSON.parse(data);
                        if(Data.type == 'success'){
                           kunloc_report = '<center><span class="report-success"><i class="fas fa-check mr-2"></i> Đã báo cáo</span></center>\n';
                           kunloc_report += '<p class="noti mt-2">Chúng tôi sử dụng ý kiến đóng góp của bạn để giúp hệ thống biết được khi có nội dung vi phạm.</p>\n';
                           $("#data-report").html(kunloc_report);
                        }
                        toarst(Data.type,Data.text);
                        return false;
                    })
            })
            </script>
        </div>
        
    </div>
</div>
<!-- Modal 3 -->
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-top-cennter" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="fb-post-title">Chỉnh sửa Trang cá nhân</h5>
      <b class="close-btn" class="close" data-dismiss="modal"><i class="close-modal"></i></b>
      </div>
      
       <div class="modal-body">
       <!--/./-->    
       <div class="row">
            <div class="col-md-9">
                <b>Ảnh đại diện</b>
            </div>
            <div class="col-md-3">
            <?php if($data_username == $username){ ?>
            <form id="update-avatar" action="javascript:void(0)" method="post" enctype="multipart/form-datas">
              <div class="file-field">
                <i class="fas fa-camera"><input type="file" name="image-update" id="image-update"></i>
                <a href="#">Thay đổi</a>
              </div>
          </form>
          <?php } ?>
            </div>
      </div>
      <div class="col-md-12">
         <div class="text-center">
           <img class="rounded-circle" id="about-avatar" src="<?php if($data_avatar == ''){ echo $avt_macdinh; }else{ echo $data_avatar; } ?>">
         </div>
     </div>
     <!--/./-->
     <!--/./-->    
       <div class="row">
            <div class="col-md-9">
                <b>Ảnh bìa</b>
            </div>
            <div class="col-md-3">
            <?php if($data_username == $username){ ?>
            <form id="update-background" action="javascript:void(0)" method="post" enctype="multipart/form-datas">
              <div class="file-field">
                <i class="fas fa-camera"><input type="file" name="background-update" id="background-update"></i>
                <a href="#">Thay đổi</a>
              </div>
          </form>
          <?php } ?>
            </div>
      </div>
      <div class="col-md-12">
         <div class="text-center">
           <div class="mt-3">
               <div id="about-background" style="<?php if($data_background != 'null'){ echo "background-image:url($data_background)"; }else{ echo "background-image: linear-gradient(180deg,#f0f2f5 79%,#6f6f6f);"; } ?>"></div>
           </div> 
     </div>
     <!--/./-->
     </div>
        
  </div>
</div>
</div>
</div>
<style>
#about-background{
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat, repeat;
    padding:20px;
    height:200px;
    width:100%;
    border-radius: 15px;
}
.rounded-circle {
    object-fit: cover;
    width: 140px;
    height: 140px;
    border: 50px;
}
@media only screen and (min-width:600px){
    .rounded-circle {
        border: solid 0px #6f6f6f2e;
    }
}
</style>
<script>
$(function() {
$("#background-update").change(function (){
        var form = $('#update-background')[0];
        var formData = new FormData(form);
        var get_image = $("#background-update").val();
        if(get_image.length !== ''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        })
        $.ajax({
        url: "API/api_bia.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
        Data = JSON.parse(data);
        if(Data.type == 'error'){
           toarst(Data.type,Data.text)
           return false;
        }else if(Data.type == 'success'){
           document.getElementById("about-background").style = 'background-image: url('+Data.url+');';
           toarst(Data.type,Data.text)
           return false;
        }else{
            document.getElementById("about-background").style = 'background-image: url(<?php if($bia == ''){ echo $bia_macdinh; }else{ echo $bia; } ?>)';
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
$("#image-update").change(function (){
        var form = $('#update-avatar')[0];
        var formData = new FormData(form);
        var get_image = $("#image-update").val();
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
           toarst(Data.type,Data.text)
           return false;
        }else if(Data.type == 'success'){
           $("#about-avatar").attr('src',''+Data.url+''); 
           toarst(Data.type,Data.text)
           return false;
        }else{
           $("#about-avatar").attr('src','data/none.jpg');
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
<!-- -->
<div class="mt-5 py-2 d-block d-sm-none"></div>
<!-- /./ -->
<div class="card-on py-5" id="bg-top" style="<?php if($data_background != 'null'){ echo "bbackground: linear-gradient(180deg,#919191bd 10%,#919191c2 1%,#ffffff 80%),url($data_background)"; } ?>">
</div>
<div class="row d-flex justify-content-center bg-fb">
<div class="col-md-6">
<div class="card testimonial-card">
<style>
#profilepicdemo {
    object-fit: cover;
    width: 100%;
    height: 164px;
    border: 0;
}

@media only screen and (min-width:600px){
    #profilepicdemo {
        border: solid 0px #6f6f6f2e;
    }
}
@media only screen and (max-width:600px){
    .btn.btn-sm {
        font-size:15px
    }
}
.btn.btn-sm {
  padding:.45rem 0.95rem;

}
</style>
<div class="card-up fb-background" id="background" style="<?php if($data_background != 'null'){ echo "background-image:url($data_background)"; } ?>"></div>
<div class="backgroundpicture">
<?php if($data_username == $username){ ?>
<form id="uploadbia" action="" method="post" enctype="multipart/form-data">
    <div class="file-field">
      <div class="themanhbia"><i class="fas fa-camera"></i> <b>Chọn ảnh bìa</b><input name="bg" type="file" id="bg"></div>
    </div>
    <!-- /./ -->
    </form>
    <?php } ?>
  <div class="avatar mx-auto white">
    <img dataa-fancybox="#avt" onclick="location.href='photo?fbid=<?= getFbid($data_avatar,$kunloc)->uid; ?>&pic=<?= getFbid($data_avatar,$kunloc)->fbid; ?>'" hhref="<?php if($data_avatar == ''){ echo $avt_macdinh; }else{ echo $data_avatar; } ?>" src="<?php if($data_avatar == ''){ echo $avt_macdinh; }else{ echo $data_avatar; } ?>" class="rounded-circle" id="profilepicdemo">
  </div>
  <?php if($data_username == $username){ ?>
    <form id="uploadimage" action="" method="post" enctype="multipart/form-datas">
      <div class="file-field">
      <span class="choose-avatar" id="choose-avatar">
        <i class="fas fa-camera"><input type="file" name="image" id="image"></i>
      </span>
      </div>
  </form>
  <?php } ?>
</div>
<script>
$(function() {
    $("#bg").change(function (){
        var form = $('#uploadbia')[0]; 
        var formData = new FormData(form);
        var get_image = $("#bg").val();
        if(get_image.length !== ''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        })
        $.ajax({
        url: "API/api_bia.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
        Data = JSON.parse(data);
        if(Data.type == 'error'){
           toarst(Data.type,Data.text)
           return false;
        }else if(Data.type == 'success'){
           document.getElementById("background").style = 'background-image: url('+Data.url+')';
           toarst(Data.type,Data.text)
           return false;
        }else{
            document.getElementById("background").style = 'background-image: url(<?php if($bia == ''){ echo $bia_macdinh; }else{ echo $bia; } ?>)';
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
           toarst(Data.type,Data.text)
           return false;
        }else if(Data.type == 'success'){
           $("#profilepicdemo").attr('src',''+Data.url+''); 
           toarst(Data.type,Data.text)
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
<!-- /./ -->
  <div class="card-body mb-1">
    <!--- name user -->
    <h4 class="card-title" style="margin-bottom:5px;font-weight:500!important">
      <?= $data_fullname ?> <?= verifed($data_profile->confirm_status); ?>
    </h4>
   <script>
    function NoFriends(uid) {
        $.post('API/api_friend.php',{
            type: "ON",
            uid: uid
        },function(data){
            Data = JSON.parse(data);
            //=============================
            if(Data.type == 'success'){
                $("#friends").html('Đã gửi lời mời')
                $("#nofriend").html('<i class="fas fa-user-check"></i> Đã gửi lời mời');
            }else if(Data.type == 'error'){
                $("#friends").html('Đã hủy lời mời')
                $("#nofriend").html('<i class="fas fa-user-check"></i> Đã hủy lời mời');
            }
            location.reload()
        })
    }
    function Friends(uid) {
        $.post('API/api_friend.php',{
            type: "OFF",
            uid: uid
        },function(data){
            Data = JSON.parse(data);
            //=============================
            if(Data.type == 'success'){
                $("#friends").html('Bạn bè')
                $("#friend").html('<i class="fas fa-user-check"></i> Bạn bè');
            }else if(Data.type == 'error'){
                $("#friends").html('Đã hủy kết bạn')
                $("#friend").html('<i class="fas fa-user-check"></i> Đã hủy kết bạn');
            }
            location.reload()
        })
    }
    </script>
    <div class="row">
    <div class="col-10 fb-panel d-block d-sm-none">
    <?php if($data_username != $username){
        if($request->uid == $id_user && $request->uid2 == $data_id){
            echo '<button type="button" id="nofriend" onclick="NoFriends('.$uid.')" class="btn btn-sm btn-block story waves-effect waves-light"><i class="fas fa-user-plus mr-1"></i> Đã gửi lời mời</button>';
        }else if($accept->uid2 == $id_user && $accept->uid == $data_id){
            echo '<button type="button" id="friend" onclick="Friends('.$uid.')" class="btn btn-sm btn-block story waves-effect waves-light"> <i class="fas fa-user-check mr-1"></i> Trả lời </button>';
        }else if(($listfrends->uid2 == $data_id)){
        echo '<div class="row">
		<div class="col-10 fb-panel">
		   <button type="button" class="btn btn-sm btn-block story" data-toggle="modal" data-target="#modal-inbox"><i class="fab fa-facebook-messenger"></i> Nhắn tin</button>
        </div>
        <div class="col-2  fb-panel">
		<div class="dropright">
        <a class="btn btn-sm baocao text-dark waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="">
        <i class="fas fa-user-check"></i></a>
        <div class="dropdown-menu dropdown-primary" style="width:auto" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus"></i> Hủy bỏ kết bạn với, <b>'.$data_fullname.'</b>.</a>
        </div></div></div>
        </div>';
        }else if(($listfrends2->uid == $data_id)){
        echo '<div class="row">
		<div class="col-10 fb-panel">
		   <button type="button" class="btn btn-sm btn-block story" data-toggle="modal" data-target="#modal-inbox"><i class="fab fa-facebook-messenger"></i> Nhắn tin</button>
        </div>
        <div class="col-2 fb-panel">
		<div class="dropright">
        <a class="btn btn-sm baocao text-dark waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="">
        <i class="fas fa-user-check"></i></a>
        <div class="dropdown-menu dropdown-primary" style="width:auto" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus"></i> Hủy bỏ kết bạn với, <b>'.$data_fullname.'</b>.</a>
        </div></div></div>
        </div>';
        }else{
            echo '<button type="button" id="nofriend" onclick="NoFriends('.$uid.')" class="btn btn-sm btn-block story waves-effect waves-light"><i class="fas fa-user-plus mr-1"></i> Thêm bạn bè</button>'; 
        }
    }else{ 
        echo '<button type="button" class="btn btn-sm btn-block story waves-effect waves-light"><i class="fas fa-plus-circle mr-2"></i>Thêm vào tin</button>';
    } 
    ?>
    </div>
    <div class="col-2 fb-panel d-block d-sm-none">
    <?php if($data_username != $username){ ?>
    <div class="dropright">
        <a class="btn btn-sm baocao text-dark waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="">
        <i class="fas fa-ellipsis-h"></i></a>
        <div class="dropdown-menu dropdown-primary" style="width:330px" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-dark" data-toggle="modal" data-target="#modal-report"><i class="fas fa-user-shield mr-2"></i> Báo cáo trang cá nhân này.</a>
            <a class="mt-2 dropdown-item text-dark" href="#"><i class="fas fa-user-lock mr-2"></i>  Chặn <b><?= $data_fullname ?></a>
        </div>
        </div>
    <?php }else{ ?>
        <button type="button" class="btn btn-sm baocao text-dark waves-effect waves-light"><i class="fas fa-ellipsis-h"></i></button>
    <?php } ?>
	</div>
	</div>
    <!-- /./ -->
    <?php if($data_tieu_su->status){ ?>
        <tieusu class="tieusu"><?= $data_tieu_su->status ?></tieusu><br>
    <?php }else{ ?>
        <span class="tieusu"></span>
    <?php } ?>
    <?php if($data_username == $username){ ?>
    <span type="button" onclick="status()" style="font-size:15px;color:#1b75f2"><b id="btn-status">Cập nhật tiểu sử</b></a>
    <!-- status -->
    <span id="edit-status" style="display:none;color:#65676b">
    <div class="form-group green-border-focus">
      <label class="">Cập nhật tiểu sử của bạn (tối đa 100 kí tự)</label>
      <textarea class="form-control form-control-status" id="status" rows="3"><?php if($data_tieu_su->status ){ echo $data_tieu_su->status; } ?></textarea>
    </div>
    <div class="btn-group btn-status">
      <button id="status_save" type="button" class="btn btn-primary">Lưu</button>
    </div>
    <script>
    function status(){
        $('#btn-status').hide();
        $('#edit-status').show();
        $('#choose-avatar').hide();
    }
    $("#status_save").click(function(){
        var noidung = $("#status").val();
        tieusu = noidung.trim()
        if(status.length > 100){
            toastr.error('Tiểu sử không quá 100 kí tự!');
            return false;
        }
        $.post("API/api_status.php",{captent: tieusu }, function(data, status){
            Data = JSON.parse(data);
            if(Data.type == 'success'){
               $('#btn-status').remove();  
               $('.tieusu').show()
               $('.tieusu').html(tieusu);
               //=============================
               $('#edit-status').hide();
               $('#choose-avatar').hide();
            }
            $('#btn-status').show();
            $('#choose-avatar').show();
            toarst(Data.type,Data.text,Data.title)
            return false;
        })
    })
    </script>
    <?php } ?>
    </span>
    </div>
    <hr class="d-none d-sm-block">
    <!-- Nav tabs -->
    <ul class="nav md-tabs menuprofile">
        <li class="nav-item waves-effect waves-light">
          <a class="nav-link active" data-toggle="tab" href="#baiviet">Bài viết</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#gioithieu">Giới thiệu</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" id="btn-banbe" href="#banbe">Bạn bè</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" id="btn-album" href="#album">Ảnh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Xem thêm <i class="ml-2 fas fa-caret-down"></i></a>
        </li>
        <li class="nav-item">
          <?php if($data_username != $username){
            if($request->uid == $id_user && $request->uid2 == $data_id){
                echo '<a  type="button" class="send-friend text-primary" style="background:#E7F3FF"  onclick="NoFriends('.$uid.')"><i class="fas fa-user-plus mr-2"></i><h id="friends">Đã gửi lời mời</h></a>';
            }else if($accept->uid2 == $id_user && $accept->uid == $data_id){
                echo '<a  type="button" class="send-friend text-primary" style="background:#E7F3FF" onclick="Friends('.$uid.')"><i class="fas fa-user-check mr-2"></i><h id="friends">Trả lời</h></a>';
            }else if(($listfrends->uid2 == $data_id)){
            echo '<div class="dropdown">
            <a type="button" class="send-friend" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-check"></i></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus mr-1"></i> Hủy kết bạn với, <b class="ml-1">'.$data_fullname.'</b>.</a>
                </div>
            </div>';
            }else if(($listfrends2->uid == $data_id)){
            echo '<div class="dropdown">
            <a type="button" class="send-friend" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-check"></i></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus mr-1"></i> Hủy kết bạn với, <b class="ml-1">'.$data_fullname.'</b>.</a>
                </div>
            </div>';
            }else{
                echo '<a type="button" class="send-friend text-primary" style="background:#E7F3FF" onclick="NoFriends('.$uid.')"><i class="fas fa-user-plus mr-2"></i><h id="friends">Thêm bạn bè</h></a>';
            }
        }else{
            echo '<a class="send-baocao"><i class="fas fa-ellipsis-h"></i></a>';
            echo '<a class="send-baocao"><i class="fas fa-search"></i></a>';
            echo '<a class="send-baocao"><i class="fas fa-eye"></i></a>';
            echo '<a class="send-baocao" type="button" data-toggle="modal" data-target="#edit-profile"><i class="fas fa-pen mr-2"></i> Chỉnh sửa trang...</a>';
        }
        ?>
        </li>
        <!-- /./ -->
         <?php if(($data_follower->uid == $uid) && ($data_username != $username)) { ?>
        <li class="nav-item">
            <a type="button" class="send-chat" data-toggle="modal" data-target="#modal-inbox"><img src="img/111xWLHJ_6m.png" alt="" height="16" width="16"></a>
        </li>
        <li class="nav-item">
            <a type="button" class="send-follow active" onclick="KiemtraFollower(<?= $uid ?>)"><img src="img/oABzID6cE5f.png" alt="" height="16" width="16"></a>
        </li>
        <?php }else if(($data_follower->uid) != $uid && ($data_username != $username)){ ?>
         <li class="nav-item">
            <a type="button" class="send-chat" data-toggle="modal" data-target="#modal-inbox"><img src="img/111xWLHJ_6m.png" alt="" height="16" width="16"></a>
        </li>
        <li class="nav-item">
            <a type="button" class="send-follow" onclick="KiemtraFollower(<?= $uid ?>)"><img src="img/oABzID6cE5f.png" alt="" height="16" width="16"></a>
        </li>
        <?php } ?>
        <?php if($data_username != $username){ ?>
        <li class="nav-item">
           <div class="dropdown">
           <a class="send-baocao" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-ellipsis-h"></i></a>
           <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-dark" data-toggle="modal" data-target="#modal-report"><img class="mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/y-/r/5F57WUIaMnv.png" alt="" height="20" width="20"> <h>Báo cáo trang cá nhân</h></a>
                    <a class="dropdown-item text-dark" href="#"><img class="mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yk/r/DrlMiDa6XlN.png" alt="" height="20" width="20"> Chặn</a>
              </div>
            </div>
         </li>
        <?php } ?>
    </ul>
    <script>
        function KiemtraFollower(uid) {
            $.post("API/api_follower.php",{
                type: "kiemtra",
                uid: uid
            },function(data){
                Data = JSON.parse(data);
                //=============================
                if(Data.type == 'success'){
                    $(".send-follow").removeClass('send-follow').addClass('send-follow active');
                    $("#follow2").html('Bỏ theo dõi');
                }else{
                    $(".send-follow").removeClass('send-follow active').addClass('send-follow');
                    $("#follow2").html('Theo dõi');
                }
                //toarst(Data.type,Data.text,Data.title)
                //return false;
            })
        }
    </script>
</div>
</div>
</div>

</div>
</div>
</div>
<!-- Tab panes -->
  <div class="tab-content m-0 p-0">
  <!-- Bài viết -->
  <div id="baiviet" class="tab-pane active">
  <div class="container">
  <div class="row d-flex justify-content-center">
  <?php if($data_username != $username){ ?>
	<div class="col-md-12 mt-2 body-feed body-follow">
    <div class="card">
        <div class="card-body phantheodoi">
    <b class="h5" style="font-weight: 600!important;">Bạn có biết <?= $data_fullname ?> không?</b>
    <h6 class="">Hãy gửi lời mời kết bạn để xem những gì anh ấy chia sẻ với bạn bè.</h6>
            <div class="anhtheodoi ">
                <?php $logfr = mysqli_query($kunloc,"SELECT * FROM `log` WHERE uid = '$data_id' AND type = 'sub' ");
                if(mysqli_num_rows($logfr) < 3): 
                $getinfo =mysqli_query($kunloc,"SELECT * FROM `account` ORDER BY RAND() LIMIT 0,2");
                while($listclone =  mysqli_fetch_object($getinfo)):
                if($listclone->id):
                echo "<img src='".$listclone->avatar."' class='rounded float-left' alt='".$listclone->fullname."' />";
                endif; endwhile;
                echo '<div><img style="filter: brightness(0.5);" src="img/admin.jpg" class="rounded float-left"><i class="fas fa-ellipsis-h bachamtheodoi"></i></div>';
                ?>
                <?php else: while($list = mysqli_fetch_object($logfr)): 
                $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM `account` WHERE username = '".$list->username."' "));
                ?>
                <img src="<?= $getinfo->avatar ?>" class="rounded float-left" alt="<?= $getinfo->fullname ?>" />
                <?php endwhile; 
                echo '<div><img style="filter: brightness(0.5);" src="img/admin.jpg" class="rounded float-left"/><i class="fas fa-ellipsis-h bachamtheodoi"></i></div>';
                endif; ?>
            </div>
    <div class="songuoitheodoi">
        <!--span class="ntheodoi"><b><?= number_format($data_profile->followers) ?> người</b> theo dõi.</span-->
        <span class="ntheodoi"><b style="font-size:0.955rem;color:#65676b">0 Bạn chung</b></span>
        <div class="nutfollow">
            <?php if($data_username != $username){
            if($request->uid == $id_user && $request->uid2 == $data_id){
                echo '<a  type="button" class="btn nuttheodoi text-primary" style="background:#E7F3FF"  onclick="NoFriends('.$uid.')"><i class="fas fa-user-plus mr-2"></i><h id="friends">Đã gửi lời mời</h></a>';
            }else if($accept->uid2 == $id_user && $accept->uid == $data_id){
                echo '<a  type="button" class="btn nuttheodoi text-primary" style="background:#E7F3FF" onclick="Friends('.$uid.')"><i class="fas fa-user-check mr-2"></i><h id="friends">Trả lời</h></a>';
            }else if(($listfrends->uid2 == $data_id)){
            echo '<div class="dropdown">
            <a type="button" class="btn nuttheodoi" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-check"></i> Bạn bè</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus mr-1"></i> Hủy kết bạn với, <b class="ml-1">'.$data_fullname.'</b>.</a>
                </div>
            </div>';
            }else if(($listfrends2->uid == $data_id)){
            echo '<div class="dropdown">
            <a type="button" class="btn nuttheodoi" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-check"></i> Bạn bè</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-dark" id="friend" onclick="Friends('.$uid.')"><i class="fas fa-user-plus mr-1"></i> Hủy kết bạn với, <b class="ml-1">'.$data_fullname.'</b>.</a>
                </div>
            </div>';
            }else{
                echo '<a type="button" class="btn nuttheodoi text-primary" style="background:#E7F3FF" onclick="NoFriends('.$uid.')"><i class="fas fa-user-plus mr-2"></i><h id="friends">Thêm bạn bè</h></a>';
            }
            }
            ?>
        </div>
    </div>
</div>

    </div>
</div>
<?php } ?>
<div class="col-md-4">
<div class="card mt-2 gioithieuprofile p-0 m-0">
  <div class="card-body p-2 m-2">
  <span class="tieudebox">Giới thiệu</span>
   <?php if($data_profile->noi_lam_viec != '0'){ ?>
   <div class="boxinfo mb-3">
      <div class="boximg">
          <icon class="truonghoc about"></icon>
          <span>Đã làm việc tại
          <b><?= $data_profile->noi_lam_viec; ?></b>
          </span>
      </div>
  </div>
  <?php }else if($data_username == $username){ ?>
    <div class="boxinfo mb-3">
      <div class="boximg">
        <i class="add-profile"></i> 
        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm nơi làm việc hiện tại</b></span>
    </div>
  </div>
 <?php } ?>
 <?php if($data_profile->noi_o_hien_tai != '0'){ ?>
  <div class="boxinfo mb-3">
      <div class="boximg">
          <icon class="home about"></icon>
        <span>Sống tại 
         <b><?= $data_profile->noi_o_hien_tai; ?></b>
        </span>
      </div>
  </div>
 <?php }else if($data_username == $username){ ?>
  <div class="boxinfo mb-3">
      <div class="boximg">
        <i class="add-profile"></i> 
        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm nơi ở hiện tại</b></span>
    </div>
  </div>
  <?php } ?>
  <?php if($data_profile->tinh_trang != '0'){ ?>
  <div class="boxinfo mb-3">
    <div class="boximg">
        <icon class="tinhtrang about"></icon>
        <span><?= $data_profile->tinh_trang; ?></span>
       </div>
  </div>
  <?php }else if($data_username == $username){ ?>
  <div class="boxinfo mb-3">
    <div class="boximg">
        <i class="add-profile"></i> 
        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm quan hệ hiện tại</b></span>
    </div>
  </div>
  <?php } ?>
  <?php if($data_profile->ngay_tham_gia != '0'){ ?>
   <div class="boxinfo">
      <div class="boximg"><icon class="ngaythamgia about"></icon><span>Tham gia vào tháng <?= date("m",$data_profile->ngay_tham_gia) ?> năm <?= date("Y",$data_profile->ngay_tham_gia) ?></div>
  </div>
  <?php } ?>
  <?php if($data_profile->followers != '0'){ ?>
  <div class="boxinfo mt-3">
      <div class="boximg"><icon class="follow about"></icon><span>Có <b><?= number_format($data_profile->followers) ?> người</b> theo dõi</span></div>
  </div>
  <?php } ?>
  <?php if($data_username == $username){ ?>
  <!-- /./ -->
  <div class="boxinfo">
  <button type="button" data-toggle="modal" data-target="#edit-about" class="mt-3 btn btn-lg btn-block chinhsua-btn waves-effect waves-light"> Chỉnh sửa chi tiết</button>
  </div>
  <?php } ?>
  <!-- /./ -->
  
  <?php $SQL = mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username='".$data_anhnoibat->username."'");
       while($echo_list = mysqli_fetch_object($SQL)){ 
          if(isset($echo_list->id)){
		 echo '<div class="card-noibat">
            <div class="card-body-noibat">
            <div class="anhnoibat">
            <div class="col-noibat">';
           if($echo_list->anh1 != '0'){
             $anh1 = "location.href='photo?fbid=".$data_anhnoibat->fbid."&pic=".getFbid($echo_list->anh1,$kunloc)->fbid."'";
             echo '<div class="col mt-3 mb-3">
              <img class="img-noibat" onclick="'.$anh1.'" src="'.$echo_list->anh1.'">
             </div>';
           }
            if($echo_list->anh2 != '0'){
              $anh2 = "location.href='photo?fbid=".$data_anhnoibat->fbid."&pic=".getFbid($echo_list->anh2,$kunloc)->fbid."'";
              echo '<div class="col mt-3 mb-3">
                <img class="img-noibat" onclick="'.$anh2.'" src="'.$echo_list->anh2.'">
                </div>';
            }
            if($echo_list->anh3 != '0'){
            $anh3 = "location.href='photo?fbid=".$data_anhnoibat->fbid."&pic=".getFbid($echo_list->anh3,$kunloc)->fbid."'";
            echo '<div class="col mt-3 mb-3">
            <img class="img-noibat" onclick="'.$anh3.'" src="'.$echo_list->anh3.'">
            </div>';
           }
         echo '</div></div></div></div>';
     }
     }
    ?>
  <?php if(($data_username == $username) && ($data_anhnoibat->anh1 == '0') && ($data_anhnoibat->anh2 == '0') && ($data_anhnoibat->anh3 == '0')){ ?>
  <div class="boxinfo">
  <button type="button" data-toggle="modal" data-target="#modal-anhnoibat" class="mt-2 btn btn-lg btn-block chinhsua-btn waves-effect waves-light"> Thêm 1 ảnh nổi bật</button>
  </div>
  <?php }else if($data_username == $username){ ?>
  <div class="boxinfo">
  <button type="button" data-toggle="modal" data-target="#modal-anhnoibat" class="mt-2 btn btn-lg btn-block chinhsua-btn waves-effect waves-light">Chỉnh sửa ảnh nổi bật</button>
  </div>
  <?php } ?>
   
</div>
</div>
<!-- /./ -->
<div class="card mt-2 gioithieuprofile p-0 m-0">
  <div class="card-body p-2 m-2">
    <span class="font-weight-bold mb-0">Ảnh</span><span type="button" onclick="$('#btn-album').click()" class="d-none d-sm-block float-right mr-3" style="color:hsl(214deg 89% 52%)">Xem tất cả</span>
    <div class="row mt-1 mb-2">
    <?php 
    $albums = mysqli_query($kunloc,"SELECT * FROM uploads WHERE username = '$data_username' ORDER BY id DESC LIMIT 0,3");
    if(mysqli_num_rows($albums) == 0): ?>
    <small>Chưa có ảnh nào.</small>
    <?php else: while ($data = mysqli_fetch_object($albums)): 
    ?>
    <div class="col-4 mt-1 p-auto">
        <img onclick="location.href='photo?fbid=<?= getFbid($data->img_url,$kunloc)->uid; ?>&pic=<?= getFbid($data->img_url,$kunloc)->fbid; ?>'" class="img-album" src="<?= $data->img_url ?>"/>
    </div> 
    <?php  endwhile; endif; ?>
  </div>
  
 </div>
</div>
<div class="card mt-2 gioithieuprofile p-0 m-0">
  <div class="card-body p-2 m-2">
    <span class="font-weight-bold mb-0">Bạn bè</span><span type="button" onclick="$('#btn-banbe').click()" class="d-none d-sm-block float-right mr-3" style="color:hsl(214deg 89% 52%)">Xem tất cả</span>
    <?php 
    $total_friend = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM friends WHERE username = '$data_username'"));
    if($total_friend >= 1){
        echo "<p class='mt-1 mb-0'><small>$total_friend người bạn</small></p>";
    }else{
        echo "<p class='mt-1 mb-0'><small>Chưa có bạn bè.</small></p>";
    }
    ?>
    <div class="row">
    <?php 
    $listfriend = mysqli_query($kunloc,"SELECT * FROM friends WHERE uid = '$data_id' ORDER BY RAND() LIMIT 0,9");
    if(mysqli_num_rows($listfriend) >= 1):
    while ($data_friend = mysqli_fetch_object($listfriend)): 
    $uid2 = $data_friend->uid2;
    $getinfofriend = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$uid2'"));
    ?>
    <div class="col-4 mt-1 p-auto">
      <a href="profile.php?id=<?= $getinfofriend->id ?>" target="_self">
                <img class="img-friend" src="<?= $getinfofriend->avatar ?>"/>
                </a>
      <div class="panel-footer font-weight-bold" style="width:100%;font-size:.853rem;"><?php if(strlen($getinfofriend->fullname) >= 13){ echo substr($getinfofriend->fullname,0,15)."..."; }else{ echo $getinfofriend->fullname; } ?> <?= verifed($getinfofriend->comfirm_status) ?></div>
    </div> 
    <?php  endwhile; endif; ?>
    </div>
  
   </div>
 </div>

</div>
<div class="modal fade modal-scrollings" id="modal-anhnoibat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sides modal-bottom-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="fb-post-title"><i class="fas fa-images"></i> Tạo bộ sưu tập</div>
                <b class="close-btn" data-dismiss="modal"><i class="close-modal"></i></b>
            </div>
            <div class="modal-body">
            <div class="row">
             <div class="col-sm-6">
     
              <div class="card-noibat" id="list-anhnoibat">
              <div class="card-body-noibat">
              <div class="anhnoibat">
              <div class="col-noibat row" id="scan-anhnoibat">
                <?php $SQL = mysqli_query($kunloc,"SELECT * FROM anhnoibat WHERE username='$username'");
                    while($echo_list = mysqli_fetch_object($SQL)){ 
                        if($echo_list->anh1 != '0'){
                        echo '
                        <div class="row" id="list_anh1">
                        <div class="col-10">
                        <img class="img-noibat" style="width:120px;height:120px"  src="'.$echo_list->anh1.'">
                        </div>
                        <div class="col-1">
                        <div class="btn-delete" type="button" onclick="move_anh(1)"><i class="fas fa-times"></i></div>
                        </div>
                        </div>
                        ';
                        }
                        if($echo_list->anh2 != '0'){
                        echo '<div class="row" id="list_anh2">
                        <div class="col-10">
                        <img class="img-noibat" style="width:120px;height:120px"  src="'.$echo_list->anh2.'">
                        </div>
                        <div class="col-1">
                        <div class="btn-delete" type="button" onclick="move_anh(2)"><i class="fas fa-times"></i></div>
                        </div>
                        </div>';
                        }
                        if($echo_list->anh3 != '0'){
                        echo '<div class="row" id="list_anh3">
                        <div class="col-10">
                        <img class="img-noibat" style="width:120px;height:120px"  src="'.$echo_list->anh3.'">
                        </div>
                        <div class="col-1">
                        <div class="btn-delete" type="button" onclick="move_anh(3)"><i class="fas fa-times"></i></div>
                        </div>
                        </div>';
                        }
                        if((empty($echo_list->anh1)) && (empty($echo_list->anh2)) && (empty($echo_list->anh3))){
                           #echo '<p class="text-center mb-4"><div class="col-sm-12">Chưa có ảnh nào</div></p>'; 
                        }
                    } 
                    ?>
                </div></div></div></div>
                </div>
                <div class="col-sm-6">
                <p class="mb-2 mt-4 text-center"><span>Tải lên tối đa <font color="red">3</font> ảnh.</span></p>
                <!-- /./ -->
                <form id="upanhnoibat" action="" method="post" enctype="multipart/form-datas">
                  <div class="file-field">
                    <button type="button" id="btn-up" class="btn anhnoibat-btn btn-lg btn-block waves-effect waves-light">
                    <input type="file" name="anh-noibat" id="anh-noibat"><i class="fas fa-cloud-upload-alt"></i> Tải ảnh lên</button>
                 </div> 
                 </form>
               </div>
            
            </div>
            </div> 
            <script>
            function move_anh(id){
                value = "anh"+id;
                $.post("API/api_move_anh.php",{ type:"MOVE", value: value}, function(data){
                    Data = JSON.parse(data);
                    if(Data.type == 'success'){
                        $("#list_"+value).remove();
                    }
                    toarst(Data.type,Data.text)
                    return false;
                })
            }
            $("#anh-noibat").change(function (){
                    var form = $('#upanhnoibat')[0];
                    var formData = new FormData(form);
                    var get_image = $("#anh-noibat").val();
                    if(get_image.length !== ''){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
                        }
                    })
                    $.ajax({
                    url: "API/api_anhnoibat.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                    kunloc_scan_anh = '';
                    Data = JSON.parse(data);
                    if(Data.type == 'success'){
                        $("#list-anhnoibat").show();
                        kunloc_scan_anh += '<div class="col">\n';
                        kunloc_scan_anh += '<img class="img-noibat"style="width:120px;height:120px" src="'+Data.url+'">\n';
                        //kunloc_scan_anh += '<div class="btn-delete" type="button"><i class="fas fa-times"></i></div>\n';
                        kunloc_scan_anh += '</div>\n';
                        $("#btn-up").css('margin-top','50px')
                    }
                    $("#scan-anhnoibat").append(kunloc_scan_anh)
                    toarst(Data.type,Data.text)
                    return false;
                    },
                    error: function () {
                        $("#list-anhnoibat").hide();
                        toarst(Data.type,Data.text)
                        return false;
                    }
                })
                }
            })
            </script>
        </div>
    </div>

</div>
<!-- /./ -->
<div class="col-md-6" id="body-feeder">
    
<!-- row -->
<div class="">
<div class="">
    <div class="">
        <div class="">
           
        </div>
    <div class="col-7 text-left">
         
    </div>
    </div>
</div>
</div>
<style>
.icon-blocked{
    float:center;
    margin-top:15px;
    margin-left:15px;
 }
@media screen and (max-width:600px){
 .icon-blocked{
    float: right;
    margin-top: 30px;
    margin-right: 15px;
 }
 .title-blocked{
    font-weight:700!important
 }
}
</style>
<!-- -->

<?php if($data_username == $username){ ?>
<!-- row -->
<div class="card mb-2">
  <div class="card-body khungpanel"> 
    <div class="row">
        <div class="col-1 fb-panel">
            <img src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" class="rounded float-left">
        </div>
    <div class="col-11 fb-panel">
       <input data-toggle="modal" data-target="#add-post" class="form-control form-control-lg ml-3" style="width:96%" type="text" placeholder="<?= $data_fullname ?> ơi, bạn đang nghĩ gì thế?">
    </div>
    </div>
</div>
<!-- /./ -->
<div class="col-md-12 d-none d-sm-block">
 <center><hr class="m-0 p-0" style="width:95%"></center>
  <div class="btn-group panelbtn" role="group">
     <button type="button" class="btn btn-rounded waves-effect"><i class="tructiep" role="img"></i> <b>Video trực tiếp</b></button>
    <button type="button" class="btn btn-rounded waves-effect dangcamxuc"><i class="upanh" role="img"></i> <b>Ảnh/Video</b></button>
    <button type="button" class="btn btn-rounded waves-effect"><i class="camxuc" role="img"></i> <b>Cảm xúc/Hoạt động</b></button>
  </div>
</div>
</div>
<!-- . -->
<!-- . -->
<?php } ?>
<div class="card mb-2">
    <div class="row pt-1 pl-2 pb-1">
        <div class="col-2">
           <div class="m-2 p-0 font-weight-bold">Bài viết</div>
        </div>
    <div class="col-10 text-right">
        <a class="btn btn-sm chinhsua-btn text-dark waves-effect waves-light"><i class="fas fa-stream"></i> Bộ lọc</a>
        <a class="btn btn-sm chinhsua-btn text-dark waves-effect waves-light"><i class="fas fa-cog"></i> Tùy chọn bài viết</a>
    </div>
    </div><!-- row -->
</div><!-- card -->
<div id="wrappers" class="scroller-wrappers">
        <div id="scrollers" class="scroller scroll-verticals">
            <div class="col-md-12 body-feed" id="load-post"></div>
    </div>
</div>

</div>
</div>
</div>
    
  </div>
    <!-- end Bài viết -->
    <!-- Giới thiệu -->
    <div id="gioithieu" class="tab-pane">
       <div class="container">
        <div class="row d-flex justify-content-center">
        <div class="col-md-10">
         <!-- /./ -->
        <div class="card mt-2 gioithieuprofile p-0 m-0">
          <div class="card-body p-2 m-1">
                 <!--div class="text-center m-4" id="loading_postS">
            <span class="spinner-border text-success spinner-border-sm m-auto"></span> <small class="ml-2">Đang tải</small>
        </div-->
        
        <div class="row">
            <style>
             .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #007fff;
                background-color: #E7F3FF;
                font-size: 0.955rem;
                font-weight: 450!important;
                border-radius: .45rem;
                padding: .35rem 0.55rem;
            }
            .nav-pills {
                font-size: 0.955rem;
                font-weight: 450!important;
            }
            .nav-text{
                margin-bottom: 4px;
                margin-right:4px;
                color: #65676b;
                font-size: 0.955rem;
                font-weight: 450!important;
            }
            .nav-text:hover {
                color: #65676b;
                background-color: #65676b26;
            }
            </style>
          <div class="col-4" style="border-right:solid 1px #80808054;">
            <a class="nav-link">
               <span class="font-weight-bold">Giới thiệu</span> 
            </a>
            
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active nav-text" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                aria-controls="v-pills-home" aria-selected="true">Tổng quan</a>
              <a class="nav-link nav-text" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                aria-controls="v-pills-profile" aria-selected="false">Công việc và học vấn</a>
              <a class="nav-link nav-text" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                aria-controls="v-pills-messages" aria-selected="false">Gia đình và các mối quan hệ</a>
              <a class="nav-link nav-text" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                aria-controls="v-pills-settings" aria-selected="false">Thông tin liên hệ cơ bản</a>
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content mt-0 pt-0" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <?php if($data_profile->noi_lam_viec != '0'){ ?>
                <div class="row">
                    <div class="col-10">
                        <div class="mb-4 mt-2">
                          <div class="boximg ">
                              <icon class="truonghoc about"></icon>
                              <span>Đã làm việc tại <?= $data_profile->noi_lam_viec; ?></span>
                          </div>
                      </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
              <?php }else if($data_username == $username){ ?>
               <div class="row">
                    <div class="col-10">
                      <div class="mb-4 mt-2">
                      <div class="boximg">
                        <i class="add-profile"></i> 
                        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm nơi làm việc hiện tại</b></span>
                    </div>
                  </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
             <?php } ?>
             <?php if($data_profile->noi_o_hien_tai != '0'){ ?>
             <div class="row">
                    <div class="col-10">
                      <div class="mb-4 mt-2">
                          <div class="boximg">
                              <icon class="home about"></icon>
                            <span>Sống tại 
                             <?= $data_profile->noi_o_hien_tai; ?>
                            </span>
                          </div>
                      </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
             <?php }else if($data_username == $username){ ?>
             <div class="row">
                    <div class="col-10">
                     <div class="mb-4 mt-2">
                      <div class="boximg">
                        <i class="add-profile"></i> 
                        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm nơi ở hiện tại</b></span>
                    </div>
                  </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
              <?php } ?>
              <?php if($data_profile->tinh_trang != '0'){ ?>
              <div class="row">
                    <div class="col-10">
                     <div class="mb-4 mt-2">
                    <div class="boximg">
                        <icon class="tinhtrang about"></icon>
                        <span><?= $data_profile->tinh_trang; ?></span>
                       </div>
                  </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
              
              <?php }else if($data_username == $username){ ?>
              <div class="row">
                    <div class="col-10">
                     <div class="mb-4 mt-2">
                     <div class="boximg">
                        <i class="add-profile"></i> 
                        <span type="button" data-toggle="modal" data-target="#edit-about" style="font-size:15px;color:#1b75f2"><b>Thêm quan hệ hiện tại</b></span>
                    </div>
                    </div>
                    </div>
                    <div class="col-1">
                        <span class="float-right m-1">
                          <img class="mt-2 mr-2" src="https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/BbjFLQTgwNE.png" alt="Công khai" height="16" width="16">  
                        </span>
                    </div>
                    <div class="col-1">
                        <span class="close-btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                </div>
              <?php } ?>
           <!-- /./ -->
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
          </div>
        </div>
        </div>
          </div>
          
        </div>
         
    </div>
    </div>

    </div>
    <!-- end Giới thiệu -->
    <!-- Ảnh -->
    <div id="album" class="tab-pane">
    <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
        <!-- /./ -->
        <div class="card mt-2 gioithieuprofile p-0 m-0">
          <div class="card-body p-2 m-1">
            <span class="font-weight-bold mb-0">Ảnh</span>
            <?php 
            $total_albums = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM uploads WHERE username = '$data_username'"));
            if($total_albums > 0):
                echo "<small>$total_albums hình ảnh.</small>";
            endif;
            ?>
            <div class="row mt-1 mb-2">
            <?php 
            $albums = mysqli_query($kunloc,"SELECT * FROM uploads WHERE username = '$data_username' ORDER BY id DESC");
            if(mysqli_num_rows($albums) == 0): ?>
            <small>Chưa có ảnh nào.</small>
            <?php else: while ($data = mysqli_fetch_object($albums)): 
            ?>
            
            <div class="col-2 m-2">
               <img onclick="location.href='photo?fbid=<?= getFbid($data->img_url,$kunloc)->uid; ?>&pic=<?= getFbid($data->img_url,$kunloc)->fbid; ?>'" class="list-album" src="<?= $data->img_url ?>"/>
            </div> 
            <?php  endwhile; endif; ?>
          </div>

         </div>
        </div>
       <!-- /./ -->
      </div>
    </div>   
    </div>   

    </div>
    <!-- end Ảnh -->
    <!-- Bạn Bè -->
    <div id="banbe" class="tab-pane">
       <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
        <!-- /./ -->
        <div class="card mt-2 gioithieuprofile p-0 m-0">
         <div class="card-body p-2 m-1">
         <span class="font-weight-bold mb-0">Bạn bè</span>
        <?php 
        $total_friend = mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM friends WHERE username = '$data_username'"));
        if($total_friend >= 1){
            echo "<small>$total_friend người bạn</small>";
        }else{
            echo "<small>Chưa có bạn bè.</small>";
        }
        ?>
        <div class="row mt-1 mb-2">
        <?php 
        $listfriend = mysqli_query($kunloc,"SELECT * FROM friends WHERE username = '$data_username' ORDER BY RAND()");
        if(mysqli_num_rows($listfriend) >= 1):
        while ($data_friend = mysqli_fetch_object($listfriend)): 
        $uid2 = $data_friend->uid2;
        $getinfofriend = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$uid2'"));
        ?>
        <!-- user -->
         <div class="col-6 mt-2" style="border:solid 0.1px #6f6f6f1f;border-radius: 10px;">
             <div class="row row pl-2 pr-3 pt-2 pb-2">
             <div class="col-sm-10" type="button" onclick="location.href='profile.php?id=<?= $getinfofriend->id ?>'">
                 <div class="row">
                  <div class="col-sm-4">
                      <img class="img-friend" src="<?= $getinfofriend->avatar ?>" />
                  </div>
                   <div class="col-sm-8">
                       <div class="profilebn row"><h class="tenbn"><?= $getinfofriend->fullname ?> <?= verifed($getinfofriend->comfirm_status) ?></h></div>
                      <b class="textbn">0 Bạn chung.</b>
                  </div>
                 </div>
                 
             </div>
             <div class="col-sm-2">
                 <?php if($data_id == $id_user){ ?>
                 <div class="dropdown nav-link">
                <a type="button" class="baocao" style="padding:.45rem;font-size:0.800rem" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bạn bè</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-dark" id="friend" onclick="Friends(<?= $getinfofriend->id ?>)"><i class="fas fa-user-plus mr-1"></i> Hủy kết bạn.</a>
                    </div>
                </div>
                <?php } ?>
             </div>
             
        </div>
        </div> 
        <?php  endwhile; endif; ?>
       <!-- /./ -->
      </div>
    </div>   
    </div>   
    
    </div>
    <!-- end Bạn Bè -->
    
</div>
</div>
<script>
var user =  <?= $data_id ?>;
$(document).ready(function(){
    load()
})
function load(){
    kunloc_load = '<div class="card mb-2"><div class="card-body p-0">\n';
    kunloc_load += '<div class="_2iwo _5usc" data-testid="fbfeed_placeholder_story">\n';
    kunloc_load += '<div class="_2iwq">\n';
    kunloc_load += '<div class="_2iwr"></div>\n';
    kunloc_load += '<div class="_2iws"></div>\n';
    kunloc_load += '<div class="_2iwt"></div>\n';
    kunloc_load += '<div class="_2iwu"></div>\n';
    kunloc_load += '<div class="_2iwv"></div>\n';
    kunloc_load += '<div class="_2iww"></div>\n';
    kunloc_load += '<div class="_2iwx"></div>\n';
    kunloc_load += '<div class="_2iwy"></div>\n';
    kunloc_load += '<div class="_2iwz"></div>\n';
    kunloc_load += '<div class="_2iw-"></div>\n';
    kunloc_load += '<div class="_2iw_"></div>\n';
    kunloc_load += '<div class="_2ix0"></div>\n';
    kunloc_load += '</div><br>\n';
    kunloc_load += '<div class="_2iwq" style="height:220px"></div><br>\n';
    
    kunloc_load += '<div class="_2iwq">\n';
    kunloc_load += '<div class="_2iwx" style="height:80px"></div>\n';
    kunloc_load += '<div class="_2iwr" style="height:80px"></div>\n';
    kunloc_load += '<div class="_2iwt" style="height:0"></div>\n';
    kunloc_load += '<div class="_2iwv" style="height:0"></div>\n';
    kunloc_load += '</div>\n';

    kunloc_load += '</div>\n';
    kunloc_load += '</div></div>\n';
    $("#load-post").html(kunloc_load);
    setTimeout(function() {
         getPost()
     }, 1000);
}
function getPost(){
$.post("API/api_get_post.php", { type: 'GET_PROFILE', uid: user }, function(data){
Data = JSON.parse(data);
kunloc = '';
if(Data == null || Data == '' || !Data.length){
    $("#load-post").html('<center class="m-2 mt-4" style="color:#65676b;font-size:1.25rem;font-weight:600!important">Không có bài viết</center>');
    $("#loading_post").hide()
    return fasle;
}
for(var i=0;i<Data.length;i++){
    type = Data[i].type;
    var username = Data[i].username;
    var id = Data[i].id;
    var fullname = Data[i].fullname;
    var avatar = Data[i].avatar;
    var background = Data[i].background;
    var uid = Data[i].uid;
    var text = Data[i].text;
    var photo = Data[i].photo;
    var like = Data[i].like;
    var status_like = Data[i].status_like;
    var cmt = Data[i].cmt;
    var share = Data[i].share;
    var date = Data[i].date;
    var session_avatar = Data[i].session_avatar;
    var session_verify = Data[i].session_verify;
    var session_admin = Data[i].session_admin;
    var public = Data[i].public;
    var profile = "'profile.php?id="+id+"'";
    var story = "'story.php?fbid="+uid+"'";
    if(type == 'avatar'){
        kunloc += '<div class="card mb-2">\n';
        kunloc += '<div class="card-body p-0">\n';
        kunloc += '<div class="feed postc pb-0">\n';
        //---------------------------------
        kunloc += '<div class="feed-header">\n';
        kunloc += '<img src="'+avatar+'" class="mt-1 rounded float-left img mr-2" type="button" onclick="location.href='+profile+'">\n';
        kunloc += '<div class="row">\n';
        kunloc += '<div class="col-11">\n';
        if(session_verify){
        kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+' '+session_verify+'\n';
        kunloc += '<h class="text-update ml-auto" style="color:#6d6d6d"> đã cập nhật ảnh đại diện của mình.</h></span>\n';
        }else{
        kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+'\n';
        kunloc += '<h class="text-update ml-auto" style="color:#6d6d6d"> đã cập nhật ảnh đại diện của mình.</h></span>\n';
        } 
        kunloc += '<b class="time-post">'+date+' <span aria-hidden="true"> · </span> <i class="public-icon" role="img"></i> </b>\n';
        kunloc += '</div>\n';
        kunloc += '<div class="col-1 text-right">\n';
        if(session_admin){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }else if(public == 'true'){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }
        kunloc += '</div>\n';
    
        kunloc += '</div></div>\n';
        //---------------------------------
        kunloc += '<div class="post-body">\n';
    
        if(text != 'null'){
        kunloc += '<div class="post-captent ml-3 font-size-20" type="button" conclick="location.href='+story+'">'+text+'</div>\n';
        }
        kunloc += '<div class="update-card">\n'; 
        if(background != 'null'){
            kunloc += '<div class="card-up change-background" style="background-image:url('+background+');background-size:cover;background-repeat:no-repeat;background-position:center;"></div>\n';
        }else{
            kunloc += '<div class="card-up change-background"></div>\n';
        }
        kunloc += '<div class="avatar mx-auto white">\n'; 
        kunloc += '<img src="'+avatar+'" class="rounded-circle">\n'; 
    	kunloc += '</div>\n'; 
        kunloc += '<div class="card-body"></div>\n'; 
        kunloc += '</div>\n';  
      
    }else if(type == 'background'){
        kunloc += '<div class="card mb-2">\n';
        kunloc += '<div class="card-body p-0">\n';
        kunloc += '<div class="feed postc pb-0">\n';
        //---------------------------------
        kunloc += '<div class="feed-header">\n';
        kunloc += '<img src="'+avatar+'" class="mt-1 rounded float-left img mr-2" type="button" onclick="location.href='+profile+'">\n';
        kunloc += '<div class="row">\n';
        kunloc += '<div class="col-11">\n';
        if(session_verify){
            kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+' '+session_verify+'\n';
            kunloc += '<h class="text-update ml-auto" style="color:#6d6d6d"> đã cập nhật bìa của mình.</h></span>\n';
        }else{
            kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+'\n';
            kunloc += '<h class="text-update ml-auto" style="color:#6d6d6d"> đã cập nhật bìa của mình.</h></span>\n';
        }
        kunloc += '<b class="time-post">'+date+' <span aria-hidden="true"> · </span> <i class="public-icon" aria-label="Đã chia sẻ với Công khai" role="img"></i> </b>\n';
        kunloc += '</div>\n';
        kunloc += '<div class="col-1 text-right">\n';
        if(session_admin){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }else if(public == 'true'){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }
        kunloc += '</div>\n';
    
        kunloc += '</div></div>\n';
        //---------------------------------
        kunloc += '<div class="post-body">\n';
        if(text != 'null'){
        kunloc += '<div class="post-captent ml-3 font-size-20" type="button" conclick="location.href='+story+'">'+text+'</div>\n';
        }
        if(photo){
          kunloc += '<div class="row update-card">\n'; 
          for(var j = 0; j < photo.length;j++){
            var image = photo[j].image;
            var fbid = photo[j].fbid;
            var viewphoto = "'photo?fbid="+uid+"&pic="+fbid+"'";
            kunloc += '<div class="card-up change-background">\n'; 
            kunloc += '<img onclick="location.href='+viewphoto+'" src="'+image+'" class="img-post">\n'; 
            kunloc += '</div>\n'; 
          }
          kunloc += '</div>\n'; 
        }
        kunloc += '</div>\n';    
        
    }else if(type == 'post'){
        kunloc += '<div class="card mb-2">\n';
        kunloc += '<div class="card-body p-0">\n';
        kunloc += '<div class="feed postc pb-0">\n';
        //---------------------------------
        kunloc += '<div class="feed-header">\n';
        kunloc += '<img src="'+avatar+'" class="mt-1 rounded float-left img mr-2" type="button" onclick="location.href='+profile+'">\n';
        kunloc += '<div class="row">\n';
        kunloc += '<div class="col-11">\n';
        if(session_verify){
            kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+' '+session_verify+'\n';
        }else{
            kunloc += '<span class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+'\n';
        }
        kunloc += '<b class="time-post">'+date+' <span aria-hidden="true"> · </span> <i class="public-icon" aria-label="Đã chia sẻ với Công khai" role="img"></i> </b>\n';
        kunloc += '</div>\n';
        kunloc += '<div class="col-1 text-right">\n';
        if(session_admin){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }else if(public == 'true'){
            kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
        }
        kunloc += '</div>\n';
    
        kunloc += '</div></div>\n';
        //---------------------------------
        kunloc += '<div class="post-body">\n';
        if(text != 'null'){
        kunloc += '<div class="post-captent ml-3 font-size-20" type="button" conclick="location.href='+story+'">'+text+'</div>\n';
        }
        if(photo){
          kunloc += '<div class="row">\n'; 
          for(var j = 0; j < photo.length;j++){
            var image = photo[j].image;
            var fbid = photo[j].fbid;
            var viewphoto = "'photo?fbid="+uid+"&pic="+fbid+"'";
            kunloc += '<div class="col">\n'; 
            kunloc += '<img onclick="location.href='+viewphoto+'" src="'+image+'" class="img-post">\n'; 
            kunloc += '</div>\n'; 
          }
          kunloc += '</div>\n'; 
        }
        kunloc += '</div>\n';
    }
    kunloc += '<div class="thongke">\n';
    kunloc += '<div class="reaction">\n';
    kunloc += '<div class="ml-auto">\n';
    
    kunloc += '<img class="j1lvzwm4" height="18" src="img/button/like.svg" width="18">\n';
    kunloc += '<img class="j1lvzwm4" height="18" src="img/button/care.svg" width="18">\n';
    kunloc += '<img class="j1lvzwm4" height="18" src="img/button/haha.svg" width="18">\n';
   
    if(like > 1){
        kunloc += '<span id="total_like_'+uid+'">'+like+'</span>\n'; 
    }else{
        kunloc += '<span id="total_like_'+uid+'">'+like+'</span>\n';
    }
    kunloc += '<span class="binhluan">'+cmt+' bình luận</span>\n';
    kunloc += '<hr>\n';
    kunloc += '</div>\n';
    var post = "'"+uid+"'";
    kunloc += '<div class="row feed-like-cmt-share">\n';
    if(status_like !== '1') {
    kunloc += '<div class="col-4" onclick="like('+uid+')">\n';
    kunloc += '<i class="like-btn" id="like_'+uid+'" role="img"></i> <b id="b_'+uid+'" class"btn-like">Thích</b>\n';
    kunloc += '</div>\n';
    }else{
    kunloc += '<div class="col-4" onclick="like('+uid+')">\n';
    kunloc += '<i class="like-btn active" id="like_'+uid+'" role="img"></i> <b id="b_'+uid+'" class="btn-like active">Thích</b>\n';
    kunloc += '</div>\n';
    }

    kunloc += '<div class="col-4" onclick="location.href='+story+'">\n';
    kunloc += '<i class="cmt-btn" role="img"></i> <b>Bình luận</b>\n';
    kunloc += '</div>\n';
    kunloc += '<div class="col-4" onclick="location.href='+story+'">\n';
    kunloc += '<i class="share-btn" role="img"></i> <b>Chia sẻ</b>\n';
    kunloc += '</div>\n';
    kunloc += '</div>\n';

    kunloc += '<div class="comments">\n';
    kunloc += '<div id="form-comment-'+uid+'">\n';
    GetListComment(uid)
    kunloc += '</div>\n';
    
    kunloc += '<form action="javascript:void(0)" method="POST">\n';
    kunloc += '<div class="media d-block d-md-flex mt-3">\n';
    kunloc += '<div class="input-group">\n';
    kunloc += '<img class="card-img-64 d-flex mx-auto mb-3" style="margin-top: 0!important" src="'+session_avatar+'">\n';
    kunloc += '<input type="text" class="form-control feed-comment-input" placeholder="Viết bình luận..." id="noidung_'+uid+'" required>\n';
    kunloc += '<button id="cmt_'+uid+'" onclick="sendCommment('+uid+')" class="btn-floating deep-purple send-comment-btn d-none">\n';
    kunloc += '<i class="fas fa-angle-double-right" aria-hidden="true"></i></button>\n';
    kunloc += '</div>\n';
    kunloc += '</div>\n';
    kunloc += '</form>\n';
    
    kunloc += '</div></div></div></div></div></div></div>\n';
    if(Data.length > 5){
       $("#load-post").css('height','800px').css('overflow','auto');
    }else{
       $("#load-post").css('height','auto').css('overflow','auto');
    }
    //kunloc += ' <article class="mam bg-1 brm">\n';
    //kunloc += '</article>\n';
    }
    $('#loading_post').hide();
    $("#load-post").html(kunloc);
})
}

function like(uid){
    $.post("API/api_like.php",{ type: 'kiemtra', uid: uid }, function(data){
    Data = JSON.parse(data);
                if(Data.type == 'success'){
                    $("#like_"+uid).removeClass('like-btn').addClass('like-btn active');
                    $("#b_"+uid).removeClass('btn-like').addClass('btn-like active');
                    $("#total_like_"+uid).text(Data.total);
                    
                }else{
                   $("#like_"+uid).removeClass('like-btn active').addClass('like-btn');
                   $("#b_"+uid).removeClass('btn-like active').addClass('btn-like');
                   $("#total_like_"+uid).text(Data.total);
                }
              
    })
}
function GetListComment(uid){
    $.post("API/api_get_post.php",{ type: 'GET_CMT', uid: uid }, function(data){
    Data = JSON.parse(data);
    kunloc_cmt = '';
    for(var x = 0; x < Data.length; x++){           
        var id_cmt = Data[x].id;
        var uid_cmt = Data[x].uid;
        var fullname_cmt = Data[x].fullname;
        var username_cmt = Data[x].username;
        var noidung_cmt = Data[x].text;
        var avatar_cmt = Data[x].avatar;
        var session_verify =  Data[x].session_verify;
        var session_avatar = Data[x].session_avatar;

        var replay = Data[x].replay;
        var time = Data[x].time;
        var keycode = Data[x].keycode;
        var code = "'"+keycode+"'";
        var profile = "'profile.php?id="+id_cmt+"'";
        //========================================================
        kunloc_cmt += '<li class="list-group" style="animation-duration: 1.'+x+'s;animation-name:fadeIn;">\n';
        kunloc_cmt += '<div class="media d-block d-md-flex" id="d-none">\n';
        kunloc_cmt += '<img class="card-img-64 d-flex mx-auto mb-3" src="'+avatar_cmt+'" type="button" onclick="location.href='+profile+'">\n';
        kunloc_cmt += '<div class="media-body text-center text-md-left ml-md-3 ml-0">\n';
        kunloc_cmt += '<div class="comment-text">\n';
        if(session_verify){
            kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+fullname_cmt+' '+session_verify+'</p>\n';
        }else{
            kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+fullname_cmt+'</p>\n';
        }
        kunloc_cmt += '<span class="mb-1">'+noidung_cmt+'</span></div>\n';
        kunloc_cmt += '<div class="input-rep mb-2"><div class="replay">\n';
        kunloc_cmt += '<div style="color:#65676b"><b type="button">Thích</b> · <b type="button" onclick="sendReplay('+code+')">Trả lời</b> · <h>'+time+'</h></div>\n';
        kunloc_cmt += '</div></div>\n';
        //=======================================
        if(replay != null){
            for (var i=0;i < Data[x].replay.length; i++){
            rep_noidung = Data[x].replay[i].text;
            rep_avatar = Data[x].replay[i].avatar;
            rep_fullname = Data[x].replay[i].fullname;
            rep_id = Data[x].replay[i].id;
            rep_time = Data[x].replay[i].time;
            rep_session_verify = Data[x].replay[i].session_verify;
            rep_profile = "'profile.php?id="+rep_id+"'";
            //========================================================
            kunloc_cmt += '<div class="input-rep" style="animation-duration: 1.'+i+'s;animation-name:fadeIn;">\n';
            kunloc_cmt += '<img class="card-img-64" src="'+rep_avatar+'" type="button" onclick="location.href='+rep_profile+'">\n';
            kunloc_cmt += '<div class="comment-text-replay">\n';
            if(session_verify){
                kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+rep_fullname+' '+rep_session_verify+'</p>\n';
            }else{
                kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+rep_fullname+'</p>\n';
            }
            kunloc_cmt += '<span class="mb-2">'+rep_noidung+'</span></div>\n';
            kunloc_cmt += '<div class="replay pl-5">\n';
            kunloc_cmt += '<div style="color:#65676b"><b type="button">Thích</b> · <h>'+rep_time+'</h></div>\n';
            kunloc_cmt += '</div>\n';
            
            kunloc_cmt += '</div>\n';
            }
        }
        //========================================================
        kunloc_cmt += '<div class="traloicmt" id="rep_'+keycode+'" style="display:none">\n';
        kunloc_cmt += '<form action="javascript:void(0)" method="POST">\n';
        kunloc_cmt += '<div class="mt-0 mb-3 mr-3">\n';
        kunloc_cmt += '<img class="card-img-64 d-flex mx-auto" src="'+session_avatar+'">\n';
        kunloc_cmt += '<input type="text" id="noidung_'+keycode+'" class="feed-comment-replay-input form-control" placeholder="Viết bình luận...">\n';
        kunloc_cmt += '<button id="replay_'+keycode+'" onclick="sendReplayCommment('+uid+','+code+')" class="btn-floating deep-purple send-comment-btn d-none"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>\n';
        kunloc_cmt += '</div></div>\n';
        kunloc_cmt += '</form>\n';
        
        kunloc_cmt += '</div>\n';
        kunloc_cmt += '</li>\n';
        kunloc_cmt += '</div>\n';
        kunloc_cmt += '</div>\n';
    }
    $("#form-comment-"+uid).html(kunloc_cmt);
})
}

function sendReplay(keycode){
    $("#rep_"+keycode).show()
}
function sendCommment(uid){
    var noidung = $("#noidung_"+uid).val();
    if(noidung.length > 1000){
        toastr.error('Comment không quá 1000 kí tự.');
        return fasle;
    }
    if(noidung.length == 0){
        toastr.error('Vui lòng nhập comment!');
        return fasle;
    }
    $("#noidung_"+uid).val('');
    $("#noidung_"+uid).prop('disabled',true);
    $("#cmt_"+uid).prop('disabled',true);
    $.post("API/api_send_comment.php",{
        type: "SEND",
        text: noidung,
        uid: uid
    },  function(data, status){
     Data = JSON.parse(data);
     if(Data.type == 'success'){
        GetListComment(uid)
        $("#noidung_"+uid).prop('disabled',false);
        $("#cmt_"+uid).prop('disabled', false);
     }else{
        $("#noidung_"+uid).prop('disabled',false);
        $("#cmt_"+uid).prop('disabled',false);
     }
  });
    
}
function sendReplayCommment(uid,code){
    var noidung = $("#noidung_"+code).val();
    if(noidung.length > 1000){
        toastr.error('Comment không quá 1000 kí tự.');
        return fasle;
    }
    if(noidung.length == 0){
        toastr.error('Vui lòng nhập comment!');
        return fasle;
    }
    $("#noidung_"+code).val('');
    $("#noidung_"+code).prop('disabled',true);
    $("#replay_"+code).prop('disabled',true);
    $.post("API/api_send_comment.php",{
        type: "REP",
        text: noidung,
        keycode:code,
        uid: uid
    },  function(data, status){
     Data = JSON.parse(data);
     GetListComment(uid)
     if(Data.type == 'success'){
        $("#noidung_"+code).prop('disabled',false);
        $("#replay_"+code).prop('disabled', false);
     }else{
        $("#noidung_"+code).prop('disabled',false);
        $("#replay_"+code).prop('disabled',false);
     }
  });
    
}

function TuyChon(uid){
    $.post("API/api_get_post.php",{ type: 'GET_DATA', uid: uid }, function(data){
    Data = JSON.parse(data);
    kunloc_tuychon = '';
    kunloc_edit = '';
    kunloc_def = '';
    for(var x = 0; x < Data.length; x++){           
        id_post = Data[x].id;
        uid_post = Data[x].uid;
        username_post = Data[x].username;
        noidung = Data[x].text;
        like = Data[x].like;
        cmt = Data[x].cmt;
        share = Data[x].share;
        if(id_post){
            $('#btn-tuy-chon').click()
            kunloc_tuychon += '<label class="mdb-main-label active">Chỉnh sửa nội dung</label>\n';
            kunloc_tuychon += '<button type="button" onclick="chinhsua('+uid+');" class="m-1 btn btn-prmary btn-lg btn-block chinhsua-btn blue waves-effect waves-light"><i class="fas fa-edit"></i> Chỉnh sửa bài viết!</button>\n';
            kunloc_edit += '<div class="list-group-flush m-2">\n';
            kunloc_edit += '<form action="javascript:voild()" method="POST">\n';
            kunloc_edit += '<div class="input-group">\n';
            kunloc_edit += '<textarea col="50" rows="6" class="form-control add-post-input" id="update-noidung">'+noidung+'</textarea>\n';
            kunloc_edit += '</div>\n';
            kunloc_edit += '<button id="update-post" onclick="UpdatePost('+uid+')" type="submit" class="mt-2 btn btn-prmary btn-lg btn-block chinhsua-btn blue waves-effect waves-light"><i class="fas fa-save"></i> Lưu chỉnh sửa bài viết</button>\n';
            kunloc_edit += '</div>\n';
            kunloc_edit += '</form>\n';
            kunloc_def += '<label class="mdb-main-label active">Loại bỏ bài viết này?</label>\n';
            kunloc_def += '<button type="button" onclick="def('+uid+')" class="m-1 btn btn-prmary btn-lg btn-block chinhsua-btn blue waves-effect waves-light"><i class="fa fa-trash" aria-hidden="true"></i> Loại bỏ bài viết!</button>\n';
            
        }
    }
    $("#modal-tuychon").html(kunloc_tuychon);
    $("#noidung-post").html(kunloc_edit);
    $("#modal-def").html(kunloc_def);
})
}
</script>
<!-- col md 7 -->
</div>
<?php 
}
}else{
    header("Location: trang-chu");
}
include_once("main/footer.php");
?>
