<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/6/4
 * Time: 22:41
 */
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$stid=$_POST['stid'];
$charac=$_POST['charac'];
$reason=$_POST['reason'];
if(mysqli_fetch_array(mysqli_query($connect,'select * from erro where stid = "'.$stid.'" and charac="'.$charac.'"'))){
    $sql='update erro set reason="'.$reason.'" where stid="'.$stid.'" and charac="'.$charac.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../teacher.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../teacher.html'</script>";
    }
}else{
    $sql= 'insert into erro(stid, reason,charac)values("'.$stid.'","'.$reason.'","'.$charac.'")';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../teacher.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../teacher.html'</script>";
    }
}