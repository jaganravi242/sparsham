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
    <th>Amount</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>Address</th>
    <th>District</th>
    <th>Pincode</th>
    </tr>
    </thead>
    <tbody>
         <?php
            $money_donation_id=$_GET['money_donation_id'];
            $sql="SELECT * FROM registration INNER JOIN money_donation_list ON registration.email=money_donation_list.email WHERE money_donation_list.money_donation_id=$money_donation_id";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
      <th scope="row"><?php echo $r['name']?></th>
      <td><?php echo $r['email']?><br>
        <?php echo $r['phone']?></td>
        <td><?php echo $r['amount']?></td>
      <td><?php echo $r['gender']?></td>
      <td><?php echo $r['date_of_birth']?></td>
        <td><?php echo $r['house']?><br>
        <?php echo $r['place']?></td>
        <td><?php echo $r['district']?></td>

        <td>
        <?php echo $r['pincode']?></td>
     


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

