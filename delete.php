<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

$servername="localhost";
$username="root";
$password="";
$database="inf";
$thisrow=$_GET["num"];
// echo"$database_input";
// echo "$database_password";
$conn=mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("连接失败");
}
 
 // echo $thisrow;


 $sql = "delete from mapinf where num=$thisrow"; 
  $result = mysqli_query($conn,$sql);
if($result)
{
	echo "成功";
	//header("refresh:0;url=search.php");
}



else{
	//header("refresh:0;url=search.php");
	echo "失败";
}


 // $sql2 = "select * from mapinf"; 
 // $result2 = mysqli_query($conn,$sql2);


 
// while($row = mysqli_fetch_row($result2))//转成数组，且返回第一条数据,当不是一个对象时候退出
// {
// 
// 
// }
if ($conn->query($sql2)===TRUE) 
	{
	//  $sql2="UPDATE mapinf SET exinf3='$exinf' WHERE center='$center'";
	//header("refresh:0;url=index.html");
	//echo "<script type='text/javascript'>document.onload=window.close();</script>";
header("refresh:0;url=show.php");	
	echo "成功2";
}
else{
echo "error";

}

 
mysqli_close($conn);
?>