<?php
	
	session_start();

	//echo "test";

	$uname =  $_SESSION['uname'];

	$uname = $uname;

	$conn = new mysqli("localhost","root","","pkmnfart");

	$sql = "SELECT * FROM ".$uname;

	//echo $sql;

	//echo $uname;

	$result = $conn->query($sql);

	$sql = "CREATE TABLE ".$uname."temp (
imgid INT(11) UNSIGNED PRIMARY KEY,
filename VARCHAR(40) NOT NULL,
uname VARCHAR(30) NOT NULL,
artname VARCHAR(100) NOT NULL,
dest VARCHAR(50) NOT NULL
) ";
	
	if($conn->query($sql))
	{
		//echo "success";
	}

	while($row = $result->fetch_assoc())
	{
		$temp = $row['userfollow'] ;

		//echo $temp;

		$sql = "SELECT * FROM imgtable WHERE uname = '$temp'";

		$result2 = $conn->query($sql);
			
		while($row2 = $result2->fetch_assoc())
		{
			$imgid = $row2['imgid'];

			$filename = $row2['filename'];

			$uname2 = $row2['uname'];

			$artname = $row2['artname'];

			$dest = $row2['dest'];

			//echo $dest;

			$sql = "INSERT INTO ".$uname."temp (imgid,filename,uname,artname,dest) VALUES('$imgid','$filename','$uname2','$artname','$dest') ";

			//echo $sql."<br>";

			$conn->query($sql);
		}

	}

	$sql = "SELECT * FROM ".$uname."temp ORDER BY imgid DESC";

	//echo $sql;

	$result = $conn->query($sql);

	//echo (string)$result->num_rows;

	while($row = $result->fetch_assoc())
	{
		//echo "success2";
		echo "<div class='imgdiv'>";
		echo "<p>".$row['artname']."</p><br>";
		echo "<img src = ".$row['dest'].">";
		echo "</div>\n";
	}


	$sql = "DROP TABLE ".$uname."temp";

	$conn->query($sql);

?>