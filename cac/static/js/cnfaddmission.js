function cnfAdmissionValid()
{
	var sid=document.getElementById("sid").value;

	patt1=/[a-zA-Z]/;
	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	if (sid=="" || sid==null) {
		alert("Please Enter Student ID");
		sid.focus();
		return false;
	}
	if (sid.match(patt)) {
		alert("Don't use any Special charactar in Student ID");
		sid.focus();
		return false;
	}
	if (sid.match(patt1)) {
		alert("Don't use any Alphabet");
		sid.focus();
		return false;
	}
}