<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/11
 * Time: 11:32
 */
session_start();
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$tag=$_POST['tag'];
if ($tag==1){
    $email = $_POST['semail'];
    $password = $_POST['spassword'];
    $confirm = $_POST['sconfirm'];

    if($password == "" || $confirm == "" || $email == "")
    {
        echo "<script>alert('信息不能为空！重新填写');window.location.href='../register.html'</script>";
// }elseif ((strlen($username) < 3)||(!preg_match('/^\w+$/i', $username))) {
        //  echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='../register'</script>";
        //判断用户名长度
    }elseif(strlen($password) < 5){
        echo "<script>alert('密码至少5位！重新填写');window.location.href='../register.html'</script>";
        //判断密码长度
    }elseif($password != $confirm) {
        echo "<script>alert('两次密码不相同！重新填写');window.location.href='../register.html'</script>";
        //检测两次输入密码是否相同
    } elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
        echo "<script>alert('邮箱不合法！重新填写');window.location.href='../register.html'</script>";
        //判断邮箱格式是否合法
    }  elseif(mysqli_fetch_array(mysqli_query($connect,'select * from admin where email = "'.$email.'"'))){
        echo "<script>alert('用户名已存在');window.location.href='../register.html'</script>";
    } else{
        $sql= 'insert into admin(email, password,tag)values("'.$email.'","'.$password.'","school")';
        //插入数据库
        if(!(mysqli_query($connect,$sql))){
            echo "<script>alert('数据插入失败');window.location.href='../register.html'</script>";
        }else{
            echo "<script>alert('注册成功!');window.location.href='../login.html'</script>";
        }
    }
}
elseif($tag==2){
    $email = $_POST['temail'];
    $password = $_POST['tpassword'];
    $confirm = $_POST['tconfirm'];

    if($password == "" || $confirm == "" || $email == "")
    {
        echo "<script>alert('信息不能为空！重新填写');window.location.href='../register.html'</script>";
// }elseif ((strlen($username) < 3)||(!preg_match('/^\w+$/i', $username))) {
        //  echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='../register'</script>";
        //判断用户名长度
    }elseif(strlen($password) < 5){
        echo "<script>alert('密码至少5位！重新填写');window.location.href='../register.html'</script>";
        //判断密码长度
    }elseif($password != $confirm) {
        echo "<script>alert('两次密码不相同！重新填写');window.location.href='../register.html'</script>";
        //检测两次输入密码是否相同
    } elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
        echo "<script>alert('邮箱不合法！重新填写');window.location.href='../register.html'</script>";
        //判断邮箱格式是否合法
    }  elseif(mysqli_fetch_array(mysqli_query($connect,'select * from admin where email = "'.$email.'"'))){
        echo "<script>alert('用户名已存在');window.location.href='../register.html'</script>";
    } else{
        $sql= 'insert into admin(email, password,tag)values("'.$email.'","'.$password.'","teacher")';
        //插入数据库
        if(!(mysqli_query($connect,$sql))){
            echo "<script>alert('数据插入失败');window.location.href='../register.html'</script>";
        }else{
            echo "<script>alert('注册成功!');window.location.href='../login.html'</script>";
        }
    }
}

mysqli_close($connect);
?>