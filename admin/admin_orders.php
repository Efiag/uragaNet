<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'uraga_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch all orders
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>



<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Manage Orders</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<header>
  <div class="header-container">
    <h1>Admin Dashboard - Orders</h1>
    <nav>
      <a href="admin_dashboard.php">Dashboard</a>
      <a href="admin_gallery.php">Gallery</a>
      <a href="admin_messages.php">Messages</a>
      <a href="admin_orders.php" class="active">Orders</a>
      <a href="logout.php" class="logout">Logout</a>
    </nav>
  </div>
</header>

<main>
  <section class="admin-section">
    <h2>Sample Requests / Orders</h2>

    <?php if ($result->num_rows > 0): ?>
    <div class="table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Company</th>
            <th>Notes</th>
            <th>Date Ordered</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1; while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $count++ ?></td>
            <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['street_address'] . ', ' . $row['city'] . ', ' . $row['country']) ?></td>
            <td><?= htmlspecialchars($row['company_name']) ?></td>
            <td><?= htmlspecialchars($row['order_notes']) ?></td>
            <td><?= htmlspecialchars($row['order_date']) ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <?php else: ?>
      <p class="no-orders">No orders found.</p>
    <?php endif; ?>
  </section>
</main>

</body>
</html>

<?php
$conn->close();
?>
