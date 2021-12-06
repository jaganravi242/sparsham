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
           
           <th>Name</th>
           <th>Contact</th>

      <th>Donation Name</th>
      <th>Amount Required</th>
      <th>Description</th>
      <th>Donation</th>
           <th>Status</th>
      
        </tr>
    </thead>
    <tbody>
         <?php
            $email=$_SESSION["email"];
            $sql="select * from money_donation a,registration b where a.email=b.email and a.money_donation_status=1 and a.money_donation_id not in(select money_donation_id from money_donation_list WHERE email='$email')order by a.donation_date desc";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                  <td><?php echo $r['name']?></td>
                  <td><?php echo $r['email']?><br>
                  <?php echo $r['phone']?><br>  
                  </td>
                  <td><?php echo $r['donation_name']?></td>
                  <td><?php echo $r['requested_amount']-$r['collected_amount']?></td>
                  <td><?php echo $r['description']?></td>
                  <td>
                  <form action="paydonation.php" method="get">
                    <input type="number" name="donation_amount">
                </td>
                  <td>
                      <button type="submit" name="money_donation_id"class="btn btn-primary" value="<?php echo $r['money_donation_id']?>" onclick="">Accept</button>
                    </form>
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

