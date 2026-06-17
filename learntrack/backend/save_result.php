<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "connect.php";

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['student_name'];
$score = $data['score'];
$total = $data['total'];

$sql = "INSERT INTO quiz_results (student_name, score, total)
        VALUES ('$name', '$score', '$total')";

if(mysqli_query($conn, $sql)){
    echo "Result Saved";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>