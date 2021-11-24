<?php
session_start();
$email=$_SESSION['email'];
include("dbconn.php");
$email=$_SESSION["email"];


$query ="SELECT * FROM country";
$results = mysqli_query($conn,$query);
$s="select name,email,phone from registration where email='$email'";
//echo($s);
$r=mysqli_query($conn,$s);
$data=mysqli_fetch_assoc($r);
$name=$data["name"];
$phone=$data["phone"];

include("header.php")
?>
<div class="container">

	<?php
            $sq1="select * from verification where email='$email'";
            $res=mysqli_query($conn,$sq1);
            if(mysqli_num_rows($res)>0){
            ?>
           <div class="col-md-12 panel-grids">
                        <div class="panel panel-success"> <div class="panel-heading"> <h3 class="panel-title">You are already applied</h3> </div> <div class="panel-body"> You are already applied for Guide verification. Please wait for admin approval</div> </div>

            </div>
                
                       
                   
<?php
}
else{
?>
            
            <form class="row g-3" method="POST" action="verify.php" enctype="multipart/form-data">
                <h3 class="text-center">Personal Information</h3>
<div class="col-md-12">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control"  required=""  name="username" id="username" value="<?php echo $name ?>" readonly>
    <span style="color:red;" id="username_error"></span>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" required=""  name="email" value="<?php echo $email ?>" readonly>
    <span class="error_form" id="email_error"></span>
    <div id="showresult"></div>
  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Phone</label>
    <input type="text" class="form-control"  required="" name="phone" id="phone" value="<?php echo $phone ?>" readonly>
    <span style="color:red;" id="phone_error"></span>

  </div>
   <fieldset class="col-md-6">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
        <label class="form-check-label" for="gridRadios1">
         Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
        <label class="form-check-label" for="gridRadios2">
         Female
        </label>
      </div>
      
    </div>
  </fieldset>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Date of birth</label>
    <input type="date" class="form-control" id="date_of_birth" required="" name="date_of_birth">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">House</label>
    <input type="text" class="form-control" id="house" required="" pattern="[a-zA-Z]+\[ .]+\[0-9]" name="house" >
    <span class="error_form" id="house_error"></span>

  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Street</label>
    <input type="text" class="form-control" id="place" required="" name="street">
    <span class="error_form" id="place_error"></span>

  </div>
  <div class="col-md-3">
  <label for="inputState" class="form-label">Country</label>
  <select class="form-select" aria-label="Default select example" onChange="getState(this.value);" required="" name="country" id="country">
  <option value disabled selected>Select Country</option>
<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["country_id"]; ?>"><?php echo $country["country"]; ?></option>
<?php
}
?>
</select>
    </div>
    <div class="col-md-3">
<label for="inputState" class="form-label" >State</label>
  <select class="form-select" aria-label="Default select example" id="state-list" onChange="getCity(this.value);" name="state" required="">
<option value="">Select State</option>
</select>

    </div>
    <div class="col-md-3">
  <label for="inputState" class="form-label">District</label>
  <select class="form-select" aria-label="Default select example" id="city-list" name="district" required="">
    <option value="">Select District</option>
  
</select>
    </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Pincode</label>
    <input type="text" class="form-control" id="pincode" required="" name="pincode">
    <span class="error_form" id="pincode_error"></span>

  </div>

  <div class="col-md-12">
                <h3 class="text-center">Verification Details</h3>
  </div>
  <div class="col-md-6">
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" name="adhaar">
  <label class="custom-file-label" for="customFileLang">Upload ID Card</label>
</div>
</div>

  <div class="col-md-12">
    <button type="submit" class="btn btn-primary btn-lg btn-block" id="sub">Submit</button>
  </div>
</form>
<?php
}?>


	
</div>
<script type="text/javascript">
    function getState(val) {
    $.ajax({
    type: "POST",
    url: "getState.php",
    data:'country_id='+val,
    success: function(data){
        $("#state-list").html(data);
        getCity();
    }
    });
}
function getCity(val) {
    $.ajax({
    type: "POST",
    url: "getCity.php",
    data:'state_id='+val,
    success: function(data){
        $("#city-list").html(data);
    }
    });
}
</script>

<?php
include("footer.php");
?>