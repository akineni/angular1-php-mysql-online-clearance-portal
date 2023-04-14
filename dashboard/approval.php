<?php
	header("Content-Type: application/json");
	
	session_start();
    if(!isset($_SESSION["uid"]) || empty($_SESSION["uid"])) die("No UID");

    error_reporting(0);

	require "../db_params.php";

	$_POST = json_decode(file_get_contents('php://input'), true);
	$id = $_POST["id"];
	$action = $_POST["action"];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

    $sql = "UPDATE {$students_tbl} SET hash='', clearance_level=" . ($action ? "clearance_level+1" : $_SESSION["uid"]) . " WHERE id={$id}";

	if ($conn->query($sql) === TRUE) {
	  echo json_encode("OCP_APPROVE_SUCCESS");
	} else {
	  echo "Error updating record: " . $conn->error;
	}

	mysqli_close($conn);
?>