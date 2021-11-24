<?php
include("dbconn.php");
$username=$_POST["username"];
$email=$_POST["email"];
$phone=$_POST["phone"];

$sql="insert into registration(name,email,phone)values('$username','$email',$phone)";
if(mysqli_query($conn,$sql)){
	echo "inserted";
}



?>