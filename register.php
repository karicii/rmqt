<?php
require_once __DIR__ . '/public/includes/header.php';
?>

<div class="form-container">
    <h3>Yeni Hesap Oluştur</h3>
    <form action="<?= BASE_URL ?>/register-action" method="POST">
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
