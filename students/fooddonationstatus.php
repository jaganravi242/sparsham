<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$food_donation_id=$_GET["food_donation_id"];
$sql1="insert into food_donation_list (food_donation_id,email) VALUES ($food_donation_id,'$email')";
$sql2="select * from food_donation_list where food_donation_id=$food_donation_id and email='$email'";
$sql3="select no_of_donations,no_of_packets,food_donation_status from food_donation where food_donation_id=$food_donation_id";
$res1=mysqli_query($conn,$sql3);
$r1=mysqli_fetch_assoc($res1);
$nod=(int)$r1['no_of_donations'];
$nob=(int)$r1['no_of_packets'];
$staus=(int)$r1['food_donation_status'];
$res=mysqli_query($conn,$sql2);
if(mysqli_num_rows($res)>0){
    ?>
     <script type="text/javascript">
     	alert("Already Registered");
     	window.location.replace('fooddonation.php')
     </script>
	<?php
}
else if(mysqli_query($conn,$sql1)){
	if($nod+1==$nob && $staus==1){
		$sql4="update food_donation set no_of_donations=$nod+1, food_donation_status=3 where food_donation_id=$food_donation_id";
		mysqli_query($conn,$sql4);
	}
	if($nod+1<$nob && $staus==1){
		$sql5="update food_donation set no_of_donations=$nod+1 where food_donation_id=$food_donation_id";
		mysqli_query($conn,$sql5);
	}
	?>
     <script type="text/javascript">
     	alert("Sucessfully Registered");
     	window.location.replace('fooddonation.php')
     </script>
	<?php
}
else
echo mysqli_error($conn);
?>
