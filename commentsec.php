<?php

	session_start();

	$imgid = $_GET['q'];

	$conn = new mysqli("localhost","root","","pkmnfart");

	$sql = "SELECT * FROM commenttable WHERE imgid = '$imgid' ORDER BY commentid DESC";

	$result = $conn->query($sql);

	//echo $result;

	$c = 10;

	while ($row = $result->fetch_assoc()) 
	{
		
		$commentid = $row['commentid'];

		$uid = $row['uid'];

		$comment  = $row['comment'];

		$nlike  = $row['nlike'];

		$sql = "SELECT uname FROM userinfo WHERE id = '$uid'";

		//echo $comment;

		$result2 = $conn->query($sql);

		$row2 = $result2->fetch_assoc();

		$uname  = $row2['uname'];

		$sql = "SELECT COUNT(likeid) as count from commentliketable where uid = '$uid' AND commentid = '$commentid' ";

		$result2 = $conn->query($sql);

		$row2 = $result2->fetch_assoc();

		$value = $row2['count'];

		if($value == 1)
		{
			$color = "blue";
		}

		else if($value == 0)
		{
			$color = "solid grey";
		}

		echo "<div class='commentdiv'>";
		echo "<a href=foreignprofile.php?uname=".$uname.">".$uname."</a><br>";
		echo "<p>".$comment."</p>";
		echo "<div id = \"commc".$row['commentid']."\">".$nlike."</div><button id = \"button".$row['commentid']."\" value = ".$value." style = \"background-color:".$color."\"onclick=\"commentlike(".$row['commentid'].")\">TipHat</buuton><br>";
		echo "<button onclick=\"replyreveal(".$commentid.")\">Reply</button>";
		echo "<form id =\"commentform".$commentid."\" action=\"replycommentprocess.php?commentid=".$commentid."\" style=\"display:none\" method=\"POST\">
		<input type=\"text\" name=\"comment\" placeholder=\"Your Comment\"><br><br>
		<button type=\"submit\" >Comment</button>
		</form>";
		echo "</div><br><br>";

		/*echo "<div class='commentdiv'>";
		echo "<a href=foreignprofile.php?uname=".$uname.">".$uname."</a><br>";
		echo "<p>".$comment."</p>";
		echo "<p id = \"commc".$row['commentid']."\">".$nlike."</p><button id = \"button".$row['commentid']."\" onclick=\"commentlike(".$row['commentid'].")\">TipHat</buuton><br>";
		echo "</div><br><br>";*/

		//echo $sql;

		--$c;
	}



?>