<?php
session_start();
include"dbconn.php";
$id=$_SESSION["email"];
if(isset($_SESSION['email'])){
	session_destroy();
include('index.php');

}
else{
	include('index.php');
}



?>