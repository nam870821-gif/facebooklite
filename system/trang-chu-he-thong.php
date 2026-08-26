<!-- Nav tabs -->
<ul class="nav nav-tabs justify-content-center nav-justified md-tabs indigo">
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link active" data-toggle="tab" href="#menu0"><i class="fas fa-home"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu-tinnhan"><i class="fab fa-facebook-messenger"></i><span class="cham-messenger"><i class="cham-so" id="total3">0</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu-chat"><i class="fab fa-rocketchat"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu-thongbao"><i class="far fa-bell"></i><span class="cham"><i class="cham-so" id="total4">0</i></span></a>
    </li>
   <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#menu-setting"><i class="fas fa-cogs"></i></a>
    </li>
  </ul>
 
  <!-- Tab panes -->
  <div class="tab-content m-0 p-0">
    <div id="menu0" class="tab-pane active">
    <div class="row d-flex justify-content-center">

    <div class="col-lg-4 col-md-12 body-feed">
    <div class="ml-1 col-md-6" id="menu">
     <!-- LIST MENU -->
    <a class="dropdown-item mini mt-3" href="profile.php?id=<?= $id_user ?>">
    <div class="row">
        <img height="35" width="35" style="border-radius: 100%!important;"src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" />
       <div class="profilebn row"><h class="tenbn ml-3"><?= substr($fullname,0,20)."..." ?> <?= $verify ?></h></div>
    </div>
    </a>
    <hr class="d-none mr-5" style="width:90%">
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="S0U5ECzYUSu"></i> <span class="ml-2"> Bạn Bè </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="kyCAf2jbZvF"></i> <span class="ml-2"> Trang </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="EZ3Af2jbZvF"></i> <span class="ml-2"> Danh sách bạn bè </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="Y9Xi2D3hJv"></i> <span class="ml-2"> Messenger </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="DHBHg9MEeSC"></i> <span class="ml-2"> Quảng cáo </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="OasGoQgQgFs"></i> <span class="ml-2"> Hoạt động gần đây </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="support">
    <div class="row">
        <div><i class="DOSNshaZL"></i><span class="ml-2"> Hộp thư hỗ trợ </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="admin">
    <div class="row">
        <div><i class="NYOGcdzqs"></i><span class="ml-2"> Khu vực Support</span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="help/contact/317389574998690">
    <div class="row">
        <div><i class="W8wersdfgf"></i><span class="ml-2"> Xác minh danh tính </span></div>
    </div>
    </a>
    <a class="dropdown-item mini" href="javascript:void(0)">
    <div class="row">
        <div class="row"><b class="close-btn"><i class="Vtpl5u6qcIG"></i></b><span class="m-2"> Xem thêm </span></div>
    </div>
    </a>
    <hr>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold"><?= $tieude ?> © 2020</small></a>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold">Tiếng việt - English</small></a>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold">Chinese - India - Japan</small></a>
    <a class="dropdown-item" href="dang-xuat">
        <?php if($username){ ?>
        <small class="text-muted text-info font-weight-bold">Đăng xuất</small>
        <?php } ?>
    </a>
    <!--end  LIST MENU -->
    </div>
    <!-- /./ -->
    </div>
    <!-- FEEDS-->
    <div class="col-lg-4 col-sm-12 body-feed" id="home">

    <div id="wrapper" class="scroller-wrapper">
        <!--/./-->
        <div class="card mt-3">
        <div class="card-body khungpanel">
            <!-- /./ -->
            <div class="row">
                <div class="col-1 fb-panel">
                    <img src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" class="rounded float-left" onclick="location.href='profile.php?id=<?= $id_user ?>'">
                </div>
                <div class="col-11 fb-panel">
                <input data-toggle="modal" data-target="#add-post" readonly class="form-control" placeholder="<?= $fullname ?> ơi, bạn đang nghĩ gì thế?">
                </div>
            </div>
        </div> <!-- card-body -->
        <div class="col-md-12 d-none d-sm-block">
         <center><hr class="m-0 p-0" style="width:95%"></center>
            <!-- /./ -->
          <div class="btn-group panelbtn" role="group">
               <button type="button" class="btn btn-rounded waves-effect"><i class="tructiep" role="img"></i> <b>Video trực tiếp</b></button>
              <button type="button" class="btn btn-rounded waves-effect dangcamxuc"><i class="upanh" role="img"></i> <b>Ảnh/Video</b></button>
            <button type="button" class="btn btn-rounded waves-effect"><i class="camxuc" role="img"></i> <b>Cảm xúc/Hoạt động</b></button>
            </div>
        </div> 
        </div>
        <!-- /./ -->
       <div class="text-center m-4" id="loading_post">
        <!--img class="mt-5 img-responsive" style="width:110px;height:auto" src="/img/load_feeds.svg"-->
        <span class="spinner-border text-success spinner-border-sm m-auto"></span> <small class="">Đang tải</small>
        </div>  
        <div id="scroller" class="scroller scroll-vertical">
            <div class="mt-3" id="load-post"></div>
        </div>
    </div>
      
    </div>
    
    <!-- CHAT -->
    <div class="col-lg-1 col-sm-12 d-none d-sm-block body-feed"></div>
    <div class="col-lg-3 col-sm-12 d-none d-sm-block body-feed" id="chat">

    <div class="card-friend mt-2 ml-5">
    <span class="tieude-accept">Được tài trợ</span>
    <div class="card m-2">
        <div class="card-body body-feed">
            <b>Kênh Chat Thế Giới</b>
                <!--button type="submit" class="badge badge-danger close-chat"><i class="fas fa-times"></i></button-->
            <hr>
            <div class="mess-user-body" style="height:200px;overflow: auto;" id="messenger"></div>
            <form action="javascript:void(0)" method="POST">
                <div class="media d-block d-md-flex mt-3">
                 <div class="input-group">
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 m-auto text-center">
    <?= $ads_doc2 ?>
    <?= $ads_auto ?>
    </div> 
    <hr class="mb-2">
    
    <div class="addfriend">
    <span class="tieude-accept">Lời mời kết bạn </span><span class="float-right mr-3" style="color:hsl(214deg 89% 52%)" >Xem tất cả</span>
    <?php 
    $listaccept = mysqli_query($kunloc,"SELECT * FROM accept WHERE uid2 = '$id_user' ORDER BY id DESC");
    if(mysqli_num_rows($listaccept) == 0): ?>
    <a class="card-friend-body">
      <small>Chưa có lời mời kết bạn.</small>
    </a>
    <?php else: while ($data = mysqli_fetch_object($listaccept)): 
    $getinfo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '".$data->uid."'"));
    ?>
    <a class="card-friend-body" href="profile.php?id=<?= $getinfo->id ?>">
        <img class="avtbn" src="<?= $getinfo->avatar ?>" />
        <div class="profilebn">
            <div class="row">
                <div class="col-sm-9">
                 <b class="tenbn m-0 p-0"><?= $getinfo->fullname ?></b>  
                </div>
                <div class="col-sm-3">
                     <h class="" style="font-size:.8125rem;color:#65676b"><?= _ago($data->time); ?></h>
                </div>
            </div>
        </div>
        <p><b class="textbn">Đã gửi cho bạn 1 lời mời kết bạn.</b></p>
        <p><button class="btn btn-sm story">Xác nhận</button><button class="btn btn-sm baocao">Xóa</button></p>
    </a>
    <?php endwhile; endif; ?>
    
    </div>
    <hr>
    </div>
    <div class="onl-friend">
    <div class="card-friend ml-5">
    <span class="tieude-accept">Người liên hệ</span>
    <span class="icon-menu-friend"><i class="bacham-friend"></i></span>
    <span class="icon-menu-friend"><i class="timkem-friend"></i></span>
    <span class="icon-menu-friend"><i class="video-friend"></i></span>
    <?php 
    $listfriend = mysqli_query($kunloc,"SELECT * FROM friends WHERE username = '$username'");
    if(mysqli_num_rows($listfriend) < 1): ?>
    <a class="card-friend-body">
      <small>Chưa có bạn bè.</small>
    </a>
    <?php else:while ($data_friend = mysqli_fetch_object($listfriend)): 
    $uid2 = $data_friend->uid2;
    $getinfofriend = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$uid2'"));
    ?>
    <!-- user -->
    <a class="dropdown-item mini mini-friend" href="profile.php?id=<?= $getinfofriend->id ?>">
    <div class="row">
        <img height="35" width="35" style="border-radius: 100%!important;"src="<?= $getinfofriend->avatar ?>"/><span class="onl online"></span>
       <div class="profilebn row"><h class="tenbn ml-3"><?= $getinfofriend->fullname ?> <?= verifed($getinfofriend->comfirm_status) ?></h></div>
    </div>
    </a>
    <?php endwhile; endif; ?>
    </div>
     </div>
    <!-- /./ -->
    </div>
    </div>

    </div>
    <div id="menu-tinnhan" class="justify-content-center tab-pane fade">
        <ul class="list-group bg-white pt-2 pb-2">
        <h4 class="mt-1 ml-3 text-left">Messenger</h4>
            <div id="tab-tinnhan">
            <a class="dropdown-item text-center"><h4 class="">Chưa có tin nhắn</h4></a>
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
        </ul>

      </div>
    <div id="menu-thongbao" class="justify-content-center tab-pane fade">
    <ul class="list-group bg-white pt-2 pb-2">
        <h4 class="mt-1 ml-3 text-left">Thông báo</h4>
            <div id="tab-thongbao">
             <a class="dropdown-item text-center"><h4 class="">Chưa có thông báo</h4></a>
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
        </ul>
     </div>
     <div id="menu-chat" class="justify-content-center tab-pane fade" >
     	<div class="card">
     	 <h4 class="mt-3 ml-3 text-left">Cộng Đồng</h4>
            <div class="card-body">
            <div class="mess-user-body" style="height:500px;overflow: auto;" id="messenger2"></div>
            <form action="javascript:volid()" method="POST">
            <div class="input-mess">
                <div class="input-group">
                    <input type="text"  id="text-messenger2"  class="form-control feed-comment-input" placeholder="Nhập tin nhắn..."/>
                    <button id="send-messenger2" class="btn-floating deep-purple send-comment-btn waves-effect waves-light"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
    

	</div>

