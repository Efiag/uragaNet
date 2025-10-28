<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'uraga_db');
if ($conn->connect_error) die('Connection Failed: ' . $conn->connect_error);

// Fetch messages
$sql = "SELECT * FROM messages ORDER BY sent_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Messages</title>
  <style>
    body {font-family: Arial; margin: 40px;}
    table {width: 100%; border-collapse: collapse;}
    th, td {padding: 12px; border: 1px solid #ccc;}
    th {background-color: #3498db; color: #fff;}
  </style>
</head>
<body>
<a href="admin_dashboard.php">Dashboard</a> |
<h1>Customer Messages</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
      <th>Sent At</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['message']); ?></td>
          <td><?php echo htmlspecialchars($row['sent_at']); ?></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="4">No messages found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<a href="admin_dashboard.php">← Back to Dashboard</a>

</body>
</html>

<?php $conn->close(); ?>
