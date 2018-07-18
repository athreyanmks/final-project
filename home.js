function uploadform()
{
	window.location = "uploadform.php";
}

function logout()
{
	window.location = "logout.php";
}

function profile()
{
	window.location = "profile.php";
}

function dynasearch(s)
{
	if(s!="")
	{
		if (window.XMLHttpRequest) 
		{
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("profsearch").innerHTML = this.responseText;
                            }
        };
        xmlhttp.open("GET","profsearch.php?q="+s,true);
        xmlhttp.send();
	}
	else
	{
		document.getElementById("profsearch").innerHTML = "";
	}

}

function homefeed()
{

	console.log("flag");
		if (window.XMLHttpRequest) 
		{
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livefeed").innerHTML = this.responseText;
                            }
        };
        xmlhttp.open("GET","livefeed.php",true);
        xmlhttp.send();	

	console.log("flag");
}