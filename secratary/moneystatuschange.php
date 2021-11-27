<?php
include("dbconn.php");
$money_donation_id=$_POST["money_donation_id"];
$money_donation_status=$_POST["money_donation_status"];

$sql="update money_donation set money_donation_status=$money_donation_status where money_donation_id=$money_donation_id";
if(mysqli_query($conn,$sql)){
	if($money_donation_status==0)
            echo "Request not accepted";
        else if($money_donation_status==1)
            echo "Request accepted";
        else if($money_donation_status==2)
            echo "Request rejected";
        else if($money_donation_status==3)
            echo "Request completed";
}


?>