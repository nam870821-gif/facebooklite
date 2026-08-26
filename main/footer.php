<!--div class="row text-center mt-5">
<div class="col-md-12">
    <hr class="mb-2" style="width:10%">
     <small class="font-size-20">Phiên bản: <code><?= $version ?></code></small> <br>
     <small class="text-muted">Designer Kunloc Entertainment, <?= $tieude ?> © 2020</small>
     <hr class="mt-2" style="width:20%"><br>

</div>
</!--div-->
<!-- /./ -->
<div class="modal modal-scrollings" id="modal-inbox2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-center" role="document">
        <div class="modal-content mini-chat">
            <div class="modal-body mess-user-body" style="height:400px;overflow:auto;" id="data-inbox2"> 
            </div>
            <form action="javascript:volid()" method="POST">
              <div class="input-mess m-3">
                 <div class="input-group">
                      <input type="text" id="inbox2" class="form-control feed-comment-input" placeholder="Nhập tin nhắn...">
                      <span id="input2"></span>
                      <button type="submit" id="gui-inbox2" class="btn-floating deep-purple send-comment-btn d-none"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
            
                  </div>
              </div>
              </form>
      <script>
              $('#gui-inbox2').click(function(){
                var tinnhan = $('#inbox2').val();
                var idreplay = $('#idreplay').val();
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
                    uid: idreplay
                }, function(data){
                    $('#inbox2').val('');
                    getMessenger2(idreplay)
                    Data = JSON.parse(data);
                    toarst(Data.type,Data.text,Data.title)
                    return false;
                })
            }) 
              </script>
        </div>
    </div>
</div>

<!--button type="button" data-toggle="modal" data-target="#modal-inbox" id="btn-modal-inbox" class="d-none"></button>
<div class="modal fade right modal-scrolling" id="modal-inbox" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right" role="document">
        <div class="modal-content">
            <!--div class="modal-header">
                <b id="data-name"></b>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
                </button>
            </div--
            <div class="modal-body mess-user-body" id="data-inbox"></div>
            <form action="javascript:volid()" method="POST">
              <div class="input-mess m-3">
                  <div class="input-group">
                      
                      <input type="text" id="inbox" class="form-control feed-comment-input" placeholder="Nhập tin nhắn...">
                      <button type="button" id="gui-inbox" class="btn-floating deep-purple send-comment-btn waves-effect waves-light"><i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
                  </div>
              </div>
              </form>
            
    <script>
              $('#gui-inbox').click(function(){
                var tinnhan = $('#inbox').val();
                var uid = $('#data-uid').val();
                if(tinnhan.length > 1000){
                    toastr.error('Chat không quá 1000 kí tự.');
                    return fasle;
                }
                if(tinnhan.length == 0){
                    toastr.error('Vui lòng nhập chat!');
                    return fasle;
                }
                
                $.post("API/api_inbox.php", {  
                    text: tinnhan,
                    uid: uid
                }, function(data){
                    $('#inbox').val('');
                    Data = JSON.parse(data);
                    HtmlChat(uid);  
                    toarst(Data.type,Data.text,Data.title)
                    return false;
                })
            }) 
        </script>
        </div>
    </div>
</div-->

<div class="modal fade" id="edit-about" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="fb-post-title">Chỉnh sửa thông tin tài khoản</h5>
      <b class="close-btn" class="close" data-dismiss="modal"><i class="close-modal"></i></b>
      </div>
   <div class="modal-body" >
     <div class="list-group-flush">
    <form action="javascript:voild()" method="POST">
     <label class="mdb-main-label">Trạng thái kích hoạt tài khoản: <span class="text-danger"><?= $confirm_status ?></span></label>
     <div class="md-form">
        <input type="text" id="fullname" value="<?= $fullname ?>" class="form-control">
        <label for="truonghoccuaban">Họ tên đầy đủ</label>
    </div>
    <div class="irow row">
    <div class="col-sm-6">
        <div class="md-form">
                <input type="password" id="phone" value="<?= $phone ?>" class="form-control">
                <label for="noiohientai">Số điện thoại di động</label>
        </div>
    </div>
    <div class="col-sm-6">
      <div class="md-form">
              <input type="text" id="email" value="<?= $email ?>" class="form-control">
              <label class="mdb-main-label">Địa chỉ email hiện tại</label>
        </div>
    </div>
    </div>
    
    <select class="mdb-select md-form slpd" id="tinhtrang">
      <optgroup label="Tình trạng quan hệ">
        <option value="4" >Không cập nhật</option>
        <option value="0" >Độc thân</option>
        <option value="1" selected>Đang tìm hiểu</option>
        <option value="2" >Hẹn hò</option>
        <option value="3" >Đã kết hôn</option>
      </optgroup>
    </select>
    <label class="mdb-main-label active">Tình trạng mối quan hệ</label>
  
    <div class="irow row">
    <div class="col-sm-6">
      <?php if($noi_o_hien_tai == '0'){
        $return = '';
      }else{
        $return = $noi_o_hien_tai;
      }
      ?>
        <div class="md-form">
                <input type="text" id="noi_o" value="<?= $return ?>" class="form-control">
                <label for="noiohientai">Nơi ở hiên tại của bạn</label>
        </div>
    </div>
    <div class="col-sm-6">
    <?php if($noi_lam_viec == '0'){
          $returns = '';
        }else{
          $returns = $noi_lam_viec;
        }
        ?>
      <div class="md-form">
              <input type="text" id="noi_lam" value="<?= $returns ?>" class="form-control">
              <label class="mdb-main-label">Nơi làm việc</label>
        </div>
    </div>
    </div>
     <button id="update" type="submit" class="btn btn-default btn-lg btn-block chinhsua-btn blue waves-effect waves-light">Lưu thông tin tài khoản</button>
  </div>
   </form>
      </div>
    </div>
  </div>
