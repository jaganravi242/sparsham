<?php
require_once ("dbconn.php");
//$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM district WHERE state_id = '" . $_POST["state_id"] . "'";
      $results = mysqli_query($conn,$query);
    ?>
<option value disabled selected>Select District</option>
<?php
    foreach ($results as $district) {
        ?>
<option value="<?php echo $district['district_id']; ?>"><?php echo $district["district"]; ?></option>
<?php
    }
}
?>