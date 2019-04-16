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
dest VARCHAR(50) NOT NULL,
nlike INT(11) DEFAULT 0
) ";
	
	if($conn->query($sql))
	{
		//echo "success";
	}
	else
	{
		//echo "failure";
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

			$nlike = $row2['nlike'];

			//echo $nlike;

			$sql = "INSERT INTO ".$uname."temp (imgid,filename,uname,artname,dest,nlike) VALUES('$imgid','$filename','$uname2','$artname','$dest','$nlike') ";

			//echo $sql."<br>";

			$conn->query($sql);
		}

	}

	$sql = "SELECT * FROM ".$uname."temp ORDER BY imgid DESC";

	//echo $sql;

	$result = $conn->query($sql);

	//echo (string)$result->num_rows;

	$uid = $_SESSION['id'];

	while($row = $result->fetch_assoc())
	{
		//echo "success2";

		$imgid = $row['imgid'];

		$sql = "SELECT COUNT(likeid) as count FROM liketable WHERE imgid = '$imgid' AND uid = '$uid'";

		$result3 =  $conn->query($sql);

		$row3 = $result3->fetch_assoc();

		$value = $row3['count'];

		if($value == 1)
		{
			$color = "blue";
		}

		else if($value == 0)
		{
			$color = "solid grey";
		}

		echo "<div class='imgdiv'>";
		echo "<a href = fartview.php?imgid=".urlencode($row['imgid']).">".$row['artname']."</a><br>";
		echo "<img src = ".$row['dest']."><br>";
		echo "<p id = \"likec".$imgid."\">".$row['nlike']."</p><br>";
		echo "<button id =\"button".$row['imgid']."\" value = ".$value." style = \"background-color:".$color."\" onclick = \"tiphat(".$row['imgid'].")\">TipHat</button>";
		echo "</div>\n";
	}


	$sql = "DROP TABLE ".$uname."temp";

	$conn->query($sql);

?>