<style type="text/css">
#td{
		white-space : nowrap;
	}
</style>
<?php
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$servername="localhost";
$username="root";
$password="";
$database="inf";
$feature=$_POST["feature"];
// echo "$feature[0]";
$len=strlen($feature);
// echo "$len";



$con=mysqli_connect($servername, $username, $password, $database);
if(!$con){
die('connect failed!');
}else{
// echo "数据库连接成功！";
}
mysqli_query("SET NAMES utf8");



echo "<table border='1'>
<tr>
<th>编号</th>
<th>西北经纬度</th>
<th>西南经纬度</th>
<th>东北经纬度</th>
<th>东南经纬度</th>
<th>中心经纬度</th>
<th>评分</th>
<th>信息数</th>
<th>信息</th>

</tr>";

$a=array(" ");

for ($j=1; $j <11 ; $j++) { 
	# code...
if ($j!=1) {
		
$str="exinf".$j;
}
else{
$str="exinf";	
}
// echo "$str";
 $result2 = mysqli_query($con,"SELECT * FROM mapinf where $str like '%$feature%' ");
while($row= mysqli_fetch_row($result2))
{
	array_push($a,$row[0]);
}

}

  // print_r($a);
 // echo $a[1].$a[2].$a[3];

$result = mysqli_query($con,"SELECT * FROM mapinf ");
while($row = mysqli_fetch_row($result))
{
	if (in_array($row[0],$a)) 
	{	# code...
	// echo "eun";

	$i=0;
echo "<tr>";
for (;$i<100;$i++) {
if ($row[$i]!=NULL) {
	# code...
if ($row[$i]==='-1') {
		$row[$i]='未评分';
	}	 
echo "<td id='td'>" . $row[$i] ."</td>";
}


}
 $num=$row[0];



// echo "<td>" . $row['left_top'] . "</td>";
echo "</tr>";

// echo $row[0];
}
}
echo "</table>";






mysqli_close($con);
?>
