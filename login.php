<?php

session_start();
?>


<!DOCTYPE html>
<html>

<body>


<?php

//echo "ham";echo "ham";
//$uname = ;$pword =;

include 'dbh.php';

$conn = new mysqli("localhost","root","","pkmnfart");

function valInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = valInput($_POST['uname']);
  $pword = valInput($_POST['pword']);
}

$sql = "SELECT * FROM userinfo WHERE uname ='$uname' AND pword = '$pword'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

if($row['id'])
{
	$_SESSION['id'] = $row['id'];

	$_SESSION['uname'] = $row['uname']; 

	$_SESSION['month'] = date('m');
	$_SESSION['year'] = date('Y');

	echo $_SESSION['month'];

		echo "flag";
		$sql = "CREATE TABLE  ".$uname." (
	userfollow VARCHAR(30) NOT NULL
	)";


	if ($conn->query($sql) === TRUE) {
   	 echo "Table userinfo created successfully";
	} else {
    	echo "Error creating table: " . $conn->error;
	}




	header("Location: home.php");

	echo $row['id'];

}

else
{
	echo "Login failed";
}





//echo $uname."<br>";
//echo $pword;
//echo "ham";
?>


</body>
</html>
