<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "connect.php";

$sql = "SELECT * FROM questions WHERE used_flag = 0 LIMIT 5";
$result = mysqli_query($conn, $sql);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;

    $id = $row['id'];
    mysqli_query($conn, "UPDATE questions SET used_flag = 1 WHERE id = $id");
}

echo json_encode($data);
?>