<?php
session_start();
include("header.php")
?>
<div class="container">
	 <?php
              include("dbconn.php");
              
              $email=$_SESSION['email'];
              $s="select status from login where email='$email'";
              $r=mysqli_query($conn,$s);
              //echo($s);
              $data=mysqli_fetch_assoc($r);
              $status=$data["status"];
              if($status=="0"){

                ?>

                <div class="col-md-12 text-center">
                	<div class="card">
                		<img src="images/approve.png">
                	</div>
                <a href="verification.php">
                Get Approval From Secretary
                </a>
                </div>
              <?php
              }
              else{
              ?>
              <h1 class="text-center">You are verified by Secretary</h1>
             
              <?php

              }

              ?>
</div>

<?php
include("footer.php");
?>