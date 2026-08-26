
<?php
if($_GET && isset($_GET['id']) ){ 
$uid = intval($_GET['id']);
$SQL_info = $kunloc->query("SELECT * FROM account WHERE id = '$uid'");
$data_profile = $SQL_info->fetch_object();
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
#Lấy bộ sưu tập
$data_anhnoibat = $kunloc->query("SELECT * FROM anhnoibat WHERE username = '$data_username' ")->fetch_object();
#Lấy trạng thái tài khoản
$data_trangthai = $data_profile->trangthai;
#$check->id;
function getFbid($url,$kunloc){
    return $kunloc->query("SELECT * FROM photo WHERE img_url = '$url'")->fetch_object();
}
#----------------------------------------
$data_tieu_su = $kunloc->query("SELECT * FROM user_status WHERE username = '$data_username'")->fetch_object();
if($data_trangthai == 'disabled'){ ?>
<title>Tài khoản đã bị vô hiệu hóa</title>
<div class="row text-center" style="margin-top: 6rem;">
 <div class="col-md-12">
     <h4>Tài khoản của người này đã bị vô hiệu hóa</h4>
</div>
</div>  
<?php }else if(empty($data_profile->id)){ ?>
<title>Không tìm thấy tài khoản</title>
<div class="row text-center" style="margin-top: 6rem;">
 <div class="col-md-12">
     Không tìm thấy tài khoản
</div>
</div>
<?php }else{ ?>
<title><?= $data_fullname ?></title>
<div class="card-on py-5" id="bg-top" style="<?php if($data_profile->background != 'null'){ echo "background: linear-gradient(180deg,#919191bd 10%,#919191c2 1%,#ffffff 80%),url($data_profile->background)"; } ?>"></div>
<div class="row d-flex justify-content-center bg-fb">
<div class="col-md-6">
<div class="card testimonial-card">
<style>
#profilepicdemo {
    object-fit: cover;
    width: 100%;
    height: 164px;
}
</style>
<?php if($data_id == 0){ ?>
<div class="card-up fb-background">
<video autoplay class="video" id="background" poster="" data-setup="{}" onclick="playPause()">
 <source src="https://bot.mvipfb.com/kunloc.mp4" type="video/mp4" autoplay loop>
</video>
</div>
<style>
.video{
    height: auto;
    width: 100%;
}
@media only screen and (max-width:600px){
    .video{
    height:auto;
    width: 140%;
}
}
</style>
<script>
var video = document.getElementById("background");
var delayMillis = 0;
video.volume = 0;
var playVid = setTimeout(function() {
  video.play();
}, delayMillis);

video.addEventListener("click", function( event ) {
  if(video.paused) {
    clearTimeout(playVid);
    video.play();
  } else {
    video.pause();
  }
}, false);
</script>
<?php }else{ ?>
<div class="card-up fb-background" style="<?php if($data_profile->background != 'null'){ echo "background-image:url($data_profile->background)"; } ?>"></div>
<?php } ?>
<div class="profilepicture">
  <div class="avatar mx-auto white">
    <img src="<?php if($data_profile->avatar == ''){ echo $avt_macdinh; }else{ echo $data_profile->avatar; } ?>" class="rounded-circle" id="profilepicdemo">
  </div>
</div>

<!-- /./ -->
  <div class="card-body">
    <!--- name user -->
    <h4 class="card-title" style="margin-bottom:5px;font-weight:500!important"><?= $data_fullname ?> <?= verifed($data_profile->confirm_status); ?>
    </h4>
    <!-- /./ -->
    <?php if($data_tieu_su->status){ ?>
        <span class="tieusu mb-2"><?= $data_tieu_su->status ?></span><br>
    <?php }else{ ?>
        <span class="tieusu" style="display:none"></span>
    <?php } ?>
    </span>
    <hr class="d-none d-sm-block">
    <!-- Nav tabs -->
    <ul class="nav md-tabs menuprofile">
       <li class="nav-item waves-effect waves-light">
          <a class="nav-link active" data-toggle="tab" href="#baiviet">Bài viết</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#gioithie u">Giới thiệu</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" id="btn-banbe" href="#banbe">Bạn bè</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" id="btn-album" href="#album">Ảnh</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="tab" id="btn-album" href="javascript:void(0)">Xem thêm <i class="ml-2 fas fa-caret-down"></i></a>
        </li>
    </ul>
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
  <?php } ?>
  <?php if($data_profile->tinh_trang != '0'){ ?>
      <div class="boxinfo mb-3">
        <div class="boximg">
        <icon class="tinhtrang about"></icon>
            <span><?= $data_profile->tinh_trang; ?></span>
        </div>
  </div>
  <?php } ?>
  <?php if($data_profile->ngay_tham_gia != '0'){ ?>
   <div class="boxinfo" >
      <div class="boximg"><icon class="ngaythamgia about"></icon><span>Tham gia vào tháng <?= date("m",$data_profile->ngay_tham_gia) ?> năm <?= date("Y",$data_profile->ngay_tham_gia) ?></div>
  </div>
  <?php } ?>
  <?php if($data_profile->followers != '0'){ ?>
  <div class="boxinfo mt-3">
      <div class="boximg"><icon class="follow about"></icon><span>Có <b><?= number_format($data_profile->followers) ?> người</b> theo dõi</span></div>
  </div>
  <?php } ?>

     <?php $SQL = $kunloc->query("SELECT * FROM anhnoibat WHERE username='".$data_anhnoibat->username."'");
       while($echo_list = $SQL->fetch_object()){ 
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
</div>
</div>
<!-- /./ -->
<div class="card mt-2 gioithieuprofile p-0 m-0">
  <div class="card-body p-2 m-2">
    <span class="font-weight-bold mb-0">Ảnh</span><span type="button" class="d-none d-sm-block float-right mr-3" style="color:hsl(214deg 89% 52%)">Xem tất cả</span>
    <div class="row mt-1 mb-2">
   <?php 
    $albums = $kunloc->query("SELECT * FROM uploads WHERE username = '$data_username' ORDER BY id DESC LIMIT 0,3");
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
    <span class="font-weight-bold mb-0">Bạn bè</span><span type="button" class="d-none d-sm-block float-right mr-3" style="color:hsl(214deg 89% 52%)">Xem tất cả</span>
    <?php 
    $total_friend = mysqli_num_rows($kunloc->query("SELECT * FROM friends WHERE username = '$data_username'"));
    if($total_friend >= 1){
        echo "<p class='mt-1 mb-0'><small>$total_friend người bạn</small></p>";
    }else{
        echo "<p class='mt-1 mb-0'><small>Chưa có bạn bè.</small></p>";
    }
    ?>
    <div class="row">
    <?php 
    $listfriend = $kunloc->query("SELECT * FROM friends WHERE uid = '$data_id' ORDER BY RAND() LIMIT 0,9");
    if(mysqli_num_rows($listfriend) >= 1):
    while ($data_friend = mysqli_fetch_object($listfriend)): 
    $uid2 = $data_friend->uid2;
    $getinfofriend = mysqli_fetch_object($kunloc->query("SELECT * FROM account WHERE id = '$uid2'"));
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
<div class="col-md-6" id="body-feeder">
<div class="">
<div class="">
    <div class="">
        <div class="col-2">
           
        </div>
    <div class="col-7 text-left">
         
    </div>
    <div class="col-3 text-right">
      
    </div>
    </div><!-- row -->
</div><!-- card-body -->
</div><!-- card -->

<div class="card mb-2">
    <div class="row pt-1 pl-2 pb-1">
        <div class="col-4">
           <b class="m-2 mt-1 p-0">Bài viết</b>
        </div>
    <div class="col-8 text-right">
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
<!-- end Bài viết -->
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
        
        kunloc_cmt += '</li>\n';
        kunloc_cmt += '</div>\n';
        kunloc_cmt += '</div>\n';
    }
    $("#form-comment-"+uid).html(kunloc_cmt);
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
