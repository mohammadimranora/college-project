function allowValid()
{
	var sid=document.getElementById("sid").value;
	var center=document.getElementById("center").value;
	var dat=document.getElementById("da").value;
	if (sid=="" || sid==null) {
		alert("Please Enter Student ID");
		sid.focus();
		return false;
	}
	if (center=="" || center==null) {
		alert("Please select center");
		center.focus();
		return false;
	}
	if (dat=="" || dat==null) {
		alert("Please Enter Reporting Date");
		da.focus();
		return false;
	}
}