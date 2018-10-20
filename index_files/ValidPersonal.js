function validatePersonal()
{
	var village1=document.getElementById("fname").value;
	var post1=document.getElementById("post1").value;
	var police1=document.getElementById("policestation1").value;
	var dist1=document.getElementById("district1").value;
	var stat1=document.getElementById("state1").value;
	var pinno1=document.getElementById("pin1").value;
	var pattern=/\d{7}/;
	var patt=/[0-9]/;
	
	if(village1=="" || village1==null)
	{
		alert("Please Input Village/Mohalla");
		fname.focus();
		return false;
	}
	if(village1.match(patt))
	{
		alert("Don't use any Number digit");
		villmoh1.focus();
		return false;
	}
	if(post1=="" || post1==null)
	{
		alert("Enter Post Office Name");
		post1.focus();
		return false;
	}
	if(post1.match(patt))
	{
		alert("Don't use any Number digit");
		post1.focus();
		return false;
	}
	if(police1=="" || police1==null)
	{
		alert("Enter Police Station Name");
		policestation1.focus();
		return false;
	}
	if(police1.match(patt))
	{
		alert("Don't use any Number digit");
		policestation1.focus();
		return false;
	}
	if(dist1=="" || dist1==null)
	{
		alert("Enter District Name");
		district1.focus();
		return false;
	}
	if(dist1.match(patt))
	{
		alert("Don't use any Number digit");
		district1.focus();
		return false;
	}
	if(stat1=="" || stat1==null)
	{
		alert("Enter State Name");
		state1.focus();
		return false;
	}
	if(stat1.match(patt))
	{
		alert("Don't use any Number digit");
		state1.focus();
		return false;
	}
	if(pinno1=="" || pinno1==null)
	{
		alert("Enter Pin Number");
		pin1.focus();
		return false;
	}
	if(pinno1.match(pattern))
	{
		alert("Use Only 6 digit");
		pin1.focus();
		return false;
	}
	if(pinno1.length<6)
	{
		alert("Give the 6 digit valid Pin number");
		pin1.focus();
		return false;
	}
}
