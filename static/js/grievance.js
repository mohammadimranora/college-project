function griValidate()
{
	var name=document.getElementById("name").value;
	var id=document.getElementById("id").value;
	var mobile=document.getElementById("mobile").value;
	var course=document.getElementById("course").value;
	var prob=document.getElementById("problem").value;

	regex=/^[6789]\d{10}$/;
	patt1=/[0-9]/;
	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
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
	if (id=="" || id==null) {
		alert("Please Enter your ID number");
		id.focus();
		return false;
	}
	if (mobile=="" || mobile==null) {
		alert("Please Enter Mobile Number");
		mobile.focus();
		return false;
	}
	if (mobile.match(regex)) {
		alert("Please Enter Valid Mobile Number");
		mobile.focus();
		return false;
	}
	if (mobile.length<9) {
		alert("Enter 10 digit Mobile Number");
		mobile.focus();
		return false;
	}
	if (course=="" || course==null) {
		alert("Please Select Course");
		course.focus();
		return false;
	}
	if (prob=="" || prob==null) {
		alert("Please Write Description");
		problem.focus();
		return false;
	}
}