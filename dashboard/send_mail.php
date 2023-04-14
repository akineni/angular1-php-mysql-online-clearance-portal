<?php
    session_start();
    if(!isset($_SESSION["uid"]) || empty($_SESSION["uid"])) die("No UID");

    error_reporting(0);

    $_POST = json_decode(file_get_contents('php://input'), true);

    $salt = "_|y0_5A;$%#AD7";
    $_POST["uniqid"] = md5($salt.uniqid(mt_rand()));

    $fields_string = http_build_query($_POST);

    $ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, 
		"http://localhost/email/views/?{$fields_string}");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

	$recipient = $_POST["email"];
	$recipient_name = ucfirst($_POST["firstname"]) . " " . ucfirst($_POST["lastname"]);
	$subject = "You have completed your clearance";
	$body = curl_exec($ch);
    $alt_body = strip_tags($body);

    $username = "your email";
    $password = "app password";

    require "../email/ocp_mailer.php";

    if(!$sent) die();

    require "../db_params.php";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
    
    $sql = "UPDATE {$students_tbl} SET hash='{$_POST['uniqid']}' WHERE id={$_POST['id']}";
    $conn->query($sql);

    mysqli_close($conn);

?>