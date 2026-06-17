<?php
include 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);

$score = 0;

foreach($data as $ans) {
    $qid = $ans['question_id'];
    $selected = $ans['selected'];

    $res = $conn->query("SELECT answer FROM questions WHERE id = $qid");
    $row = $res->fetch_assoc();

    if($selected == $row['answer']) {
        $score++;
    }
}

echo json_encode(["score" => $score]);
?>