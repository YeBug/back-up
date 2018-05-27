<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/4/5
 * Time: 15:31
 */

$teacher=array(array());
$school=array(array());
$Tinfo=array(array());
$Sinfo=array(array());
$SC=array(array());
$connect=mysqli_connect("localhost","root","","test");
if(!$connect){
    die("wrong:"+mysqli_connect_error());
}

$result=mysqli_query($connect,"select * from T_time" );

function show_arry1($arry){
    foreach ($arry as $key=>$value){
        echo $value." ";
    }echo "\n";
}

function show_arry2($arry){
    foreach ($arry as $key=>$link){
        foreach ($link as $key1=>$value){
            echo $value." ";
        }echo "\n";
    }
}

$i=0;
while ($schedule=mysqli_fetch_array($result)){
    $teacher[$i]["id"]=$schedule[0];
    $teacher[$i][1]=$schedule[1];
    $teacher[$i][2]=$schedule[2];
    $teacher[$i][3]=$schedule[3];
    $teacher[$i][4]=$schedule[4];
    $teacher[$i][5]=$schedule[5];
    $teacher[$i][6]=$schedule[6];
    $teacher[$i][7]=$schedule[7];
    $teacher[$i][8]=$schedule[8];
    $teacher[$i][9]=$schedule[9];
    $teacher[$i][10]=$schedule[10];
    $i++;
}


$i=0;
$result=mysqli_query($connect,"select * from S_time");
while ($schedule=mysqli_fetch_array($result)){
    $school[$i]["id"]=$schedule[0];
    $school[$i][1]=$schedule[1];
    $school[$i][2]=$schedule[2];
    $school[$i][3]=$schedule[3];
    $school[$i][4]=$schedule[4];
    $school[$i][5]=$schedule[5];
    $school[$i][6]=$schedule[6];
    $school[$i][7]=$schedule[7];
    $school[$i][8]=$schedule[8];
    $school[$i][9]=$schedule[9];
    $school[$i][10]=$schedule[10];
    $i++;
}


$i=0;
$result=mysqli_query($connect,"select * from T_info");
while ($schedule=mysqli_fetch_array($result)){
    $Tinfo[$i]["id"]=$schedule[0];
    $Tinfo[$i]["姓名"]=$schedule[1];
    $Tinfo[$i]["年龄"]=$schedule[2];
    $Tinfo[$i]["性别"]=$schedule[3];
    $Tinfo[$i]["单位"]=$schedule[4];
    $Tinfo[$i]["电话"]=$schedule[5];
    $Tinfo[$i]["区号"]=$schedule[6];
    $Tinfo[$i]["地址"]=$schedule[7];
    $Tinfo[$i]["theory"]=$schedule[8];
    $Tinfo[$i]["model"]=$schedule[9];
    $Tinfo[$i]["program"]=$schedule[10];
    $Tinfo[$i]["contest"]=$schedule[11];
    $i++;
}

$i=0;
$result=mysqli_query($connect,"select * from S_info");
while ($schedule=mysqli_fetch_array($result)){
    $Sinfo[$i]["id"]=$schedule[0];
    $Sinfo[$i]["校名"]=$schedule[1];
    $Sinfo[$i]["联系人"]=$schedule[2];
    $Sinfo[$i]["联系电话"]=$schedule[3];
    $Sinfo[$i]["区号"]=$schedule[4];
    $Sinfo[$i]["地址"]=$schedule[5];
    $i++;
}
$i=0;
$result=mysqli_query($connect,"select * from S_C");
while ($schedule=mysqli_fetch_array($result)){
    $SC[$i]["SID"]=$schedule[0];
    $SC[$i]["CID"]=$schedule[1];
    $SC[$i]["阶段"]=$schedule[2];
    $i++;
}



function getid($i,$arry){
    $result=array();
    $j=0;$k=0;
    if(sizeof($arry)>0){
        for($j;$j<sizeof($arry);$j++){
            if ($arry[$j][$i]==1){
                $result[$k]=$arry[$j]["id"];
                $k++;
            }
        }
        return $result;
    }
    else return 0;
}
function checkid($id,$arry){
    for ($i=0;$i<sizeof($arry);$i++){
        if ($arry[$i]["id"]==$id)return $i;
    }
}
function t_sort($arry,$tinfo,&$theory,&$model,&$program,&$contest){
    $i=0;$t=0;$m=0;$p=0;$c=0;
    for ($i;$i<sizeof($arry);$i++){
        $id=$arry[$i];
        $j=checkid($id,$tinfo);
        if($tinfo[$j]["theory"]==1){$theory[$t]=$arry[$i];$t++;}
        if($tinfo[$j]["model"]==1){$model[$m]=$arry[$i];$m++;}
        if($tinfo[$j]["program"]==1){$program[$p]=$arry[$i];$p++;}
        if($tinfo[$j]["contest"]==1){$contest[$c]=$arry[$i];$c++;}
    }
}

