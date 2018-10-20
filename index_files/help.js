function helpValidate()
{
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var mobile=document.getElementById("mobile").value;
	var sel=document.getElementById("type").value;
	var des=document.getElementById("des").value;

	regex=/^[6789]\d{10}$/;
	patt1=/[0-9]/;
	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	validemail=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
	if (name=="" || name==null) {
		alert("Please Enter your Name");
		name.focus();
		return false;
	}
	if (name.match(patt1)) {
		alert("Don't use any Number in Name");
		name.focus();
		return false;
	}
	if (name.match(patt)) {
		alert("Don't use any Special charactar in Name");
		name.focus();
		return false;
	}
	if (email=="" || email==null) {
		alert("Please enter Email ID");
		email.focus();
		return false;
	}
	if (validemail.test(email)==false) {
		alert("Please enter valid Email ID like: o4ocs@gmail.com");
		email.focus();
		return false;
	}
	if (mobile=="" || mobile==null) {
		alert("Please enter Mobile Number");
		mobile.focus();
		return false;
	}
	if (mobile.length<9) {
		alert("Enter 10 digit mobile Number");
		mobile.focus();
		return false;
	}
	if (mobile.match(regex)) {
		alert("Please enter Valid Mobile Number");
		mobile.focus();
		return false;
	}
	if (sel=="" || sel==null) {
		alert("Please select Problem Type");
		type.focus();
		return false;
	}
	if (des=="" || des==null) {
		alert("Please enter Problem Description");
		des.focus();
		return false;
	}
}