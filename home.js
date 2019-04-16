function tiphat(x)
{
    console.log(x);

    button = document.getElementById("button"+x);
    if(button.value == 0)
    {
        button.value = 1;
        button.style =  "background-color:blue";  
    }

    else if(button.value == 1)
    {
        button.value = 0;
        button.style = "background-color:solid grey"
    }

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
                document.getElementById("likec"+x).innerHTML = this.responseText;
                //console.log('a');
                            }
        };
        xmlhttp.open("GET","likeprocess.php?q="+button.value+"&id="+x,true);
        xmlhttp.send();

        document.getElementById("button"+x).innerHTML = "TipHat";


}

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
                //console.log('a');
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

function commentsec(x)
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
                document.getElementById("commentsec").innerHTML = this.responseText;
                            }
        };
        xmlhttp.open("GET","commentsec.php?q="+x,true);
        xmlhttp.send(); 

    console.log("flag");
}

function commentlike(x)
{
    console.log(x);

    button = document.getElementById("button"+x);
    if(button.value == 0)
    {
        button.value = 1;
        button.style =  "background-color:blue";  
    }

    else if(button.value == 1)
    {
        button.value = 0;
        button.style = "background-color:solid grey"
    }

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
                document.getElementById("commc"+x).innerHTML = this.responseText;
                //console.log('a');
                            }
        };
        xmlhttp.open("GET","commentlikeprocess.php?q="+button.value+"&id="+x,true);
        xmlhttp.send();

        document.getElementById("button"+x).innerHTML = "TipHat";
}

function replyreveal(x)
{
    document.getElementById('commentform'+x).style.display = "block";
}

