<?php
    session_start();
    header("Content-type: text/javascript");
    require_once("../config.php");
    if($_GET) $_POST = $_GET;
    if($_REQUEST && isset($_REQUEST['type'])){
        switch($_REQUEST['type']){
        case 'GET':
                $data_post = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE trangthai = 1 ORDER BY id DESC LIMIT 0,5");
                while($echo_post = mysqli_fetch_object($data_post)){
                    $uid = $echo_post->uid;
                    $logs_like = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM log WHERE uid = '$uid' AND username = '$username' AND type= 'like'"));
                    if($logs_like->id){
                        $status_like = '1';
                    }else{
                        $status_like = '0';
                    }
                    $get_info = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$echo_post->username."'"));
                    if($echo_post->username == $username){
                        $get_image = $avatar;
                        $public = 'true';
                    }else if($username){
                        $get_image = $avatar;
                        $public = 'false';
					}else{
                        $get_image = 'img/button/verify.png';
                        $public = 'false';
                    }
                    if($username == $admin){
                        $session_admin = true;
                    }
                    $format_timer = _ago($echo_post->time,$rcs = 0);
                    if(isset($get_info->username)){
                        $JSON[] = array(
                            "type" => $echo_post->type,
                            "username" => $echo_post->username,
                            "fullname" => $get_info->fullname,
                            "id" => $get_info->id,
                            "avatar" => $get_info->avatar,
                            "background" => $get_info->background,
                            "text" => $echo_post->text,
                            "photo" => photo($echo_post->uid),
                            "date" => $format_timer,
                            "trangthai" => $echo_post->trangthai,
                            "uid" => $echo_post->uid,
                            "like" => formatnumber($echo_post->like),
                            "status_like" => $status_like,
                            "cmt" => formatnumber($echo_post->cmt),
                            "share" => $echo_post->share,
                            "session_avatar" => $get_image,
                            "session_verify" => verify($get_info->confirm_status),
                            "public" => $public,
                            "session_admin" => $session_admin
                        );
                       
                    }
                }
                echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
             break;
             case 'GET_PROFILE':
                $uid_profile = intval($_POST['uid']);
                $kiemtra_uid = mysqli_query($kunloc,"SELECT * FROM account WHERE id = '$uid_profile'");
                if(mysqli_num_rows($kiemtra_uid) == 1){
                    $select_sql = mysqli_fetch_object($kiemtra_uid);
                    $data_post = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE username = '".$select_sql->username."'  ORDER BY id DESC LIMIT 0,5");
                    while($echo_post = mysqli_fetch_object($data_post)){
                        $uid = $echo_post->uid;
                        $logs_like = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM log WHERE uid = '$uid' AND username = '$username' AND type= 'like'"));
                        if($logs_like->id){
                            $status_like = '1';
                        }else{
                            $status_like = '0';
                        }
                        if($echo_post->username == $username){
                            $get_image = $avatar;
                            $public = 'true';
                        }else if($username){
                        	$get_image = $avatar;
                            $public = 'false';
						}else{
                            $get_image = 'data/none.jpg';
                            $public = 'false';
                        }
                        $format_timer = _ago($echo_post->time,$rcs = 0);
                        if(isset($select_sql->username)){
                            $JSON[] = array(
                                "type" => $echo_post->type,
                                "username" => $echo_post->username,
                                "fullname" => $select_sql->fullname,
                                "id" => $select_sql->id,
                                "avatar" => $select_sql->avatar,
                                "background" => $select_sql->background,
                                "text" => $echo_post->text,
                                "photo" => photo($echo_post->uid),
                                "date" => $format_timer,
                                "trangthai" => $echo_post->trangthai,
                                "uid" => $echo_post->uid,
                                "like" => formatnumber($echo_post->like),
                                "status_like" => $status_like,
                                "cmt" => formatnumber($echo_post->cmt),
                                "share" => $echo_post->share,
                                "session_avatar" => $get_image,
                                "session_verify" => verify($select_sql->confirm_status),
                                "public" => $public
                            );
                           
                        }else{
                           $JSON[] = array("null");
                        }
                    }
                    echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
                    
                }
            break;
            case 'GET_DATA':
                $uid_post = intval($_POST['uid']);
                $kiemtra_uid = mysqli_query($kunloc,"SELECT * FROM user_post_feed WHERE uid = '$uid_post'");
                if(mysqli_num_rows($kiemtra_uid) == 1){
                    while($echo_post = mysqli_fetch_object($kiemtra_uid)){
                        $select_sql = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '{$echo_post->username}' "));
                        $uid = $echo_post->uid;
                        $logs_like = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM log WHERE uid = '$uid' AND username = '$username' AND type= 'like'"));
                        if($logs_like->id){
                            $status_like = '1';
                        }else{
                            $status_like = '0';
                        }
                        if($echo_post->username == $username){
                            $get_image = $avatar;
                            $public = 'true';
                        }else if($username){
                        	$get_image = $avatar;
                            $public = 'false';
						}else{
                            $get_image = 'data/none.jpg';
                            $public = 'false';
                        }
                        $format_timer = _ago($echo_post->time,$rcs = 0);
                        if(isset($echo_post->username)){
                            $JSON[] = array(
                                "type" => $echo_post->type,
                                "username" => $echo_post->username,
                                "fullname" => $select_sql->fullname,
                                "id" => $select_sql->id,
                                "avatar" => $select_sql->avatar,
                                "background" => $select_sql->background,
                                "text" => $echo_post->text,
                                "photo" => photo($echo_post->uid),
                                "date" => $format_timer,
                                "trangthai" => $echo_post->trangthai,
                                "uid" => $echo_post->uid,
                                "like" => formatnumber($echo_post->like),
                                "status_like" => $status_like,
                                "cmt" => formatnumber($echo_post->cmt),
                                "share" => $echo_post->share,
                                "session_avatar" => $get_image,
                                "session_verify" => verify($select_sql->confirm_status),
                                "public" => $public
                            );
                           
                        }
                    }
                    echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
                }
            break;
            #===========================
            case 'GET_CMT':
                $uid_post = $_POST['uid'];
                $data_cmt = mysqli_query($kunloc,"SELECT * FROM comment_post WHERE uid='$uid_post' ORDER BY id DESC LIMIT 0,3");
                while($echo_cmt = mysqli_fetch_object($data_cmt)){
                    $get_info_cmt = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$echo_cmt->username."' "));
                    if($get_info_cmt->confirm_status > 1){
                        $get_verify = $care;
                    }else if($get_info_cmt->confirm_status == '1'){   
                        $get_verify = $verify;
                    }else{
                        $get_verify = '';
                    }
                    $JSON[] = array(
                        "text" => $echo_cmt->text,
                        "time" => _ago($echo_cmt->time,$rcs = 0),
                        "keycode" => $echo_cmt->keycode,
                        "uid" => $echo_cmt->uid,
                        "username" => $get_info_cmt->username,
                        "fullname" => $get_info_cmt->fullname,
                        "avatar" => $get_info_cmt->avatar,
                        "id" => $get_info_cmt->id,
                        "session_verify" => verify($get_info_cmt->confirm_status),
                        "session_avatar" => $avatar,
                        "replay" => replay($echo_cmt->keycode)
 
                    );

                }
            echo(json_encode($JSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ));
            break;
        }
    }
    function verify($confirm_status){
    $verifed = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Facebook đã xác nhận đây là trang cá nhân thật của người của công chúng này."><svg height="13" width="13" viewBox="0 0 512.063 512.063"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0" fill="#2196f3"/><path d="m385.75 201.75-138.667969 138.664062c-4.160156 4.160157-9.621093 6.253907-15.082031 6.253907s-10.921875-2.09375-15.082031-6.253907l-69.332031-69.332031c-8.34375-8.339843-8.34375-21.824219 0-30.164062 8.339843-8.34375 21.820312-8.34375 30.164062 0l54.25 54.25 123.585938-123.582031c8.339843-8.34375 21.820312-8.34375 30.164062 0 8.339844 8.339843 8.339844 21.820312 0 30.164062zm0 0" fill="#fafafa"/></svg></span>';
    $verify_admin = '<span class="verify-feed"><i data-toggle="tooltip" data-placement="top" title="Facebook đã xác nhận đây là trang cá nhân thật của người của công chúng này."></i></span>';
    $verify_admin2 = '<span class="verify-care"><i data-toggle="tooltip" data-placement="top" title="Huy hiệu độc quyền dành riêng cho admin."></i> </span>';
    $top1 = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Vinh danh TOP 1 Bảng xếp hạng"><svg height="13" width="13" x="0px" y="0px" viewBox="0 0 455.111 455.111" style="enable-background:new 0 0 455.111 455.111;"><circle style="fill:#E24C4B;" cx="227.556" cy="227.556" r="227.556"/><path style="fill:#D1403F;" d="M455.111,227.556c0,125.156-102.4,227.556-227.556,227.556c-72.533,0-136.533-32.711-177.778-85.333 c38.4,31.289,88.178,49.778,142.222,49.778c125.156,0,227.556-102.4,227.556-227.556c0-54.044-18.489-103.822-49.778-142.222 C422.4,91.022,455.111,155.022,455.111,227.556z"/><path style="fill:#FFFFFF;" d="M351.289,162.133L203.378,324.267c-9.956,11.378-27.022,11.378-36.978,0l-62.578-69.689 c-8.533-9.956-8.533-25.6,1.422-35.556c9.956-8.533,25.6-8.533,35.556,1.422l44.089,49.778l129.422-140.8 c9.956-9.956,25.6-11.378,35.556-1.422C359.822,136.533,359.822,153.6,351.289,162.133z"/></svg></span>';
    $top2 = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Vinh danh TOP 2 Bảng xếp hạng"><svg height="13" width="13" x="0px" y="0px" viewBox="0 0 507.2 507.2" style="enable-background:new 0 0 507.2 507.2;"><circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"/><path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"/><path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8 c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"/><path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"/></svg></span>';
    $top3 = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Vinh danh TOP 3 Bảng xếp hạng"><svg height="13" width="13"  x="0" y="0" viewBox="0 0 455.111 455.111" style="enable-background:new 0 0 512 512"><circle cx="227.556" cy="227.556" r="227.556" fill="#c84be2" data-original="#e24c4b" class=""/><path d="M455.111,227.556c0,125.156-102.4,227.556-227.556,227.556c-72.533,0-136.533-32.711-177.778-85.333  c38.4,31.289,88.178,49.778,142.222,49.778c125.156,0,227.556-102.4,227.556-227.556c0-54.044-18.489-103.822-49.778-142.222  C422.4,91.022,455.111,155.022,455.111,227.556z" fill="#a33fd1" data-original="#d1403f" class=""/><path d="M351.289,162.133L203.378,324.267c-9.956,11.378-27.022,11.378-36.978,0l-62.578-69.689  c-8.533-9.956-8.533-25.6,1.422-35.556c9.956-8.533,25.6-8.533,35.556,1.422l44.089,49.778l129.422-140.8  c9.956-9.956,25.6-11.378,35.556-1.422C359.822,136.533,359.822,153.6,351.289,162.133z" fill="#ffffff" data-original="#ffffff"></svg></span>';
    $support = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Đây là người trong Ban Hỗ trợ Facesbook"><svg height="13" width="13" viewBox="0 0 512.063 512.063"><path d="m511.375 255.688-57.89-64.273 9.064-86.046-84.651-17.92-43.18-75.012-79.03 35.321-10.667 207.93 10.667 207.929 79.031 35.321 43.179-75.011 84.651-17.921-9.064-86.046z" fill="#0ed678"/><path d="m176.656 12.437-43.179 75.012-84.651 17.921 9.064 86.045-57.89 64.273 57.89 64.272-9.064 86.046 84.651 17.921 43.18 75.011 79.031-35.321v-415.859z" fill="#04eb84"/></g><g><path d="m362.878 199.702-22.381-19.977-84.809 95.016-10.667 23.613 10.667 21.439z" fill="#f7f0eb"/><path d="m166.56 233.095-21.212 21.213 89.185 89.186 21.155-23.701v-45.052l-22.393 25.088z" fill="#fffbf5"/></svg></span>';
    $vinhdanh = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Người phát triển hệ thống"><svg height="13" width="13" viewBox="-38 0 511 511.99956"><path d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.507812 512 C 216.105469 512 213.691406 511.757812 211.296875 511.289062 C 209.605469 510.949219 207.945312 510.488281 206.339844 509.9375 C 157.117188 492.769531 116.386719 468.675781 85.289062 438.339844 C 57.984375 411.6875 37.175781 379.277344 23.433594 341.980469 C -1.554688 274.167969 -0.132812 199.464844 1.011719 139.433594 L 1.03125 138.511719 C 1.261719 133.554688 1.410156 128.347656 1.492188 122.597656 C 1.910156 94.367188 24.355469 71.011719 52.589844 69.4375 C 111.457031 66.152344 156.996094 46.953125 195.90625 9.027344 L 196.246094 8.714844 C 202.707031 2.789062 210.847656 -0.117188 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,86.666667%,50.196078%);fill-opacity:1;" /><path d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,66.666667%,38.823529%);fill-opacity:1;" /><path d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.5 383.605469 C 148.144531 383.605469 90.894531 326.359375 90.894531 256 C 90.894531 185.644531 148.144531 128.398438 218.5 128.398438 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 " style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" /><path d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 " style=" stroke:none;fill-rule:nonzero;fill:rgb(88.235294%,92.156863%,94.117647%);fill-opacity:1;" /><path d="M 276.417969 237.625 L 218.949219 295.101562 L 206.53125 307.519531 C 203.597656 310.453125 199.75 311.917969 195.90625 311.917969 C 192.058594 311.917969 188.214844 310.453125 185.277344 307.519531 L 158.578125 280.808594 C 152.710938 274.941406 152.710938 265.4375 158.578125 259.566406 C 164.4375 253.699219 173.953125 253.699219 179.820312 259.566406 L 195.90625 275.652344 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(70.588235%,82.352941%,84.313725%);fill-opacity:1;" /><path d="M 276.417969 237.625 L 218.949219 295.101562 L 218.949219 252.605469 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(43.529412%,64.705882%,66.666667%);fill-opacity:1;" /></svg></span>';
    $dung = '<span class="verify-icon" data-toggle="tooltip" data-placement="top" title="Chuyên gia truy tìm gái xinh"><svg  height="13" width="13" viewBox="0 0 512 512"><path clip-rule="evenodd" d="m50.078 512h72.749v-56.279c0-15.012-1.197-23.218-11.185-34.258l-38.112-42.085c-15.887 13.727-26.868 31.279-28.883 54.264l-5.783 66.092c-.847 9.462 1.694 12.12 11.214 12.266z" fill="#f9f7f8" fill-rule="evenodd"/><path clip-rule="evenodd" d="m199.314 277.831v51.285l57.212 75.788 56.949-75.584c-.263-.058-.526-.117-.789-.175v-50.555c-39.192-26.489-74.851-22.721-113.372-.759z" fill="#fed1a3" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m65.002 216.938c9.17 24.591 10.426 52.979-.146 101.664-2.95 13.639-3.855 12.179 11.244 8.324 44.537-11.419 67.346-37.354 84.547-88.113 32.067-84.842 54.175-104 2.103-199.648-38.988-19.509-75.319 7.243-94.594 40.099-28.183 48.072-18.341 97.049-3.154 137.674z" fill="#be694f" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m352.463 238.813c17.172 50.759 39.981 76.693 84.518 88.113 15.099 3.855 14.193 5.315 11.244-8.324-10.572-48.685-9.316-77.073-.146-101.664 15.186-40.625 25.028-89.602-3.154-137.674-19.275-32.856-55.606-59.608-94.594-40.099-31.337 88.229-44.771 135.308 2.132 199.648z" fill="#be694f" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m104.837 173.889c0 19.071 19.012 29.41 38.521 29.585 12.908-21.904 10.484-42.348-3.563-58.557l-15.683-.088h-1.46c-9.784 0-17.815 8.031-17.815 17.815z" fill="#ffbc85" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m227.292 292.638c10.572 3.914 19.918 5.87 29.263 5.87 9.316 0 18.662-1.957 29.234-5.87 9.375-3.475 18.399-8.265 26.897-14.048 15.624-10.631 29.351-24.591 39.777-39.778 7.798-11.39 13.755-23.452 17.26-35.309 2.336-7.915 3.563-15.713 3.563-23.189v-35.397c-72.691.263-93.397-66.617-116.731-66.617-22.342 0-47.253 66.88-116.76 66.618v35.397c0 7.477 1.256 15.274 3.563 23.189 3.534 11.857 9.462 23.919 17.289 35.309 10.163 14.836 23.51 28.505 38.667 39.018 8.79 6.104 18.224 11.156 27.978 14.807z" fill="#ffe5c1" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m373.286 180.314c0 7.477-1.227 15.274-3.563 23.189 19.509-.204 38.521-10.543 38.521-29.614v-11.244c0-9.784-8.031-17.815-17.815-17.815h-1.46l-15.683.088z" fill="#ffbc85" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m218.618 132.709c9.784-4.206 18.779-9.901 26.021-17.552 7.038-7.447 9.462-11.156 11.915-11.156 2.424 0 4.848 3.709 11.886 11.156 7.243 7.652 16.238 13.347 26.021 17.552 14.135 5.607 20.531 5.607 42.201 10.485 14.047 1.636 27.014 1.752 36.331 1.723l15.975-.088c0-46.349-15.332-81.571-38.638-105.665-25.086-25.934-59.401-38.989-93.775-39.164-34.403.175-68.718 13.23-93.805 39.164-23.305 24.094-38.638 59.316-38.638 105.665l15.683.088h.292c9.316.029 22.283-.088 36.331-1.723 24.298-4.118 30.986-6.104 42.2-10.485z" fill="#d09080" fill-rule="evenodd"/><path clip-rule="evenodd" d="m181.557 194.771h51.751c2.833 0 5.169-2.307 5.169-5.14l-.029-25.876.029-25.876c0-2.833-2.336-5.169-5.169-5.169h-14.69-37.061c-2.833 0-5.14 2.336-5.14 5.169v5.315 46.437c0 2.833 2.308 5.14 5.14 5.14z" fill="#a1d4ff" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m279.773 194.771h51.751c2.833 0 5.14-2.307 5.14-5.14v-46.437-5.315c0-2.833-2.307-5.169-5.14-5.169h-37.061-14.69c-2.833 0-5.14 2.336-5.14 5.169v25.876 25.876c0 2.833 2.307 5.14 5.14 5.14z" fill="#a1d4ff" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m389.173 512h72.749c9.521-.146 12.062-2.804 11.215-12.266l-5.783-66.092c-2.044-22.985-12.996-40.537-28.883-54.264l-38.112 42.085c-9.988 11.04-11.185 19.246-11.185 34.258v56.279z" fill="#f9f7f8" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m122.827 512h266.346v-56.279c0-15.012 1.197-23.218 11.185-34.258l38.112-42.085c-23.568-20.356-57.913-32.301-89.775-41.034l-92.17 35.631-92.228-35.893c-32.125 8.762-66.966 20.707-90.768 41.296l38.112 42.085c9.988 11.04 11.185 19.246 11.185 34.258v56.279z" fill="#eb5468" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m256.526 373.975 51.429 27.044c10.076 5.286 19.1 2.95 23.86-7.068l16.88-55.607c-12.383-3.388-24.357-6.279-35.221-9.024z" fill="#f9f7f8" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m181.265 393.952c4.76 10.017 13.785 12.354 23.86 7.068l51.4-27.044-57.212-44.859v.029c-10.747 2.687-22.692 5.578-35.016 8.937z" fill="#f9f7f8" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m388.969 144.83c0-46.349-15.332-81.571-38.638-105.665-25.087-25.935-59.402-38.99-93.776-39.165-21.874.117-43.748 5.432-63.199 15.975 8.645-1.752 17.435-2.628 26.226-2.687 34.374.204 68.689 13.23 93.776 39.164 8.528 8.82 15.975 19.071 21.991 30.841 8.615 16.822 14.339 36.653 16.092 59.521.029.526.088 1.081.117 1.636 8.177.438 15.537.496 21.436.467h.292z" fill="#ce775f" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m373.286 144.917h-.292zm-3.563 58.586c2.336-7.915 3.563-15.713 3.563-23.189v-35.397h-.292c-5.899.029-13.259-.029-21.436-.467v35.397c0 7.477-1.256 15.304-3.592 23.189-1.781 6.016-4.176 12.091-7.126 18.107-2.891 5.812-6.279 11.595-10.134 17.202-10.426 15.187-24.152 29.147-39.777 39.778-2.833 1.928-5.724 3.738-8.674 5.432-5.87 3.388-11.974 6.308-18.194 8.616-7.038 2.599-13.522 4.352-19.83 5.228 4.176.73 8.236 1.11 12.324 1.11 9.316 0 18.662-1.957 29.234-5.87 9.345-3.475 18.341-8.236 26.81-13.989.029-.029.058-.029.088-.058 15.624-10.631 29.351-24.591 39.777-39.778 7.796-11.391 13.754-23.453 17.259-35.311z" fill="#fed1a3" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m312.686 278.59-.088.058c.03-.028.059-.028.088-.058zm-68.455 18.809c-5.403-.964-10.952-2.57-16.939-4.76-9.754-3.651-19.187-8.703-27.978-14.807v25.642c20.268 16.18 57.095 26.577 91.06 12.383v31.6l23.101-18.137-.789-.175v-50.555c-.029.029-.058.029-.088.058-8.469 5.753-17.464 10.514-26.81 13.989-10.572 3.914-19.918 5.87-29.234 5.87-4.088.001-8.147-.378-12.323-1.108z" fill="#ffbc85" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m238.477 189.631-.029-25.876.029-25.876c0-2.833-2.336-5.169-5.169-5.169h-14.69-4.585c.234.497.467.993.701 1.489 4.79 10.952 5.666 25.38 1.431 39.982-2.249 7.798-5.724 14.778-9.959 20.59h27.102c2.833 0 5.169-2.307 5.169-5.14z" fill="#9dc6fb" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m336.663 189.631v-25.876-25.876c0-2.833-2.307-5.169-5.14-5.169h-14.69-4.585c.234.497.467.993.701 1.489 4.79 10.952 5.666 25.38 1.431 39.982-2.249 7.798-5.724 14.778-9.959 20.59h27.102c2.833 0 5.14-2.307 5.14-5.14z" fill="#9dc6fb" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m348.695 338.345c-12.383-3.388-24.357-6.279-35.221-9.024l-23.101 18.137-3.505 2.745c2.979.759 6.045 1.519 9.141 2.307 3.183.789 6.396 1.606 9.667 2.482 2.716.701 5.461 1.431 8.206 2.19 8.791 2.395 17.756 5.053 26.635 8.061z" fill="#dddaec" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m438.47 379.378c-23.568-20.356-57.913-32.301-89.775-41.034l-8.177 26.898c23.364 7.885 46.085 18.195 63.14 32.973 3.359 2.891 6.513 5.987 9.375 9.229z" fill="#e5384f" fill-rule="evenodd"/></g><g><path clip-rule="evenodd" d="m467.354 433.642c-2.044-22.985-12.996-40.537-28.883-54.264l-25.437 28.066c10.747 12.179 17.902 26.898 19.48 45.035l5.256 59.521h24.152c9.521-.146 12.062-2.804 11.215-12.266z" fill="#dddaec" fill-rule="evenodd"/></g><g><path d="m256.54 252.906c-9.945 0-19.298-3.887-26.337-10.944-3.014-3.021-3.007-7.913.014-10.927 3.022-3.014 7.914-3.007 10.927.014 4.119 4.13 9.587 6.404 15.396 6.404s11.277-2.274 15.396-6.404c3.013-3.022 7.905-3.028 10.927-.014 3.021 3.014 3.028 7.905.014 10.927-7.039 7.057-16.392 10.944-26.337 10.944z" fill="#eb5468"/></g><g><path d="m207.403 171.51c-1.977 0-3.955-.755-5.463-2.263-3.018-3.017-3.018-7.909 0-10.927s7.939-3.046 10.956-.029c3.018 3.017 3.047 7.88.029 10.897l-.058.058c-1.509 1.51-3.486 2.264-5.464 2.264z" fill="#365e7d"/></g><path d="m331.523 124.983h-51.75c-7.095 0-12.866 5.785-12.866 12.896v12.911c-6.914-2.397-13.788-2.401-20.703-.01v-12.901c0-7.111-5.785-12.896-12.896-12.896h-51.751c-7.095 0-12.866 5.785-12.866 12.896v51.752c0 7.095 5.772 12.866 12.866 12.866h51.751c7.111 0 12.896-5.772 12.896-12.866v-21.818c7.299-4.497 13.402-4.49 20.703.018v21.8c0 7.095 5.772 12.866 12.866 12.866h51.75c7.095 0 12.866-5.772 12.866-12.866v-51.752c0-7.111-5.771-12.896-12.866-12.896zm-147.379 62.061v-46.609h46.607v46.609zm144.793 0h-46.577v-46.609h46.577z" fill="#e5384f"/><g><path d="m305.677 171.51c-1.977 0-3.955-.755-5.463-2.263-3.018-3.017-3.047-7.939-.029-10.956 3.018-3.018 7.881-3.046 10.897-.029l.058.058c3.018 3.017 3.018 7.909 0 10.927-1.508 1.509-3.486 2.263-5.463 2.263z" fill="#365e7d"/></svg></span>';
    $list = explode(',',$confirm_status);
    foreach ($list as $value) {
              if($value == 'verify'){
                $verify .= $verifed;
              }else if($value == 'top1'){
                $verify .= $top1;
              }else if($value == 'top2'){
                $verify .= $top2;
              }else if($value == 'top3'){
                $verify .= $top3;
              }else if($value == 'vinhdanh'){
                $verify .= $vinhdanh;
              }else if($value == 'admin2'){
                $verify .= $verify_admin2;
              }else if($value == 'admin'){
                $verify .= $verify_admin;
              }else if($value == 'dung'){
                $verify .= $dung;
              }else if($value == 'support'){
                define('chucvu','support');
                $verify .= $support;
              }else{
                  define('chucvu','member');
              }
            }
        return $verify;
    }
    function photo($uid){
        global $kunloc;
        $data_photo = mysqli_query($kunloc,"SELECT * FROM photo WHERE `uid` = '$uid' ORDER BY id ASC LIMIT 0,4");
                while($echo_photo = mysqli_fetch_object($data_photo)){
                    if($echo_photo->uid == $uid){
                            $get_info_photo = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$echo_photo->username."' "));
                            $JSON_PHOTO[] = array(
                                "fbid" => $echo_photo->fbid,
                                "uid" => $echo_photo->uid,
                                "image" => $echo_photo->img_url,
                                "like" => $echo_photo->keycode,
                                "cmt" => $get_info_photo->id,
                                "share" => $get_info_photo->username,
                                "username" => $get_info_photo->fullname,
                                "time" => _ago($echo_photo->time,$rcs = 0),
                            );
                } 
            }
            return $JSON_PHOTO;
    }
    function replay($keycode){
        global $kunloc;
        $data_replay = mysqli_query($kunloc,"SELECT * FROM replay WHERE keycode='$keycode' ORDER BY id ASC LIMIT 0,4");
                while($echo_rep = mysqli_fetch_object($data_replay)){
                    if($echo_rep->keycode == $keycode){
                            $get_info_replay = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM account WHERE username = '".$echo_rep->username."' "));
                            $JSON_REPLAY[] = array(
                                "text" => $echo_rep->text,
                                "uid" => $echo_rep->uid,
                                "time" => _ago($echo_rep->time,$rcs = 0),
                                "keycode" => $echo_rep->keycode,
                                "id" => $get_info_replay->id,
                                "username" => $get_info_replay->username,
                                "fullname" => $get_info_replay->fullname,
                                "avatar" => $get_info_replay->avatar,
                                "session_verify" => verify($get_info_replay->confirm_status),
                                
                            );
                        } 
            }
            return $JSON_REPLAY;
    }

?>