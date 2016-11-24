<?php
function checkEmail(){
	// function to check if the person signing up already has an account. including protection agaisnt SQL injection.
	include 'database.php';
	$email = $_POST["email"];
	$sql =  "SELECT COUNT(*) FROM  `User` WHERE email = '".mysql_real_escape_string($email)."';";
	if (!$stmt = $conn->prepare($sql))
					die('Query failed: (' . $conn->errno . ') ' . $conn->error);
	if (!$stmt->execute())
					die('Database Error ' . $conn->error);
	$stmt->bind_result($emailCount);
	$stmt->fetch();
	if($emailCount==0){
		insertUser();
	}
	else{
		// add code here for how to deal with them already having account (password reset maybe?)
		echo "You have already created an account with us!";
		$conn->close();
	}
}

function insertUser(){
	// if the user doesnt have an account already then this function is called to add them to the database.
	// again this code has protection agaisnt SQL injection.
	include 'database.php';
	$email = $_POST["email"];
	$password = $_POST["password"];
	$FName = $_POST["FName"];
	$SName = $_POST["SName"];
	$mobNumber = $_POST["mobNumber"];
		$sql = "INSERT INTO User (email, password, firstname, surname, mobilenum) VALUES (?,?,?,?,?)";
		if (!$stmt = $conn->prepare($sql))
            die('Query failed: (' . $conn->errno . ') ' . $conn->error);
		if (!$stmt->bind_param('sssss',$email,$password,$FName,$SName,$mobNumber))
				    die('Bind Param failed: (' . $conn->errno . ') ' . $conn->error);
		if (!$stmt->execute())
				    die('Insert Error ' . $conn->error);
		// add code here for how we want to welcome new user (possibly with a link to sign in right away?)
		echo "New record created successfully\n";
		$conn->close();
}

checkEmail();
?>
