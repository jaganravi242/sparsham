<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
$money_donation_id=$_POST["money_donation_id"];
$donation_amount=$_POST["donation_amount"];
$sql2="select * from money_donation where money_donation_id=$money_donation_id";
    $r1=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
    $total_amount=$donation_amount+$r1['collected_amount'];
    echo $total_amount;
    if($total_amount>=$r1['requested_amount']){
        $sql3="UPDATE money_donation SET collected_amount =$total_amount,money_donation_status = 3 WHERE money_donation_id=$money_donation_id";
        mysqli_query($conn,$sql3);
        $sql="INSERT INTO money_donation_list (donation_id,money_donation_id,email,amount) VALUES (NULL,$money_donation_id,'$email',$donation_amount)";
        mysqli_query($conn,$sql);
        header("location:payment.php");
    }
    else{
        $sql3="UPDATE money_donation SET collected_amount =$total_amount ,WHERE money_donation_id=$money_donation_id";
        mysqli_query($conn,$sql3);
        $sql="INSERT INTO money_donation_list (donation_id,money_donation_id,email,amount) VALUES (NULL,$money_donation_id,'$email',$donation_amount)";
        if(mysqli_query($conn,$sql)){
        header("location:payment.php");
        } 
    }
// $sql="insert into payment(customer_email,sp_email,booking_id,price)values('$customer_email','$sp_email','$booking_id','$price')";
// //echo $booking_id;
// if(mysqli_query($conn,$sql)){
// 	$sql1="insert into notification(sender_id,reciever_id,notification_type,content)values('$customer_email','$sp_email','Payment Completed','Payment completed, you earned $price Rs')";
// 	if(mysqli_query($conn,$sql1)){
// 		if(isset($_POST["room_id"])){
// 	$room_id=$_POST['room_id'];
// 	$sql4="select no_of_rooms from rooms where room_id=$room_id";
// 	$r=mysqli_fetch_assoc(mysqli_query($conn,$sql4));
// 	$no_of_rooms=$r["no_of_rooms"];
// 	$sql2="update rooms set no_of_rooms=$no_of_rooms-1 where room_id=$room_id";
// 	if(mysqli_query($conn,$sql2)){
// 		header("location:payment.php");
// 		//echo "in isset";
// 		//echo $no_of_rooms;

// 	}
// }
// else{
// 		header("location:payment.php");
// 	echo "in else";

// }

// 	}
// 	else
// echo mysqli_error($conn);
// }
// else
// echo mysqli_error($conn);


?>