<div id="menu-setting" class="justify-content-center tab-pane fade">
 <!-- SETTING-->
    <a class="dropdown-item" href="profile.php?id=<?= $id_user ?>">
        <img class="avtbn" src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" />
        <div class="profilebn row"><b class="tenbn mt-2"><?= substr($fullname,0,20)."..." ?> <?= $verify ?></b>
        </div>
        <b class="textbn" >Xem trang cá nhân của bạn</b>
    <hr>
    </a>
    
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="S0U5ECzYUSu"></i> <span class="ml-2"> Bạn Bè </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="kyCAf2jbZvF"></i> <span class="ml-2"> Trang </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="EZ3Af2jbZvF"></i> <span class="ml-2"> Danh sách bạn bè </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="Y9Xi2D3hJv"></i> <span class="ml-2"> Messenger </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="DHBHg9MEeSC"></i> <span class="ml-2"> Quảng cáo </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class=""><i class="OasGoQgQgFs"></i> <span class="ml-2"> Hoạt động gần đây </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="support">
    <div class="row">
        <div><i class="DOSNshaZL"></i><span class="ml-2"> Hộp thư hỗ trợ </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="admin">
    <div class="row">
        <div><i class="NYOGcdzqs"></i><span class="ml-2"> Khu vực Support</span></div>
    </div>
    </a>
    <a class="dropdown-item" href="help/contact/317389574998690">
    <div class="row">
        <div><i class="W8wersdfgf"></i><span class="ml-2"> Xác minh danh tính </span></div>
    </div>
    </a>
    <a class="dropdown-item" href="javascript:void(0)">
    <div class="row">
        <div class="row"><b class="close-btn"><i class="Vtpl5u6qcIG"></i></b><span class="m-2"> Xem thêm </span></div>
    </div>
    </a>
    <hr>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold"><?= $tieude ?> © 2020</small></a>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold">Tiếng việt - English</small></a>
    <a class="dropdown-item" href="javascript:void(0)"><small class="text-muted font-weight-bold">Chinese - India - Japan</small></a>
    <a class="dropdown-item" href="dang-xuat">
        <?php if($username){ ?>
        <small class="text-muted text-info font-weight-bold">Đăng xuất</small>
        <?php } ?>
    </a>
    <!-- FEEDS-->   
