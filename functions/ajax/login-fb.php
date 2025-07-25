<?php 
	session_start();
	include_once dirname(__FILE__).'/../database.php';
	$name = $_GET['name'];
	$email = $_GET['email'];
	$id = $_GET['id'];
	$sql = "SELECT * FROM user_fb WHERE id_fb = '$id'";
	$result = mysqli_query($conn_vn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		$pass = $id . 'gbvn';
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO user_fb (name, email, id_fb, password) VALUE ('$name', '$email', '$id', '$pass')";
		$result = mysqli_query($conn_vn, $sql);

		$sql = "SELECT * FROM user_fb WHERE id_fb = '$id'";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_qt_gbvn'] = $row['id'];
		echo 'ok';
		// echo $row['id'];
	} else {
		$row = mysqli_fetch_assoc($result);
		$pass = $id . 'gbvn';
		$password = $row['password'];
		if (password_verify($pass, $password)) {
			$_SESSION['user_qt_gbvn'] = $row['id'];
			echo 'ok';
		} else {
			echo 'error';
		}
	}
?>