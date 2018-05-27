<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/18
 * Time: 13:50
 */

$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}
session_start();
$uid=$_SESSION['uid'];
$tag=$_GET['tag'];

if ($tag==1){
    $result=mysqli_query($connect,'select * from s_info where ID = "'.$uid.'"');
    $row=mysqli_fetch_array($result);
    echo "<table class=\"table table-hover\">
<tr class=\"info\">
<th>ID</th><td>" . $row[0] . "</td>
</tr>
<tr class=\"info\">
<th>校名</th><td>" . $row[1] . "</td>
</tr>
<tr class=\"info\">
<th>联系人</th><td>" . $row[2] . "</td>
</tr>
<tr class=\"info\">
<th>联系电话</th><td>" . $row[3] . "</td>
</tr>
<tr class=\"info\">
<th>区位</th><td>" . $row[4] . "</td>
</tr>
<tr class=\"info\">
<th>地址</th><td>" . $row[5] . "</td>
</tr>
</table>";
}
elseif ($tag==2){
    $result=mysqli_query($connect,'select * from s_time where ID = "'.$uid.'"');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        for ($i=1;$i<=10;$i++){
            if ($row[$i]==1)echo "<td>YES</td>";
            elseif($row[$i]==0)echo "<td>NO</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==3){
    $result=mysqli_query($connect,'select * from t_info where ID = "'.$uid.'"');
    $row=mysqli_fetch_array($result);
    echo "<table class=\"table table-hover\">
<tr class=\"info\">
<th>ID</th><td>" . $row[0] . "</td>
</tr>
<tr class=\"info\">
<th>姓名</th><td>" . $row[1] . "</td>
</tr>
<tr class=\"info\">
<th>年龄</th><td>" . $row[2] . "</td>
</tr>
<tr class=\"info\">
<th>性别</th><td>" . $row[3] . "</td>
</tr>
<tr class=\"info\">
<th>单位</th><td>" . $row[4] . "</td>
</tr>
<tr class=\"info\">
<th>电话</th><td>" . $row[5] . "</td>
</tr>
<tr class=\"info\">
<th>区号</th><td>" . $row[6] . "</td>
</tr>
<tr class=\"info\">
<th>地址</th><td>" . $row[7] . "</td>
</tr>
</table>";
}
elseif ($tag==4){
    $result=mysqli_query($connect,'select * from t_time where ID = "'.$uid.'"');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        for ($i=1;$i<=10;$i++){
            if ($row[$i]==1)echo "<td>YES</td>";
            elseif($row[$i]==0)echo "<td>NO</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==5){
    $result=mysqli_query($connect,'select * from c_info');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>课程名称</th>
    <th>课程简介</th>
    <th>资费</th>
    <th>管理</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td><button onclick='delet_()'>删除</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==6){
    $result=mysqli_query($connect,'select * from t_info');
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
    <th>理论</th>
    <th>建模</th>
    <th>编程</th>
    <th>竞赛</th>
    <th>管理</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td>$row[7]</td>";
        for ($i=8;$i<=11;$i++){
            if ($row[$i]==1)echo "<td>YES</td>";
            else echo "<td>NO</td>";
        }
        echo "<td><button onclick='t_change()'>修改</button><button onclick='delet_()'>删除</button></td>";
        echo "</tr>";
    }echo "<tr class=\"bg-warning\">
				<td> <a href=\"#\">Prev</a>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					 <a href=\"#\">Next</a>
				</td>
    </tr>";
    echo "</table>";
}
elseif ($tag==7){
    $result=mysqli_query($connect,'select * from t_time ');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>姓名</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select * from t_info WHERE ID="'.$row[0].'"'));
        echo "<td>" . $teacher[1] . "</td>";
        for ($i=1;$i<=10;$i++){
            if ($row[$i]==1)echo "<td>YES</td>";
            elseif($row[$i]==0)echo "<td>NO</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==8){
    $result=mysqli_query($connect,'select * from s_info');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>校名</th>
    <th>联系人</th>
    <th>联系电话</th>
    <th>区号</th>
    <th>地址</th>
    <th>管理</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td><button onclick='t_change()'>修改</button><button onclick='delet_()'>删除</button></td>";
        echo "</tr>";

    }echo "<tr class=\"bg-warning\">
				<td> <a href=\"#\">Prev</a>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					 <a href=\"#\">Next</a>
				</td>
    </tr>";
    echo "</table>";

}
elseif ($tag==9){
    $result=mysqli_query($connect,'select * from s_time');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>校名</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $school=mysqli_fetch_array(mysqli_query($connect,'select * from s_info WHERE ID="'.$row[0].'"'));
        echo "<td>" . $school[1] . "</td>";
        for ($i=1;$i<=10;$i++){
            if ($row[$i]==1)echo "<td>YES</td>";
            elseif($row[$i]==0)echo "<td>NO</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}elseif ($tag==10){
    $result=mysqli_query($connect,'select * from s_c');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>校名</th>
    <th>课程</th>
    <th>阶段</th>
    <th>状态</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $school=mysqli_fetch_array(mysqli_query($connect,'select * from s_info WHERE ID="'.$row[0].'"'));
        echo "<td>" . $school[1] . "</td>";
        $class=mysqli_fetch_array(mysqli_query($connect,'select * from c_info WHERE ID="'.$row[1].'"'));
        echo "<td>" . $class[1] . "</td>";
        $ctime=$row[2];
        switch ($ctime){
            case 1:
                echo "<td>理论</td>";
                break;
            case 2:
                echo "<td>建模</td>";
                break;
            case 3:
                echo "<td>编程</td>";
                break;
            case 4:
                echo "<td>竞赛</td>";
                break;
        }
        switch ($row[3]){
            case 1:
                echo "<td>已排课</td>";
                break;
            case 0:
                echo "<td>未排课</td>";
                break;
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==11){
    $result=mysqli_query($connect,'select * from s_t ');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>学校</th>
    <th>教师</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $school=mysqli_fetch_array(mysqli_query($connect,'select * from s_info WHERE ID="'.$row[1].'"'));
        echo "<td>" . $school[1] . "</td>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select * from t_info WHERE ID="'.$row[2].'"'));
        echo "<td>" . $teacher[1] . "</td>";
        for ($i=3;$i<=12;$i++){
            if ($row[$i]==-1)echo "<td>null</td>";
            else echo "<td><button href='#choose1' data-toggle=\"modal\" value='".$row[$i]."'onclick=\"detail(this.value)\">".$row[$i]."</button> </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==12){
    $result=mysqli_query($connect,'select * from s_t WHERE SID="'.$uid.'"');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>学校</th>
    <th>教师</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $school=mysqli_fetch_array(mysqli_query($connect,'select * from s_info WHERE ID="'.$row[1].'"'));
        echo "<td>" . $school[1] . "</td>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select * from t_info WHERE ID="'.$row[2].'"'));
        echo "<td>" . $teacher[1] . "</td>";
        for ($i=3;$i<=12;$i++){
            if ($row[$i]==-1)echo "<td>null</td>";
            else echo "<td><button href='#choose0' data-toggle=\"modal\" value='".$row[$i]."'onclick=\"detail(this.value)\">".$row[$i]."</button> </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
elseif ($tag==13){
    $result=mysqli_query($connect,'select * from s_t WHERE TID="'.$uid.'"');
    echo "<table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>ID</th>
    <th>学校</th>
    <th>教师</th>
    <th>周一上午</th>
    <th>周一下午</th>
    <th>周二上午</th>
    <th>周二下午</th>
    <th>周三上午</th>
    <th>周三下午</th>
    <th>周四上午</th>
    <th>周四下午</th>
    <th>周五上午</th>
    <th>周五下午</th>
    </tr>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr class=\"info\">";
        echo "<td>" . $row[0] . "</td>";
        $school=mysqli_fetch_array(mysqli_query($connect,'select * from s_info WHERE ID="'.$row[1].'"'));
        echo "<td>" . $school[1] . "</td>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select * from t_info WHERE ID="'.$row[2].'"'));
        echo "<td>" . $teacher[1] . "</td>";
        for ($i=3;$i<=12;$i++){
            if ($row[$i]==-1)echo "<td>null</td>";
            else echo "<td><button href='#choose0' data-toggle=\"modal\" value='".$row[$i]."'onclick=\"detail(this.value)\">".$row[$i]."</button> </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

mysqli_close($connect);
?>