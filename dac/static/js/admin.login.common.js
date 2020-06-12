function loginValidate() {
    var id = document.getElementById("userid").value;
    var pass = document.getElementById("password").value;
    var captcha = document.getElementById("captcha").value;

    if (id == "" || id == null) {
        alert("Please Enter your User ID");
        userid.focus();
        return false;
    }
    if (pass == "" || pass == null) {
        alert("Please Enter your Password");
        password.focus();
        return false;
    }
    if (captcha == "" || captcha == null) {
        alert("Please Enter Captcha");
        captcha.focus();
        return false;
    }
}