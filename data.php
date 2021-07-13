<?php

error_reporting(E_ALL^E_NOTICE^E_WARNING);
$servername="localhost";
$username= "root";
$password= "";
$database="inf";
$cookie= $_COOKIE["manager"];
$conn=new mysqli($servername,$username,$password,$database);


if ($conn->connect_error) {
    die("数据库异常，注册失败");
} 
 
$cen_x=substr($_POST["cen_x"],0,8);
$cen_y=substr($_POST["cen_y"],0,7);
$center='('.$cen_x.','.$cen_y.')';

$lt_x=substr($_POST["lt_x"],0,8);
$lt_y=substr($_POST["lt_y"],0,7);
$left_top='('.$lt_x.','.$lt_y.')';

$lb_x=substr($_POST["lb_x"],0,8);
$lb_y=substr($_POST["lb_y"],0,7);
$left_bottom='('.$lb_x.','.$lb_y.')';

$rt_x=substr($_POST["rt_x"],0,8);
$rt_y=substr($_POST["rt_y"],0,7);
$right_top='('.$rt_x.','.$rt_y.')';

$rb_x=substr($_POST["rb_x"],0,8);
$rb_y=substr($_POST["rb_y"],0,7);
$right_bottom='('.$rb_x.','.$rb_y.')';

$exinf=$_POST["exinf"];




 $zz="select * from mapinf where center='$center' "; 
 $result=mysqli_query($conn,$zz);
  $row = mysqli_fetch_assoc($result);
 $num1=mysqli_num_rows($result);



 $zz2="select * from mapinf"; 
 $result2=mysqli_query($conn,$zz2);
 $num2=mysqli_num_rows($result2);


if ($num1==0) {
$sql="INSERT INTO mapinf (num,left_top,left_bottom,right_top,right_bottom,center,infnum,exinf)
VALUES ('$num2'+1,'$left_top','$left_bottom','$right_top','$right_bottom','$center',1,'$exinf')";
 
if ($conn->query($sql)===TRUE) {
 //header("refresh:0;url=index.html");
echo "成功";

if ($cookie==2) {
	# code...
setcookie("manager", "1", time()+3600);}
echo "<script type='text/javascript'>document.onload=window.close();</script>";
} 
}

 else{
$str='exinf'.($row['infnum']+1);
$sql="ALTER TABLE mapinf ADD $str text(50) ";  
if ($conn->query($sql)===TRUE) 
	{
	//  $sql2="UPDATE mapinf SET exinf3='$exinf' WHERE center='$center'";
	//	header("refresh:0;url=index.html");
	echo "成功1";

}
else{
	 //header("refresh:0;url=index.html");
	echo "失败1";}


  $sql2="UPDATE mapinf SET $str='$exinf' WHERE center='$center'"; 
if ($conn->query($sql2)===TRUE) 
	{
	//  $sql2="UPDATE mapinf SET exinf3='$exinf' WHERE center='$center'";
	//header("refresh:0;url=index.html");
	//echo "<script type='text/javascript'>document.onload=window.close();</script>";
	echo "成功2";
}

  $sql3="UPDATE mapinf SET infnum=infnum+1   WHERE center='$center'"; 
if ($conn->query($sql3)===TRUE) 
	{
	//  $sql2="UPDATE mapinf SET exinf3='$exinf' WHERE center='$center'";

	//header("refresh:0;url=index.html");
	if ($cookie==2) {
	# code...
setcookie("manager", "1", time()+3600);}
	echo "<script type='text/javascript'>document.onload=window.close();</script>";
	echo "成功3";

}



else{if ($cookie==2) {
	# code...
setcookie("manager", "1", time()+3600);}
	echo "<script type='text/javascript'>document.onload=window.close();</script>";
	//header("refresh:0;url=index.html");
	echo "失败2";}
	}	



mysqli_close();
?>