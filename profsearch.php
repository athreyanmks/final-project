<?php

	$q = $_GET['q'];

	$q = $q.'%';

	$conn = new mysqli("localhost","root","","pkmnfart");

	$sql = "SELECT * FROM userinfo WHERE uname LIKE '$q' ORDER BY uname";

	$result = $conn->query($sql);
	$c = 0;

	while($row = $result->fetch_assoc()&& $c<5)
	{
		echo "<a href=foreignprofile.php?uname=".urlencode($row['uname']).">".$row['uname']."</a><br>";

		$c++;
	}

?>