</div>
</div>
</div>


</div>
<script id="feed-type-01">
</script>
<script>
$(document).ready(function(){
    load()
})
function load(){
    kunloc_load = '<div class="card mb-2"><div class="card-body p-0">\n';
    kunloc_load += '<div class="_2iwo _5usc" data-testid="fbfeed_placeholder_storys">\n';
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
    setTimeout(() => {
         getPost()
     }, 0);
    setInterval(() => {
         getMessenger()
     }, 1e3);
}
function reload(){
    setTimeout(function() {
         getPost()
     }, 0);
}
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
$('#send-messenger2').click(function(){
    var tinnhan = $('#text-messenger2').val();
    if(tinnhan.length > 1000){
        toastr.error('Chat không quá 1000 kí tự.');
        return fasle;
    }
    if(tinnhan.length == 0){
        toastr.error('Vui lòng nhập chat!');
        return fasle;
    }
    $.post("API/api_chatbot.php", { mess: tinnhan }, function(data){
        $('#text-messenger2').val('');
    })
})
function getMessenger(){
    $.post("API/api_chatbot.php", {}, function(data){
        $('#messenger').html(data)
        $('#messenger2').html(data)
    })
}

function getPost(){
$.post("API/api_get_post.php", { type: 'GET' }, function(data){
Data = JSON.parse(data);
kunloc = '';
if(Data == null || Data == '' || !Data.length){
    $("#load-post").html('<center class="mt-5"><b>Chưa có bài đăng nào!!!</b></center>');
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
    //---------------------------------
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
        kunloc += '<div class="post-captent ml-3 font-size-20" type="button" onclick="location.href='+story+'">'+text+'</div>\n';
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
        kunloc += '<div class="post-captent ml-3 font-size-20" type="button" onclick="location.href='+story+'">'+text+'</div>\n';
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
     GetListComment(uid)
     if(Data.type == 'success'){
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
     if(Data.type == 'success'){
        GetListComment(uid)
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