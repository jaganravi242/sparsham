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
		<h1 class="text-center">Inventory Donations</h1>
    <thead>
        <tr>
           
        <th>Donation Id</th>
      <th>Donation Name</th>
      <th>Item Name</th>
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
            $sql="select * from inventory_donation where email='$email'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                  <td><?php echo $r['donation_id']?></td>
                  <td><?php echo $r['donation_name']?></td>
                  <td><?php echo $r['item_name']?></td>
                  <td><?php echo $r['item_required']?></td>
                  <td><?php echo $r['item_collected']?></td>
                  <td><?php echo $r['discription']?></td>
                  <td>
                    <div id="<?php echo $r['donation_id']?>">
                        <?php
                if($r['donation_status']==0)
                    echo "Request not accepted";
                else if($r['donation_status']==1)
                    echo "Request accepted";
                else if($r['donation_status']==2)
                    echo "Request rejected";
                else if($r['donation_status']==3)
                    echo "Request completed";

            ?>
        </div></td>
                  <td>
                    <a href="inventorydonationlistview.php?donation_id=<?php echo $r['donation_id']?>">
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

