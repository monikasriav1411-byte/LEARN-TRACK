<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode(["status"=>"error","msg"=>"No data received"]);
    exit;
}

$regno = $data['sid'] ?? '';
$name = $data['name'] ?? '';
$dept = $data['dept'] ?? '';
$email = $data['email'] ?? '';
$pass = $data['pass'] ?? '';

$sql = "INSERT INTO students (regno,name,department,email,password) 
        VALUES ('$regno','$name','$dept','$email','$pass')";

if($conn->query($sql)){
    echo json_encode(["status"=>"success"]);
} else {
    echo json_encode(["status"=>"error","msg"=>$conn->error]);
}
?>