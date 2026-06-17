<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "connect.php";

$data = json_decode(file_get_contents("php://input"), true);

foreach($data as $row){

$q = $row['question'];
$o1 = $row['option1'];
$o2 = $row['option2'];
$o3 = $row['option3'];
$o4 = $row['option4'];
$ans = $row['correct_answer'];
$sub = $row['subject'];

$sql = "INSERT INTO question_bank 
(question, option1, option2, option3, option4, correct_answer, subject)
VALUES ('$q','$o1','$o2','$o3','$o4','$ans','$sub')";

mysqli_query($conn, $sql);
}

echo "Uploaded Successfully";
?>