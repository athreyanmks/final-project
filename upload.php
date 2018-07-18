<?php

session_start();

if(isset($_POST['submit']))
{
	$file = $_FILES['file'];
	$artname = $_POST['artname'];

	$fileTempName = $_FILES['file']['tmp_name'];
	//$fileError = $_FILES['file']['error'];
	$fileName = $_FILES['file']['name'];

	$fileExt = explode('.',$fileName);
	$fileExt = strtolower(end($fileExt));

	$conn = new mysqli("localhost","root","","pkmnfart");
	$id = $_SESSION['id'];
	$sql = "SELECT uname,upcount FROM userinfo WHERE id = '$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$uname = $row['uname'];
	$count = $row['upcount'];

	if($count<10)
	{
		$fileDest = "imagedb/".$uname."000".(string)$count.".".$fileExt;
	}
	else if($count<100)
	{
		$fileDest = "imagedb/".$uname."00".(string)$count.".".$fileExt;
	}
	else if($count<1000)
	{
		$fileDest = "imagedb/".$uname."0".(string)$count.".".$fileExt;
	}

	else if($count<10000)
	{
		$fileDest = "imagedb/".$uname.(string)$count.".".$fileExt;
	}

	move_uploaded_file($fileTempName, $fileDest);

	

	

	if($count<10)
	{
		$fileName = $uname."000".(string)$count;
	}
	else if($count<100)
	{
		$fileName = $uname."00".(string)$count;
	}
	else if($count<1000)
	{
		$fileName = $uname."0".(string)$count;
	}

	else if($count<10000)
	{
		$fileName = $uname.(string)$count;
	}

	$sql = "INSERT INTO imgtable(filename,uname,artname,dest)
	 VALUES ('$fileName','$uname','$artname','$fileDest')";

	 if($conn->query($sql))
	 {
	 	echo "success";
	 } 

	$count++;

	$sql = "UPDATE userinfo SET upcount = '$count' WHERE id = '$id' ";

	$conn->query($sql);

	 header("Location:home.php");


	echo $uname;
	echo $artname;
	echo $fileExt;
	//print_r($file);


}



?>