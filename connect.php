<?php
	$username = $_POST['username'];
    $password = $_POST['password'];
	$msg = $_POST['msg'];
	
	

	

	// Database connection
	$conn = new mysqli('localhost','root','','CEC');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(username,  password, msg) values(?, ?, ?)");
		$stmt->bind_param("sss", $username,  $password, $msg);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
