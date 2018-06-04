<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/30
 * Time: 23:04
 */
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$scid=$_POST['scid'];
$reason=$_POST['reason'];
if(mysqli_fetch_array(mysqli_query($connect,'select * from cancle where scid = "'.$scid.'"'))){
    $sql='update cancle set reason="'.$reason.'" where scid="'.$scid.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}else{
    $sql= 'insert into cancle(scid, reason)values("'.$scid.'","'.$reason.'")';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}