<?php
include("dbconn.php");
session_start();
$em=$_SESSION["email"];
$email=$_POST["email"];
$content=$_POST["content"];

$sql="update login set status=0 where email='$email'";
if(mysqli_query($conn,$sql)){
	$sql1="insert into notification(sender_id,reciever_id,notification_type,content)values('$em','$email','Admin','Your account is disabled for some days due to complaints from users.If you have any queries please contact admin')";
	if(mysqli_query($conn,$sql1)){
		echo "<script>alert('Account disabled successfully')
		window.location.replace('index.php')

		</script>";

	}
}


?>