<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/12
 * Time: 14:19
 */
session_start();
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}

$email=$_POST["email"];
$passwd=$_POST["password"];
if ($email==""){
    echo "<script>alert('邮箱不能为空！');window.location.href='../login.html'</script>";
}elseif ($passwd==""){
    echo "<script>alert('密码不能为空！');window.location.href='../login.html'</script>";
}elseif($result=mysqli_fetch_array(mysqli_query($connect,'select * from admin where email = "'.$email.'" and password = "'.$passwd.'"'))){
    echo "<script>alert('登录成功');</script>";
    $_SESSION['uid']=$result[0];
    if ($result[3]=="school")echo "<script>window.location.href='../school.html'</script>";
    elseif($result[3]=="teacher")echo "<script>window.location.href='../teacher.html'</script>";
    elseif ($result[3]=="admin")echo "<script>window.location.href='../admin.html'</script>";
}elseif(!mysqli_fetch_array(mysqli_query($connect,'select * from admin where email = "'.$email.'"'))){
    echo "<script>alert('用户不存在');window.location.href='../login.html'</script>";
}else{
   echo "<script>alert('密码错误');window.location.href='../login.html'</script>";
}

mysqli_close($connect);
?>