<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/24
 * Time: 16:49
 */
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
$tag=$_GET['tag'];
$result=mysqli_query($connect,'select * from class where id = "'.$tag.'"');
$row=mysqli_fetch_array($result);
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>教师</th>
    <th>课程</th>
    <th>阶段</th>
    </tr>";
    $teacher=mysqli_fetch_array(mysqli_query($connect,'select 姓名 from t_info WHERE ID="'.$row[1].'"'));
    $class=mysqli_fetch_array(mysqli_query($connect,'select 名称 from c_info WHERE ID="'.$row[2].'"'));
    $ctime;
    switch ($row[3]){
        case 1:
            $ctime="理论";
            break;
        case 2:
            $ctime="建模";
            break;
        case 3:
            $ctime="编程";
            break;
        case 4:
            $ctime="竞赛";
            break;
    }
    echo "<tr class='bg-info'>
        <td>".$row[0]."</td>
        <td>".$teacher[0]."</td>
        <td>".$class[0]."</td>
        <td>".$ctime."</td>
       </tr>";

