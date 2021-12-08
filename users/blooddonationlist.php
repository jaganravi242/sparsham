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
		<h1 class="text-center">Blood Donations</h1>
    <thead>
        <tr>
           
      <th>Blood Donation Id</th>
      <th>Blood Group</th>
      <th>Units Required</th>
      <th>Units Collected</th>
      <th>Description</th>
      <th>Status</th>
      <th>List</th>
      
        </tr>
    </thead>
    <tbody>
         <?php
            $email=$_SESSION["email"];
            $sql="select * from blood_donation where email='$email' order by donation_date desc";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                  <td><?php echo $r['blood_donation_id']?></td>
                  <td><?php echo $r['blood_group']?></td>
                  <td><?php echo $r['no_of_bottle']?></td>
                  <td><?php echo $r['no_of_donation']?></td>
                  <td><?php echo $r['description']?></td>
                  <td>
                    <div id="<?php echo $r['blood_donation_id']?>">
                        <?php
                if($r['blood_donation_id']==0)
                    echo "Request not accepted";
                else if($r['blood_donation_id']==1)
                    echo "Request accepted";
                else if($r['blood_donation_id']==2)
                    echo "Request rejected";
                else if($r['blood_donation_id']==3)
                    echo "Request completed";

            ?>
        </div></td>
                  <td>
                    <a href="blooddonationlistview.php?blood_donation_id=<?php echo $r['blood_donation_id']?>">
                      <button class="btn btn-primary">View List</button></a>
                  </td>
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

