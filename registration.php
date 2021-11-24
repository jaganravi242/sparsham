<?php
include("header.php")
?>
<div class="container">
	<h1 class="text-center">Registration</h1>
	<form>
	<div class="col-md-12">
     <label for="inputEmail4" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="username" required=""  name="username">
     <span style="color:red;" id="username_error"></span>
    
  </div>
  

	<div class="col-md-12">
     <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" required=""  name="email" onblur="getEmail(this.value)">
    <span class="error_form" id="email_error"></span>
    <div id="showresult"></div>
  </div>

  <div class="col-md-12">
     <label for="inputEmail4" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" required="" name="phone">
    <span style="color:red;" id="phone_error"></span>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" required=""  name="password">
   
    
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="conpassword" required=""  name="conpassword">
    <span style="color:red;" id
    ="password_error"></span>
  </div>
  <div class="col-md-6">
  	
<label for="inputState" class="form-label" >Register as</label>
  <select class="form-control" aria-label="Default select example" id="usertype" name="state" required="">

<option value="student" >Student</option>

<option value="public">Public</option>



</select>
</div>
<div class="clearfix"></div>
<br>
<div class="col-md-12">
 <button type="button" class="btn btn-primary btn-lg btn-block" onclick="phoneSignin()" id="sub"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
  <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>Register</button>


</div>
</form>
	
</div>
	<script type="text/javascript" language="javascript" src="js/validation.js"></script>

	<script type="text/javascript">
		function getEmail(val){
			console.log("in getEmail")
			console.log(val)
			$.ajax({
				type:"POST",
				url:"getemail.php",
				data:'email='+val,
				success: function(data){
		console.log(data)
	
		$("#showresult").html(data);


	}
			})
		}
	</script>
	<script type="text/javascript">
		function getEmail(val){
			console.log("in getEmail")
			console.log(val)
			$.ajax({
				type:"POST",
				url:"getemail.php",
				data:'email='+val,
				success: function(data){
		console.log(data)
	
		$("#showresult").html(data);


	}
			})
		}
	</script>
	<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
<script type="text/javascript">
	var firebaseConfig = {
        apiKey: "AIzaSyAhf0a0o036-5ZcmPMTPyP0ErFlCgjEiLs",
  authDomain: "sparsham-d04d6.firebaseapp.com",
  projectId: "sparsham-d04d6",
  storageBucket: "sparsham-d04d6.appspot.com",
  messagingSenderId: "916628153215",
  appId: "1:916628153215:web:534b5e18edae6432e9704a"
      };

      firebase.initializeApp(firebaseConfig);
       function phoneSignin(){
      	var email=document.getElementById("email").value

  var password=document.getElementById("password").value
  //const auth = firebase.getAuth();
  //Create User with Email and Password
  firebase.auth().createUserWithEmailAndPassword(email, password).then((userCredential) => {
    // Signed in 
    //window.location.replace("login.php")
    console.log("success")
    var name=document.getElementById("username").value
    var email=document.getElementById("email").value
    var phone=document.getElementById("phone").value
    var password=document.getElementById("password").value
    var usertype=document.getElementById("usertype").value
    $.ajax({
    	type:"POST",
				url:"adduser.php",
				data:{
					n:name,
					e:email,
					ph:phone,
					
					us:usertype,
				},
				success: function(data){
		console.log(data)
		
		window.location.replace("login.php")
	}

    })
  })
  .catch(function(error) {
    // Handle Errors here.
    console.log("in reg")
    //window.location.replace("home.php")
    var errorCode = error.code;
    var errorMessage = error.message;
    console.log(errorCode);
    console.log(errorMessage);
    console.log(errorMessage.length)
    alert(errorMessage)
    
  });

      }
</script>
<?php
include("footer.php");
?>