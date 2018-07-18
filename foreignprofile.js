function followuser(s)
{
	console.log('flag');
	t = 'uname='+s;

	console.log(t);

	document.cookie = t;

	window.location = "follow.php";
}

function gohome()
{
	window.location = "home.php";
}