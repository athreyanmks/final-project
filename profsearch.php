<?php

	$q = $_GET['q'];

	$q = $q.'%';

	$conn = new mysqli("localhost","root","","pkmnfart");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		echo "flag";
  	}

  	//echo "flag";

	$sql = "SELECT * FROM userinfo WHERE uname LIKE '$q' ORDER BY uname";

	$result = $conn->query($sql);
	$c = 0;

	//$row = $result->fetch_assoc();

	//echo $row['uname'];



	while($c<5)
	{
		$row = $result->fetch_assoc();
		echo "<a href=foreignprofile.php?uname=".urlencode($row['uname']).">".$row['uname']."</a><br>";

		//echo $row['id'];

		//echo $c;

		$c++;
	}

?>