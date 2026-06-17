<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "connect.php";

$count = $_GET['count']; // number of questions

$sql = "SELECT * FROM question_bank ORDER BY RAND() LIMIT $count";
$result = mysqli_query($conn, $sql);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
?>