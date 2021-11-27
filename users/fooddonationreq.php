<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
$donation_name=$_POST["donation_name"];
$no_of_packets=round($_POST["no_of_packets"]*.1)+$_POST["no_of_packets"];
$description=$_POST["description"];
$sql="insert into food_donation(email,no_of_packets,no_of_donations,donation_name,description)values('$email',$no_of_packets,0,'$donation_name','$description')";
if(mysqli_query($conn,$sql)){
	?>
     <script type="text/javascript">
     	alert("Request send to secretary,please wait for confirmation");
     	window.location.replace('index.php')
     </script>
	<?php
}
else
echo mysqli_error($conn);


?>