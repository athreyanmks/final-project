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
	<title>Home</title>
	<script type="text/javascript" src="home.js"></script>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body onload = "homefeed();" style="z-index: 10px;">

	


<div class="navbar">
	<input type="text"  onkeyup="dynasearch(this.value);">
	<button onclick="uploadform();">Upoad Fan Art</button>
	<button onclick ="profile();">Profile</button>
	<button onclick="logout();" >Logout</button>
	<div id="profsearch" style="position: fixed;" ></div>

	
</div>







<div id="livefeed" style="top: 500px"></div>



</body>
</html>