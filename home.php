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

	

<input type="text"  onkeyup="dynasearch(this.value);">
<button onclick="uploadform();">Upoad Fan Art</button>
<button onclick ="profile();">Profile</button><br>
<div id="profsearch" ></div><br>



<button onclick="logout();" style="position: absolute; top: 10px; left: 70%;">Logout</button>
<div id="livefeed"></div>



</body>
</html>