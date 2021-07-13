<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

$servername="localhost";
$username="root";
$password="";
$database="inf";
$mark=$_POST["mark"];
$num=$_POST["num"];
echo "mark="."$mark";
echo "num="."$num";

// echo"$database_input";
// echo "$database_password";
$conn=mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("连接失败");
}
 $sql="UPDATE mapinf SET grade=$mark   WHERE num='$num' "; 
if ($conn->query($sql)===TRUE) 
	{
	//  $sql2="UPDATE mapinf SET exinf3='$exinf' WHERE center='$center'";
	echo "成功3";
header("refresh:0;url=search.php");
	
}
else
{
		echo "error";
header("refresh:0;url=search.php");
}
 
 // echo $thisrow;



 
mysqli_close($conn);
?>