</div>
<script>
  $("#update").click(function(){
    var email = $("#email").val();
    var phone = $("#phone").val();
    var fullname = $("#fullname").val();
    var noi_o = $("#noi_o").val();
    var noi_lam = $("#noi_lam").val();
    var tinhtrang = $("#tinhtrang").val();
    $.post("API/api_information.php",{
      email: email,
      fullname: fullname,
      phone:phone,
      noi_o:noi_o,
      noi_lam:noi_lam,
      tinhtrang:tinhtrang
    },function(data,status){
        Data = JSON.parse(data);
        if(Data.type == 'success'){
            setTimeout(() => { location.reload() } , 1000)
            toastr.success('Cập nhật thông tin thành công.')
            return false;
        }else{
            toarst(Data.type,Data.text,Data.title)
            return false;
        }
    })
})
</script>
<div class="modal fade" id="add-post" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h6 class="fb-post-title" style="">Tạo bài viết</h6>
      <b class="close-btn" class="close" data-dismiss="modal"><i class="close-modal"></i></b>
      </div>
    <div class="feed">
    <div class="feed-header">
                <a href="profile.php?id=<?= $id_user ?>"><img src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" class="mt-1 rounded float-left img mr-2">
                  <div class="row">
                      <b class="feed-name text-dark"><?= $fullname ?></b>
                      
                  </div>
              </a>
              <b class="text-success">Đang hoạt động</b><span aria-hidden="true"> · </span><i class="public-icon" aria-label="Đã chia sẻ với Công khai" role="img"></i>
      </div>
    </div>
   <!-- /./ -->
   <div class="modal-body">
     <div class="list-group-flush">
      <form action="javascript:voild()" method="POST">
        <div class="input-group" style="margin-top:-20px">
          <textarea col="50" rows="6" class="form-control ckeditor add-post-input" id="noi-dung" placeholder="<?= $fullname ?> ơi, bạn đang nghĩ gì?"></textarea>
        </div>
       <div class="btn-group panelbtn" role="group">
       <form id="upload_form" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
           <input type="file" name="images" hidden id="images" class="upanh-post m-2">
           <label class="upanh-post-cap mt-3" for="images"><i class="upanh" role="img"></i> </label><label class="m-2 mt-4">Chọn hình ảnh</label>
        </form>
      </div>
      <div class="btn-group panelbtn" role="group" id="scan"></div>
      <textarea id="image_list" class="m-2 form-control form-control-lg d-none" type="text"></textarea>
      <script>
        $("#images").change(function (){
          var formData = new FormData($('#upload_form')[0]);
          formData.append('image', $('input[name=images]')[0].files[0]);
           if(formData.length !== ''){
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
                  }
            })
           $.ajax({
                url: "API/api_scan.php",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
            success: function (data) {
                Data = JSON.parse(data);
                kunloc_list_img = '';
                if(Data.type == 'success'){
                  img_name = Data.name;
                  kunloc_list_img += '<img src="data/'+img_name+'" data-fancybox="#list" href="data/'+img_name+'" width="100" height="100" class="ml-2 rounded float-left img ">\n';
                  $("#image_list").append('data/'+img_name+'|');
                  $("#scan").append(kunloc_list_img);
                }else{
                  toarst(Data.type,Data.text,'')
                  return false;
                }
            },error: function () {}})
            }else{
                toastr.warning('Bạn chưa tải ảnh lên');
                return false;
          }
          })
      </script>
      <button id="btn-add-post" type="submit" class="mt-3 btn btn-sm btn-block story waves-effect waves-light">Đăng</button>
      </div>
      </form>

      </div>
    </div>
  </div>
</div>
 
