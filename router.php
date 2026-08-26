<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/') {
    require __DIR__ . '/index.php';
    return true;
}

$routes = [
    '/trang-chu' => '/index.php',
    '/dang-nhap' => '/log/dang-nhap-he-thong.php',
    '/profile' => '/profile.php',
    '/confirm-account' => '/confirm-account.php',
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