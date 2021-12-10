<?php
include("dbconn.php");
$donation_id=$_POST["donation_id"];
$donation_status=$_POST["donation_status"];

$sql="update inventory_donation set donation_status=$donation_status where donation_id=$donation_id";
if(mysqli_query($conn,$sql)){
	if($donation_status==0)
            echo "Request not accepted";
        else if($donation_status==1)
            echo "Request accepted";
        else if($donation_status==2)
            echo "Request rejected";
        else if($donation_status==3)
            echo "Request completed";
}


?>