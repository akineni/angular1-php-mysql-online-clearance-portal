<?php
	session_start();

	error_reporting(0);

	$_SERVER["REQUEST_METHOD"] == "POST" or die("NO_POST");

	require "../db_params.php";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$_POST = json_decode(file_get_contents('php://input'), true);

	$dept = mysqli_real_escape_string($conn, $_POST["dept"]);
	$pw = md5(mysqli_real_escape_string($conn, $_POST["pw"]));

	$sql = "SELECT * FROM {$departments_tbl} WHERE department='{$dept}' AND password='{$pw}'";

	$result = $conn->query($sql);

	if (mysqli_num_rows($result) == 1) {
		$_SESSION["uid"] = mysqli_fetch_assoc($result)["id"];
		echo "OCP_LOGIN_SUCCESS";
	}

	mysqli_close($conn);
?>