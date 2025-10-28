<?php
session_start();

// Set admin username and password
$admin_username = 'admin';
$admin_password = '1200'; // Change this to your password

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error = "Incorrect username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - UragaNet Coffee</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f5f5f5;
  }

  .login-card {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  .login-card h2 {
    margin-bottom: 25px;
    color: #333;
  }

  .login-card input {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
  }

  .login-card button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(135deg, #ea580c, #f59e0b, #b45309);
    color: #fff;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .login-card button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  }

  .error-message {
    color: red;
    margin-bottom: 15px;
    font-size: 14px;
  }
</style>
</head>
<body>

<div class="login-card">
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
