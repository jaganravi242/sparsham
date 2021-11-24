<?php
session_start();
include("header.php")
?>
<div class="container">
	<h1 class="text-center">Send Donation Request</h1>
	<div class="col-md-4">
		<div class="card">
            <img src="../images/blood donation.jpg" width="360" height="240">
			<div class="card-title text-center"><h3>Blood Donation</h3></div>
        </div>
    </div>
	<div class="col-md-4">
		<div class="card">
            <img src="../images/Food donation.jpg" width="360" height="240">
			<div class="card-title text-center"><h3>Food Donation</h3></div>
        </div>
    </div>
	<div class="col-md-4">
		<div class="card">
            <img src="../images/money donation.jpg" width="360" height="240">
			<div class="card-title text-center"><h3>Money Donation</h3></div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>