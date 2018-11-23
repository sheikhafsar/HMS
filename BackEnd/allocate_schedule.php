
<?php
    require_once 'Connect.php';
    session_start();
    $dept_ID=$_GET['dept_ID'];
    
    //echo "id: $dept_ID" ;
    
     if (isset($_POST["insert"])){
         // echo "id: $dept_ID" ;
         
         $stmt = $DBcon->prepare("insert into consultation_schedule(dr_id,day,Time)VALUES(:id,:day,:time)");
            $stmt->bindparam(':id', $_POST['dr'], PDO::PARAM_STR);
            $stmt->bindparam(':day', $_POST['day'], PDO::PARAM_STR);
            $stmt->bindparam(':time', $_POST['time'], PDO::PARAM_STR);
            $stmt->execute();
         header("location:consultation_schedule.php"); 
     }
    
    
?>

<form  name="frm1" action="" method="POST" enctype="multipart/form-data" >
    
    Doctor Name : 
    <select id="dr_ID" name="dr" >
        
        <!-- Output of doc_list.php is listed here -->
    </select>
    
    <br/>
    
    Day :
    <select id="day" name="day" >
        <option value="Mon">Monday</option>
        <option value="Tue">Tuesday</option>
        <option value="Wed">Wednesday</option>
        <option value="Thu">Thursday</option>
        <option value="Fri">Friday</option>
        <option value="Sat">Saturday</option>
        <option value="Sun">Sunday</option>
        
    </select>
    
     <br/>
     
    Time :
    <select id="time" name="time" >
        <option value="10:00-1:00">10:00 AM to 1:00 PM</option>
        <option value="2:00-5:00">2:00 PM to 5:00 PM</option>
        <option value="5:00-8:00">5:00 PM to 8:00 PM</option>
        
    </select>
    
     <br/>
    
    <input type="submit" name="insert" value="ALLOCATE DOCTOR"/>
    
    
</form>
    



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 

<script> 

var val=<?php echo $_GET['dept_ID'];?>

$(document).ready(function getDoctor() { $.ajax({
type: "POST",
url: "doc_list.php",
data:'dept_id='+val,
success: function(data){
    $("#dr_ID").html(data);
    console.log(val);
}
});} )</script>

