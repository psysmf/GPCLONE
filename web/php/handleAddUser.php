<?php
include 'database.php';
$email = $_POST["email"];
$password = $_POST["password"];
$FName = $_POST["FName"];
$SName = $_POST["SName"];
$MobNumber = $_POST["mobNumber"];

$sql = "INSERT INTO user (email,password,firstName,surName,phoneNum) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssss', $email,$password,$FName,$SName,$MobNumber);
$result = $stmt->execute();
if (!$result) echo "failed to insert record";

 echo $_POST["FName"];
echo "Your email address is: ";
echo $_POST["email"]; ?>
