
<div class="">
<div class="row d-flex justify-content-center">
<!-- FEEDS-->
<!-- SETTING-->
<div class="col-lg-4 col-md-12 body-feed" id="menu">
<div class="mt-1 mb-1 text-center">
<?= $ads_doc ?>
<?= $ads_auto ?>
</div>
</div>
<div class="col-lg-4 col-sm-12 body-feed" id="home">
<div id="wrapper" class="scroller-wrapper">
        <div id="scroller" class="scroller scroll-vertical">
        <div class="mt-3" id="load-post" ></div>
</div>
</div>

</div>
<div class="col-lg-4 col-sm-12 body-feed">
<div class="mt-1 mb-1 text-center">
<?= $ads_doc ?>
<?= $ads_auto ?>
</div>
<? /*<style>
         @media screen and (max-width:600px){
            .rank{
                display:none;important;
            }
         }
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
<div class="container">
    <div class="card mt-2 mb-2">
        <dv class="card-header bg-white">
            <center><h4>Bảng xếp hạng</h4></center>
            <div class="alert alert-dark thongbao" role="alert">Bảng xếp hạng Fb Việt Nam. <h>Nhằm vinh danh các nhận vật nổi bật</h></div>
            <center>
                <p class="text-green">Cứ mỗi ngày sẽ update huy hiệu mới</p>
                <p>Huy hiệu TOP 1: <?= $list_[2]; ?></p>
                <p>Huy hiệu TOP 2: <?= $list_[3]; ?></p>
                <p>Huy hiệu TOP 3: <?= $list_[4]; ?></p>
            </center>
        </dv>
    <?= $ads_2x ?>
    <?= $ads_auto ?>
        <div class="card body">
            <ul class="list-group list-group-flush" style="height:600px;overflow:auto">
             <?php
                 $SQL = mysqli_query($kunloc,"SELECT id,confirm_status,fullname,followers,avatar,DENSE_RANK() OVER (ORDER BY followers DESC) AS RANK FROM account WHERE followers >= 100000000 AND trangthai >= 0 LIMIT 0,100");
                 while ($data_ = mysqli_fetch_object($SQL)):
                ?>
                <ul class="list-group top">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                     <b><img class="" src="<?= $data_->avatar ?>" /><a href="profile.php?id=<?= $data_->id ?>"><?= substr($data_->fullname,0,21) ?></a></b>
                   <span class="btn btn-sm xanh count"><?= $data_->followers; ?></span>
                </li>
                </ul>
                <?php endwhile; ?>
                	
			   <?php
                 $SQL = mysqli_query($kunloc,"SELECT id,confirm_status,fullname,followers,avatar,DENSE_RANK() OVER (ORDER BY followers DESC) AS RANK FROM account WHERE followers >= 10000000 AND trangthai >= 0 LIMIT 0,100");
                 while ($data_ = mysqli_fetch_object($SQL)):
                ?>
                <ul class="list-group top">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                     <b><?php if($data_->RANK <= 3){ echo $data_->RANK; } ?> <img class="" src="<?= $data_->avatar ?>" /><a href="profile.php?id=<?= $data_->id ?>"><?= substr($data_->fullname,0,21) ?> </a></b>
                   <span class="btn btn-sm xanh count" ><?= $data_->followers; ?></span>
                </li>
                </ul>
                <?php endwhile; ?>
                <?php
                 $SQL = mysqli_query($kunloc,"SELECT id,confirm_status,fullname,followers,avatar,DENSE_RANK() OVER (ORDER BY followers DESC) AS RANK FROM account WHERE followers >= 1000000 AND followers < 10000000 LIMIT 0,100");
                 while ($data_ = mysqli_fetch_object($SQL)):
                ?>
                <ul class="list-group top">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                     <b><img class="" src="<?= $data_->avatar ?>" /><a href="profile.php?id=<?= $data_->id ?>"><?= substr($data_->fullname,0,21) ?> </a></b>
                   <span class="btn btn-sm xanh count"><?= $data_->followers; ?></span>
                </li>
                </ul>
                <?php endwhile; ?>
                
            </ul>
        </div>
    </div>

</div>*/ ?>

</div>

</div>
<script>
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
     }, 0);
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
function getMessenger(){
$.post("API/api_chatbot.php", {}, function(data){
    $('#messenger').html(data)
})
}

function getPost(){
$.post("API/api_get_post.php", { type: 'GET' }, function(data){
Data = JSON.parse(data);
kunloc = '';
if(Data == null){
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
    kunloc += '<div class="mb-3 font-weight-bold" style="color:#65676b">Xem thêm bình luận</div>\n';
    kunloc += '</div></div></div></div></div></div></div></>\n';
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
        kunloc_cmt += '<div style="color:#65676b"><b type="button">Thích</b> · <b type="button">Trả lời</b> · <h>'+time+'</h></div>\n';
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
        kunloc_cmt += '</div>\n';
        kunloc_cmt += '</li>\n';
        kunloc_cmt += '</div>\n';
        kunloc_cmt += '</div>\n';
    }
    $("#form-comment-"+uid).html(kunloc_cmt);
})
}

</script>
<!--div class="text-center m-4" id="loading_post">
    <img class="mt-5 img-responsive" style="width:110px;height:auto" src="/img/load_feeds.svg"
    <span class="spinner-border text-success spinner-border-sm m-auto"></span> <small class="">Đang tải</small>>
    </div-->  
