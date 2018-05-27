<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/14
 * Time: 14:22
 */

$schedule=array(0,0,0,0,0,0,0,0,0,0);
if( $_POST )
{
    $arry = $_POST['sched'];
    for ($i=0;$i<sizeof($arry);$i++){
        $schedule[$arry[$i]]=1;
    }
}
session_start();
$uid=$_SESSION['uid'];
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
if(mysqli_fetch_array(mysqli_query($connect,'select * from s_time where ID = "'.$uid.'"'))){
    $sql='update s_time set MonM="'.$schedule[0].'",MonA="'.$schedule[1].'",TueM="'.$schedule[2].'",TueA="'.$schedule[3].'",WedM="'.$schedule[4].'"
    ,WedA="'.$schedule[5].'",ThuM="'.$schedule[6].'",ThuA="'.$schedule[7].'",FriM="'.$schedule[8].'",FriA="'.$schedule[9].'"
   where ID="'.$uid.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}else{
    $sql= 'insert into s_time(ID, MonM,MonA,TueM,TueA,WedM,WedA,ThuM,ThuA,FriM,FriA)values("'.$uid.'","'.$schedule[0].'","'.$schedule[1].'","'.$schedule[2].'","'.$schedule[3].'",
    "'.$schedule[4].'","'.$schedule[5].'","'.$schedule[6].'","'.$schedule[7].'","'.$schedule[8].'","'.$schedule[9].'")';
    //插入数据库
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}

mysqli_close($connect);
?>
