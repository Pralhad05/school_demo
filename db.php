<?php
	$servername='localhost:3306';
	$user = 'root';
	$password ='Root@123#1122';
	$dbname ='school_db';
	$conn = mysqli_connect($servername, $user, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>