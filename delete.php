<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'Lab_5b');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='message success'>User deleted successfully!</div>";
} else {
    echo "<div class='message error'>Error: " . $conn->error . "</div>";
}

$conn->close();
header("Location: display.php");
?>
