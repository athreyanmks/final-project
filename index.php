<?php
	session_start();
?>




<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php


if(isset($_SESSION['id']))
{
	//echo " <script type ='text/javascript'>   document.getElementById('loginform').style.display = 'none'</scrpit>";
	//header("Location: logout.php");
	header("Location: home.php");

	echo $_SESSION['id'];

	echo "<button type='button' onclick='logout.php'>Logout</button>";

	echo "ham";
}

else
{
	echo "You are not logged in";
}

?>

<form id = "loginform" action="login.php" method="POST">
	<input type="text" name="uname" placeholder="Username"><br><br>
	<input type="password" name="pword" placeholder="Password"><br><br>
	<button type="submit" onclick="document.getElementById('loginform').style.display = 'none';">Login</button><br><br><br>
	<p>Don't have an account? </p><button type="button" onclick="document.getElementById('loginform').style.display = 'none'; document.getElementById('signupform').style.display ='block'; ">Sign up</button>
</form>

<form id = 'signupform' style="display: none;" action="signup.php" method="POST">
	<input type="text" name="fname" placeholder="Firstname"><br><br>
	<input type="text" name="lname" placeholder="Lastname"><br><br>
	<input type="text" name="uname" placeholder="Username"><br><br>
	<input type="password" name="pword" placeholder="Password"><br><br>
	<button type = "submit" onclick="document.getElementById('signupform')">Sign up</button><br><br><br>
	<p>Already have an account?</p><button type="button" onclick="document.getElementById('loginform').style.display = 'block'; document.getElementById('signupform').style.display = 'none'; ">Login</button>

</form>

</body>
</html>