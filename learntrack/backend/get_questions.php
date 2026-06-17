<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "connect.php";

$sql = "SELECT subject, COUNT(*) as total, MAX(created_at) as last_updated 
        FROM question_bank 
        GROUP BY subject";

$result = mysqli_query($conn, $sql);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
?>