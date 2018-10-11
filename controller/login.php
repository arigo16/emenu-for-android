<?php
	session_start();
	include '../include/config.php';
	date_default_timezone_set("Asia/Jakarta");

	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$now = date("Y-m-d H:i:s");

	$r = $con->query("SELECT * FROM users WHERE username = '$user' AND password = '$pass' AND authorization = 'Waiter'");
	if ($r -> num_rows > 0){
		while ($rr = $r->fetch_array()){
			$_SESSION['username'] = $rr['username'];
			$_SESSION['fullname'] = $rr['fullname'];
			$_SESSION['authorization'] = $rr['authorization'];
		}
		$con->query("UPDATE users SET LastLogin='$now' WHERE username='$user'");
		header("location:../index.php");
	}else{
		$_SESSION['error'] = '<div class="alert bg-red alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Username and password invalid
	</div>';
		header("location:../login.php");
	}
?>