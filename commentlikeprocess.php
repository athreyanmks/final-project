<?php


	
	session_start();

	$q = $_GET['q'];

	$commentid = $_GET['id'];

	//echo "clicked".$imgid;

	//echo "TipHat";

	$conn = new mysqli("localhost","root","","pkmnfart");

	if(!$conn->query("SHOW TABLES LIKE 'commentliketable'")->num_rows)
	{
		echo "flag";
		$sql = "CREATE TABLE commentliketable (
		likeid INT(11) PRIMARY KEY AUTO_INCREMENT,
		commentid INT(11) UNSIGNED,
		uid INT(11) NOT NULL

		)";


		if ($conn->query($sql) === TRUE) {
   		echo "Table userinfo created successfully";
		} else {
	    echo "Error creating table: " . $conn->error;
		}

	}

	if($q == 1)
	{
		$uid = $_SESSION['id'];

		$sql = "INSERT into commentliketable (commentid,uid) VALUES('$commentid','$uid')";

		//echo $sql;

		$conn->query($sql);

		$sql = "UPDATE commenttable SET nlike = nlike + 1 WHERE commentid = '$commentid'";

		$conn->query($sql);
	}

	else if ($q == 0) 
	{
		$uid = $_SESSION['id'];

		$sql = "DELETE FROM commentliketable WHERE commentid = '$commentid' AND uid = '$uid'";

		//echo $sql;

		$conn->query($sql);

		$sql = "UPDATE commenttable SET nlike = nlike - 1 WHERE commentid = '$commentid'";

		$conn->query($sql);
	}

	$sql = "SELECT * FROM commenttable WHERE commentid = '$commentid'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	echo $row['nlike'];




?>