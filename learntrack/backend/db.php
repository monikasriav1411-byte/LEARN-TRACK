<?php
$conn = new mysqli("localhost", "root", "", "learntrack_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
