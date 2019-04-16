<?php
	
	session_start();

	$q = $_GET['q'];

	$imgid = $_GET['id'];

	//echo "clicked".$imgid;

	//echo "TipHat";

	$conn = new mysqli("localhost","root","","pkmnfart");

	if(!$conn->query("SHOW TABLES LIKE 'liketable'")->num_rows)
	{
		echo "flag";
		$sql = "CREATE TABLE liketable (
		likeid INT(11) PRIMARY KEY AUTO_INCREMENT,
		imgid INT(11) UNSIGNED,
		uid INT(11) NOT NULL

		)";


		if ($conn->query($sql) === TRUE) {
   		//echo "Table userinfo created successfully";
		} else {
	    //echo "Error creating table: " . $conn->error;
		}

	}

	if($q == 1)
	{
		$uid = $_SESSION['id'];

		$sql = "INSERT into liketable (imgid,uid) VALUES('$imgid','$uid')";

		//echo $sql;

		$conn->query($sql);

		$sql = "UPDATE imgtable SET nlike = nlike + 1 WHERE imgid = '$imgid'";

		$conn->query($sql);
	}

	else if ($q == 0) 
	{
		$uid = $_SESSION['id'];

		$sql = "DELETE FROM liketable WHERE imgid = '$imgid' AND uid = '$uid'";

		//echo $sql;

		$conn->query($sql);

		$sql = "UPDATE imgtable SET nlike = nlike - 1 WHERE imgid = '$imgid'";

		$conn->query($sql);
	}

	$sql = "SELECT * FROM imgtable WHERE imgid = '$imgid'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	echo $row['nlike'];


?>