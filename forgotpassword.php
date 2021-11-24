<?php
include("header.php")
?>
<div class="container">
  <h2 class="text-center">Forgotpassword</h2>
	<div class="col-md-12">
     <label for="inputEmail4" class="form-label">Enter Registered Email ID</label>
    <input type="email" class="form-control" id="email" required="" name="email">
    <span class="error_form" id="email_error"></span>
    <div id="showresult"></div>
  </div>
  
  <div class="col-md-12">
 <button type="button" class="btn btn-primary btn-lg btn-block" onclick="forgotpassword()">Send Mail</button>
</div>
	
</div>
<script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-firestore-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-auth-compat.js"></script>
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyAhf0a0o036-5ZcmPMTPyP0ErFlCgjEiLs",
  authDomain: "sparsham-d04d6.firebaseapp.com",
  projectId: "sparsham-d04d6",
  storageBucket: "sparsham-d04d6.appspot.com",
  messagingSenderId: "916628153215",
  appId: "1:916628153215:web:534b5e18edae6432e9704a"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);

      

      document.getElementById('login').addEventListener('click', GoogleLogin)
      document.getElementById('logout').addEventListener('click', LogoutUser)

      let provider = new firebase.auth.GoogleAuthProvider()



      function forgotpassword(){
      	var auth = firebase.auth();
var emailAddress = document.getElementById("email").value
auth.sendPasswordResetEmail(emailAddress).then(function() {
  // Email sent.
  console.log('Email Sent');
  alert("Please check your mail for reset password")
}).catch(function(error) {
  // An error happened.
  alert(error.message)
});
      }



      //checkAuthState()
    </script>
<?php
include("footer.php");
?>