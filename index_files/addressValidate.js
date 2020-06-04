function validateAddress()
{
	var village1=document.getElementById("villmoh1").value;
	var post1=document.getElementById("post1").value;
	var police1=document.getElementById("policestation1").value;
	var dist1=document.getElementById("district1").value;
	var stat1=document.getElementById("state1").value;
	var pinno=document.getElementById("pin").value;
	pattern=/\d{7}/;
	patt=/[0-9]/;
	patt1=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	
	if(village1=="" || village1==null)
	{
		alert("Please Input Village/Mohalla");
		villmoh1.focus();
		return false;
	}
	if(village1.match(patt))
	{
		alert("Don't use any Number in Village/Mohalla");
		villmoh1.focus();
		return false;
	}
	if (village1.match(patt1)) {
		alert("Don't use any special chatactar in Village/Mohalla name");
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
		alert("Don't use any Number in post office");
		post1.focus();
		return false;
	}
	if (post1.match(patt1)) {
		alert("Don't use any special charactar in postoffice");
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
		alert("Don't use any Number in police station");
		policestation1.focus();
		return false;
	}
	if (police1.match(patt1)) {
		alert("Don't use any special charactar in Police Station");
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
		alert("Don't use any Number in District");
		district1.focus();
		return false;
	}
	if (dist1.match(patt1)) {
		alert("Don't use any special charactar in District");
		district1.focus();
		return false;
	}
	if(stat1=="" || stat1==null)
	{
		alert("please Enter State Name");
		state1.focus();
		return false;
	}
	if(stat1.match(patt))
	{
		alert("Don't use any Number in state");
		state1.focus();
		return false;
	}
	if (state1.match(patt1)) {
		alert("Don't use any special charactar in State");
		state1.focus();
		return false;
	}
	if(pinno=="" || pinno==null)
	{
		alert("Enter Pin Number");
		pin.focus();
		return false;
	}
	if(pinno.match(pattern))
	{
		alert("Use Only 6 digit");
		pin.focus();
		return false;
	}
	if(pinno.length<6)
	{
		alert("Give the 6 digit valid Pin number");
		pin.focus();
		return false;
	}
}
