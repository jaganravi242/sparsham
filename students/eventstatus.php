<?php
include("dbconn.php");
session_start();
$email=$_SESSION["email"];
$event_id=$_GET["event_id"];
$sql1="insert into event_list (event_id,email) VALUES ($event_id,'$email')";
$sql2="select * from event_list where event_id=$event_id and email='$email'";
$sql3="select accepted_students,expected_students,event_status from events where event_id=$event_id";
$res1=mysqli_query($conn,$sql3);
$r1=mysqli_fetch_assoc($res1);
$nod=(int)$r1['accepted_students'];
$nob=(int)$r1['expected_students'];
$staus=(int)$r1['event_status'];
$res=mysqli_query($conn,$sql2);
if(mysqli_num_rows($res)>0){
    ?>
     <script type="text/javascript">
     	alert("Already Registered");
     	window.location.replace('events.php')
     </script>
	<?php
}
else if(mysqli_query($conn,$sql1)){
	if($nod+1==$nob && $staus==1){
		$sql4="update events set accepted_students=$nod+1, event_status=3 where event_id=$event_id";
		mysqli_query($conn,$sql4);
	}
	if($nod+1<$nob && $staus==1){
		$sql5="update events set accepted_students=$nod+1 where event_id=$event_id";
		mysqli_query($conn,$sql5);
	}
	?>
     <script type="text/javascript">
     	alert("Sucessfully Registered");
     	window.location.replace('events.php')
     </script>
	<?php
}
else
echo mysqli_error($conn);
?>
