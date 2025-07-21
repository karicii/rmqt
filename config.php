<?php
define('DB_HOST', 'lamp_db');
define('DB_PORT', '3306');
define('DB_NAME', 'rmqt');
define('DB_USER', 'root');
define('DB_PASS', 'root');

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, $options);
} catch (\PDOException $e) {
     die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

define('BASE_URL', 'http://localhost:8080/rmqt');

?>