<script>
  $(document).ready(function(){
    setInterval(() => {
      Btn()
    }, 1e3);
  })
  function Btn(){
    var noidung = $('#noi-dung').val();
    noidung.focus();
    noidung.select();
    if(noidung.length < 1){
      $('#btn-add-post').prop('disabled',true);
    }else{
      $('#btn-add-post').prop('disabled',false);
    }
  }
  $("#btn-add-post").click(function(){
    var noidung = $("#noi-dung").val();
    if(noidung == ''){
      toastr.warning('Chưa nhập bài viết.')
      return false;
    }
    var get_list = $("#image_list").val();
    tachList = get_list.split("|");
    if(tachList != '' && tachList.length < 2){
        toastr.warning('Tải lên 2 ảnh trỏ lên.')
        return false;
    }
    /*if(get_list.length > 0){
      insert = '';
      for(var i=0;i<tachList.length;i++){
      insert += '<div class="col m-1"><img data-fancybox="#<?= time() ?>" href="'+tachList[i]+'" src="'+tachList[i]+'" class="img-fluid"></div>\n';       
      } 
    } */ 
    $.post("API/api_post.php", {
      type: 'CREATE_',
      text: noidung,
      image: get_list
    },function(data,status){
        Data = JSON.parse(data);
        if(Data.type == 'success'){
            setTimeout(() => { location.reload() } , 1000)
            toastr.success('Đăng bài viết thành công.')
            return false;
        }else{
            toarst(Data.type,Data.text,Data.title)
            return false;
        }
    })
})
</script>
<button data-toggle="modal" data-target="#tuy-chon-post" id="btn-tuy-chon" class="d-none"></button>
<div class="modal fade" id="tuy-chon-post" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <span class="fb-post-title">Cài đặt bài viết</span>
      <b class="close-btn" class="close" data-dismiss="modal"><i class="close-modal"></i></b>
      </div>
   <!-- /./ -->
    <div class="modal-body" >
      
      <div id="modal-tuychon"></div>
      <div style="display:none" id="noidung-post"></div>
      <div style="display:block" id="modal-def"></div>
    </div>
    </div>
  </div>
</div>
<script>
  function chinhsua(){
      var chinhsua = document.getElementById("noidung-post");
      var def = document.getElementById("modal-def");
        if (chinhsua.style.display === "none") {
          chinhsua.style.display = "block";
        } else {
          chinhsua.style.display = "none";
        }
        if (def.style.display === "block") {
          def.style.display = "none";
        } else {
          def.style.display = "block";
      }
  }
  function def(uid){
    $.post("API/api_post.php",{
      type: 'DELETE_',
      uid: uid,
    },function(data,status){
        Data = JSON.parse(data);
        if(Data.type == 'success'){
            setTimeout(() => { location.reload() } , 1000)
            $("#"+uid).remove()
            $("#btn-tuy-chon").click()
            toastr.success('Đã xóa bài viết thành công.')
            return false;
        }else{
            toarst(Data.type,Data.text,Data.title)
            return false;
        }
    })
  }
  function UpdatePost(uid){
    var noidung = $("#update-noidung").val();
    if(noidung == ''){
      toastr.warning('Chưa nhập bài viết.')
      return false;
    }
    $.post("API/api_post.php",{
      type: 'UPDATE_',
      uid: uid,
      text: noidung
    },function(data,status){
        Data = JSON.parse(data);
        if(Data.type == 'success'){
            setTimeout(() => { location.reload() } , 1000)
            toastr.success('Cập nhật bài viết thành công.')
            return false;
        }else{
            toarst(Data.type,Data.text,Data.title)
            return false;
        }
    })
  }
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $subdomain ?>/assets/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<link href="assets/summernote@0.8.18/summernote-lite.min.css?<?= time() ?>" rel="stylesheet">
<script src="assets/summernote@0.8.18/summernote-lite.js?<?= time() ?>"></script>
<script type="text/javascript" src="assets/plugins/fancybox/js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.mdb-select').materialSelect();
    setInterval(() => {
      $('[data-toggle="tooltip"]').tooltip()
      $('#noi-dung').summernote({
             placeholder: 'Điền nội dung bài viết của bạn',
             height: 200,
             width: 1000,
             toolbar: [

                  ['style', ['style','bold', 'italic', 'underline', 'clear']],
                  ['insert', ['link', 'video']],
                  <?php if($username == $admin){ ?>
                  ['view', ['codeview']]
                  <?php } ?>
             ],
                    
      })
      $('#update-noidung').summernote({
             placeholder: 'Điền nội dung bài viết của bạn',
             height: 200,
             width: 1000,
             toolbar: [
                  ['style', ['style','bold', 'italic', 'underline', 'clear']],
                  ['insert', ['link', 'video']],
                  <?php if($username == $admin){ ?>
                  ['view', ['codeview']]
                  <?php } ?>
             ],
      })
    }, 1e3);
})
</script>
</body>
</html>
