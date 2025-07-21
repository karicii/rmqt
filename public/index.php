<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ÇÖZÜM: config.php dosyasını en başta dahil ediyoruz.
// Böylece BASE_URL gibi sabitler projenin her yerinde kullanılabilir olur.
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

    case 'register-action':
        require_once __DIR__ . '/../src/Actions/auth/register_action.php';
        break;

    default:
        http_response_code(404);
        echo "404 Sayfa Bulunamadı";
        break;
}
