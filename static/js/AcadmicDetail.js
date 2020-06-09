function acadValidate()
{

	var bord=document.getElementById("board").value;
	var sub=document.getElementById("sub").value;
	var yop=document.getElementById("yop").value;
	var obtn=document.getElementById("obtn").value;
	var tot=document.getElementById("total").value;
	var sel=document.getElementById("type1").value;
	var bord1=document.getElementById("board1").value;
	var sub1=document.getElementById("sub1").value;
	var yop1=document.getElementById("yop1").value;
	var obtn1=document.getElementById("obtn1").value;
	var tot1=document.getElementById("total1").value;
	var sel1=document.getElementById("type2").value;

	patt=/["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
	patt1=/[0-9]/;
	pattern=/\d{5}/;
	pattern1=/\d{4}/;
	if (bord=="" || bord==null) {
		alert("Please Enter Board/University Name");
		board2.focus();
		return false;
	}
	if (bord.match(patt1)) {
		alert("Don't Use any Number in Board/University Name");
		board2.focus();
		return false;
	}
	if (sub=="" || sub==null) {
		alert("Please Enter Subject Name");
		sub.focus();
		return false;
	}
	if (sub.match(patt1)) {
		alert("Don't Use any Number in Subject Name");
		sub.focus();
		return false;
	}
	if (yop=="" || yop==null) {
		alert("Please Enter Year of Passing");
		yop.focus();
		return false;
	}
	if (yop.match(pattern)) {
		alert("only 4 digit in Year");
		yop.focus();
		return false;
	}
	if (yop.length<4) {
		alert("Enter valid year of passing");
		yop.focus();
		return false;
	}
	if (obtn=="" || obtn==null) {
		alert("Enter Obtain Marks");
		obtn.focus();
		return false;
	}
	if (obtn.match(pattern1)) {
		alert("Only 3 digit Obtain marks");
		obtn.focus();
		return false;
	}
	if (obtn.length<3) {
		alert("Enter valid Obtain Marks");
		obtn.focus();
		return false;
	}
	if (tot=="" || tot==null) {
		alert("Enter Total Marks");
		total.focus();
		return false;
	}
	if (tot.match(pattern1)) {
		alert("Only 3 digit Total marks");
		total.focus();
		return false;
	}
	if (tot.length<3) {
		alert("Enter valid Total Marks");
		total.focus();
		return false;
	}
	if (sel=="" || sel==null) {
		alert("Please select your Division");
		type1.focus();
		return false;
	}
	if (chk.checked) {
		if (bord1=="" || bord1==null) {
			alert("Please enter Board/University Name");
			board1.focus();
			return false;
		}
		if (bord1.match(patt1)) {
			alert("Don't Use any Number in Board/University Name");
			board1.focus();
			return false;
		}
		if (sub1=="" || sub1==null) {
			alert("Please Enter Subject Name");
			sub1.focus();
			return false;
		}
		if (sub1.match(patt1)) {
			alert("Don't Use any Number in Subject Name");
			sub1.focus();
			return false;
		}
		if (yop1=="" || yop1==null) {
			alert("Please Enter Year of Passing");
			yop1.focus();
			return false;
		}
		if (yop1.match(pattern)) {
			alert("only 4 digit in Year");
			yop1.focus();
			return false;
		}
		if (yop1.length<4) {
			alert("Enter valid year of passing");
			yop1.focus();
			return false;
		}
		if (obtn1=="" || obtn1==null) {
			alert("Enter Obtain Marks");
			obtn1.focus();
			return false;
		}
		if (obtn1.match(pattern1)) {
			alert("Only 3 digit Obtain marks");
			obtn1.focus();
			return false;
		}
		if (obtn1.length<3) {
			alert("Enter valid Obtain Marks");
			obtn1.focus();
			return false;
		}
		if (tot1=="" || tot1==null) {
			alert("Enter Total Marks");
			total1.focus();
			return false;
		}
		if (tot1.match(pattern1)) {
			alert("Only 3 digit Total marks");
			total1.focus();
			return false;
		}
		if (tot1.length<3) {
			alert("Enter valid Total Marks");
			total1.focus();
			return false;
		}
		if (sel1=="" || sel1==null) {
			alert("Please select your Division");
			type2.focus();
			return false;
		}
	}
	return true;
	
}