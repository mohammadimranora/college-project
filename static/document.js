function docValidate()
{
	var pic=document.getElementById("pic").value;
	var sign=document.getElementById("sign").value;
	var res=document.getElementById("res").value;
	var cast=document.getElementById("cast").value;
	var income=document.getElementById("income").value;
	var marks=document.getElementById("marks").value;
	var adhar=document.getElementById("adhar").value;
	var lcer=document.getElementById("lcer").value;
	if (pic=="" || pic==null) {
		alert("Please Upload Pictuer");
		pic.focus();
		return false;
	}
	
}