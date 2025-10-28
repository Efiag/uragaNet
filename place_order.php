<?php
session_start();
$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $company_name = $_POST['company_name'] ?? '';
    $country = $_POST['country'] ?? '';
    $street_address = $_POST['street_address'] ?? '';
    $city = $_POST['city'] ?? '';
    $postal_code = $_POST['postal_code'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $order_notes = $_POST['order_notes'] ?? '';

    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'uraga_db');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Insert order info
    $stmt = $conn->prepare("INSERT INTO orders (first_name, last_name, company_name, country, street_address, city, postal_code, phone, email, order_notes, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssssss", $first_name, $last_name, $company_name, $country, $street_address, $city, $postal_code, $phone, $email, $order_notes);
    $stmt->execute();
    
    $order_id = $stmt->insert_id; // get inserted order id
    $stmt->close();

    // Insert each product into order_items table
    foreach ($cart as $item) {
        $product_name = $item['name'];
        $product_price = $item['price'];
        $product_image = $item['image'];

        $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
        $stmt_item->bind_param("isds", $order_id, $product_name, $product_price, $product_image);
        $stmt_item->execute();
    }

    $stmt_item->close();
    $conn->close();

    // Clear cart
    unset($_SESSION['cart']);
}
else {
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Placed - UragaNet COFFEE</title>
  <link rel="stylesheet" href="style/style.css">

</head>
<body>

<div class="thank-you">
  <h1>Thank You for Your Order!</h1>
  <p>We have received your coffee sample request.</p>
  <p>We will contact you soon.</p>
  <a href="home.php">Back to Home</a>
</div>

</body>
</html>
