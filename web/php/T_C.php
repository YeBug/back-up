<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/14
 * Time: 19:20
 */
session_start();
$uid=$_SESSION['uid'];
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$class=array(0,0,0,0);
if( $_POST )
{
    $arry = $_POST['class'];
    for ($i=0;$i<sizeof($arry);$i++){
        $class[$arry[$i]]=1;
    }
}
if(mysqli_fetch_array(mysqli_query($connect,'select * from t_info where ID = "'.$uid.'"'))){
    $sql='update t_info set theory="'.$class[0].'",model="'.$class[1].'",program="'.$class[2].'",contest="'.$class[3].'"  where ID="'.$uid.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../teacher.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../teacher.html'</script>";
    }
}

mysqli_close($connect);
?>