<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$blood_donation_id=$_POST["blood_donation_id"];
$sql1="insert into blood_donation_list (blood_donation_id,email) VALUES ($blood_donation_id,'$email')";
$sql2="select * from blood_donation_list where blood_donation_id=$blood_donation_id and email='$email'";
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