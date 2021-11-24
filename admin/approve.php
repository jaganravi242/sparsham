<?php
$email=$_GET['email'];
//echo $email;
session_start();
$em=$_SESSION["email"];
include("dbconn.php");
$sql="update login set status=1 where email=$email";
if(mysqli_query($conn,$sql)){
// 	$sql1="insert into notification (sender_id,reciever_id,notification_type,content)values('$em',$email,'Admin','Your application approved successfully')";
// if(mysqli_query($conn,$sql1)){

	echo "<script>alert('Approved successfully')
	window.location.replace('studentverification.php')

	</script>";
}


?>