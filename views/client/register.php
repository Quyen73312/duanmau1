<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Đăng Ký') ?></title>
    <style>
        /* Reset cơ bản */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #fff;
            padding: 30px 40px;
            width: 380px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #444;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0056c7;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056c7;
        }

        p {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Thông báo lỗi */
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Đăng Ký</h1>

        <?php if(!empty($error)) : ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>?action=do-register">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Đăng ký</button>
        </form>

        <p>Đã có tài khoản? <a href="<?= BASE_URL ?>?action=login">Đăng nhập</a></p>
    </div>
</body>
</html>
