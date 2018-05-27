<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/14
 * Time: 16:45
 */
session_start();
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$tname=$_POST['tname'];
$employer=$_POST['employer'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$block1=$_POST['block'];
$sex=$_POST['sex'];
$age=$_POST['age'];
switch ($block1){
    case "碑林区":$block=1;break;
    case "新城区":$block=2;break;
    case "雁塔区":$block=3;break;
    case "高新区":$block=4;break;
    case "灞桥区":$block=5;break;
    case "长安区":$block=6;break;
    case "莲湖区":$block=7;break;
    case "未央区":$block=8;break;
    case "临潼区":$block=9;break;
    case "高陵区":$block=10;break;
    case "鄠邑区":$block=11;break;
}
$uid=$_SESSION['uid'];
if ($tname==""){
    echo "<script>alert('请填写教师姓名');window.location.href='../teacher.html'</script>";
}elseif ($employer==""){
    echo "<script>alert('请填写所属单位');window.location.href='../teacher.html'</script>";
}elseif ($phone==""){
    echo "<script>alert('请填写手机号码');window.location.href='../teacher.html'</script>";
}elseif ($address==""){
    echo "<script>alert('请填写常住地址');window.location.href='../teacher.html'</script>";
}elseif ($block==""){
    echo "<script>alert('请选择区域');window.location.href='../teacher.html'</script>";
}elseif ($age==""){
    echo "<script>alert('请填写年龄');window.location.href='../teacher.html'</script>";
}elseif(mysqli_fetch_array(mysqli_query($connect,'select * from t_info where ID = "'.$uid.'"'))){
    $sql='update t_info set 姓名="'.$tname.'",单位="'.$employer.'",电话="'.$phone.'",区号="'.$block.'",地址="'.$address.'",年龄="'.$age.'",性别="'.$sex.'"
   where ID="'.$uid.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../teacher.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../teacher.html'</script>";
    }
} else{
    $sql= 'insert into t_info(ID, 姓名,单位,电话,区号,地址,年龄,性别)values("'.$uid.'","'.$tname.'","'.$employer.'","'.$phone.'","'.$block.'","'.$address.'","'.$age.'","'.$sex.'")';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../teacher.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../teacher.html'</script>";
    }
}


mysqli_close($connect);
?>