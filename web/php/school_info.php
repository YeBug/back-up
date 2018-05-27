<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/13
 * Time: 14:07
 */
session_start();
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$sname=$_POST['sname'];
$contactor=$_POST['contactor'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$block1=$_POST['block'];
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
if ($sname==""){
    echo "<script>alert('请填写学校名称');window.location.href='../school.html'</script>";
}elseif ($contactor==""){
    echo "<script>alert('请填写联系人');window.location.href='../school.html'</script>";
}elseif ($phone==""){
    echo "<script>alert('请填写联系方式');window.location.href='../school.html'</script>";
}elseif ($address==""){
    echo "<script>alert('请填写学校地址');window.location.href='../school.html'</script>";
}elseif ($block==""){
    echo "<script>alert('请选择区域');window.location.href='../school.html'</script>";
}elseif(mysqli_fetch_array(mysqli_query($connect,'select * from s_info where ID = "'.$uid.'"'))){
   $sql='update s_info set 校名="'.$sname.'",联系人="'.$contactor.'",联系电话="'.$phone.'",区位="'.$block.'",地址="'.$address.'"
   where ID="'.$uid.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
} else{
    $sql= 'insert into s_info(ID, 校名,联系人,联系电话,区位,地址)values("'.$uid.'","'.$sname.'","'.$contactor.'","'.$phone.'","'.$block.'","'.$address.'")';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}

mysqli_close($connect);
?>


