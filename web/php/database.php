<?php
    $conn = new mysqli('35.156.58.36', 'evolveUser', 'CapOne5216', 'mobileAuth');
    if($conn->connect_errno) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }
 ?>
