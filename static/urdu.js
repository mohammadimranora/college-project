function urduValidate()
{
	var sele=document.getElementById("type1").value;
	if (sele=="" || sele==null) {
		alert("Please select level of study");
		type1.focus();
		return false;
	}
}