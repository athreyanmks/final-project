<?php

	session_start();

	$imgid = $_GET['imgid'];

	$uid = $_SESSION['id'];

	$conn = new mysqli("localhost","root","","pkmnfart");

	$sql = "SELECT * FROM imgtable WHERE imgid = '$imgid'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

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
	echo "<p>".$row['artname']."</p><br>";
	echo "<img src = ".$row['dest']."><br>";
	echo "<div id = \"likec".$imgid."\">".$row['nlike']."</div>";
	echo "<button id =\"button".$row['imgid']."\" value = ".$value." style = \"background-color:".$color."\" onclick = \"tiphat(".$row['imgid'].")\">TipHat</button>";
	echo "</div><br>";

	echo "<form id =\"commentform\" action=\"commentprocess.php?imgid=".$imgid."\" method=\"POST\">
		<input type=\"text\" name=\"comment\" placeholder=\"Your Comment\"><br><br>
		<button type=\"submit\" >Comment</button>
	</form>";

	echo "<!DOCTYPE html>
<html>
<head>
	<title>FanArt</title>
	<script type=\"text/javascript\" src=\"home.js\"></script>
</head>

<body onload=\"commentsec(".$imgid.");\">
	

	<p>Comments</p>

	<div id =\"commentsec\">
		
	</div>
</body>
</html>"
?>

