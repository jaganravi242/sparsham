<?php
include("dbconn.php");
$event_name=$_POST["eventname"];
$event_discription=$_POST["eventdiscription"];
$event_date=$_POST["eventdate"];
$expected_students=$_POST["expectedcount"];

$sql="INSERT INTO events (event_name,event_discription,event_date,expected_students) VALUES ('$event_name', '$event_discription', '$event_date',$expected_students)";
if(mysqli_query($conn,$sql)){
    ?>
    <script>
        alert("Event Added Sucessfully");
        window.location.replace("createevent.php");
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("Request Failed");
        window.location.replace("createevent.php");
    </script>
    <?php
}

?>

