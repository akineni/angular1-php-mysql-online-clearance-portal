<?php
	header("Content-Type: application/json");

    error_reporting(0);

	require "db_params.php";

	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT department FROM {$departments_tbl}";

	$result = $conn->query($sql);
	$departments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	echo json_encode($departments);

	mysqli_close($conn);
?>