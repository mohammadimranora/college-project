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

function acadValidate() {

    /**Reading all of the elements in the form */
    var board = document.getElementById("board");
    var subject = document.getElementById("sub");
    var yop = document.getElementById("yop");
    var botainedMarks = document.getElementById("obtn");
    var total = document.getElementById("total");
    var selectDivision = document.getElementById("type1");
    var boardOne = document.getElementById("board1");
    var subjectOne = document.getElementById("sub1");
    var yopOne = document.getElementById("yop1");
    var obtnOne = document.getElementById("obtn1");
    var totalOne = document.getElementById("total1");
    var selectDivisionOne = document.getElementById("type2");

    /**Declaring the regex patterns */
    patt = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
    patt1 = /[0-9]/;
    pattern = /\d{5}/;
    pattern1 = /\d{4}/;

    /**Validating the board */
    if (board.value == "" || board.value == null) {
        alert("Please Enter Board/University Name");
        board.focus();
        return false;
    }
    if (board.value.match(patt1)) {
        alert("Don't Use any Number in Board/University Name");
        board.focus();
        return false;
    }

    /**Validating the subject */
    if (subject.value == "" || subject.value == null) {
        alert("Please Enter Subject Name");
        subject.focus();
        return false;
    }
    if (subject.value.match(patt1)) {
        alert("Don't Use any Number in Subject Name");
        subject.focus();
        return false;
    }

    /**Validating the year of passing */
    if (yop.value == "" || yop.value == null) {
        alert("Please Enter Year of Passing");
        yop.focus();
        return false;
    }
    if (yop.value.match(pattern)) {
        alert("only 4 digit in Year");
        yop.focus();
        return false;
    }
    if (yop.value.length < 4) {
        alert("Enter valid year of passing");
        yop.focus();
        return false;
    }

    /**Validating the obtained marks */
    if (obtn.value == "" || obtn.value == null) {
        alert("Enter Obtain Marks");
        obtn.focus();
        return false;
    }
    if (obtn.value.match(pattern1)) {
        alert("Only 3 digit Obtain marks");
        obtn.focus();
        return false;
    }
    if (obtn.value.length < 3) {
        alert("Enter valid Obtain Marks");
        obtn.focus();
        return false;
    }

    /**Validating the total */
    if (total.value == "" || total.value == null) {
        alert("Enter Total Marks");
        total.focus();
        return false;
    }
    if (total.value.match(pattern1)) {
        alert("Only 3 digit Total marks");
        total.focus();
        return false;
    }
    if (total.value.length < 3) {
        alert("Enter valid Total Marks");
        total.focus();
        return false;
    }

    /**Validating the division */
    if (selectDivision.value == "" || selectDivision.value == null) {
        alert("Please select your Division");
        selectDivision.focus();
        return false;
    }

    if (chk.checked) {
        /**Validating the board */
        if (boardOne.value == "" || boardOne.value == null) {
            alert("Please Enter Board/University Name");
            boardOne.focus();
            return false;
        }
        if (boardOne.value.match(patt1)) {
            alert("Don't Use any Number in Board/University Name");
            boardOne.focus();
            return false;
        }

        /**Validating the subject */
        if (subjectOne.value == "" || subjectOne.value == null) {
            alert("Please Enter Subject Name");
            subjectOne.focus();
            return false;
        }
        if (subjectOne.value.match(patt1)) {
            alert("Don't Use any Number in Subject Name");
            subjectOne.focus();
            return false;
        }

        /**Validating the year of passing */
        if (yopOne.value == "" || yopOne.value == null) {
            alert("Please Enter Year of Passing");
            yopOne.focus();
            return false;
        }
        if (yopOne.value.match(pattern)) {
            alert("only 4 digit in Year");
            yopOne.focus();
            return false;
        }
        if (yopOne.value.length < 4) {
            alert("Enter valid year of passing");
            yopOne.focus();
            return false;
        }

        /**Validating the obtained marks */
        if (obtnOne.value == "" || obtnOne.value == null) {
            alert("Enter Obtain Marks");
            obtnOne.focus();
            return false;
        }
        if (obtnOne.value.match(pattern1)) {
            alert("Only 3 digit Obtain marks");
            obtnOne.focus();
            return false;
        }
        if (obtnOne.value.length < 3) {
            alert("Enter valid Obtain Marks");
            obtnOne.focus();
            return false;
        }

        /**Validating the total */
        if (totalOne.value == "" || totalOne.value == null) {
            alert("Enter Total Marks");
            totalOne.focus();
            return false;
        }
        if (totalOne.value.match(pattern1)) {
            alert("Only 3 digit Total marks");
            totalOne.focus();
            return false;
        }
        if (totalOne.value.length < 3) {
            alert("Enter valid Total Marks");
            totalOne.focus();
            return false;
        }

        /**Validating the division */
        if (selectDivisionOne.value == "" || selectDivisionOne.value == null) {
            alert("Please select your Division");
            selectDivisionOne.focus();
            return false;
        }
    }
    return true;
}

