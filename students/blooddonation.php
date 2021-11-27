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
           
           <th>Name</th>
           <th>Contact</th>

      <th>Blood Group</th>
      <th>Number of bottles</th>
      <th>Description</th>
           <th>Status</th>
      
        </tr>
    </thead>
    <tbody>
         <?php
            $email=$_SESSION["email"];
            $sql="select * from blood_donation a,registration b where a.email=b.email and a.blood_donation_status=1 order by a.donation_date desc";
            $res=mysqli_query($conn,$sql);
            $sql1="select blood_donation_id from blood_donation_list where email='$email'";
            $res1=mysqli_query($conn,$sql1);
            $a1 = array();
            while($r1 = mysqli_fetch_assoc($res1))
            {
                $a1[] = $r1['blood_donation_id'];
            }
            if(mysqli_num_rows($res)>0){
                while($r=mysqli_fetch_assoc($res)){
                if(in_array($r['blood_donation_id'],$a1)==false){
                  ?>
                  <tr>
                  <td><?php echo $r['name']?></td>
                  <td><?php echo $r['email']?><br>
                  <?php echo $r['phone']?><br>  
                  </td>
                  <td><?php echo $r['blood_group']?></td>
                  <td><?php echo $r['no_of_bottle']-$r['no_of_donation']?></td>
                  <td><?php echo $r['description']?></td>
                  <td>
                    <form>
                      <button class="btn btn-primary" value="<?php echo $r['blood_donation_id']?>" onclick="updatestatus(this.value)">Accept</button>
                    </form>
                  </td>
              </tr>
              <?php
    }}}?>
</tbody>
</table>
</div>
<script type="text/javascript">
      function updatestatus(id){
    console.log(id)
    $.ajax({
        url:"blooddonationstatus.php",
        method:"POST",
        data:{
            blood_donation_id:id
        },
        success:function(data){
            console.log(data)
            $('#'+id).html(data);
        }
    })
  }
</script>
