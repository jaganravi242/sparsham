<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
$gender=$_POST["gender"];
$dob=$_POST["date_of_birth"];
$house=$_POST["house"];
$street=$_POST["street"];
$country=$_POST["country"];
$state=$_POST["state"];
$district=$_POST["district"];
$pincode=$_POST["pincode"];
//$adhaar_no=$_POST["adhaar_no"];
//$adhaar=$_POST["adhaar"];
//$photo=$_POST["photo"];
//$ac_holder_name=$_POST["ac_holder_name"];
//$ac_no=$_POST["ac_number"];
//$ifsc=$_POST["ifsc"];
//$bank_name=$_POST["bank_name"];

$target_dir="uploads/";
$target_file1= $target_dir . basename($_FILES["adhaar"]["name"]);
//$target_file2= $target_dir . basename($_FILES["photo"]["name"]);


$sql1="update registration set gender='$gender',date_of_birth='$dob',house='$house',place='$street',country=$country,state=$state,district=$district,pincode=$pincode where email='$email'";
if(mysqli_query($conn,$sql1)){

	if(move_uploaded_file($_FILES["adhaar"]["tmp_name"], $target_file1)){
		
			$sql2="insert into verification(email,id_card)values('$email','$target_file1')";
			if(mysqli_query($conn,$sql2)){
				//ECHO "IN";
				
					echo "<script>alert('Form submitted successfully. Please wait for admin approval')</script>";
					header("location:index.php");
				
			}


		

	}

}

?>