<?php
$email = $_POST['email'];
//echo $email;

include_once('dbconn.php');
$result = mysqli_query ($conn , "SELECT * FROM login WHERE email = '".$email."'");
$rows = mysqli_num_rows($result);
//echo $rows;
if($rows > 0 )
{
	echo "<font color='#FF0000'>email already exists</font>";

}
else {
	echo "<font color='#00CC00'>email available</font>";

	}

?>




					