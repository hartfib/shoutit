<?php
	include 'database.php';

	// check if form was submitted

	if(isset($_POST['submit'])){
		$user = mysqli_escape_string($conn, $_POST['user']);
		$message = mysqli_escape_string($conn, $_POST['message']);

		// set default time zone
		date_default_timezone_set('America/Denver');
		$time = date('h:i:s a', time());

		// validatation

		if(!isset($user) || $user == '' || !isset($message) || $message == ''){
			$error = "Please fill in name and message";
			header("Location: index.php?error=" .urlencode($error));
			exit();

		} else {
			$query = "INSERT INTO shouts (user, message, time)
 					  VALUES ('$user', '$message', '$time')";
 			if(!mysqli_query($conn, $query)){
 				die ('Error: ' .mysqli_error($conn));

 			} else {
 				header("Location: index.php");
 				exit();

 			}

		}
	}
?>