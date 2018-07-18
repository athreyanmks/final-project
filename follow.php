<?php

	session_start();

	$unamefor = $_COOKIE['uname'];

	$uname = $_SESSION['uname'];

	$conn = new mysqli("localhost","root","","pkmnfart");

	$sql = "SELECT * FROM ".$uname." WHERE userfollow = '$unamefor'";

	$result = $conn->query($sql);

	if(!$result->num_rows)
	{
		$sql = "INSERT INTO ".$uname."(userfollow) VALUES('$unamefor')";

		$conn->query($sql);
	}

	

	header("Location:foreignprofile.php?uname=".$unamefor);

?>