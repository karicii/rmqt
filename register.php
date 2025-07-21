<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/public/includes/header.php';
?>

<div class="form-container">
    <h3>Yeni Hesap Oluştur</h3>

    <?php
    if (!empty($_GET['error'])) {
        $error = $_GET['error'];
        $messages = [
            'missing_fields' => 'Lütfen tüm alanları doldurun.',
            'invalid_email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'password_short' => 'Parola en az 8 karakter olmalıdır.',
            'user_exists' => 'Bu kullanıcı adı veya e-posta zaten kayıtlı.',
            'db_error' => 'Bir veritabanı hatası oluştu. Lütfen daha sonra tekrar deneyin.'
        ];
        if (isset($messages[$error])) {
            echo '<div class="error-message">' . htmlspecialchars($messages[$error]) . '</div>';
        } else {
            echo '<div class="error-message">Bilinmeyen bir hata oluştu.</div>';
        }
    }
    ?>

    <form action="<?= BASE_URL ?>/register-action.php" method="POST">
        <div class="form-group">
            <label for="username">Kullanıcı Adı</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">E-posta</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Parola</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="form-button">Kayıt Ol</button>
        <div class="form-link">
            <a href="#">Zaten bir hesabın var mı? Giriş Yap</a>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . '/public/includes/footer.php';
?>
