<?php
	header("Content-Type: application/json");
	session_start();
    if(!isset($_SESSION["uid"]) || empty($_SESSION["uid"])) die("No UID");

    error_reporting(0);

	require "../db_params.php";

	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT * FROM {$students_tbl} WHERE level >= 400";

	$result = $conn->query($sql);
	$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

	echo json_encode($students);
	
	mysqli_close($conn);
?>