function preventBack() {
    window.history.forward();
}
setTimeout("preventBack()", 0);
window.onunload = function() {
    null
};

function copy(f) {
    if (f.isper.checked) {
        f.villmoh2.value = f.villmoh1.value;
        f.post2.value = f.post1.value;
        f.policestation2.value = f.policestation1.value;
        f.district2.value = f.district1.value;
        f.state2.value = f.state1.value;
        f.pin2.value = f.pin1.value;
    } else {
        f.villmoh2.value = "";
        f.post2.value = "";
        f.policestation2.value = "";
        f.district2.value = "";
        f.state2.value = "";
        f.pin2.value = "";

    }
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function validatePersonal() {
    var name = document.getElementById("fname").value;
    var mname = document.getElementById("mname").value;
    var dob = document.getElementById("dob").value;
    var nat = document.getElementById("nationality").value;
    var religon = document.getElementById("religion").value;
    var income = document.getElementById("income").value;
    var mobile = document.getElementById("mobile_student").value;
    var mobile1 = document.getElementById("mobile_parents").value;
    var email = document.getElementById("email").value;
    var adhno = document.getElementById("ano").value;


    validemail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
    regex = /^[6789]\d{10}$/;
    patt = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
    patt1 = /[0-9]/;
    adharr = /^\d{12}$/;
    if (name == "" || name == null) {
        alert("Please Enter Your Father's Name");
        fname.focus();
        return false;
    }
    if (name.match(patt)) {
        alert("Don't Use Spceial Charactor in Father's Name");
        fname.focus();
        return false;
    }
    if (name.match(patt1)) {
        alert("Don't use any Number in Father's Name");
        fname.focus();
        return false;
    }
    if (name.length < 2) {
        alert("Name should be atleast 2 charactor");
    }
    if (mname == "" || mname == null) {
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
    if (dob == "" || dob == null) {
        alert("Enter your Date of Birth");
        dob.focus();
        return false;
    }
    if (nat == "" || nat == null) {
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
    if (religon == "" || religon == null) {
        alert("Please Select your Religion");
        religion.focus();
        return false;
    }
    if (income == "" || income == null) {
        alert("Please Select your Family Income");
        income.focus();
        return false;
    }
    if (mobile == "" || mobile == null) {
        alert("Enter your Mobile Number");
        mobile_student.focus();
        return false;
    }
    if (mobile.match(regex)) {
        alert("Only 10 digit your Mobile Number(Starting with 6,7,8,9)");
        mobile_student.focus();
        return false;
    }
    if (mobile.length < 9) {
        alert("Please Enter 10 digit valid Mobile Number");
        mobile_student.focus();
        return false;
    }
    if (mobile1 == "" || mobile1 == null) {
        alert("Enter your Parent Mobile Number");
        mobile_parents.focus();
        return false;
    }
    if (mobile1.match(regex)) {
        alert("Only 10 digit Parent Mobile number(Starting with 6,7,8,9)");
        mobile_parents.focus();
        return false;
    }
    if (mobile1.length < 9) {
        alert("Please Enter 10 digit valid Mobile Number");
        mobile_student.focus();
        return false;
    }
    if (email == "" || email == null) {
        alert("Enter your Email Id");
        email.focus();
        return false;
    }
    if (validemail.test(emaile) == false) {
        alert("Please Enter your Valid email id like: o4onli123@gmail.com");
        email.focus();
        return false;
    }
    if (adhno == "" || adhno == null) {
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

function acadValidate() {

    var bord = document.getElementById("board").value;
    var sub = document.getElementById("sub").value;
    var yop = document.getElementById("yop").value;
    var obtn = document.getElementById("obtn").value;
    var tot = document.getElementById("total").value;
    var sel = document.getElementById("type1").value;
    var bord1 = document.getElementById("board1").value;
    var sub1 = document.getElementById("sub1").value;
    var yop1 = document.getElementById("yop1").value;
    var obtn1 = document.getElementById("obtn1").value;
    var tot1 = document.getElementById("total1").value;
    var sel1 = document.getElementById("type2").value;

    patt = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
    patt1 = /[0-9]/;
    pattern = /\d{5}/;
    pattern1 = /\d{4}/;
    if (bord == "" || bord == null) {
        alert("Please Enter Board/University Name");
        board2.focus();
        return false;
    }
    if (bord.match(patt1)) {
        alert("Don't Use any Number in Board/University Name");
        board2.focus();
        return false;
    }
    if (sub == "" || sub == null) {
        alert("Please Enter Subject Name");
        sub.focus();
        return false;
    }
    if (sub.match(patt1)) {
        alert("Don't Use any Number in Subject Name");
        sub.focus();
        return false;
    }
    if (yop == "" || yop == null) {
        alert("Please Enter Year of Passing");
        yop.focus();
        return false;
    }
    if (yop.match(pattern)) {
        alert("only 4 digit in Year");
        yop.focus();
        return false;
    }
    if (yop.length < 4) {
        alert("Enter valid year of passing");
        yop.focus();
        return false;
    }
    if (obtn == "" || obtn == null) {
        alert("Enter Obtain Marks");
        obtn.focus();
        return false;
    }
    if (obtn.match(pattern1)) {
        alert("Only 3 digit Obtain marks");
        obtn.focus();
        return false;
    }
    if (obtn.length < 3) {
        alert("Enter valid Obtain Marks");
        obtn.focus();
        return false;
    }
    if (tot == "" || tot == null) {
        alert("Enter Total Marks");
        total.focus();
        return false;
    }
    if (tot.match(pattern1)) {
        alert("Only 3 digit Total marks");
        total.focus();
        return false;
    }
    if (tot.length < 3) {
        alert("Enter valid Total Marks");
        total.focus();
        return false;
    }
    if (sel == "" || sel == null) {
        alert("Please select your Division");
        type1.focus();
        return false;
    }
    if (chk.checked) {
        if (bord1 == "" || bord1 == null) {
            alert("Please enter Board/University Name");
            board1.focus();
            return false;
        }
        if (bord1.match(patt1)) {
            alert("Don't Use any Number in Board/University Name");
            board1.focus();
            return false;
        }
        if (sub1 == "" || sub1 == null) {
            alert("Please Enter Subject Name");
            sub1.focus();
            return false;
        }
        if (sub1.match(patt1)) {
            alert("Don't Use any Number in Subject Name");
            sub1.focus();
            return false;
        }
        if (yop1 == "" || yop1 == null) {
            alert("Please Enter Year of Passing");
            yop1.focus();
            return false;
        }
        if (yop1.match(pattern)) {
            alert("only 4 digit in Year");
            yop1.focus();
            return false;
        }
        if (yop1.length < 4) {
            alert("Enter valid year of passing");
            yop1.focus();
            return false;
        }
        if (obtn1 == "" || obtn1 == null) {
            alert("Enter Obtain Marks");
            obtn1.focus();
            return false;
        }
        if (obtn1.match(pattern1)) {
            alert("Only 3 digit Obtain marks");
            obtn1.focus();
            return false;
        }
        if (obtn1.length < 3) {
            alert("Enter valid Obtain Marks");
            obtn1.focus();
            return false;
        }
        if (tot1 == "" || tot1 == null) {
            alert("Enter Total Marks");
            total1.focus();
            return false;
        }
        if (tot1.match(pattern1)) {
            alert("Only 3 digit Total marks");
            total1.focus();
            return false;
        }
        if (tot1.length < 3) {
            alert("Enter valid Total Marks");
            total1.focus();
            return false;
        }
        if (sel1 == "" || sel1 == null) {
            alert("Please select your Division");
            type2.focus();
            return false;
        }
    }
    return true;
}

function urduValidate() {
    var sele = document.getElementById("type1").value;
    if (sele == "" || sele == null) {
        alert("Please select level of study");
        type1.focus();
        return false;
    }
}
var courses = new Array();

courses['HYDERABAD'] = new Array('CIVIL ENGG', 'EC ENGG', 'CS ENGG', 'IT ENGG');
courses['BANGALORE'] = new Array('CIVIL ENGG', 'EC ENGG', 'CS ENGG');
courses['DARBHANGA'] = new Array('CIVIL ENGG', 'EC ENGG', 'CS ENGG');
courses['KADAPA'] = new Array('CIVIL ENGG', 'MECHANICAL ENGG', 'EE ENGG', 'APPAREL TECH');
courses['CUTTACK'] = new Array('CIVIL ENGG', 'MECHANICAL ENGG', 'EE ENGG', 'AUTOMOBILE ENGG');

function setStates() {
    centerSelect = document.getElementById('center');
    courseList = courses[centerSelect.value];
    changeSelect('course', courseList, courseList);
}

function setStates1() {
    centerSelect = document.getElementById('center1');
    courseList = courses[centerSelect.value];
    changeSelect('course1', courseList, courseList);
}

function setStates2() {
    centerSelect = document.getElementById('center2');
    courseList = courses[centerSelect.value];
    changeSelect('course2', courseList, courseList);
}

function changeSelect(fieldID, newOptions, newValues) {
    selectField = document.getElementById(fieldID);
    selectField.options.length = 0;
    for (i = 0; i < newOptions.length; i++) {
        selectField.options[selectField.length] = new Option(newOptions[i], newValues[i]);
    }
}

function SeleValid() {
    var sele = document.getElementById('center').value;
    var sele1 = document.getElementById('center1').value;
    var sele2 = document.getElementById('center2').value;
    if (sele == "" || sele == null) {
        alert("Please Select Center and Course");
        center.focus();
        return false;
    }
    if (sele1 == "" || sele1 == null) {
        alert("Please Select Center and Course");
        center.focus();
        return false;
    }
    if (sele2 == "" || sele2 == null) {
        alert("Please Select Center and Course");
        center.focus();
        return false;
    }
    return true;
}

function validatePersonal() {
    var village1 = document.getElementById("fname").value;
    var post1 = document.getElementById("post1").value;
    var police1 = document.getElementById("policestation1").value;
    var dist1 = document.getElementById("district1").value;
    var stat1 = document.getElementById("state1").value;
    var pinno1 = document.getElementById("pin1").value;
    var pattern = /\d{7}/;
    var patt = /[0-9]/;

    if (village1 == "" || village1 == null) {
        alert("Please Input Village/Mohalla");
        fname.focus();
        return false;
    }
    if (village1.match(patt)) {
        alert("Don't use any Number digit");
        villmoh1.focus();
        return false;
    }
    if (post1 == "" || post1 == null) {
        alert("Enter Post Office Name");
        post1.focus();
        return false;
    }
    if (post1.match(patt)) {
        alert("Don't use any Number digit");
        post1.focus();
        return false;
    }
    if (police1 == "" || police1 == null) {
        alert("Enter Police Station Name");
        policestation1.focus();
        return false;
    }
    if (police1.match(patt)) {
        alert("Don't use any Number digit");
        policestation1.focus();
        return false;
    }
    if (dist1 == "" || dist1 == null) {
        alert("Enter District Name");
        district1.focus();
        return false;
    }
    if (dist1.match(patt)) {
        alert("Don't use any Number digit");
        district1.focus();
        return false;
    }
    if (stat1 == "" || stat1 == null) {
        alert("Enter State Name");
        state1.focus();
        return false;
    }
    if (stat1.match(patt)) {
        alert("Don't use any Number digit");
        state1.focus();
        return false;
    }
    if (pinno1 == "" || pinno1 == null) {
        alert("Enter Pin Number");
        pin1.focus();
        return false;
    }
    if (pinno1.match(pattern)) {
        alert("Use Only 6 digit");
        pin1.focus();
        return false;
    }
    if (pinno1.length < 6) {
        alert("Give the 6 digit valid Pin number");
        pin1.focus();
        return false;
    }
}

function validateAddress() {
    var village1 = document.getElementById("villmoh1").value;
    var post1 = document.getElementById("post1").value;
    var police1 = document.getElementById("policestation1").value;
    var dist1 = document.getElementById("district1").value;
    var stat1 = document.getElementById("state1").value;
    var pinno = document.getElementById("pin").value;
    pattern = /\d{7}/;
    patt = /[0-9]/;
    patt1 = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;

    if (village1 == "" || village1 == null) {
        alert("Please Input Village/Mohalla");
        villmoh1.focus();
        return false;
    }
    if (village1.match(patt)) {
        alert("Don't use any Number in Village/Mohalla");
        villmoh1.focus();
        return false;
    }
    if (village1.match(patt1)) {
        alert("Don't use any special chatactar in Village/Mohalla name");
        villmoh1.focus();
        return false;
    }
    if (post1 == "" || post1 == null) {
        alert("Enter Post Office Name");
        post1.focus();
        return false;
    }
    if (post1.match(patt)) {
        alert("Don't use any Number in post office");
        post1.focus();
        return false;
    }
    if (post1.match(patt1)) {
        alert("Don't use any special charactar in postoffice");
        post1.focus();
        return false;
    }
    if (police1 == "" || police1 == null) {
        alert("Enter Police Station Name");
        policestation1.focus();
        return false;
    }
    if (police1.match(patt)) {
        alert("Don't use any Number in police station");
        policestation1.focus();
        return false;
    }
    if (police1.match(patt1)) {
        alert("Don't use any special charactar in Police Station");
        policestation1.focus();
        return false;
    }
    if (dist1 == "" || dist1 == null) {
        alert("Enter District Name");
        district1.focus();
        return false;
    }
    if (dist1.match(patt)) {
        alert("Don't use any Number in District");
        district1.focus();
        return false;
    }
    if (dist1.match(patt1)) {
        alert("Don't use any special charactar in District");
        district1.focus();
        return false;
    }
    if (stat1 == "" || stat1 == null) {
        alert("please Enter State Name");
        state1.focus();
        return false;
    }
    if (stat1.match(patt)) {
        alert("Don't use any Number in state");
        state1.focus();
        return false;
    }
    if (state1.match(patt1)) {
        alert("Don't use any special charactar in State");
        state1.focus();
        return false;
    }
    if (pinno == "" || pinno == null) {
        alert("Enter Pin Number");
        pin.focus();
        return false;
    }
    if (pinno.match(pattern)) {
        alert("Use Only 6 digit");
        pin.focus();
        return false;
    }
    if (pinno.length < 6) {
        alert("Give the 6 digit valid Pin number");
        pin.focus();
        return false;
    }
}

function docValidate() {
    var pic = document.getElementById("pic").value;
    var sign = document.getElementById("sign").value;
    var res = document.getElementById("res").value;
    var cast = document.getElementById("cast").value;
    var income = document.getElementById("income").value;
    var marks = document.getElementById("marks").value;
    var adhar = document.getElementById("adhar").value;
    var lcer = document.getElementById("lcer").value;
    if (pic == "" || pic == null) {
        alert("Please Upload Pictuer");
        pic.focus();
        return false;
    }
}