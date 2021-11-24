<?php
include("dbconn.php");
$blood_donation_id=$_POST["blood_donation_id"];
$blood_donation_status=$_POST["blood_donation_status"];

$sql="update blood_donation set blood_donation_status=$blood_donation_status where blood_donation_id=$blood_donation_id";
if(mysqli_query($conn,$sql)){
	if($blood_donation_status==0)
            echo "Request not accepted";
        else if($blood_donation_status==1)
            echo "Request accepted";
        else if($blood_donation_status==2)
            echo "Request rejected";
        else if($blood_donation_status==3)
            echo "Request completed";
}


?>