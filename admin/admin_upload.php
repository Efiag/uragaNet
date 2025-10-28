<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Image - Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f3f4f6;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      background: #fff;
      padding: 40px 50px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      width: 400px;
    }
    h1 { margin-bottom: 25px; font-size: 28px; color: #1f2937; }
    form { display: flex; flex-direction: column; gap: 15px; }
    input[type="file"], input[type="text"], select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #d1d5db;
      cursor: pointer;
    }
    button {
      padding: 12px;
      background: linear-gradient(135deg, #ea580c, #f59e0b, #b45309);
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }
    a { display: inline-block; margin-top: 20px; text-decoration: none; color: #374151; font-weight: 500; transition: color 0.3s; }
    a:hover { color: #ea580c; }
    p.message { margin-top: 15px; color: #16a34a; font-weight: 500; }
    p.error { color: #dc2626; }
  </style>
</head>
<body>

<div class="container">
  <h1>Upload Image</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <input type="text" name="caption" placeholder="Image caption (optional)">
    <select name="category" required>
      <option value="">Select Category</option>
      <option value="farms">Farms</option>
      <option value="processing">Processing</option>
      <option value="people">People</option>
      <option value="products">Products</option>
      <option value="landscapes">Landscapes</option>
    </select>
    <button type="submit" name="upload">Upload</button>
  </form>

  <p><a href="admin_gallery.php">View Gallery</a></p>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
      $conn = new mysqli("localhost", "root", "", "uraga_db");
      if ($conn->connect_error) {
          die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
      }

      $targetDir = "../uploads/";
      if (!file_exists($targetDir)) { mkdir($targetDir, 0777, true); }

      $filename = basename($_FILES["image"]["name"]);
      $category = $_POST['category'];
      $caption = $_POST['caption'] ?? '';
      $targetFile = $targetDir . $filename;

      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
          $stmt = $conn->prepare("INSERT INTO gallery (filename, category, caption) VALUES (?, ?, ?)");
          $stmt->bind_param("sss", $filename, $category, $caption);
          $stmt->execute();
          echo "<p class='message'>✅ Image uploaded successfully!</p>";
      } else {
          echo "<p class='error'>❌ Failed to upload image.</p>";
      }

      $conn->close();
  }
  ?>

  <a href="admin_dashboard.php">← Back to Dashboard</a>
</div>

</body>
</html>
