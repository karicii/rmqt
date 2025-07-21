<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// SORUNU ÇÖZEN SATIR:
// Bütün ayarları ve sabitleri (BASE_URL gibi) projenin geri kalanına
// tanıtmak için config.php dosyasını burada çağırıyoruz.
require_once __DIR__ . '/../config.php';

$request_uri = $_GET['url'] ?? 'home';
$request_uri = trim($request_uri, '/');

switch ($request_uri) {
    case '':
    case 'home':
        require_once __DIR__ . '/../public/includes/header.php';
        echo "<h1>Ana Sayfa</h1>";
        require_once __DIR__ . '/../public/includes/footer.php';
        break;

    case 'register':
        require_once __DIR__ . '/../register.php';
        break;

    case 'register-action':
        require_once __DIR__ . '/../src/Actions/auth/register_action.php';
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . '/../public/includes/header.php';
        echo "<h1>404 - Sayfa Bulunamadı</h1>";
        require_once __DIR__ . '/../public/includes/footer.php';
        break;
}
