<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}

require_once __DIR__ . '/../../../config.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($email) || empty($password)) {
    header('Location: ' . BASE_URL . '/register?error=missing_fields');
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . '/register?error=invalid_email');
    exit();
}

if (mb_strlen($password) < 8) {
    header('Location: ' . BASE_URL . '/register?error=password_short');
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1");
    $stmt->execute([':username' => $username, ':email' => $email]);
    if ($stmt->fetch()) {
        header('Location: ' . BASE_URL . '/register?error=user_exists');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    header('Location: ' . BASE_URL . '/login?success=registered');
    exit();

} catch (PDOException $e) {
    error_log($e->getMessage());
    header('Location: ' . BASE_URL . '/register?error=db_error');
    exit();
}
