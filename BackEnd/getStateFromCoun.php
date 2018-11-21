<?php 
require_once("Connect.php"); 
//$db_handle = new DBController();
if(!empty($_POST["country_id"])) 
    {
$query ="SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
$results = $db_handle->runQuery($query); ?> 
<option value="">Select State</option>
    <?php foreach($results as $state) { ?> 
<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
    <?php } } 
?>

<div class="frmDronpDown">
<div class="row">
    <label>Country:</label><br/>
    <select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
    <option value="">Select Country</option>
    <?php
    foreach($results as $country) {
    ?>
    <option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
    <?php
    }
    ?>
    </select>
</div>
<div class="row">
    <label>State:</label><br/>
    <select name="state" id="state-list" class="demoInputBox">
    <option value="">Select State</option>
    </select>
</div>
    
<script> function getState(val) { $.ajax({
type: "POST",
url: "getStateFromCoun.php",
data:'country_id='+val,
success: function(data){
    $("#state-list").html(data);
}
});} </script>

