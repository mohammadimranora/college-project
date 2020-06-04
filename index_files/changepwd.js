function changeValidate()
{
	var pass1=document.getElementById("oldpwd").value;
	var pass2=document.getElementById("newpwd").value;
	var pass3=document.getElementById("cnewpwd").value;


	if (pass1=="" || pass1==null) {

		alert("Please enter your old password");
		oldpwd.focus();
		return false;
	}
	if (pass2=="" || pass2==null) {

		alert("Please enter your new password");
		newpwd.focus();
		return false;
	}
	if (pass3=="" || pass3==null) {

		alert("Please enter your confirm password");
		cnewpwd.focus();
		return false;
	}
	if (pass2!=pass3) {

		alert("New password and confirm password isn't same");
		newpwd.focus();
		return false;
	}
}