<?php
session_start();
include("dbconn.php");
$email=$_SESSION["email"];
//$_SESSION['sender']=$email;
$sql="select * from registration where email='$email'";
$res=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($res);
if (isset($_SESSION['reciever'])) {
}
else{
  $_SESSION['reciever']=$_GET['reciver_mail'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
<script type="text/javascript">
  function getAllMsg(){
      console.log("inn")
    $.ajax({
      url:"fetchmsg.php",
      type:'POST',
      data:{

      },
      success:function(data){
        $("#msg").html(data);
        

      }
    })
  }
  function sendmessage(){
    var msg=document.getElementById("message").value
    console.log(msg.length)
    if(msg.length==0)
    {
      alert("Enter some text")
    }
    else{

    $.ajax({
      url:"sendmsg.php",
      method:'POST',
      data:{
        message:msg
      },
      success:function(data){
        console.log("in success")
        $("#send").html(data);
      }
    })
  }
  }
</script>
</head>
<body onload="getAllMsg()">
<div class="container-fluid bg-light">
<h2 class="text-success text-center">Sparsham Chat with Public</h2>
<a href="index.php">Home</a>

<div class="container bg-success text-light">
  <?php echo $r['name'];?>
</div>

<div id="msg">
  
</div>
<div id="send">
  
</div>
<form>
<input style="width: 100%; height:100px;" type="text" name="msg" id="message" placeholder="type your message here" required="" > <input type="submit" class="btn btn-success" id="button" value="Send" onclick="sendmessage()">
</form>
</div>
</body>
</html>