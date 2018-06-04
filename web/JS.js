function delet_(){
    var t=confirm("确定删除？");
    if (t){
        alert("已删除");
    }
}
function subma() {
    var t=confirm("确定提交？");
    if (t){
        alert("已提交");
    }
}
function change(){
    var t=confirm("确定删除？");
    if (t){
        alert("已删除");
    }
}
function reason(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("changeform").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/cancle.php?tag="+str,true);
    xmlhttp.send();
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

function checkPhone(){
    var phone = document.getElementById('phone').value;
    if(!(/^1[34578]\d{9}$/.test(phone))){
        alert("手机号码有误，请重填");
        return false;
    }
}
function  t_change() {

}

//xml
function testxml()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
        alert("IE7");
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        alert("IE5");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","php/xmltest.php",true);
    xmlhttp.send();
}

//回显学校信息
function show_school_info()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("sinfo").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=1",true);
    xmlhttp.send();
}
//回显学校时间表
function show_school_time()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("stime").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=2",true);
    xmlhttp.send();
}
function show_sc()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("sc").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=14",true);
    xmlhttp.send();
}

//回显教师信息
function show_teacher_info()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("tinfo").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=3",true);
    xmlhttp.send();
}
//回显学校时间表
function show_teacher_time()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("ttime").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=4",true);
    xmlhttp.send();
}
function show_teacher_time()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("ttime").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=4",true);
    xmlhttp.send();
}

function adm_class()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("check_class").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=5",true);
    xmlhttp.send();
}

function adm_teacher()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("check_teacher").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=6",true);
    xmlhttp.send();
}

function adm_ttime()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("show_ttime").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=7",true);
    xmlhttp.send();
}

function adm_school()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("check_school").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=8",true);
    xmlhttp.send();
}

function adm_stime()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("show_stime").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=9",true);
    xmlhttp.send();
}

function adm_sc()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("show_sc").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=10",true);
    xmlhttp.send();
}

function schedule(str)
{

    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("schedule").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=21&day="+str,true);
    xmlhttp.send();
}

function n_schedule()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("n_schedule").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=11",true);
    xmlhttp.send();
}
function n_detail(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("n_showclass").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/detail.php?tag="+str,true);
    xmlhttp.send();
}
function detail(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("showclass").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/detail.php?tag="+str,true);
    xmlhttp.send();
}
function e_detail(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("e_showclass").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/e_detail.php?tag="+str,true);
    xmlhttp.send();
}
function e_detail1(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("e_showclass1").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/e_detail.php?tag="+str,true);
    xmlhttp.send();
}
function s_show()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("s_show").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=12",true);
    xmlhttp.send();
}
function s_show1(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("s_show1").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=22&day="+str,true);
    xmlhttp.send();
}
function t_show()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("t_show").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=13",true);
    xmlhttp.send();
}
function t_show1(str)
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("t_show1").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=23&day="+str,true);
    xmlhttp.send();
}
function adm_terro()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("t_erro").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=31",true);
    xmlhttp.send();
}
function adm_serro()
{
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("s_erro").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","php/xml.php?tag=32",true);
    xmlhttp.send();
}