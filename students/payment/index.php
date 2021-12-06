<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
include("dbconn.php");
$money_donation_id=$_POST["money_donation_id"];
$donation_amount=$_POST["donation_amount"];
$email=$_SESSION["email"];
$sql="select * from money_donation where money_donation_id='$money_donation_id'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>UI Card Payment Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="UI Card Payment template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> 
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="mainw3-agile">
		<h1>Explore Payment Gateway</h1>
		<div class="main-agileinfo">
			<div class="w3pay-left">
				<div class="w3pay-left-text">
					<img src="" alt=""/>
					<p>Donation Name</p>
					<h2><?php echo $row["donation_name"]?></h2>
					<p>Sparsham payment gateway protected with encryption</p>
					<h3>₹ <?php echo $donation_amount?></h3> 
				</div>	
				<h6><a href="../moneydonation.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Cancel your payment</a></h6>
			</div>	
			<div class="w3pay-right wthree-pay-grid">
				<div class="card-bounding agileits"> 
					<form action="confirmpayment.php" method="post"> 
						<input type="hidden" name="money_donation_id" value="<?php echo $money_donation_id ?>">
						<input type="hidden" name="donation_amount" value="<?php echo $donation_amount ?>">




						<div class="card-details"> 
							<aside>Name On Card:</aside>
							<input type="text" name="name" placeholder="Name On Card" required=""/> 
						</div>	
						<aside>Card Number:</aside>
						<div class="card-container">
							<!--- ".card-type" is a sprite used as a background image with associated classes for the major card types, providing x-y coordinates for the sprite --->
							<div class="card-type"></div>
							<input type="text" name="card number" placeholder="0000 0000 0000 0000" onkeyup="$cc.validate(event)" required=""/>
							<!-- The checkmark ".card-valid" used is a custom font from icomoon.io --->
							<div class="card-valid"><i class="fa fa-check" aria-hidden="true"></i></div>
						</div> 
						<div class="card-details agileits-w3layouts"> 
							<div class="expiration">
								<aside>Expiration Date</aside>
								<input type="text" name="date" onkeyup="$cc.expiry.call(this,event)" maxlength="7" placeholder="mm/yyyy" required=""/>
							</div> 
							<div class="cvv">
								<aside>CVV</aside>
								<input type="text" name="cvv" placeholder="XXX" maxlength="3" required=""/>
							</div> 
							<div class="clear">	</div>		
						</div>
						<input type="submit" value="Pay Now"> 
					</form>  
				</div>
			</div>	
			<div class="clear">	</div>		
		</div>	
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<div class="w3lscopy-agile">
		<p>© 2017 UI Card Payment. All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
	</div>
	<!-- //copyright -->  
	<!-- Validator js -->  
	<script src="js/creditCardValidator.js" type="text/javascript"></script>
	<!-- //Validator -->  
</body>
</html>