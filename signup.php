<?php

session_start();

include 'dbh.php';
function valInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fname = valInput($_POST['fname']);
$lname = valInput($_POST['lname']);
$uname = valInput($_POST['uname']);
$pword = valInput($_POST['pword']);

/*echo $fname;
echo $lname;
echo $uname;
echo $pword;
*/

$sql = "INSERT INTO userinfo(fname,lname,uname,pword,upcount)
VALUES ('$fname','$lname','$uname','$pword',0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}



header("Location: index.php")




?>