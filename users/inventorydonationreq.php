<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
$item_name=$_POST["item_name"];
$donation_name=$_POST["donation_name"];
$item_required=$_POST["item_required"];
$discription=$_POST["description"];
$sql="insert into inventory_donation(email,item_name,item_required,item_collected,donation_name,discription)values('$email','$item_name',$item_required,0,'$donation_name','$discription')";
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