function urduValidate() {

    /**Reading the element */
    var selectionUrdu = document.getElementById("type1");

    if (selectionUrdu.value == "" || selectionUrdu.value == null) {
        alert("Please select level of study");
        selectionUrdu.focus();
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

    /**Reading all elements of the form */
    var selectionCenter = document.getElementById('center');
    var selectionCenterOne = document.getElementById('center1');
    var selectionCenterTwo = document.getElementById('center2');

    /**Validating the selection of first center and course */
    if (selectionCenter.value == "" || selectionCenter.value == null) {
        alert("Please Select Center and Course");
        selectionCenter.focus();
        return false;
    }

    /**Validating the selection of second center and course */
    if (selectionCenterOne.value == "" || selectionCenterOne.value == null) {
        alert("Please Select Center and Course");
        selectionCenterOne.focus();
        return false;
    }

    /**Validating the seleection of third center and course */
    if (selectionCenterTwo.value == "" || selectionCenterTwo.value == null) {
        alert("Please Select Center and Course");
        selectionCenterTwo.focus();
        return false;
    }
    return true;
}

function validatePersonal() {

    /**Reading all values. */
    var fName = document.getElementById("fname");
    var mName = document.getElementById("mname");
    var dob = document.getElementById("dob");
    var nationality = document.getElementById("nationality");
    var religion = document.getElementById("religion");
    var income = document.getElementById("income");
    var mobileStudent = document.getElementById("mobile_student");
    var mobileParents = document.getElementById("mobile_parents");
    var email = document.getElementById("email");
    var ano = document.getElementById("ano");

    /** declaring the regex varible */
    validemail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
    mobile = /^[6789]\d{10}$/;
    specialSymbols = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
    onlyDigits = /[0-9]/;
    adharRegex = /^\d{12}$/;

    /**Validating father's name */
    if (fName.value == "" || fName.value == null) {
        alert("Please Enter your Father's Name");
        fName.focus();
        return false;
    }
    if (fName.value.match(specialSymbols)) {
        alert("Don't use Spceial Charactor in Father's Name");
        fName.focus();
        return false;
    }
    if (fName.value.match(onlyDigits)) {
        alert("Don't use any Number in Father's Name");
        fName.focus();
        return false;
    }

    /**Validating mother's name */
    if (mName.value == "" || mName.value == null) {
        alert("Please Enter your Mother's Name");
        mName.focus();
        return false;
    }
    if (mName.value.match(specialSymbols)) {
        alert("Don't use Spceial Charactor in Mother's Name");
        mName.focus();
        return false;
    }
    if (mName.value.match(onlyDigits)) {
        alert("Don't use any Number in Mother's Name");
        mName.focus();
        return false;
    }

    /** Validating Date of Birth */
    if (dob.value == "" || dob.value == null) {
        alert("Enter your Date of Birth");
        dob.focus();
        return false;
    }

    /** Validating the Nationality */
    if (nationality.value == "" || nationality.value == null) {
        alert("Please Enter your Natioanlity");
        nationality.focus();
        return false;
    }
    if (nationality.value.match(specialSymbols)) {
        alert("Don't use Spceial Charactor in Natioanlity Name");
        nationality.focus();
        return false;
    }
    if (nationality.value.match(onlyDigits)) {
        alert("Don't use any Number in Natioanlity Name");
        nationality.focus();
        return false;
    }

    /**Validating the religion */
    if (religion.value == "" || religion.value == null) {
        alert("Please Select your Religion");
        religion.focus();
        return false;
    }

    /**Validating the Income  */
    if (income.value == "" || income.value == null) {
        alert("Please Select your Family Income");
        income.focus();
        return false;
    }

    /** Valdating the student's mobile */
    if (mobileStudent.value == "" || mobileStudent.value == null) {
        alert("Enter your Mobile Number");
        mobileStudent.focus();
        return false;
    }
    if (mobileStudent.value.match(mobile)) {
        alert("Only 10 digit your Mobile Number(Starting with 6,7,8,9)");
        mobileStudent.focus();
        return false;
    }
    if (mobileStudent.value.length < 9) {
        alert("Please Enter 10 digit valid Mobile Number");
        mobileStudent.focus();
        return false;
    }

    /**Validating the parent's mobile number */
    if (mobileParents.value == "" || mobileParents.value == null) {
        alert("Enter your Parent Mobile Number");
        mobileParents.focus();
        return false;
    }
    if (mobileParents.value.match(mobile)) {
        alert("Only 10 digit Parent Mobile number(Starting with 6,7,8,9)");
        mobileParents.focus();
        return false;
    }
    if (mobileParents.value.length < 9) {
        alert("Please Enter 10 digit valid Mobile Number");
        mobileParents.focus();
        return false;
    }

    /**Validating email */
    if (email.value == "" || email.value == null) {
        alert("Enter your Email Id");
        email.focus();
        return false;
    }
    if (validemail.test(email.value) == false) {
        alert("Please Enter your Valid email id like: o4onli123@gmail.com");
        email.focus();
        return false;
    }
    /**Validating the adhar number */
    if (ano.value == "" || ano.value == null) {
        alert("Please Enter Aadhar Number");
        ano.focus();
        return false;
    }

    if (ano.value.match(adharRegex) == null) {
        alert("Don't give the 12 digit above adhar Number");
        ano.focus();
        return false;
    }
}

function validateAddress() {

    /**Reading all elements of the form */
    var village = document.getElementById("villmoh1");
    var post = document.getElementById("post1");
    var policeStation = document.getElementById("policestation1");
    var district = document.getElementById("district1");
    var state = document.getElementById("state1");
    var pin = document.getElementById("pin");

    /**Decalring the regex varible */

    sevenDigitsOnly = /\d{7}/;
    onlyDigits = /[0-9]/;
    specialSymbols = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;

    /**Validating the villege */
    if (village.value == "" || village.value == null) {
        alert("Please Input Village/Mohalla");
        village.focus();
        return false;
    }
    if (village.value.match(onlyDigits)) {
        alert("Don't use any Number in Village/Mohalla");
        village.focus();
        return false;
    }
    if (village.value.match(specialSymbols)) {
        alert("Don't use any special chatactar in Village/Mohalla name");
        village.focus();
        return false;
    }

    /** */
    if (post.value == "" || post.value == null) {
        alert("Enter Post Office Name");
        post.focus();
        return false;
    }
    if (post.value.match(onlyDigits)) {
        alert("Don't use any Number in post office");
        post.focus();
        return false;
    }
    if (post.value.match(specialSymbols)) {
        alert("Don't use any special charactar in postoffice");
        post.focus();
        return false;
    }

    /**Validating the police station */
    if (policeStation.value == "" || policeStation.value == null) {
        alert("Enter Police Station Name");
        policeStation.focus();
        return false;
    }
    if (policeStation.value.match(onlyDigits)) {
        alert("Don't use any Number in police station");
        policeStation.focus();
        return false;
    }
    if (policeStation.value.match(patt1)) {
        alert("Don't use any special charactar in Police Station");
        policestation1.focus();
        return false;
    }

    /**Validating the district */
    if (district.value == "" || district.value == null) {
        alert("Enter District Name");
        district.focus();
        return false;
    }
    if (district.value.match(onlyDigits)) {
        alert("Don't use any Number in District");
        district.focus();
        return false;
    }
    if (district.value.match(specialSymbols)) {
        alert("Don't use any special charactar in District");
        district.focus();
        return false;
    }

    /**Validating the state */
    if (state.value == "" || state.value == null) {
        alert("please Enter State Name");
        state.focus();
        return false;
    }
    if (state.value.match(onlyDigits)) {
        alert("Don't use any Number in state");
        state.focus();
        return false;
    }
    if (state.value.match(patt1)) {
        alert("Don't use any special charactar in State");
        state.focus();
        return false;
    }

    /**Validating the Pin number */
    if (pin.value == "" || pin.value == null) {
        alert("Enter Pin Number");
        pin.focus();
        return false;
    }
    if (pin.value.match(sevenDigitsOnly)) {
        alert("Use Only 6 digit");
        pin.focus();
        return false;
    }
    if (pin.value.length < 6) {
        alert("Give the 6 digit valid Pin number");
        pin.focus();
        return false;
    }
}

function docValidate() {
    let errorCount = 0;
    var pic = document.getElementById("pic").value;
    var sign = document.getElementById("sign").value;
    var res = document.getElementById("res").value;
    var cast = document.getElementById("cast").value;
    var income = document.getElementById("income").value;
    var marks = document.getElementById("marks").value;
    var adhar = document.getElementById("adhar").value;
    var lcer = document.getElementById("lcer").value;
    if (pic == "" || pic == null) {
        errorCount += 1;
        alert("Please Upload Pictuer");
        pic.focus();
        return false;
    }
    if (errorCount > 0) {
        event.preventDefault();
    }
}