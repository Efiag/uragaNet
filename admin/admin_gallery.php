<?php
$conn = new mysqli("localhost", "root", "", "uraga_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery - Admin</title>
<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: #f4f6f8;
    margin: 0;
    padding: 20px;
  }
  h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #1f2937;
  }
  a.button {
    display: inline-block;
    margin: 10px 0;
    padding: 10px 15px;
    background: #2563eb;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.3s;
  }
  a.button:hover { background: #1e40af; }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }
  .gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .gallery-item:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  }
  .gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
  }
  .delete-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(220, 38, 38, 0.85);
    color: #fff;
    padding: 5px 8px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s;
  }
  .delete-btn:hover { background: rgba(185, 28, 28, 0.85); }
</style>
</head>
<body>

<h1>Gallery</h1>

<a class="button" href="admin_upload.php">Upload More</a>
<a class="button" href="admin_dashboard.php">← Back to Dashboard</a>

<div class="gallery-grid">
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="gallery-item">
      <img src="../uploads/<?= htmlspecialchars($row['filename']) ?>" alt="Image">
      <a class="delete-btn" href="delete_image.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
