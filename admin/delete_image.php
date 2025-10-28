<?php
if (!isset($_GET['id'])) exit('No ID specified');

$id = (int)$_GET['id'];
$conn = new mysqli("localhost", "root", "", "uraga_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get the filename first
$result = $conn->query("SELECT filename FROM gallery WHERE id=$id");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file = "../uploads/" . $row['filename'];
    if (file_exists($file)) unlink($file); // delete file
    $conn->query("DELETE FROM gallery WHERE id=$id"); // delete from DB
}

$conn->close();
header("Location: admin_gallery.php");
exit();
?>
