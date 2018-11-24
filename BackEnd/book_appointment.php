<!-- begin snippet: js hide: false console: true babel: false -->
<!-- language: lang-html -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="disableSpecificDays.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>   for onChange getDoctor(val) -->
<style>
.popover {
    left: 40% !important;
}
.btn {
    margin: 1%;
}
</style>
</head>
<body> 


<?php
    require_once 'Connect.php';
    
    session_start(); 
    
    if (isset($_POST["submit"])){
        
    }
?>

<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
   
                
                Department Name : 
                <select id="dept_ID" name="dept" onChange="getDoctor(this.value);">
                    <option> NULL</option>
                    <?php
                     //require_once 'Connect.php';

                     $stmt = $DBcon->prepare("select * from department");
                     $stmt->execute();
                     foreach ($stmt->fetchAll() as $row) {
                    ?>                                       
                     <option value=<?php echo $row["dept_id"]?> > <?php echo "$row[dept_name]"?> </option>
                    <?php
                    }
                    ?>
                </select>
                
                <br/>                
                
                
                
                <br/>
                
                Doctor Name : 
                <select id="dr_ID" name="dr" onChange="getSchedule(this.value);"> 
                    <option> NULL</option>
                    <!-- Output of doc_list.php is listed here -->
                </select>
                
                <div id="schedule">
                   <!-- Output of get_schedule.php is listed here -->
                </div>
    
                
                
                <br/>
            <!--    <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script> 
                <input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
            -->
                <div class=" col-md-4">
                <div  class="date-picker-2" placeholder="Recipient's username" id="ttry" aria-describedby="basic-addon2"></div>
                <span class="" id="example-popover-2"></span> 
                </div>
                
              <div id="example-popover-2-content" class="hidden"> </div>
              <div id="example-popover-2-title" class="hidden"> </div>
                <br/>
                
               <!-- <div>Date: <input type="text" id="datepicker"></div> -->
                
               
                
                <input type="submit" name="submit" value="Book Appoinment"/>
</form>


 <!--  <script>
      $("#dept_ID").on("change", function(){
        var selected_dept = $(this).val();
        console.log(selected_dept);
        $("#Dept_list").html(selected_dept); //selected dept id
        
        //document.cookie = "jsDept_id ="+selected_dept;
        //$.ajax({url:"book_appointment.php?selected_dept="+selected_dept,cache:false,success:function(result){
        //$("#Dept_list").html(result);
    });
      
    </script>
-->

<script> 
function getDoctor(val) { $.ajax({
type: "POST",
url: "doc_list.php",
data:'dept_id='+val,
success: function(data){
    $("#dr_ID").html(data);
    //console.log(val);
}
});} ;

function getSchedule(val) { $.ajax({
type: "POST",
url: "get_schedule.php",
data:'doc_id='+val,
success: function(data){
    $("#schedule").html(data);
    
    
    //console.log(val);
}
});
} ;

$('.date-picker-2').popover({
    html : true, 
    content: function() {
      return $("#example-popover-2-content").html();
    },
    title: function() {
      return $("#example-popover-2-title").html();
    }
});

$(".date-picker-2").datepicker({
    onSelect: function(dateText) { 
        $('#example-popover-2-title').html('<b>Avialable Appiontments</b>');
        var html = '<button  class="btn btn-success">8:00 am – 9:00 am</button><br><button  class="btn btn-success">10:00 am – 12:00 pm</button><br><button  class="btn btn-success">12:00 pm – 2:00 pm</button>';
        $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+html);
        $('.date-picker-2').popover('show');
    },
    beforeShowDay: disableSpecificDaysAndWeekends     
    
    
    
    
});

</script>

<!--

-->

</body>
</html>