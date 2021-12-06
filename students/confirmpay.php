
<?php
require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' =>  "order_9A33XWu170gUtm",
            'razorpay_payment_id' => "pay_29QQoUBi66xm2f",
            'razorpay_signature' => "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d",
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>";
            
}
else
{
    
    include("dbconn.php");
    $email=$_SESSION["email"];
    $money_donation_id=$_POST['money_donation_id'];
    $donation_amount=$_POST['donation_amount'];

    // $size=$_POST['size'];
    // $product_id=$_POST['product_id'];  
    // $sql2="select product_stock from product where product_id=$product_id";
    // $r=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
   // $product_stock=$r["product_stock"];  
    $sql2="select * from money_donation where money_donation_id=$money_donation_id";
    $r1=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
    //$total_amount=$donation_amount+$r1['collected_amount'];
    echo $total_amount;
    if($donation_amount>=$r1['requested_amount']){
        $sql3="UPDATE money_donation SET collected_amount =200,money_donation_status = 3 WHERE money_donation_id=$money_donation_id";
        mysqli_query($conn,$sql3);
        $sql="INSERT INTO money_donation_list (donation_id,money_donation_id,email,amount) VALUES (NULL,$money_donation_id,'$email',$donation_amount)";
        mysqli_query($conn,$sql);
        header("location:moneydonation.php");
    }
    else{
        $sql3="UPDATE money_donation SET collected_amount =200 ,WHERE money_donation_id=$money_donation_id";
        mysqli_query($conn,$sql3);
        $sql="INSERT INTO money_donation_list (donation_id,money_donation_id,email,amount) VALUES (NULL,$money_donation_id,'$email',$donation_amount)";
        if(mysqli_query($conn,$sql)){
        header("location:moneydonation.php");
        } 
    }
}
// echo $html;
// echo $size;
// echo $product_id;
?>