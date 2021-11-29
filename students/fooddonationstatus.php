<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$food_donation_id=$_POST["food_donation_id"];
$sql1="insert into food_donation_list (food_donation_id,email) VALUES ($food_donation_id,'$email')";
$sql2="select * from food_donation_list where food_donation_id=$food_donation_id and email='$email'";
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
