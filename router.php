<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => '/index.php',
    '/trang-chu' => '/index.php',
    '/dang-nhap' => '/log/dang-nhap-he-thong.php',
    '/dang-xuat' => '/log/dang-xuat.php',
    '/xac-nhan-tai-khoan' => '/confirm-account.php',
    '/settings' => '/core/setting.php',
    '/admin' => '/core/admin.php',
    '/support' => '/core/support.php',
    '/photo' => '/photo.php',
];

if (isset($routes[$uri])) {
    require __DIR__ . $routes[$uri];
    return true;
}

$file = __DIR__ . $uri;
if (is_file($file)) {
    return false;
}

require __DIR__ . '/index.php';
return true;
?>