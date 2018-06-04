<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/13
 * Time: 15:16
 */
session_start();

$tag=$_GET['tag'];
if ($tag=="cache"){

    if($_SESSION) echo "<script>window.location.href='../school.html'</script>";
    else  echo "<script>alert('请登录');window.location.href='../login.html'</script>";
}
elseif ($tag=="logout"){
    session_destroy();
    echo "<script>alert('退出成功！');window.location.href='../index.html'</script>";
}

?>