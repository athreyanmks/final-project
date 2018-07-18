<?php

//session_start();
$conn = new mysqli("localhost","root","");



$sql = "CREATE DATABASE IF NOT EXISTS pkmnfart";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli("localhost","root","","pkmnfart");


if(!$conn->query("SHOW TABLES LIKE 'userinfo'")->num_rows)
{
	echo "flag";
	$sql = "CREATE TABLE userinfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
uname VARCHAR(50) NOT NULL,
pword VARCHAR(50) NOT NULL,
upcount INT(4) UNSIGNED NOT NULL
)";


if ($conn->query($sql) === TRUE) {
   // echo "Table userinfo created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

}

if(!$conn->query("SHOW TABLES LIKE 'imgtable'")->num_rows)
{
	echo "flag";
	$sql = "CREATE TABLE imgtable (
imgid INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
filename VARCHAR(40) NOT NULL,
uname VARCHAR(30) NOT NULL,
artname VARCHAR(100) NOT NULL,
dest VARCHAR(50) NOT NULL
)";


if ($conn->query($sql) === TRUE) {
   // echo "Table userinfo created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

}






/*if($conn->connect_error)
{
	die("Connection failed: ".$conn->connect_error);
}

else
{
	echo "Success";
}*/


?>