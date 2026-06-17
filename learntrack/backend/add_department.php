<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$head = $data['head'];
$cap  = $data['capacity'];

$stmt = $conn->prepare("INSERT INTO departments (name, head, capacity) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $head, $cap);
$stmt->execute();

echo json_encode(["status"=>"success"]);
?>