<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/6/4
 * Time: 23:46
 */
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
session_start();
$uid=$_SESSION['uid'];
$charater=$_SESSION['character'];
$tag=$_GET['tag'];
$nday=date("Y-m-d");
$result=mysqli_query($connect,'select * from class where id = "'.$tag.'"');
$row=mysqli_fetch_array($result);
    echo "
    <form method='post' action='php/evaluate.php'>
    <table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>排课日期</th>
    <th>ID</th>
    <th>学校</th>
    <th>教师</th>
    <th>课程</th>
    <th>阶段</th>
    <th>上课地点</th>
    </tr>";
    $teacher = mysqli_fetch_array(mysqli_query($connect, 'select 姓名 from t_info WHERE ID="' . $row[2] . '"'));
    $class = mysqli_fetch_array(mysqli_query($connect, 'select 名称 from c_info WHERE ID="' . $row[3] . '"'));
    $room = mysqli_fetch_array(mysqli_query($connect, 'select * from s_c WHERE ID="' . $row[7] . '"'));
    $school=mysqli_fetch_array(mysqli_query($connect, 'select 校名 from s_info WHERE ID="' . $room[1] . '"'));
    $ctime;
    switch ($row[4]) {
        case 1:
            $ctime = "理论";
            break;
        case 2:
            $ctime = "建模";
            break;
        case 3:
            $ctime = "编程";
            break;
        case 4:
            $ctime = "竞赛";
            break;
    }
    echo "<tr class='bg-info'>
        <td name='dayt'>" . $row[0] . "</td>
        <td >" . $row[1] . "</td>
        <td >" . $school[0] . "</td>
        <td>" . $teacher[0] . "</td>
        <td>" . $class[0] . "</td>
        <td>" . $ctime . "</td>
        <td>" . $room[4] . "</td>
       </tr>";