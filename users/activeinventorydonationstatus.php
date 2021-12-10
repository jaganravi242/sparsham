<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$donation_id=$_GET["donation_id"];
$sql1="insert into inventory_donation_list (donation_id,email) VALUES ($donation_id,'$email')";
$sql2="select * from inventory_donation_list where donation_id=$donation_id and email='$email'";
$sql3="select item_collected,item_required,donation_status from inventory_donation where donation_id=$donation_id";
$res1=mysqli_query($conn,$sql3);
$r1=mysqli_fetch_assoc($res1);
$nod=(int)$r1['item_collected'];
$nob=(int)$r1['item_required'];
$staus=(int)$r1['donation_status'];
$res=mysqli_query($conn,$sql2);
if(mysqli_num_rows($res)>0){
    ?>
     <script type="text/javascript">
     	alert("Already Registered");
     	window.location.replace('activeinventorydonation.php')
     </script>
	<?php
}
else if(mysqli_query($conn,$sql1)){
	if($nod+1==$nob && $staus==1){
		$sql4="update inventory_donation set item_collected=$nod+1, donation_status=3 where donation_id=$donation_id";
		mysqli_query($conn,$sql4);
	}
	if($nod+1<$nob && $staus==1){
		$sql5="update inventory_donation set item_collected=$nod+1 where donation_id=$donation_id";
		mysqli_query($conn,$sql5);
	}
	?>
     <script type="text/javascript">
     	alert("Sucessfully Registered");
     	window.location.replace('activeinventorydonation.php')
     </script>
	<?php
}
else
echo mysqli_error($conn);
?>