function get_SC($id,$sc){
    for ($i=0;$i<sizeof($sc);$i++){
        if ($id==$sc[$i]["SID"]){
            if ($sc[$i]["阶段"]==1)return "theory";
            elseif ($sc[$i]["阶段"]==2)return "model";
            elseif ($sc[$i]["阶段"]==3)return "program";
            elseif ($sc[$i]["阶段"]==4)return "contest";
        }
    }
}
function get_C($id,$sc){
    for ($i=0;$i<sizeof($sc);$i++){
        if ($id==$sc[$i]["SID"]){
            return $sc[$i]["CID"];
        }
    }
}

//优先级函数1：
function priority($t_id,$t_info){
    $i=0;$count=0;
    $arry=array(array());
    for ($i;$i<sizeof($t_id);$i++){
        $id=$t_id[$i];
        for ($j=0;$j<sizeof($t_info);$j++){
            if ($id==$t_info[$j]["id"]){
                $count=$t_info[$j]["theory"]+$t_info[$j]["model"]+$t_info[$j]["program"]+$t_info[$j]["contest"];
                $arry[$i]["id"]=$id;
                $arry[$i]["priority"]=$count;
            }
        }
    }
    return $arry;
}
//学校区号获取：
function get_school_block($id,$s_info){
    for ($i = 0; $i < sizeof($s_info); $i++) {
        if ($s_info[$i]["id"] == $id) {
            return $s_info[$i]["区号"];
        }
    }
    return "not found";
}
//区号检索：
function get_block($block,$group,$t_info){
    $result=array();
    $c=0;
    for ($i=0;$i<sizeof($group);$i++){
        $id=$group[$i];
        for ($j=0;$j<sizeof($t_info);$j++){
            if ($t_info[$j]["id"]==$id){
                if ($t_info[$j]["区号"]==$block){$result[$c]=$id;$c++;}
            }
        }
    }
    return $result;
}
//置教师时间为0
function setT_0($id,$time,&$t_time){
    for ($i=0;$i<sizeof($t_time);$i++){
        if ($t_time[$i]["id"]==$id){
            $t_time[$i][$time]=0;
        }
    }
}
//置学校时间为0
function setS_0($id,$time,&$s_time){
    for ($i=0;$i<sizeof($s_time);$i++){
        if ($s_time[$i]["id"]==$id){
            $s_time[$i][$time]=0;
        }
    }
}
function search($SID,$TID,$TSarry){
    if (sizeof($TSarry[0])==0)return -1;
    for ($i=0;$i<sizeof($TSarry);$i++){
        if ($TSarry[$i]["SID"]==$SID){
            if ($TSarry[$i]["TID"]==$TID)return $i;
        }
    }
    return -1;
}
function get_best($result,$priority){
    if (sizeof($result)==0)return -1;
    elseif (sizeof($result)==1)return$result[0];
    elseif (sizeof($result)>1){
        $temp=$result[0];$p=0;
        for ($i=0;$i<sizeof($result);$i++){
            $j=0;
            while ($j<sizeof($priority)){
                if ($priority[$j]["id"]==$result[$i]){
                    if ($priority[$j]["priority"]>$p)$temp=$result[$i];
                }$j++;
            }
        }return $temp;
    }
}
$TS_schedule=array(array());               //课表数组
$TS_i=0;
$id=0;
$Class=array(array());
//按区位+优先级初排
for($i=1;$i<=10;$i++){                      //时间循环
    $s_id=getid($i,$school);
    $result=array();
    for ($k=0;$k<sizeof($s_id);$k++){       //学校id循环
        $t_id=getid($i,$teacher);
        $theory=array();$model=array();$program=array();$contest=array();
        t_sort($t_id,$Tinfo,$theory,$model,$program,$contest);
        $priority=array(array());
        $priority=priority($t_id,$Tinfo);
        $ctime=get_SC($s_id[$k],$SC);
        $c=get_C($s_id[$k],$SC);
        $block=get_school_block($s_id[$k],$Sinfo);
        if ($ctime=="theory"){
            $result=get_block($block,$theory,$Tinfo);
            $tid=get_best($result,$priority);
            if ($tid!=-1){
                setT_0($tid,$i,$teacher);
                setS_0($s_id[$k],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=1;

                if(search($s_id[$k],$tid,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$k];
                    $TS_schedule[$TS_i]["TID"]=$tid;

                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$k],$tid,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }elseif ($ctime=="model"){
            $result=get_block($block,$model,$Tinfo);
            $tid=get_best($result,$priority);
            if ($tid!=-1){

                setT_0($tid,$i,$teacher);
                setS_0($s_id[$k],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=2;
                if(search($s_id[$k],$tid,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$k];
                    $TS_schedule[$TS_i]["TID"]=$tid;


                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$k],$tid,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }elseif ($ctime=="program"){
            $result=get_block($block,$program,$Tinfo);
            $tid=get_best($result,$priority);
            if ($tid!=-1){

                setT_0($tid,$i,$teacher);
                setS_0($s_id[$k],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=3;
                if(search($s_id[$k],$tid,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$k];
                    $TS_schedule[$TS_i]["TID"]=$tid;


                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$k],$tid,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }elseif ($ctime=="contest"){
            $result=get_block($block,$contest,$Tinfo);
            $tid=get_best($result,$priority);
            if ($tid!=-1){

                setT_0($tid,$i,$teacher);
                setS_0($s_id[$k],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=4;
                if(search($s_id[$k],$tid,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$k];
                    $TS_schedule[$TS_i]["TID"]=$tid;


                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$k],$tid,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }
    }
}
function use_priority($teacher){
    $priority=array(array());
    $j=0;
    while($j<sizeof($teacher)){
        $count=0;
        for ($k=1;$k<=10;$k++){
            $count=$count+$teacher[$j][$k];
        }
        $priority[$j]["id"]=$teacher[$j]["id"];
        $priority[$j]["priority"]=$count;
        $j++;
    }
    return $priority;
}
function get_free($tid,$priority){
    if (sizeof($tid)==0)return -1;
    $temp=0;
    $best=0;
    for ($i=0;$i<sizeof($tid);$i++){
        $j=0;
        while($j<sizeof($priority)){

            if ($priority[$j]["id"]==$tid[$i]){
                if ($priority[$j]["priority"]>$temp){
                    $best=$priority[$j]["id"];
                    $temp=$priority[$j]["priority"];
                }
            }$j++;
        }
    }
    return $best;
}


for($i=1;$i<=10;$i++){
    $s_id=getid($i,$school);
    for ($j=0;$j<sizeof($s_id);$j++){
        $t_id=getid($i,$teacher);
        $theory=array();$model=array();$program=array();$contest=array();
        t_sort($t_id,$Tinfo,$theory,$model,$program,$contest);
        $priority=array(array());
        $priority=use_priority($teacher);
        $ctime=get_SC($s_id[$j],$SC);
        $c=get_C($s_id[$j],$SC);
        if ($ctime=="theory"){
            $free=  get_free($theory,$priority);
            if ($free!=-1){
                setT_0($free,$i,$teacher);
                setS_0($s_id[$j],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=1;
                if(search($s_id[$j],$free,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;
                    $TS_schedule[$TS_i]["SID"]=$s_id[$j];
                    $TS_schedule[$TS_i]["TID"]=$free;


                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$j],$free,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }elseif ($ctime=="model"){
            $free=  get_free($model,$priority);
            if ($free!=-1){
                setT_0($free,$i,$teacher);
                setS_0($s_id[$j],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=2;
                if(search($s_id[$j],$free,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$j];
                    $TS_schedule[$TS_i]["TID"]=$free;

                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$j],$free,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;

            }
        }elseif ($ctime=="program"){
            $free=  get_free($program,$priority);
            if ($free!=-1){
                setT_0($free,$i,$teacher);
                setS_0($s_id[$j],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=3;
                if(search($s_id[$j],$free,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;

                    $TS_schedule[$TS_i]["SID"]=$s_id[$j];
                    $TS_schedule[$TS_i]["TID"]=$free;


                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$j],$free,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        }elseif ($ctime=="contest"){
            $free=  get_free($contest,$priority);
            if ($free!=-1){
                setT_0($free,$i,$teacher);
                setS_0($s_id[$j],$i,$school);
                $Class[$id]["id"]=$id;
                $Class[$id]["tid"]=$tid;
                $Class[$id]["cid"]=$c;
                $Class[$id]["ctime"]=4;
                if(search($s_id[$j],$free,$TS_schedule)==-1){
                    $TS_schedule[$TS_i]["ID"]=$TS_i;
                    $TS_schedule[$TS_i]["SID"]=$s_id[$j];
                    $TS_schedule[$TS_i]["TID"]=$free;
                    for ($TS_j=1;$TS_j<=10;$TS_j++){
                        if ($TS_j!=$i)$TS_schedule[$TS_i][$TS_j]=-1;
                        else{
                            $TS_schedule[$TS_i][$i]=$id;
                        }
                    }$TS_i++;
                }else{
                    $temp=search($s_id[$j],$free,$TS_schedule);
                    $TS_schedule[$temp][$i]=$id;
                }
                $id++;
            }
        };
    }
}
foreach ($TS_schedule as $key1=>$link){
    mysqli_query($connect,'insert into s_t(ID,SID,TID,MonM,MonA,TueM,TueA,WedM,WedA,ThuM,ThuA,FriM,FriA) values
("'.$link['ID'].'","'.$link['SID'].'","'.$link['TID'].'","'.$link[1].'","'.$link[2].'","'.$link[3].'","'.$link[4].'","'.$link[5].'","'.$link[6].'","'.$link[7].'","'.$link[8].'","'.$link[9].'","'.$link[10].'")');
}
foreach ($Class as $key1=>$link){
   $b_id=$link['id'];
   $b_tid=$link['tid'];
   $b_cid=$link['cid'];
   $b_ctime=$link['ctime'];
   mysqli_query($connect,'insert into class(id,tid,cid,ctime)VALUES ("'.$b_id.'","'.$b_tid.'","'.$b_cid.'","'.$b_ctime.'")');
}
mysqli_close($connect);
echo "<script>alert('排课完成！');window.location.href='../admin.html'</script>";
?>