<?php
// Bu dosyanın en üstüne, header'ı dahil etmek için bir require satırı ekleyeceğiz.
// Şimdilik boş bırakabiliriz.
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Oluştur - RMQT</title>
    <!-- Buraya kendi CSS dosyanı bağlayacaksın -->
    <link rel="stylesheet" href="path/to/your/style.css">
</head>
<body>

    <div>
        <h3>Yeni Hesap Oluştur</h3>
        <form action="<?= BASE_URL ?>/register-action" method="POST">
            <div>
                <label for="username">Kullanıcı Adı</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Parola</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit">Kayıt Ol</button>
                <a href="#">Giriş Yap</a>
            </div>
        </form>
    </div>

</body>
</html>
