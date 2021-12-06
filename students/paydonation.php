<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
include("dbconn.php");

$email=$_SESSION["email"];
$money_donation_id=$_GET["money_donation_id"];
$donation_amount=$_GET["donation_amount"];


$sql1="select * from registration where email='$email'";
$r1=mysqli_fetch_assoc(mysqli_query($conn,$sql1));
$name=$r1["name"];
$email=$r1["email"];
$phone=$r1["phone"];

// $sql2="select product_image from product_images where product_id=$product_id limit 1";
// $r2=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
// $image=$r2["product_image"];
$sql2="select * from money_donation where money_donation_id=$money_donation_id";
$r2=mysqli_fetch_assoc(mysqli_query($conn,$sql2));


use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $donation_amount*100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $money_donation_id,
    "amount"            => $donation_amount,
    "name"              => $r2["donation_name"],
    "description"       => $r2["description"],
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $phone,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

//require("checkout/{$checkout}.php");

?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Wedding Store A Ecommerce Category Flat Bootstrap Responsive Website Template | Contact :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />  
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script> 
<!-- /start menu -->
</head>
<body> 
<!--header-->   

<?php 
include("header.php");
?>
<div class="container">
	<h1 class="text-center">Checkout</h1>
    <div class="row">
  <div class="col-md-12">
    
    <div class="card text-center">
      <div class="view overlay">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <div class="card-body">
        <h4 class="card-title text-success"><?php echo $r2['donation_name']?></h4>
        <p class="text-danger">
        	Paying <?php echo $donation_amount?> Rs
        </p>
        <form action="payment/index.php" method="POST">
        	
  <input type="hidden" name="money_donation_id" value="<?php echo $money_donation_id?>">
  <input type="hidden" name="donation_amount" value="<?php echo $donation_amount?>">
  <input type="hidden" name="email" value="<?php echo $r['email']?>">
<button type="submi">Submit</button>

  <!-- <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script> -->
    <input type="hidden" name="shopping_order_id" value="3456">
</form>
        	
         </div>




</div>

<?php
include("footer.php");
?>
<!---->
 <div class="copywrite">
     <div class="container">
             <p>Copyright © 2015 Wedding Store. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
         </div>
</div>       
</body>
</html>