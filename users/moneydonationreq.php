<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
$donation_name=$_POST["donation_name"];
$requested_amount=$_POST["requested_amount"];
$description=$_POST["description"];
$sql="insert into money_donation(email,requested_amount,donation_name,description)values('$email',$requested_amount,'$donation_name','$description')";
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