<?php
include_once "koneksi.php";
	class usr{}
	
	$query = mysqli_query($con, "SELECT * FROM users");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Connected Server";
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Not Connected Server";
		die(json_encode($response));
	}
	
	mysqli_close($con);
?>