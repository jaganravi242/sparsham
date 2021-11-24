window.addEventListener('load', (event) => {
  //console.log('page is fully loaded');


	console.log("in validation")
	$("#username_error").hide();
	$("#email_error").hide();
	$("#phone_error").hide();
	$("#house_error").hide();
	$("#place_error").hide();
	$("#pincode_error").hide();
	$("#registration_form").hide()
	$("#password_error").hide()

	var error_username=false
	var error_email=false
	var error_phone=false
	var error_house=false
	var error_place=false
	var error_pincode=false

	$("#username").focusout(function() {
		console.log("in usr")

		check_username();
		
	});
	// $("#email").focusout(function() {

	// 	check_email();
		
	// });
	$("#conpassword").focusout(function() {

		check_password();
		
	});
	$("#phone").focusout(function() {

		check_phone();
		
	});
	$("#house").focusout(function() {

		check_house();
		
	});
    $("#place").focusout(function() {

		check_place();
		
	});
	$("#pincode").focusout(function() {

		check_pincode();
		
	});

	function check_password(){
		var p1=document.getElementById("password").value
		var p2=document.getElementById("conpassword").value
		if(p1.length<6){
	$("#password_error").show()

			$("#password_error").html("Password should be greater than six")
		document.getElementById("sub").disabled = true;

		}
		else{
	$("#password_error").hide()
			
		document.getElementById("sub").disabled = false;

		}
		
		if(p1!=p2){
	$("#password_error").show()

			$("#password_error").html("Please enter the above password")
		document.getElementById("sub").disabled = true;

		}
		else{
	$("#password_error").hide()

		document.getElementById("sub").disabled = false;

		}
	}


	function check_username() {

		console.log(document.getElementById("username").value)
		
		 var regex = /^[a-z .A-Z]+$/;
   
	
		var username_length = document.getElementById("username").value.length;
		
		if(username_length < 5 || username_length > 20) {
			$("#username_error").html("Should be between 5-20 characters");
			$("#username_error").show();
			error_username = true;
		document.getElementById("sub").disabled = true;

		} else {
			$("#username_error").hide();
		}
		if(regex.test($("#username").val())) {
			
		} else {
			$("#username_error").html("Invalid name");
			$("#username_error").show();
			error_username = true;
		document.getElementById("sub").disabled = true;

		}
	
	
	}

	function check_phone(){
		var ph=document.getElementById("phone").value
		console.log("ph")
		var pattern=/^\d{10}$/

		if(pattern.test($("#phone").val())){
			document.getElementById("sub").disabled = false;
			$("#phone_error").hide();
			
		}
		else{
			$("#phone_error").html("Invalid phone number");
			$("#phone_error").show();
			document.getElementById("sub").disabled = true;


		}

		

	}

	function check_pincode(){
		var ph=document.getElementById("pincode").value
		console.log("ph")
		var pattern=/^\d{6}$/

		if(pattern.test($("#pincode").val())){
			document.getElementById("sub").disabled = false;
			$("#pincode_error").hide();
			
		}
		else{
			$("#pincode_error").html("Invalid pincode");
			$("#pincode_error").show();
			document.getElementById("sub").disabled = true;


		}

		

	}
	

	
	$("#registration_form").submit(function() {
		console.log("in submit")
											
	error_username=false
	error_email=false
	error_phone=false
	error_house=false
	error_place=false
	error_pincode=false
											
		check_username();
		check_email();
		check_phone();
		check_house();
		check_place();
		check_pincode();
		
		if(error_username == false && error_email==false && error_phone==false && error_house==false && error_place==false && error_pincode==false) {
			//document.getElementById("sub").disabled = true;
			return true;
		} else {
			return false;	
		}
	
	});

});
