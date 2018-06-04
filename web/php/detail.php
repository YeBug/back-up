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
session_start();
$uid=$_SESSION['uid'];
$charater=$_SESSION['character'];
$tag=$_GET['tag'];
$nday=date("Y-m-d");
$result=mysqli_query($connect,'select * from class where id = "'.$tag.'"');
$row=mysqli_fetch_array($result);
if ($charater=="school"){
    echo "
    <form method='post' action='php/evaluate.php'>
    <table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>排课日期</th>
    <th>ID</th>
    <th>教师</th>
    <th>课程</th>
    <th>阶段</th>
    <th>上课地点</th>
    </tr>";
    $teacher=mysqli_fetch_array(mysqli_query($connect,'select 姓名 from t_info WHERE ID="'.$row[2].'"'));
    $class=mysqli_fetch_array(mysqli_query($connect,'select 名称 from c_info WHERE ID="'.$row[3].'"'));
    $room=mysqli_fetch_array(mysqli_query($connect,'select room from s_c WHERE ID="'.$row[7].'"'));
    $ctime;
    switch ($row[4]){
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
        <td name='dayt'>".$row[0]."</td>
        <td >".$row[1]."
        <input style='display: none' readonly='readonly' name='id' value='".$row[1]."'>
        </td>
        <td>".$teacher[0]."</td>
        <td>".$class[0]."</td>
        <td>".$ctime."</td>
        <td>".$room[0]."</td>
       </tr>";

        if (strtotime($nday."-7day")-strtotime($row[0])>0){
        echo " <tr class='bg-color'>
    <th>
    评价本次教学
    </th>
    <td>
    <input type='text'  name='evaluate' readonly='readonly' placeholder='已过评论时间'/>
    </td>
    <td>
    教学打分
    </td>
    <td>
    <input type='text' id='grade' name='grade' style='width: 80px' readonly='readonly' placeholder='已过评论时间'/>
    </td>
    <td>
    </td>
    <td>
    </td>
    </tr>
    </form>

   </table>
    ";}else{
            echo " <tr class='bg-color'>
    <th>
    评价本次教学
    </th>
    <td>
    <input type='text'  name='evaluate' />
    </td>
    <td>
    教学打分
    </td>
    <td>
    <input type='text' id='grade' name='grade' style='width: 80px' placeholder='（60-100）'/>
    </td>
    <td></td>
    <td>
    <button type='submit' >确定</button>
    </td>
    </tr>
    </form>
   </table>
        <form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"php/s_erro.php\">
                                <table class=\"table table-hover\">
                                <thead>
                                <tr class='bg-danger'>
                                     <input style='display: none' readonly='readonly' name='stid' value='".$row[1]."'>
                                     <input style='display: none' readonly='readonly' name='charac' value='".$charater."'>
                                    <th>
                                    退课理由
                                    </th>
                                    <th>
                                        <input  id=\"reason\"  name=\"reason\" >
                                    </th>
                                    <th>
                                        <button type=\"submit\" onclick='subma()'>提交</button>
                                    </th>
                                </tr>
                                </thead>
                                </table>
                            </form>
    ";
        }
    }elseif($charater=="teacher"){
     echo "
    <table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>排课日期</th>
    <th>ID</th>
    <th>教师</th>
    <th>课程</th>
    <th>阶段</th>
    <th>上课地点</th>
    </tr>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select 姓名 from t_info WHERE ID="'.$row[2].'"'));
        $class=mysqli_fetch_array(mysqli_query($connect,'select 名称 from c_info WHERE ID="'.$row[3].'"'));
        $room=mysqli_fetch_array(mysqli_query($connect,'select room from s_c WHERE ID="'.$row[7].'"'));
        $ctime;
        switch ($row[4]){
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
        <td name='dayt'>".$row[0]."</td>
        <td >".$row[1]."
        <input style='display: none' readonly='readonly' name='id' value='".$row[1]."'>
        </td>
        <td>".$teacher[0]."</td>
        <td>".$class[0]."</td>
        <td>".$ctime."</td>
        <td>".$room[0]."</td>
       </tr>";
        $evaluate=mysqli_fetch_array(mysqli_query($connect,'select 评价 from class WHERE id="'.$row[1].'"'));
        if(!empty($evaluate[0])){
            echo " <tr class='bg-color'>
            <th>
            本次课程评价
            </th>
            <td>
            ".$evaluate[0]."
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            </form>
            </table>
            ";
        }
        else{
            echo " <tr class='bg-color'>
            <th>
            本次课程评价
            </th>
            <td>
            尚未得到评价
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td><button onclick='subma()'>已上课</button></td>
            </tr>
            </form>
            </table>
            <form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"php/t_erro.php\">
                                <table class=\"table table-hover\">
                                <thead>
                                <tr class='bg-danger'>
                                     <input style='display: none' readonly='readonly' name='stid' value='".$row[1]."'>
                                     <input style='display: none' readonly='readonly' name='charac' value='".$charater."'>
                                    <th>
                                    退课理由
                                    </th>
                                    <th>
                                        <input  id=\"reason\"  name=\"reason\" >
                                    </th>
                                    <th>
                                        <button onclick='subma()'>提交</button>
                                    </th>
                                </tr>
                                </thead>
                                </table>
                            </form>
            ";
        }

    }else{
     echo "
    <table class=\"table table-hover\">
    <tr class=\"warning\">
    <th>排课日期</th>
    <th>ID</th>
    <th>教师</th>
    <th>课程</th>
    <th>阶段</th>
    <th>上课地点</th>
    </tr>";
        $teacher=mysqli_fetch_array(mysqli_query($connect,'select 姓名 from t_info WHERE ID="'.$row[2].'"'));
        $class=mysqli_fetch_array(mysqli_query($connect,'select 名称 from c_info WHERE ID="'.$row[3].'"'));
        $room=mysqli_fetch_array(mysqli_query($connect,'select room from s_c WHERE ID="'.$row[7].'"'));
        $ctime;
        switch ($row[4]){
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
        <td name='dayt'>".$row[0]."</td>
        <td >".$row[1]."
        <input style='display: none' readonly='readonly' name='id' value='".$row[1]."'>
        </td>
        <td>".$teacher[0]."</td>
        <td>".$class[0]."</td>
        <td>".$ctime."</td>
        <td>".$room[0]."</td>
       </tr>";
    $evaluate=mysqli_fetch_array(mysqli_query($connect,'select 评价 from class WHERE id="'.$row[1].'"'));
    if(!empty($evaluate[0])){
        echo " <tr class='bg-color'>
            <th>
            本次课程评价
            </th>
            <td>
            ".$evaluate[0]."
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td><button onclick='delet_()'>删除</button></td>
            </tr>
            </form>
            </table>
            ";
    }
    else{
        echo " <tr class='bg-color'>
            <th>
            本次课程评价
            </th>
            <td>
            尚未得到评价
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            </form>
            </table>
            ";
    }

}


