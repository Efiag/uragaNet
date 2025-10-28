<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - UragaNet Coffee</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="dashboard-container">
  <h1>Admin Dashboard</h1>
  <div class="dashboard-cards">
    <a href="admin_orders.php" class="card">📦 Manage Orders</a>
    <a href="admin_messages.php" class="card">📩 Manage Messages</a>
    <a href="admin_gallery.php" class="card">🖼️ Manage Gallery</a>
    <a href="admin_logout.php" class="card logout">🚪 Logout</a>
  </div>
</div>

</body>
</html>
