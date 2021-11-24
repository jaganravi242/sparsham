<?php
require_once ("dbconn.php");
//$db_handle = new DBController();
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM state WHERE country_id = '" . $_POST["country_id"] . "'";
    $results = mysqli_query($conn,$query);
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["state_id"]; ?>"><?php echo $state["state"]; ?></option>
<?php
    }
}
?>