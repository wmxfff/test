<?php
$servername="localhost";
$username="root";
$password="";

$conn=new mysqli($servername,$username,$password);

if ($conn->connect_error) {
    die("数据库创建失败,");} 

$sql="CREATE DATABASE inf";
if ($conn->query($sql)===TRUE) {
    echo "数据库inf创建成功,";
} 
else {
    echo "数据库inf创建失败,";
}
$database="inf";



$link=mysqli_connect($servername,$username,$password,$database);
if (!$link) {
    die("数据库连接失败,");
}
$mapinf="CREATE TABLE mapinf (
    num text(50) ,
    left_top text(50),
    left_bottom text(50),
    right_top text(50),
    right_bottom text(50),    
    center text(50),
    grade text(5) DEFAULT -1,
    infnum int (5) DEFAULT 0,
    exinf text(50)
)";

if ($link->query($mapinf)===TRUE) {
    echo "创建数据表mapinf成功,";
} 
else {
    echo "创建数据表mapinf失败,";
}




$link2=mysqli_connect($servername,$username,$password,$database);

if (!$link2) {
    die("数据库连接失败,");
}


$accinf="CREATE TABLE accinf (
    account int(20) NOT NULL,
    password text(20) NOT NULL
)";

if ($link2->query($accinf)===TRUE) {
    echo "创建数据表accinf成功,";
} 
else {
    echo "创建数据表accinf失败,";
}








$link->close();
$link2->close();

$conn->close();
?>