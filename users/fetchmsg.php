<?php
session_start();
include("dbconn.php");
$reciever=$_SESSION['reciever'];
$email=$_SESSION['email'];

$sql="select * from chat where sender_email='$email' or reciever_email='$reciever' and sender_email='$reciever' or reciever_email='$email'";

$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	while($r=mysqli_fetch_assoc($res)){
?>

<?php
if($r['sender_email']==$email){


	$sq="select profile_pic from registration where email='$email'";
	$re=mysqli_query($conn,$sq);
	$r1=mysqli_fetch_assoc($re);
?>
<div class="container" >
  <p><?php echo $r['message']?></p>
  <span class="time-left text-primary"><?php echo $r['chat_time']?></span>
</div>
  <?php
}


else{
	$sq="select profile_pic from registration where email='$reciever'";
	$re=mysqli_query($conn,$sq);
	$r1=mysqli_fetch_assoc($re);

?>
<div class="container darker">
  <p><?php echo $r['message']?></p>
  <span class="time-left text-primary"><?php echo $r['chat_time']?></span>
</div>
<?php 
}
?>



<?php 

	}
}

?>