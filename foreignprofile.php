<?php

session_start();

if(!isset($_SESSION['id']))
{
	header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">

</head>
<body>

	<?php 

		$conn = new mysqli("localhost","root","","pkmnfart");


		$uname = $_GET['uname'];

		$sql = "SELECT * FROM imgtable WHERE uname = '$uname' ORDER BY filename DESC " ;

		$result = $conn->query($sql);

		echo "<a href= 'home.php'>Home</a>\n";

		if($uname!=$_SESSION['uname'])
		echo "<button onclick='followuser(&quot ".$uname." &quot);'>Follow</button>\n";



		while($row= $result->fetch_assoc())
		{
			echo "<div class='imgdiv'>";
			echo "<p>".$row['artname']."</p><br>";
			echo "<img src = ".$row['dest'].">";
			echo "</div>\n";
		}


	 ?>

	 	<script type="text/javascript" src="foreignprofile.js"></script>


</body>
</html>