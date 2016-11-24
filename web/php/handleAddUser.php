<?php
	include 'database.php';
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	$FName = $_POST["FName"];
	$SName = $_POST["SName"];
	$mobNumber = $_POST["mobNumber"];

	$sql = "INSERT INTO User (email, password, firstname, surname, mobilenum) VALUES ('$email', '$password', '$FName', '$SName', '$mobNumber')";
	if ($conn->query($sql)) {
		echo "New record created successfully\n";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error . "\n";
	}

	$conn->close();
