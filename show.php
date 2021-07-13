<script type="text/javascript">
	var chose=0;

</script>
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




$con=mysqli_connect($servername, $username, $password, $database);
if(!$con){
die('connect failed!');
}else{
// echo "数据库连接成功！";
}
mysqli_query("SET NAMES utf8");


$result = mysqli_query($con,"SELECT * FROM mapinf ");

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

while($row = mysqli_fetch_row($result))
{
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

// echo "chose=$num";
// echo chose;
echo "<td id='td'> <button onclick='show($num)'>评分</button> <button><a href='delete.php?num=$num'>删除</button></a></td>";

// echo "<td>" . $row['left_top'] . "</td>";
echo "</tr>";

// echo $row[0];
}
echo "</table>";






mysqli_close($con);
?>
<style type="text/css">
	.div{
		
		overflow: hidden;
		left: 36vw;
		position: fixed;
		top: 20vh;
		background-color: white;

	}
.div0{
	position: fixed;
	opacity: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: hidden;
	background-color: white;
	z-index: -10;
}	

html,body,img{
	width: 5vw;
	height: 5vw;
}	
</style>

<div class="div0" id="div0">
<div id="div" class="div">

<form method="post" action="mark.php">
<input type="text" style="display: none;" name="mark" id="mark">
<input type="text" style="display: none;" name="num" id="num">

<img class="icon" src="images/star0.png" title="1" id="0" name="0" onmouseover="f1()" onmouseout="returnnormal()" onclick="choose(1)">
<img src="images/star0.png" title="2" id="1" name="1" onmouseover="f2()" onmouseout="returnnormal()" onclick="choose(2)">
<img src="images/star0.png" title="3" id="2" name="2" onmouseover="f3()" onmouseout="returnnormal()" onclick="choose(3)">
<img src="images/star0.png" title="4" id="3" name="3" onmouseover="f4()" onmouseout="returnnormal()" onclick="choose(4)">
<img src="images/star0.png" title="5" id="4" name="4" onmouseover="f5()" onmouseout="returnnormal()" onclick="choose(5)">  
<input id="addmark" name="addmark"  type="submit" value="添加" style="display: none;">  
</form>

</div>
</div>
 <script>
 		var which=0;
         var flag=0;
         var grade=0;
function show(chose) {
	// window.alert(chose);
which=chose;
     document.getElementById('div0').style.zIndex=10;
       document.getElementById('div0').style.opacity=1;
       }

function f1(argument) {
	 document.getElementById('0').setAttribute("src", "./images/star1.png");
	 document.getElementById('mark').setAttribute("value", "1");
	 
	grade=1;
}

function f2(argument) {
	 document.getElementById('0').setAttribute("src", "./images/star1.png");
	 document.getElementById('1').setAttribute("src", "./images/star1.png");
	 document.getElementById('mark').setAttribute("value", "2");
grade=2;
}
function f3(argument) {
	document.getElementById('0').setAttribute("src", "./images/star2.png");
	document.getElementById('1').setAttribute("src", "./images/star2.png");
	document.getElementById('2').setAttribute("src", "./images/star2.png");
grade=3;
	 document.getElementById('mark').setAttribute("value", "3");
}
function f4(argument) {
	document.getElementById('0').setAttribute("src", "./images/star2.png");
	document.getElementById('1').setAttribute("src", "./images/star2.png");
	document.getElementById('2').setAttribute("src", "./images/star2.png");
	document.getElementById('3').setAttribute("src", "./images/star2.png");
grade=4;
	 document.getElementById('mark').setAttribute("value", "4");
}


function f5(argument) {
	document.getElementById('0').setAttribute("src", "./images/star2.png");
	document.getElementById('1').setAttribute("src", "./images/star2.png");
	document.getElementById('2').setAttribute("src", "./images/star2.png");
	document.getElementById('3').setAttribute("src", "./images/star2.png");
	document.getElementById('4').setAttribute("src", "./images/star2.png");
grade=5;
	 document.getElementById('mark').setAttribute("value", "5");
}
function returnnormal(argument) {
	document.getElementById('0').setAttribute("src", "./images/star0.png");
	document.getElementById('1').setAttribute("src", "./images/star0.png");
	document.getElementById('2').setAttribute("src", "./images/star0.png");
	document.getElementById('3').setAttribute("src", "./images/star0.png");
	document.getElementById('4').setAttribute("src", "./images/star0.png");

if (flag==1) {f1()};
if (flag==2) {f2()};
if (flag==3) {f3()};
if (flag==4) {f4()};
if (flag==5) {f5()};

}
 function choose(title) {
 		flag=title;

 		document.getElementById('num').setAttribute("value",which);

        document.getElementById('div0').style.zIndex=-10;
document.getElementById('div0').style.opacity=0;

document.getElementById('addmark').click();

        }       

    </script>
    
