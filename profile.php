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
	<script type="text/javascript" src="home.js"></script>
</head>
<body>

	

	<a href="home.php">Home</a>
	<input type="text"  onkeyup="dynasearch(this.value);">

	<div id="profsearch" ></div>

	<?php 

		$conn = new mysqli("localhost","root","","pkmnfart");


		$uname = $_SESSION['uname'];

		$sql = "SELECT * FROM imgtable WHERE uname = '$uname' ORDER BY filename DESC " ;

		$result = $conn->query($sql);



		while($row= $result->fetch_assoc())
		{
			echo "<div class='imgdiv'>";
			echo "<p>".$row['artname']."</p><br>";
			echo "<img src = ".$row['dest'].">";
			echo "<div>";
		}


	 ?>

</body>
</html>