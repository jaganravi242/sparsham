<?php
session_start();
include("header.php")
?>
<div class="container">
	<h1 class="text-center">Blood Donation Request</h1>
	<form method="POST" action="blooddonationreq.php">
		<div class="col-md-6">
			<label>Blood Group</label>
			<input type="text" name="blood_group" class="form-control" required="">
		</div>
		<div class="col-md-6">
			<label>Number of bottles</label>
			<input type="number" name="no_of_bottles" class="form-control" required="">
		</div>
		<div class="col-md-12">
			<label>Small Description</label>
			<input type="text" name="description" class="form-control" required="" style="height: 50px;">
		</div>
		<div class="col-md-12 text-center">
			
			<button type="submit" class="btn btn-primary">Send Request</button>
		</div>
	</form>
</div>
<div class="clearfix"></div>
<?php
include("footer.php");
?>