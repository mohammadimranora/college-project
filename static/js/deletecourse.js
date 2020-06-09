function deleteValid()
{
	var ccid=document.getElementById("ccid").value;
	var did=document.getElementById("did").value;

	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	if (ccid=="" || ccid==null) {
		alert("Please Enter Category Course ID");
		ccid.focus();
		return false;
	}
	if (ccid.match(patt)) {
		alert("Don't use any Special chatactar in Category Course ID");
		ccid.focus();
		return false;
	}
	if (did=="" || did==null) {
		alert("Please Enter Department ID");
		did.focus();
		return false;
	}
	if (did.match(patt)) {
		alert("Don't use any Special chatactar in Department ID");
		did.focus();
		return false;
	}
}