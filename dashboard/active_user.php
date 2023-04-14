<?php
	header("Content-Type: application/json");
	session_start();
    if(!isset($_SESSION["uid"]) || empty($_SESSION["uid"])) die("No UID");

    //error_reporting(0);

	require "../db_params.php";

	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT * FROM {$departments_tbl} WHERE id='{$_SESSION["uid"]}'";

	$result = $conn->query($sql);
	$departments = mysqli_fetch_assoc($result);

	echo json_encode($departments);

	mysqli_close($conn);
?>