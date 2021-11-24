<?php
include("dbconn.php");
$complaint_id=$_POST["complaint_id"];
$complaint_replay=$_POST["complaint_replay"];

$sql="update complaint set complaint_replay='$complaint_replay' where complaint_id=$complaint_id";
if(mysqli_query($conn,$sql)){
	echo "<script>alert('Replay send')
	window.location.replace('complaints.php')
	</script>

	";
}
else
echo mysqli_error($conn);



?>