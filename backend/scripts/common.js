function NumberOnly(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
 
function NumberOnlyPlus(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43)
        return false;
    return true;
}

function OnlyAlphaPlus(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ( charCode != 43 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode != 32)
        return false;
    return true;
}

function OnlyAlpha(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (  (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode != 32)
        return false;
    return true;
}
 
function AlphaNumericOnly(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode != 32)
        return false;
    return true;
}

function checkemail(EmailId) {
    var str = EmailId;
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (str == "") {
        alert("Please enter an Email Id")
        return false;
    }
    else {
        if (filter.test(str))
            return true;
        else {
            alert("Please input a valid email address!");
            return false;
        }
    }
}
  
function echeck(str) {
    var at = "@";
    var dot = ".";
    var lat = str.indexOf(at);
    var lstr = str.length;
    var ldot = str.indexOf(dot);
    var str1 = str.split('.')
    if (str1[1] == null || str1[1].length < 2) {
        return false;
    }
    if (str1[1] == null || str1.length > 9) {
        return false;
    }
    if (str.indexOf(at) == -1) {
        return false;
    }
    if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
        return false;
    }
    if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == --lstr) {
        return false;
    }
    if (str.indexOf(at, (lat + 1)) != -1) {
        return false;
    }
    if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
        return false;
    }
    if (str.indexOf(dot, (lat + 2)) == -1) {
        return false;
    }
    if (str.indexOf(" ") != -1) {
        return false;
    }
    if (!isProperMailId(str)) {
        return false;
    }
    return true;
}
// End Methods to Validate Multiple Comma Seperated Emails //

