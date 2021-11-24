<?php
$complaint_id=$_POST["complaint_id"];
include("dbconn.php");
$sql="update complaint set complaint_status=1 where complaint_id='$complaint_id'";
if(mysqli_query($conn,$sql)){
	echo "Updated";
}

?>