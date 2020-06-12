function updateValid() {
    var courseid = document.getElementById("courseid").value;
    var catcid = document.getElementById("ccid").value;
    var cname = document.getElementById("cname").value;
    var deptid = document.getElementById("did").value;
    var cduration = document.getElementById("cduration").value;
    var nofs = document.getElementById("nos").value;
    var ctype = document.getElementById("ctype").value;
    var cfee = document.getElementById("cfee").value;
    var rseat = document.getElementById("rseat").value;

    patt1 = /[0-9]/;
    patt = /["!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"]/;
    if (courseid == "" || courseid == null) {
        alert("Please Enter Course ID");
        courseid.focus();
        return false;
    }
    if (courseid.match(patt)) {
        alert("Don't Use any Special charactar in Course ID");
        courseid.focus();
        return false;
    }
    if (catcid == "" || catcid == null) {
        alert("Please Enter Category Course ID");
        ccid.focus();
        return false;
    }
    if (catcid.match(patt)) {
        alert("Don't use any Special charactar in Category Course ID");
        ccid.focus();
        return false;
    }
    if (cname == "" || cname == null) {
        alert("Please Enter Course Name");
        cname.focus();
        return false;
    }
    if (cname.match(patt1)) {
        alert("Don't use any Number in Course Name");
        cname.focus();
        return false;
    }
    if (cname.match(patt)) {
        alert("Don't use any Special charactar in Course Name");
        cname.focus();
        return false;
    }
    if (deptid == "" || deptid == null) {
        alert("Please Enter Department ID");
        did.focus();
        return false;
    }
    if (deptid.match(patt)) {
        alert("Don't use any Special charactar in Department ID");
        did.focus();
        return false;
    }
    if (cduration == "" || cduration == null) {
        alert("Please Select Course Duration");
        cduration.focus();
        return false;
    }
    if (nofs == "" || nofs == null) {
        alert("Please Enter No. of Seat");
        nos.focus();
        return false;
    }
    if (ctype == "" || ctype == null) {
        alert("Please Select Course Type");
        ctype.focus();
        return false;
    }
    if (cfee == "" || cfee == null) {
        alert("Please Enter Course Fee");
        cfee.focus();
        return false;
    }
    if (rseat == "" || rseat == null) {
        alert("Please Enter Reserved Seat");
        rseat.focus();
        return false;
    }
}