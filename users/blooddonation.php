<?php
session_start();
include("header.php")
?>
<div class="container">
	<h1 class="text-center">Blood Donation Request</h1>
	<form method="POST" action="blooddonationreq.php">
		<div class="col-md-6">
			<label>Blood Group</label>
			<select name="blood_group" class="form-control" required="">
				<option>O+</option>
				<option>A+</option>
				<option>B+</option>
				<option>AB+</option>
				<option>O-</option>
				<option>A-</option>
				<option>B-</option>
				<option>AB-</option>
			</select>
		</div>
		<div class="col-md-6">
			<label>Number of bottles</label>
			<input type="number" name="no_of_bottles" class="form-control" required="">
		</div>
		<div class="col-md-12">
			<label>Small Description</label>
			<select  name="description" class="form-control" required="" >
			<option>Within 24 Hour</option>
			<option>Within 48 Hour</option>
			<option>Within 3 Days</option>
			<option>Morethan 3 Days</option>
			</select>	
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