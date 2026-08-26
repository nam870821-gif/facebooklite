
<div class="">
<div class="row d-flex justify-content-center">
<!-- SETTING-->
<div class="col-lg-3 col-md-12 body-feed" id="menu">
<!-- user -->
<a class="dropdown-item" href="profile.php?id=<?= $id_user ?>">
    <img class="avtbn" src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" />
    <div class="profilebn row"><b class="tenbn mt-0"><?= $fullname ?> <?php if($confirm_status == '1'){ echo $verify; } ?> </b>
    </div>
    <b class="textbn">Xem trang cá nhân của bạn</b>
   
</a>
<hr class="mr-5" style="width:90%">
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="S0U5ECzYUSu"></i> <span class="ml-2"> Bạn Bè </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="kyCAf2jbZvF"></i> <span class="ml-2"> Trang </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="EZ3Af2jbZvF"></i> <span class="ml-2"> Danh sách bạn bè </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="Y9Xi2D3hJv"></i> <span class="ml-2"> Messenger </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="DHBHg9MEeSC"></i> <span class="ml-2"> Quảng cáo </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class=""><i class="OasGoQgQgFs"></i> <span class="ml-2"> Hoạt động gần đây </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="help/contact/317389574998690">
   <div class="row">
     <div><i class="W8wersdfgf"></i><span class="ml-2"> Xác minh danh tính </span></div>
  </div>
 </a>
 <a class="dropdown-item" href="#">
   <div class="row">
     <div class="row"><b class="close-btn"><i class="Vtpl5u6qcIG"></i></b><span class="m-2"> Xem thêm </span></div>
  </div>
 </a>
 <hr>
 <a class="dropdown-item" href="#"><small class="text-muted font-weight-bold"><?= $tieude ?> © 2020</small></a>
 <a class="dropdown-item" href="#"><small class="text-muted font-weight-bold">Tiếng việt - English</small></a>
 <a class="dropdown-item" href="#"><small class="text-muted font-weight-bold">Chinese - India - Japan</small></a>
 <a class="dropdown-item" href="dang-xuat">
    <?php if($_SESSION['username']){ ?>
    <small class="text-muted text-info font-weight-bold">Đăng xuất</small>
    <?php } ?>
 </a>
<!-- /./ -->
</div>
<style>
.thongbao {
    color: #fff !important;
    border-radius: 15px;
    background-color: #ff5ce7 !important;
}
.list-group-item img {
    width: 40px;
    border-radius: 50%;
    margin-right: 10px;
    vertical-align: middle;
}
.blues {
    margin-right: 14px;
    font-size: 35px;
    vertical-align: middle;
    font-weight: lighter;
}
.top img {
    width: 50px;
    height: 50px;
    border: 2px solid #438cff;
    object-fit: contain;
    padding: 2px;
}
.badge-default {
    border-radius: 5px;
    color: #fff !important;
    background-color: #007bff !important;
}
</style>
<!-- FEEDS-->
<div class="col-lg-5 col-sm-12 body-feed" id="home">
    <div class="card mt-2 mb-2">
        <dv class="card-header bg-white">
            <center><h4>Bảng xếp hạng</h4></center>
            <div class="alert alert-dark thongbao" role="alert">Bảng xếp hạng Fb Việt Nam. <h>Nhằm vinh danh các nhận vật nổi bật</h></div>
            
        </dv>
        <div class="card body">
            <ul class="list-group list-group-flush" style="height:600px;overflow:auto">
                <?php
                 $SQL = mysqli_query($kunloc,"SELECT id,fullname,followers,avatar,DENSE_RANK() OVER (ORDER BY followers DESC) AS RANK FROM account WHERE followers >= 10000000 LIMIT 0,100");
                 while ($data_ = mysqli_fetch_object($SQL)):
                ?>
                <li class="list-group-item top">
                    <b class="blues"><?php if($data_->RANK <= 3){ echo $data_->RANK; } ?></b>
                    <img class="" src="<?= $data_->avatar ?>" /> 
                    <a href="profile.php?id=<?= $data_->id ?>" class=""><?= $data_->fullname ?></a></b>
                    <span class="badge badge-default"><?= number_format($data_->followers); ?></span>
                </li>
                <?php endwhile; ?>
                <?php
                 $SQL = mysqli_query($kunloc,"SELECT id,fullname,followers,avatar,DENSE_RANK() OVER (ORDER BY followers DESC) AS RANK FROM account WHERE followers >= 1000000 AND followers < 10000000 LIMIT 0,100");
                 while ($data_ = mysqli_fetch_object($SQL)):
                ?>
                <li class="list-group-item top">
                    <b class="blues"></b>
                    <img class="" src="<?= $data_->avatar ?>" /> 
                    <a href="profile.php?id=<?= $data_->id ?>" class=""><?= $data_->fullname ?></a></b>
                    <span class="badge badge-default"><?= number_format($data_->followers); ?></span>
                </li>
                <?php endwhile; ?>
                
            </ul>
        </div>
    </div>
    

</div>
<!-- CHAT -->
<div class="col-lg-4 col-sm-12 d-none d-sm-block body-feed" id="chat">
<div class="card m-3">
    <div class="card-body body-feed">
        <b>Trò chuyện</b>
            <button type="submit" class="badge badge-danger close-chat"><i class="fas fa-times"></i></button>
        <hr>
        <div class="mess-user-body" style="height:400px;overflow: auto;" id="messenger">
          
         </div>
         <form action="javascript:volid()" method="POST">
        <div class="input-mess">
            <div class="input-group">
                <input type="text"  id="text-messenger"  class="form-control feed-comment-input" placeholder="Nhập tin nhắn..."/>
                <button id="send-messenger" class="btn-floating deep-purple send-comment-btn waves-effect waves-light"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

</div>
</div>
<script>
$('#send-messenger').click(function(){
    var tinnhan = $('#text-messenger').val();
    if(tinnhan.length > 1000){
        toastr.error('Chat không quá 1000 kí tự.');
        return fasle;
    }
    if(tinnhan.length == 0){
        toastr.error('Vui lòng nhập chat!');
        return fasle;
    }
    $.post("API/api_chatbot.php", { mess: tinnhan }, function(data){
        $('#text-messenger').val('');
    })
})
function getMessenger(){
$.post("API/api_chatbot.php", {}, function(data){
    $('#messenger').html(data)
})
}
$(document).ready(function(){
    setInterval(() => {
        getMessenger()
    }, 1e3);
    
})
</script>
