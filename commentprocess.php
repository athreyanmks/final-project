<?php

	$comment = $_POST['comment'];

	session_start();

	$uid = $_SESSION['id'];

	$imgid = $_GET['imgid'];

	$conn = new mysqli("localhost","root","","pkmnfart");

	if(!$conn->query("SHOW TABLES LIKE 'commenttable'")->num_rows)
	{
		echo "flag";
		$sql = "CREATE TABLE commenttable (
		commentid INT(11) PRIMARY KEY AUTO_INCREMENT,
		imgid INT(11) UNSIGNED,
		uid INT(11) NOT NULL,
		comment VARCHAR(300) NOT NULL

		)";


		if ($conn->query($sql) === TRUE) {
   		//echo "Table userinfo created successfully";
		} else {
	    //echo "Error creating table: " . $conn->error;
		}

	}

	$sql = "INSERT INTO commenttable(imgid,uid,comment) VALUES('$imgid','$uid','$comment')";

	$conn->query($sql);

	header("Location:fartview.php?imgid=".urlencode($imgid));

?>