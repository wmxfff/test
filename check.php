<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

$servername="localhost";
$username="root";
$password="";
$database="inf";
$database_input=$_POST["a"];
$database_password=$_POST["b"];

// echo"$database_input";
// echo "$database_password";
$conn=mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("连接失败");
}
 
 


 $sql = "select * from accinf where account=$database_input"; 
  $result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
// echo "$z"."$m"."3";
if ($database_password==$row['password']) {
	setcookie("manager", "2", time()+3600);

	echo "登录成功";
	header("refresh:0;url=index.html");
}



else{header("refresh:3;url=index.html");
	echo "登录失败，2s后自动跳转，"."或点击<a href=index.html>这里</a>返回";
}

 
mysqli_close($conn);
?>