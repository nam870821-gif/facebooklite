<style>
/*.row-photo {    
    /*z-index: 0;
    max-height:950px;
    min-height:100%
    display: flex;
    flex-direction: column;
    top: auto;/
    position:relative;
    display: flex;
}
@media only screen and (min-width: 600px){
    .row-photo  {
        position:fixed;
    }   
}*/
.page-photo {
    position: relative;
    display: flex;
    font-family: inherit;
    box-sizing: border-box;
    flex-basis: 0;
    display: flex;
    flex-shrink: 1;
    z-index: 0;
    flex-direction: column;
    flex-grow: 1;
    background:black;
    min-width: 100%;
    height: 100%;
    width: 100%;
    /*z-index: 0;
    min-height: inherit;
    margin-bottom: auto;
    flex-direction: column;
    justify-content: flex-start;
    background-color:#ffffff;
    align-items: stretch;
    flex-direction: row;
    sheight: inherit;
    width: auto;*/
}
.col-photosss {
    font-family: inherit;
    box-sizing: border-box;
    flex-basis: 0;
    position: relative;
    display: flex;
    flex-shrink: 1;
    z-index: 0;
    min-width:100%;
    height:100%;
    width:100%;
    flex-direction: column;
    flex-grow: 1;
    background:black;
}
.card-photo{
    position: relative;
    display: flex;
    align-items: center;
    height: 100%;
    width: 100%;
}
.card-photo-body{
    height: 100%;
    width: 100%;
    justify-content: center;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.card-photo,.card-photo-body,.img-photo,
.img-photo{
    object-fit: contain;
}
@media only screen and (min-width: 600px){
    .img-photo{
        left: -5%;
        height: 100%;
        width: 50%;
    }
    .col-md-9{
    margin-top:-2.455553px;
    }
    .col-md-3{
        margin-top:-2.455553px;
    }
}
@media only screen and (max-width: 600px){
    .img-photo{
    left:0%;
    height: 100%;
    width: 50%;
    }
}
img {
    border: 0;
}
</style>

<div class="row">
<div class="col-md-9">
<div class="page-photo">
<div class="row-photo col-photo"></div>
<div class="card-photo">
    <div class="card-photo-body" id="list-photo">
        <div class="text-center m-4" id="loading_post">
        <span class="spinner-border text-success spinner-border-sm m-auto"></span> <small class="">Đang tải</small>>
        </div>  
    </div>
</div>
</div>
</div>   
<div class="col-md-3"><div class="" id="load-post"></div>
</div>   
</div>
<!--div class="row row-photo">
<div class="page-photo">
<div class="col-md-9">
<div class="row-photo col-photo"></div>
    <div class="card-photo">
    <div class="card-photo-body">
    <img class="img-photo" src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.0-9/131435316_216105470054007_8694039341463937591_o.jpg?_nc_cat=104&amp;ccb=2&amp;_nc_sid=8bfeb9&amp;_nc_ohc=0wPu99SE5QcAX9199kt&amp;_nc_ht=scontent.fsgn2-5.fna&amp;oh=87632dec0c86fda4236502bf625f6d1f&amp;oe=6004AD1B">
    </div>
    </div>
</div>
<div class="col-md-3">
<div class="" id="load-post"></div>

</div>

</div>

</!--div-->
<script>
$(document).ready(function(){
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
})
var fbids = <?= $_GET['fbid']; ?>
alert(fbids)
function getPost(){
$.post("API/api_get_post.php", { type: 'GET_DATA', uid: fbid }, function(data){
Data = JSON.parse(data);
kunloc = '';
if(Data == null || Data == '' || !Data.length){
    $("#load-post").html('<center class="mt-5"><b>Chưa có bài đăng nào!!!</b></center>');
    $("#loading_post").hide()
    return fasle;
}
for(var i=0;i<Data.length;i++){
    var username = Data[i].username;
    var id = Data[i].id;
    var fullname = Data[i].fullname;
    var avatar = Data[i].avatar;
    var uid = Data[i].uid;
    var text = Data[i].text;
    var image = Data[i].image;
    var date = Data[i].date;
    var like = Data[i].like;
    var status_like = Data[i].status_like;
    var cmt = Data[i].cmt;
    var share = Data[i].share;
    var session_avatar = Data[i].session_avatar;
    var session_verify = Data[i].session_verify;
    var session_admin = Data[i].session_admin;
    var public = Data[i].public;
    var profile = "'profile.php?id="+id+"'";
    var story = "'story.php?fbid="+uid+"'";
    kunloc += '<div class="card mb-2">\n';
    kunloc += '<div class="card-body p-0">\n';
    kunloc += '<div class="feed postc pb-0">\n';
    kunloc += '<div class="feed-header">\n';
    kunloc += '\n';
    kunloc += '<img src="'+avatar+'" class="mt-1 rounded float-left img mr-2" type="button" onclick="location.href='+profile+'">\n';
    kunloc += '<div class="row">\n';
    if(session_verify){
        kunloc += '<p class="font-weight-bold feed-name" type="button" onclick="location.href='+profile+'">'+fullname+' '+session_verify+' </p>\n';
    }else{
        kunloc += '<b class="feed-name text-dark" type="button" onclick="location.href='+profile+'">'+fullname+'</b>\n';
    }
    if(session_admin){
        kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
    }else if(public == 'true'){
        kunloc += '<span class="ml-auto text-dark" type="button" onclick="TuyChon('+uid+')"><i class="fas fa-ellipsis-h"></span></i></span>\n';
    }
    kunloc += '</div></div>\n';
    kunloc += '<b class="time-post">'+date+' <span aria-hidden="true"> · </span> <i class="public-icon" aria-label="Đã chia sẻ với Công khai" role="img"></i> </b>\n';
    kunloc += '</div>\n';
    
    kunloc += '<div class="post-body">\n';
    kunloc += '<div class="post-captent ml-3 m-2 font-size-20" type="button" onclick="location.href='+story+'">'+text+'</div>\n';
    kunloc += '</div>\n';
    
    kunloc += '<div class="thongke">\n';
    kunloc += '<div class="reaction">\n';
    kunloc += '<div class="ml-auto">\n';
    
    kunloc += '<img class="j1lvzwm4" height="18" src="img/button/like.svg" width="18">\n';
    kunloc += '<img class="j1lvzwm4" height="18" src="img/button/love.svg" width="18">\n';
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
    if(id){
       $("#load-post").css('height','900px').css('overflow','auto');
    }else{
       $("#load-post").css('height','auto').css('overflow','auto');
    }
    if(image){
      //$("#list-photo").html(image)
      //kunloc += '<div class="row">'+image+'</div>\n';
    }
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
        kunloc_cmt += '<span class="ndcmt">'+noidung_cmt+'</span> · <small>'+time+'</small></div>\n';
        //=======================================
        if(replay != null){
            for (var i=0;i < Data[x].replay.length; i++){
            rep_noidung = Data[x].replay[i].text;
            rep_avatar = Data[x].replay[i].avatar;
            rep_fullname = Data[x].replay[i].fullname;
            rep_id = Data[x].replay[i].id;
            rep_time = Data[x].replay[i].time;
            rep_session_verify = Data[x].replay[i].session_verify;
            //========================================================
            kunloc_cmt += '<div class="input-rep" style="animation-duration: 1.'+i+'s;animation-name:fadeIn;">\n';
            kunloc_cmt += '<img class="card-img-64" src="'+rep_avatar+'" type="button" onclick="location.href='+profile+'">\n';
            kunloc_cmt += '<div class="comment-text-replay">\n';
            if(session_verify){
                kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+rep_fullname+' '+rep_session_verify+'</p>\n';
            }else{
                kunloc_cmt += '<p class="font-weight-bold my-0 tencmt" type="button" onclick="location.href='+profile+'">'+rep_fullname+'</p>\n';
            }
            
            kunloc_cmt += '<span class="ndcmt">'+rep_noidung+'</span>  · <small>'+rep_time+'</small></div>\n';
            kunloc_cmt += '</div>\n';
            }
        }
        //========================================================
        kunloc_cmt += '<div class="replay"><span type="button" onclick="sendReplay('+code+')">Trả lời</span></div>\n';
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
