<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/17
 * Time: 16:20
 */
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
session_start();
$uid=$_SESSION['uid'];
$tag=$_GET['tag'];
if ($tag==1){
    $result=mysqli_query($connect,"select * from t_info");
    echo "<table class=\"table table-hover\">
<tr class=\"warning\">
<th>ID</th>
<th>姓名</th>
<th>年龄</th>
<th>性别</th>
<th>单位</th>
<th>电话</th>
<th>区号</th>
<th>地址</th>
</tr>";

    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

}

mysqli_close($connect);
?>