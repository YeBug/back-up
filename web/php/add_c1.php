<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/22
 * Time: 15:40
 */
session_start();
$uid=$_SESSION['uid'];
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$type=$_POST['type'];
$cid=$_POST['cid'];
$num=$_POST['num'];
$room=$_POST['room'];
for($i=0;$i<sizeof($type);$i++){
    $sql= 'insert into s_c(SID,CID,阶段,room,num,state)values("'.$uid.'","'.$cid.'","'.$type[$i].'","'.$room.'","'.$num.'",0)';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}
