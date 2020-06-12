function deleteuserValid()
{
	var uid=document.getElementById("userid").value;
	var type=document.getElementById("type").value;
	if (uid=="" || uid==null) {
		alert("Please enter User ID");
		userid.focus();
		return false;
	}
	if (type=="" || type==null) {
		alert("Please select Account type");
		type.focus();
		return false;
	}
}