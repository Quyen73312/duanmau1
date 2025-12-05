
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Đăng Nhập') ?></title>
    <style>
        body { font-family: Arial; background: #f2f4f7; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: #fff; padding: 30px 40px; width: 380px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        label { display: block; margin-bottom: 6px; color: #444; font-weight: bold; }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 15px; }
        button { width: 100%; padding: 12px; background: #007bff; border: none; color: white; font-size: 16px; border-radius: 8px; cursor: pointer; }
        button:hover { background: #0056c7; }
        p { text-align: center; margin-top: 12px; font-size: 14px; }
        a { color: #007bff; font-weight: bold; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>

        <?php if (!empty($_SESSION['success_message'])): ?>
            <p style="color: green;"><?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?></p>
        <?php endif; ?>

        <?php if (!empty($login_error)): ?>
            <p style="color: red;"><?= $login_error ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>?action=do-login">
            <label for="username_or_email">Email hoặc Tài khoản:</label>
            <input type="text" name="username_or_email" id="username_or_email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Đăng Nhập</button>

            <p>Chưa có tài khoản? <a href="<?= BASE_URL ?>?action=register">Đăng ký ngay</a></p>
        </form>
    </div>
</body>
</html>
