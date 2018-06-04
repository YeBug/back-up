<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/6/1
 * Time: 13:30
 */
$id=$_POST['id'];
$eval=$_POST['evaluate'];
$grade=$_POST['grade'];
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
if(mysqli_fetch_array(mysqli_query($connect,'select * from class where id = "'.$id.'"'))){
    $sql='update class set 评价="'.$eval.'",分数="'.$grade.'" where id="'.$id.'"';
    if(!(mysqli_query($connect,$sql))){
        echo "<script>alert('数据更新失败');window.location.href='../school.html'</script>";
    }else{
        echo "<script>alert('更新成功!');window.location.href='../school.html'</script>";
    }
}