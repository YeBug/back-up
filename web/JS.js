function test(){
    alert("test one test");
}
function Skey() {
    var a = $('#S_Password').val();
    //alert(a);
    var b = $('#S_Confirm').val();
    //alert(b);
    if (a == b) {

        return true;
    }
    else {
        alert("两次密码不一致！");
        return false;
    }
}
function Tkey() {
    var a = $('#T_Password').val();
    //alert(a);
    var b = $('#T_Confirm').val();
    //alert(b);
    if (a == b) {

        return true;
    }
    else {
        alert("两次密码不一致！");
        return false;
    }
}