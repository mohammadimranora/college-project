function validatePersonal()
{
	var name=document.getElementById("fname").value;
	var mname=document.getElementById("mname").value;
	var dob=document.getElementById("dob").value;
	var nat=document.getElementById("nationality").value;
	var religon=document.getElementById("religion").value;
	var income=document.getElementById("income").value;
	var mobile=document.getElementById("mobile_student").value;
	var mobile1=document.getElementById("mobile_parents").value;
	var email=document.getElementById("email").value;
	var adhno=document.getElementById("ano").value;


	validemail=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
	regex=/^[6789]\d{10}$/;
	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	patt1=/[0-9]/;
	adharr=/^\d{12}$/;
	if (name=="" || name==null) {
		alert("Please Enter Your Father's Name");
		fname.focus();
		return false;
	}
	if (name.match(patt)) {
		alert("Don't Use Spceial Charactor in Father's Name");
		fname.focus();
		return false;
	}
	if(name.match(patt1))
	{
		alert("Don't use any Number in Father's Name");
		fname.focus();
		return false;
	}
	if(name.length<2)
	{
		alert("Name should be atleast 2 charactor");
	}
	if (mname=="" || mname==null)
	{
		alert("Please Enter your Mother's Name");
		mname.focus();
		return false;
	}
	if (mname.match(patt)) {
		alert("Don't use Spceial Charactor in Mother's Name");
		mname.focus();
		return false;
	}
	if (mname.match(patt1)) {
		alert("Don't use any Number in Mother's Name");
		mname.focus();
		return false;
	}
	if (dob=="" || dob==null) {
		alert("Enter your Date of Birth");
		dob.focus();
		return false;
	}
	if (nat=="" || nat==null) {
		alert("Please Enter your Natioanlity");
		nationality.focus();
		return false;
	}
	if (nat.match(patt)) {
		alert("Don't use Spceial Charactor in Natioanlity Name");
		nationality.focus();
		return false;
	}
	if (nat.match(patt1)) {
		alert("Don't use any Number in Natioanlity Name");
		nationality.focus();
		return false;
	}
	if (religon=="" || religon==null) {
		alert("Please Select your Religion");
		religion.focus();
		return false;
	}
	if (income=="" || income==null) {
		alert("Please Select your Family Income");
		income.focus();
		return false;
	}
	if (mobile=="" || mobile==null) {
		alert("Enter your Mobile Number");
		mobile_student.focus();
		return false;
	}
	if (mobile.match(regex)) {
		alert("Only 10 digit your Mobile Number(Starting with 6,7,8,9)");
		mobile_student.focus();
		return false;
	}
	if (mobile.length<9) {
		alert("Please Enter 10 digit valid Mobile Number");
		mobile_student.focus();
		return false;
	}
	if (mobile1=="" || mobile1==null) {
		alert("Enter your Parent Mobile Number");
		mobile_parents.focus();
		return false;
	}
	if (mobile1.match(regex)) {
		alert("Only 10 digit Parent Mobile number(Starting with 6,7,8,9)");
		mobile_parents.focus();
		return false;
	}
	if (mobile1.length<9) {
		alert("Please Enter 10 digit valid Mobile Number");
		mobile_student.focus();
		return false;
	}
	if (email=="" || email==null) {
		alert("Enter your Email Id");
		email.focus();
		return false;
	}
	if (validemail.test(emaile)==false) {
		alert("Please Enter your Valid email id like: o4onli123@gmail.com");
		email.focus();
		return false;
	}
	if (adhno=="" || adhno==null) {
		alert("Please Enter Aadhar Number");
		ano.focus();
		return false;
	}
	if (adhno.match(adharr)) {
		alert("Don't give the 12digit above adhar Number");
		ano.focus();
		return false;
	}
	
}