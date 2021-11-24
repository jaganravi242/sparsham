<?php
session_start();
$email=$_POST['email'];
$content=$_POST['content'];
$id=$_SESSION["email"];
include("dbconn.php");

$sq="select name,email,phone from registration where email='$email'";
$r=mysqli_fetch_assoc(mysqli_query($conn,$sq));
$name=$r["name"];
$phone=$r["phone"];

// $sql="insert into notification (sender_id,reciever_id,notification_type,content)values('$id','$email','Admin','$content')";
// if(mysqli_query($conn,$sql)){

	$sql1="delete from registration where email='$email'";
	if(mysqli_query($conn,$sql1)){
		
			
				
					$sql5="delete from verification where email='$email'";
					if(mysqli_query($conn,$sql5)){
						$sql6="insert into registration(email,name,phone)values('$email','$name','$phone')";
						if(mysqli_query($conn,$sql6)){


						echo "<script>alert('Application rejected successfully')
	window.location.replace('studentverification.php')

	</script>";

					}
				}	
		
	}


?>