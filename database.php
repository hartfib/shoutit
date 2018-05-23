<?php
//connect to mysql
	$conn = mysqli_connect("localhost", "root", "xxxxxxxxx" , "shoutit");

//test connection
	if (mysqli_connect_errno()){
		die ('Failed to connect: ' .mysqli_connect_error());
	}

?>