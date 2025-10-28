<?php
session_start();

// Get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Create cart item array
    $item = [
        'name' => $name,
        'price' => $price,
        'image' => $image
    ];

    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add item to session cart
    $_SESSION['cart'][] = $item;

    // Redirect back to getproduct.php
    header("Location: getproduct.php");
    exit();
}
?>
