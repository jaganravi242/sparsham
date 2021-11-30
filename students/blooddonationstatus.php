<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$blood_donation_id=$_POST["blood_donation_id"];
$sql1="insert into blood_donation_list (blood_donation_id,email) VALUES ($blood_donation_id,'$email')";
$sql2="select * from blood_donation_list where blood_donation_id=$blood_donation_id and email='$email'";
$sql3="select no_of_donation,no_of_bottle,blood_donation_status from blood_donation where blood_donation_id=$blood_donation_id";
$res1=mysqli_query($conn,$sql3);
$r1=mysqli_fetch_assoc($res1);
$nod=(int)$r1['no_of_donation'];
$nob=(int)$r1['no_of_bottle'];
$staus=(int)$r1['blood_donation_status'];
$res=mysqli_query($conn,$sql2);
if(mysqli_num_rows($res)>0){
    ?>
     <script type="text/javascript">
     	alert("Already Registered");
     	window.location.replace('blooddonation.php')
     </script>
	<?php
}
else if(mysqli_query($conn,$sql1)){
	if($nod+1==$nob && $staus==1){
		$sql4="update blood_donation set no_of_donation=$nod+1, blood_donation_status=3 where blood_donation_id=$blood_donation_id";
		mysqli_query($conn,$sql4);
	}
	if($nod+1<$nob && $staus==1){
		$sql5="update blood_donation set no_of_donation=$nod+1 where blood_donation_id=$blood_donation_id";
		mysqli_query($conn,$sql5);
	}
	?>
     <script type="text/javascript">
     	alert("Sucessfully Registered");
     	window.location.replace('index.php')
     </script>
	<?php
}
else
echo mysqli_error($conn);
?>