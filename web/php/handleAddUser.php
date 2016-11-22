<?php
include 'database.php';
$email = $_POST["email"];
$password = $_POST["password"];
$FName = $_POST["FName"];
$SName = $_POST["SName"];
$mobNumber = $_POST["mobNumber"];

$sql = "INSERT INTO user (email,password,firstName,surName,phoneNum) VALUES ($email,$password,$FName,$SName,$mobNumber)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 echo $_POST["FName"];
echo "Your email address is: ";
echo $_POST["email"]; ?>
