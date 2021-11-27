<?php
include("dbconn.php");
$food_donation_id=$_POST["food_donation_id"];
$food_donation_status=$_POST["food_donation_status"];

$sql="update food_donation set food_donation_status=$food_donation_status where food_donation_id=$food_donation_id";
if(mysqli_query($conn,$sql)){
	if($food_donation_status==0)
            echo "Request not accepted";
        else if($food_donation_status==1)
            echo "Request accepted";
        else if($food_donation_status==2)
            echo "Request rejected";
        else if($food_donation_status==3)
            echo "Request completed";
}
?>