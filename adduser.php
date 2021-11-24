<?php
$email = $_POST['e'];
$name = $_POST['n'];
$phone = $_POST['ph'];
//$password = $_POST['pa'];
$usertype = $_POST['us'];
//$email = $_POST['email'];

echo $email;

include('dbconn.php');
if($usertype=="t"){
	$sql="insert into login(email,usertype,status)values('$email','$usertype','1')";
if(mysqli_query($conn,$sql)){
	$sql1="insert into registration(email,name,phone)values('$email','$name','$phone')";
	if(mysqli_query($conn,$sql1)){
	echo "inserted";
		
	}
}

}
else{
	$sql="insert into login(email,usertype)values('$email','$usertype')";
if(mysqli_query($conn,$sql)){
	$sql1="insert into registration(email,name,phone)values('$email','$name','$phone')";
	if(mysqli_query($conn,$sql1)){
	echo "inserted";
		
	}
}

}




?>




					