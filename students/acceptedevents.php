<?php
session_start();
include("header.php");
include("dbconn.php");
?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document)
  .ready(function () {
    $('#table_id')
      .DataTable();
  });
</script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
<div class="container">
	<table id="table_id" class="display">
		<h1 class="text-center">Money Donations</h1>
    <thead>
        <tr>
        <th>Event id</th>
      <th>Event Name</th>
      <th>Event Discription</th>
      <th>Event Date</th>
      <th>Slots Remaining</th>
      <th>Status</th>
        </tr>
    </thead>
    <tbody>
         <?php
            $email=$_SESSION["email"];
            $sql="select * from events where event_id in(select event_id from event_list where email='$email')";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                  <td><?php echo $r['event_id']?></td>
                  <td><?php echo $r['event_name']?></td>
                  <td><?php echo $r['event_discription']?></td>
                  <td><?php echo $r['event_date']?></td>
                  <td><?php echo $r['expected_students']-$r['accepted_students']?></td>
                  <td>Accepted</td>
              </tr>
              <?php
    }}
    else{
      ?>
      <tr>
        <td>No Active Donations</td>
    </tr><?php
    }?>
</tbody>
</table>
</div>
<script type="text/javascript">
      function updatestatus(id){
    console.log(id)
    $.ajax({
        url:"moneydonationstatus.php",
        method:"POST",
        data:{
            money_donation_id:id
        },
        success:function(data){
            location.reload();
            console.log(data)
            $('#'+id).html(data);
        }
    })
    location.reload();
  }
</script>
