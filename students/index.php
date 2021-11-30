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
              <!-- <h1 class="text-center">You are verified by Secretary</h1> -->
              <div class="container">
  <h1 class="text-center">Donation Request</h1>
  <div class="col-md-4">
    <a href="blooddonation.php">
    <div class="card">
            <img src="../images/blood donation.jpg" width="360" height="240">
      <div class="card-title text-center"><h3>Blood Donation</h3></div>
        </div>
      </a>
      <a href="acceptedblooddonation.php">
              <div class="text-center"><h3>Accepted Donation</h3></div></a>
    </div>
  <div class="col-md-4">
  <a href="fooddonation.php">
    <div class="card">
            <img src="../images/Food donation.jpg" width="360" height="240">
      <div class="card-title text-center"><h3>Food Donation</h3></div>
        </div>
              </a>
              <a href="acceptedfooddonation.php">
              <div class="text-center"><h3>Accepted Donation</h3></div></a>
    </div>
  <div class="col-md-4">
  <a href="moneydonation.php">
    <div class="card">
            <img src="../images/money donation.jpg" width="360" height="240">
      <div class="card-title text-center"><h3>Money Donation</h3></div>
        </div>
    </div></a>
    <a href="acceptedmoneydonation.php">
              <div class="text-center"><h3>Accepted Donation</h3></div></a>
</div>

             
              <?php

              }

              ?>
</div>

<!-- <?php
include("footer.php");
?> -->