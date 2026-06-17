<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

// 🔥 Generate Reg No
$result = $conn->query("SELECT COUNT(*) as total FROM students");
$row = $result->fetch_assoc();

$reg_no = "REG" . str_pad($row['total'] + 1, 3, "0", STR_PAD_LEFT);

// 🔍 Debug (optional)
// echo $reg_no; exit();

// Insert into DB
$stmt = $conn->prepare("INSERT INTO students (reg_no, name, email, password, department) VALUES (?,?,?,?,?)");

$stmt->bind_param("sssss",
  $reg_no,
  $data['name'],
  $data['email'],
  $data['pass'],
  $data['dept']
);

if($stmt->execute()){
    echo json_encode([
        "status" => "success",
        "reg_no" => $reg_no
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "msg" => $stmt->error
    ]);
}
?>