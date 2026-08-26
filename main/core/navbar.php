<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-light lighten-1">
<!-- /./ -->
<a class="navbar-brand" href="trang-chu">

<svg class="d-mobile" height="40" viewBox="0 0 512 512" width="40">
<path d="m512 256c0 141.386719-114.613281 256-256 256s-256-114.613281-256-256 114.613281-256 256-256 256 114.613281 256 256zm0 0" fill="#4a7aff" />
<path
d="m267.234375 511.738281c136.171875-5.878906 244.765625-118.121093 244.765625-255.738281 0-.996094-.027344-1.988281-.039062-2.984375l-177.699219-177.703125-190 198.59375 105.566406 105.566406-48.675781 66.183594zm0 0"
fill="#0053bf"
/>
<path
d="m334.261719 75.3125v57.96875s-66.554688-9.660156-66.554688 33.277344v42.9375h60.113281l-7.511718 65.480468h-52.601563v170.679688h-66.554687v-170.679688l-56.894532-1.074218v-64.40625h55.820313v-49.378906s-3.683594-73.457032 68.703125-86.949219c30.058594-5.605469 65.480469 2.144531 65.480469 2.144531zm0 0"
fill="#fff"
/>
<path
d="m334.261719 133.28125v-57.96875s-35.421875-7.75-65.480469-2.144531c-4.695312.875-9.0625 2.007812-13.136719 3.347656v369.140625h12.0625v-170.679688h52.597657l7.515624-65.480468h-60.113281s0 0 0-42.9375 66.554688-33.277344 66.554688-33.277344zm0 0"
fill="#dce1eb"
/>
</svg>
<b class="text-primary font-weght-bold" id="facebook-logo">F a c e b o o k</b>
</a> 

   <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
   <span>
   </button>
   <span class="m-2" id="facebook-logo">
    <a href="profile.php?id=<?= $id_user ?>"><i class="far fa-user btn-sidebar-menu"></i></a>
    <a href="dang-xuat"><i class="fas fa-sign-out-alt btn-sidebar-menu"></i></a>
    <span type="button" onclick="openSidebar()"><i class="fas fa-tasks btn-sidebar-menu"> Cài đặt</i></span>
    
    </span>
    <script type="text/javascript">
      function openSidebar(){
        location.href = 'settings';
        return false;
        var x = document.getElementById("menu");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>

   <!-- /./ -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
                  
  <form class="menulog" action="#" method="GET">
    <li class="nav-item active">
    <div class="input-group">
       <div class="input-group-prepend">
      <span type="submit" class="input-group-text btn-search" id="basic-addon1"><i class="center fas fa-search"></i></span>
    </div>
      <input type="text" class="form-control timkiem" name="q" placeholder="Tìm kiếm trên Facebook"></div>
    </li>
   </form>
    </ul>
    
    <ul class="navbar-nav justify-content-center">
    <div class="iconn" onclick="location.href='trang-chu'">
      <svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M17.5 23.979 21.25 23.979C21.386 23.979 21.5 23.864 21.5 23.729L21.5 13.979C21.5 13.427 21.949 12.979 22.5 12.979L24.33 12.979 14.017 4.046 3.672 12.979 5.5 12.979C6.052 12.979 6.5 13.427 6.5 13.979L6.5 23.729C6.5 23.864 6.615 23.979 6.75 23.979L10.5 23.979 10.5 17.729C10.5 17.04 11.061 16.479 11.75 16.479L16.25 16.479C16.939 16.479 17.5 17.04 17.5 17.729L17.5 23.979ZM21.25 25.479 17 25.479C16.448 25.479 16 25.031 16 24.479L16 18.327C16 18.135 15.844 17.979 15.652 17.979L12.348 17.979C12.156 17.979 12 18.135 12 18.327L12 24.479C12 25.031 11.552 25.479 11 25.479L6.75 25.479C5.784 25.479 5 24.695 5 23.729L5 14.479 3.069 14.479C2.567 14.479 2.079 14.215 1.868 13.759 1.63 13.245 1.757 12.658 2.175 12.29L13.001 2.912C13.248 2.675 13.608 2.527 13.989 2.521 14.392 2.527 14.753 2.675 15.027 2.937L25.821 12.286C25.823 12.288 25.824 12.289 25.825 12.29 26.244 12.658 26.371 13.245 26.133 13.759 25.921 14.215 25.434 14.479 24.931 14.479L23 14.479 23 23.729C23 24.695 22.217 25.479 21.25 25.479Z"></path></svg>
      </div>
      <div class="iconn">
      <svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M5.75 4A.75.75 0 015 3.25v-1a.75.75 0 011.5 0v1a.75.75 0 01-.75.75zm.75 11.251a.75.75 0 01-1.5 0V8.749a.75.75 0 011.5 0v6.502zM5.75 28a.75.75 0 01-.75-.75v-6.5a.75.75 0 011.5 0v6.5a.75.75 0 01-.75.75zm15.737-16.234L23.214 6.5H9.5v11h13.715l-1.728-5.266a.749.749 0 010-.468zM4.75 5h19.5a.75.75 0 01.713.986l-1.974 6.006 1.974 6.023a.75.75 0 01-.713.985H4.75a.75.75 0 010-1.502L8 17.5v-11H4.75a.749.749 0 110-1.5z"></path></svg>
      </div>
      <div class="iconn">
      <svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M25.5 14C25.5 7.649 20.351 2.5 14 2.5 7.649 2.5 2.5 7.649 2.5 14 2.5 20.351 7.649 25.5 14 25.5 20.351 25.5 25.5 20.351 25.5 14ZM27 14C27 21.18 21.18 27 14 27 6.82 27 1 21.18 1 14 1 6.82 6.82 1 14 1 21.18 1 27 6.82 27 14ZM7.479 14 7.631 14C7.933 14 8.102 14.338 7.934 14.591 7.334 15.491 6.983 16.568 6.983 17.724L6.983 18.221C6.983 18.342 6.99 18.461 7.004 18.578 7.03 18.802 6.862 19 6.637 19L6.123 19C5.228 19 4.5 18.25 4.5 17.327 4.5 15.492 5.727 14 7.479 14ZM20.521 14C22.274 14 23.5 15.492 23.5 17.327 23.5 18.25 22.772 19 21.878 19L21.364 19C21.139 19 20.97 18.802 20.997 18.578 21.01 18.461 21.017 18.342 21.017 18.221L21.017 17.724C21.017 16.568 20.667 15.491 20.067 14.591 19.899 14.338 20.067 14 20.369 14L20.521 14ZM8.25 13C7.147 13 6.25 11.991 6.25 10.75 6.25 9.384 7.035 8.5 8.25 8.5 9.465 8.5 10.25 9.384 10.25 10.75 10.25 11.991 9.353 13 8.25 13ZM19.75 13C18.647 13 17.75 11.991 17.75 10.75 17.75 9.384 18.535 8.5 19.75 8.5 20.965 8.5 21.75 9.384 21.75 10.75 21.75 11.991 20.853 13 19.75 13ZM15.172 13.5C17.558 13.5 19.5 15.395 19.5 17.724L19.5 18.221C19.5 19.202 18.683 20 17.677 20L10.323 20C9.317 20 8.5 19.202 8.5 18.221L8.5 17.724C8.5 15.395 10.441 13.5 12.828 13.5L15.172 13.5ZM16.75 9C16.75 10.655 15.517 12 14 12 12.484 12 11.25 10.655 11.25 9 11.25 7.15 12.304 6 14 6 15.697 6 16.75 7.15 16.75 9Z"></path></svg>
      </div>
  </ul>

  <ul class="navbar-nav ml-auto nav-flex-icons">
    <!--li class="nav-item avatar mr-3">
       <a class="nav-link icon-navbar " href="profile.php?id=<?= $id_user ?>">
          <!--img src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>"><b> <?= $fullname ?> <?= $verify  ?></b>
        </a>
        
      </li-->
      <li class="nav-item avatar mr-3"><a class="nav-link icon-navbar"><b class="m-2">Tìm bạn bè</b></a></li>     
      <li class="nav-item mg"><a class="nav-link waves-effect waves-light bongbong"><i class="fas fa-plus"></i></a></li>     
      <li class="nav-item dropdown mg">
          <a class="nav-link waves-effect waves-light bongbong" id="Messenger" data-toggle="dropdown">
          <span class="cham"><i class="cham-so" id="total1">0</i></span>
          <svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M14 2.042c6.76 0 12 4.952 12 11.64S20.76 25.322 14 25.322a13.091 13.091 0 0 1-3.474-.461.956 .956 0 0 0-.641.047L7.5 25.959a.961.961 0 0 1-1.348-.849l-.065-2.134a.957.957 0 0 0-.322-.684A11.389 11.389 0 0 1 2 13.682C2 6.994 7.24 2.042 14 2.042ZM6.794 17.086a.57.57 0 0 0 .827.758l3.786-2.874a.722.722 0 0 1 .868 0l2.8 2.1a1.8 1.8 0 0 0 2.6-.481l3.525-5.592a.57.57 0 0 0-.827-.758l-3.786 2.874a.722.722 0 0 1-.868 0l-2.8-2.1a1.8 1.8 0 0 0-2.6.481Z"></path></svg></a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="Messenger">
            <b class="tieude-text"><svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M14 2.042c6.76 0 12 4.952 12 11.64S20.76 25.322 14 25.322a13.091 13.091 0 0 1-3.474-.461.956 .956 0 0 0-.641.047L7.5 25.959a.961.961 0 0 1-1.348-.849l-.065-2.134a.957.957 0 0 0-.322-.684A11.389 11.389 0 0 1 2 13.682C2 6.994 7.24 2.042 14 2.042ZM6.794 17.086a.57.57 0 0 0 .827.758l3.786-2.874a.722.722 0 0 1 .868 0l2.8 2.1a1.8 1.8 0 0 0 2.6-.481l3.525-5.592a.57.57 0 0 0-.827-.758l-3.786 2.874a.722.722 0 0 1-.868 0l-2.8-2.1a1.8 1.8 0 0 0-2.6.481Z"></path></svg></a>
           Messenger</b>
            <div class="mt-1" id="tin-nhan">
                <center><span class="spinner-border text-muted spinner-border-lg m-2"></span></center>
            </div>
            <small class="banquyen d-none">Website được thiết kế bởi <b><?= $name_admin ?> </b>! Vui lòng không copy dưới mọi hình thức!</small>
            </div>
          </li>
          <style>
                .tieude-text{
                  display: block;
                  font-size: 17px;
                  margin-top: 4px;
                }
                .tieude-text b{
                  font-weight: bold;
                }
          </style>
          <script>
              $(document).ready(function () {
                setTimeout(() => {
                  getTinnhan()
                }, 1000);
               })
               function getTinnhan(){
                 $.post("API/api_thongbao.php",{ type: "MESS" },function(data){
                    Data = JSON.parse(data);
                    if(Data == null || !Data.length){
                        echo = '<a class="dropdown-item" href="javascript:volid();"><div class="text-center"><h class="tieude-text mt-1">Chưa có tin nhắn</h></div></a>';
                        $('#total1').text(0)
                        $('#tin-nhan').html(echo)   
                        $('#tab-tinnhan').html(echo) 
                        return false;
                    }else{
                    kunloc_tinnhan = '';
                    kunloc_tab_tinnhan = '';
                    var total=0;
                    for(var i=0; i<Data.length; i++){
                      id = Data[i].id;
                      username = Data[i].username;
                      fullname = Data[i].fullname;
                      uid = Data[i].uid;
                      time = Data[i].time;
                      text = Data[i].text;
                      avatar = Data[i].avatar;
                      seen = Data[i].seen;
                      session_verify = Data[i].session_verify;
                      if(seen == 0){
                         total++; 
                      }
                      if(username != null){
                      kunloc_tinnhan += '<a class="dropdown-item m-0 p-0" type="button" data-toggle="modal" data-target="#modal-inbox2" onclick="getMessenger2('+id+')"><li class=" m-0 p-0 list-group">\n';
                      kunloc_tinnhan += '<div class="profilebn m-0">\n';
                      kunloc_tinnhan += '<img class="avtbn m-2" src="'+avatar+'"/>\n';
                      kunloc_tinnhan += '<b class="tieude-text">'+fullname+'</b>\n';
                      if(seen == 0){
                         kunloc_tinnhan += '<h6 class="font-weight-bold m-0 p-0">'+text+'</h6>\n';
                      }else{
                        kunloc_tinnhan += '<h6 class="m-0 p-0">'+text+'</h6>\n';
                      }
                      kunloc_tinnhan += '<small>'+time+'</small>\n';
                      kunloc_tinnhan += '</div></li></a>\n';
                      kunloc_tab_tinnhan += '<a class="dropdown-item" type="button" data-toggle="modal" data-target="#modal-inbox2" onclick="getMessenger2('+id+')">\n';
                      kunloc_tab_tinnhan += '<img class="avtbn" src="'+avatar+'">\n';
                      kunloc_tab_tinnhan += '<div class="profilebn row"><b class="tenbn mt-0">'+fullname+'</b>\n';
                      kunloc_tab_tinnhan += '</div>\n';
                      if(seen == 0){
                        kunloc_tinnhan += '</div></li></a>\n';
                        kunloc_tab_tinnhan += '<b>'+text+'</b>, <small>'+time+'</small>\n';
                      }else{
                       kunloc_tab_tinnhan += '<h>'+text+'</h>, <small>'+time+'</small>\n';
                      }
                      kunloc_tab_tinnhan += '</a>\n';
                      }
                      if(Data.length < 4){
                        $("#tin-nhan").css('height','auto').css('overflow','auto');
                      }else if(Data.length > 4){
                        $("#tin-nhan").css('height','458px').css('overflow','auto');
                      }else{
                        $("#tin-nhan").css('height','auto').css('overflow','auto');
                      }
                    }
                    $('#total1').text(total)
                    $('#total3').text(total)
                    $('#tin-nhan').html(kunloc_tinnhan)   
                    $('#tab-tinnhan').html(kunloc_tab_tinnhan)
                    }
                 })
               }
            function getMessenger2(uid){
                    $.post("API/api_inbox.php", {type: 'SEEN_MESS', uid: uid}, function(data){
                    kunloc_input = '<input type="number" id="idreplay" value="'+uid+'" hidden class="form-control feed-comment-input">\n';
                    $('#data-inbox2').html(data)
                    $('#input2').html(kunloc_input)
                })
            }
            function getMessenger3(uid){
                    $.post("API/api_inbox.php", {type: 'SEEN_NOTI', uid: uid}, function(data){})
            } 
         </script>
     <li class="nav-item dropdown mg">
            <a class="nav-link waves-effect waves-light bongbong" id="Notification" data-toggle="dropdown">
            <span class="cham"><i class="cham-so" id="total2">0</i></span>
            <svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M7.847 23.488C9.207 23.488 11.443 23.363 14.467 22.806 13.944 24.228 12.581 25.247 10.98 25.247 9.649 25.247 8.483 24.542 7.825 23.488L7.847 23.488ZM24.923 15.73C25.17 17.002 24.278 18.127 22.27 19.076 21.17 19.595 18.724 20.583 14.684 21.369 11.568 21.974 9.285 22.113 7.848 22.113 7.421 22.113 7.068 22.101 6.79 22.085 4.574 21.958 3.324 21.248 3.077 19.976 2.702 18.049 3.295 17.305 4.278 16.073L4.537 15.748C5.2 14.907 5.459 14.081 5.035 11.902 4.086 7.022 6.284 3.687 11.064 2.753 15.846 1.83 19.134 4.096 20.083 8.977 20.506 11.156 21.056 11.824 21.986 12.355L21.986 12.356 22.348 12.561C23.72 13.335 24.548 13.802 24.923 15.73Z"></path></svg> </a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="Notification">
              <b class="tieude-text"><svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M7.847 23.488C9.207 23.488 11.443 23.363 14.467 22.806 13.944 24.228 12.581 25.247 10.98 25.247 9.649 25.247 8.483 24.542 7.825 23.488L7.847 23.488ZM24.923 15.73C25.17 17.002 24.278 18.127 22.27 19.076 21.17 19.595 18.724 20.583 14.684 21.369 11.568 21.974 9.285 22.113 7.848 22.113 7.421 22.113 7.068 22.101 6.79 22.085 4.574 21.958 3.324 21.248 3.077 19.976 2.702 18.049 3.295 17.305 4.278 16.073L4.537 15.748C5.2 14.907 5.459 14.081 5.035 11.902 4.086 7.022 6.284 3.687 11.064 2.753 15.846 1.83 19.134 4.096 20.083 8.977 20.506 11.156 21.056 11.824 21.986 12.355L21.986 12.356 22.348 12.561C23.72 13.335 24.548 13.802 24.923 15.73Z"></path></svg> </a>
             Thông báo</b>
              <hr>
              <div class="mt-1" id="thongbao">
              <center><span class="spinner-border text-muted spinner-border-lg m-2"></span></center>
              </div>
              <small class="banquyen d-none">Website được thiết kế bởi <b><?= $name_admin ?> </b>! Vui lòng không copy dưới mọi hình thức!</small>

            <script>
               $(document).ready(function () {
                setTimeout(() => {
                  getNoti()
                }, 1000);
               })

               function getNoti(uid){
                 $.post("API/api_thongbao.php",{ type: "GET"},function(data){
                    Data = JSON.parse(data);
                    if(Data == null || !Data.length){
                        echo = '<a class="dropdown-item" href="javascript:volid();"><div class="text-center"><h class="tieude-text mt-1">Chưa có thông báo</h></div></a>';
                        $('#total1').text(0)
                        $('#thongbao').html(echo)   
                        $('#tab-thongbao').html(echo) 
                        return false;
                    }else{
                    kunloc_noti = '';
                    kunloc_tab_noti = '';
                    var total2=0;
                    for(var i=0; i<Data.length; i++){
                      uid = Data[i].uid;
                      tieude = Data[i].tieude;
                      noidung = Data[i].noidung;
                      href = Data[i].href;
                      time = Data[i].time;
                      seen = Data[i].seen;
                      session_verify = Data[i].session_verify;
                      avatar = Data[i].avatar;
                      if(seen == 0){
                         total2++; 
                      }
                      if(uid){
                      kunloc_noti += '<a class="dropdown-item m-0 p-0" href="'+href+'"><li class=" m-0 p-0 list-group" onclick="getMessenger3('+uid+')">\n';
                      kunloc_noti += '<div class="profilebn m-0">\n';
                      kunloc_noti += '<img class="avtbn" src="'+avatar+'"/>\n';
                      if(seen == 0){
                        kunloc_noti += '<b class="tieude-text">'+tieude+'</b> '+noidung+'<br>\n';
                        kunloc_noti += '<small>'+time+'</small>\n';
                      }else{
                        kunloc_noti += '<b class="tieude-text">'+tieude+'</b> '+noidung+'<br>\n';
                        kunloc_noti += '<small>'+time+'</small>\n';
                      }
                      kunloc_noti += '</div></li></a>\n';
                      kunloc_tab_noti += '<a class="dropdown-item" href="'+href+'">\n';
                      kunloc_tab_noti += '<img class="avtbn" src="'+avatar+'">\n';
                      kunloc_tab_noti += '<div class="profilebn row"><b class="tenbn mt-0">'+tieude+'</b>\n';
                      kunloc_tab_noti += '</div>\n';
                      kunloc_tab_noti += '<b class="textbn">'+noidung+'</b> <small>'+time+'</small>\n';
                      kunloc_tab_noti += '</a>\n';
                      }
                      if(Data.length < 4){
                       $("#thongbao").css('height','258px').css('overflow','auto');
                      }else if(Data.length > 4){
                       $("#thongbao").css('height','458px').css('overflow','auto');
                      }else{
                       $("#thongbao").css('height','auto').css('overflow','auto');
                      }
                    }
                    $('#total2').text(total2)
                    $('#total4').text(total2)
                    $('#thongbao').html(kunloc_noti)
                    $('#tab-thongbao').html(kunloc_tab_noti)
                  }
                 })
               }
             </script>
              <style>
                .tieude-text{
                  display: block;
                  font-size: 17px;
                  margin-top: 4px;
                }
                .tieude-text b{
                  font-weight: bold;
                }
              </style>
            </div>
          </li>
         <!-- /./ -->
          <li class="nav-item dropdown">
            <a style="background:url(<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>);background-size:cover" class="nav-link dropdown-toggle waves-effect waves-light bongbong" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <!--i class="sp_wx0RG-EYGDH"></i-->
            </a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" id="tuy-chon" style="display:">
              <a class="dropdown-item" href="profile.php?id=<?= $id_user ?>"><img class="avtbn" src="<?php if($avatar == ''){ echo $avt_macdinh; }else{ echo $avatar; } ?>" />
              <div class="profilebn"><b class="tenbn"><?= $fullname ?> <?= $verify ?></b><b class="textbn">Xem trang cá nhân của bạn</b></div></a>
              <b class="cach"><hr></b>
              <a class="dropdown-item" data-toggle="modal" data-target="#donggop">
                 <div class="row">
                  <div class="col-md-2">
                      <b class="close-btn"><i class="sp_YPlY36x_U0m"></i></b>
                 </div>
                <div class="col-md-10 menu-icon">Đóng góp ý kiến<br/><small>Góp phần cải thiện blog của Facesbook</small></div>
                </div>
             </a>
              <b class="cach"><hr></b>
              <a class="dropdown-item" href="settings">
                  <div class="row">
                    <div class="col-md-2"><b class="close-btn"><i class="caidaticon"></i></b></div>
                    <div class="col-md-10 menu-icon">Cài đặt & quyền riêng tư</div>
                  </div>
               </a>
              <a class="dropdown-item" href="dang-xuat">
                  <div class="row">
                      <div class="col-md-2"><b class="close-btn"><i class="dangxuathn"></i></b></div>
                      <div class="col-md-10 menu-icon">Đăng xuất</div>
                    </div>
               </a>
              <br>
              <small class="banquyen">Website được thiết kế bởi <b><?= $name_admin ?> </b>! Vui lòng không copy dưới mọi hình thức!</small>
            </div>
          </li>
          <script>
               /*$('#Notification').click(function(){
                   Notification()
               })
                $('#navbarDropdownMenuLink').click(function(){
                   navbarDropdownMenuLink()
               })
               function Notification(){
                      var x = document.getElementById("thongbao");
                    if (x.style.display === "none") {
                        
                          x.style.display = "block";
                    } else {
                          x.style.display = "none";
                   } 
                  }
                function navbarDropdownMenuLink(){
                      var x = document.getElementById("tuy-chon");
                    if (x.style.display === "none") {
                        
                          x.style.display = "block";
                    } else {
                          x.style.display = "none";
                   } 
               }*/
          </script>
   </ul>
  </div></div>
</nav>
    