<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config.php';

$request_uri = $_GET['url'] ?? 'home';
$request_uri = trim($request_uri, '/');

switch ($request_uri) {
    case '':
    case 'home':
        echo "Ana Sayfa";
        break;

    case 'register':
        require_once __DIR__ . '/../register.php';
        break;


    default:
        http_response_code(404);
        echo "404 Sayfa Bulunamadı";
        break;
}
