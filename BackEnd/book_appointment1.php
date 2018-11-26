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
    
    if (isset($_POST["time_slot"])){
        
        echo"booking";
         echo "<br/>";
         echo "pat:".$_SESSION["id"].$_SESSION["name"];
         echo "<br/>";
         echo "dept: $_POST[dept]";
          echo "<br/>";
         
           echo "doc : $_POST[dr]";
          echo "<br/>";
          
             echo "time_slot : $_POST[time_slot]";
             
          echo "<br/>";
          
          echo "appoin_date : $_POST[appoin_date]";
             
          echo "<br/>";
          
          $stmt = $DBcon->prepare("insert into appointment(date,time,pat_id,dr_id) VALUES(:date,:time,:pat_id,:doc_id)");
          $stmt->bindParam(':doc_id',$_POST["dr"], PDO::PARAM_STR);
          $stmt->bindParam(':pat_id',$_SESSION["id"], PDO::PARAM_STR);
          $stmt->bindParam(':time',$_POST["time_slot"], PDO::PARAM_STR);
          $stmt->bindParam(':date',$_POST["appoin_date"], PDO::PARAM_STR);
            
          $stmt->execute();
          
          header("location:appointment_list.php");
          
        
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
                
               ,<!-- onChange="getSchedule(this.value);" -->
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
            <!--
                <div class=" col-md-4">
                <div  class="date-picker-2" placeholder="Recipient's username" id="ttry" aria-describedby="basic-addon2"></div>
                <span class="" id="example-popover-2"></span> 
                
                
                </div>
            -->
            <input  class="date-picker-2" id="appoin_date" name="appoin_date">
              
             <!--   
                <input type="text" id="datepicker" class="date-picker-2">
             -->
                  
              <div id="example-popover-2-content" class="hidden"> </div>
              <div id="example-popover-2-title" class="hidden"> </div>
                <br/>
                
            <!--       <div type="hidden" id="app_date" name="app_date"> </div> -->
                
                <div id="testTime">
                    
                </div>
                
               
               
             <!--   
                <input type="submit" name="submit" value="Book Appoinment"/> submit is via button name="time_slot" below
             -->
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
//dataType: "json",
success: function(data){
    $("#schedule").html(data);
    console.log(data);
    
    data=JSON.parse(data);
    var len = data.length;
    for(var i = 0; i<len; i++) {
        var day = data[i].day;
        var time = data[i].time;
         var doc = data[i].doc;
        console.log(day+" "+time+" "+doc);

   }//end for  
   
           // $(".date-picker-2").datepicker('refresh');
        
       // var changeMonth = $( ".date-picker-2" ).datepicker( "option", "changeMonth" );
 
        // Setter
       // $( ".date-picker-2" ).datepicker( "option", "changeMonth", true );
        
        console.log("before datepicker");
        for(var i = 0; i<len; i++) {
        var day = data[i].day;
        var time = data[i].time;
        var doc = data[i].doc;
        console.log(day+" "+time+" "+doc);

   }//end for 
   
        //var dataClone = data.slice();
        var enableDays=[];
        //console.log("Cloned data");
        for(var i = 0; i<data.length; i++) {
        var day = data[i].day;
        var time = data[i].time;
        var doc = data[i].doc;
        console.log(day+" "+time+" "+doc);
        enableDays[i]=data[i].day;
        console.log("enableDays[i]"+enableDays[i]);

   }//end for 
        
        $(".date-picker-2").datepicker({
        changeMonth: true,
        changeYear: true,    
        onSelect: function(dateText,inst) { 
            $('#app_date').html(dateText);
            $('#example-popover-2-title').html('<b>Avialable Appiontments</b>');
           // console.log("date selected");
           // var html = '<button  class="btn btn-success">8:00 am – 9:00 am</button><br><button  class="btn btn-success">10:00 am – 12:00 pm</button><br><button  class="btn btn-success">12:00 pm – 2:00 pm</button>';
            
            
            
            /*    $.ajax({
                        type: "POST",
                        url: "getTimeByDay.php",
                        data:'schedule_data='+data,
                        dataType: "json",
                        success: function(data){
                            $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+html);
                            console.log(data);
                            $('.date-picker-2').popover('show');
                        }
                       });
             */ 
               
             //var html = '';
             
             var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
             var dateText = $.datepicker.formatDate("DD", date, inst.settings);
             //$("#dayName").html( "Day Name= " + dateText ); // Just the day of week
             var dayName=dateText.substring(0,3);
             
             var timeArr=[];
             var j=0;
             for(var i = 0; i<len; i++) {
                 
                if(data[i].day==dayName){
                    
                    timeArr[j++]=data[i].time;
                    
                }   
               
               // console.log("hi Time of selected date"+timeArr[j]);
       
           }//end for 
         
            var row_markup = [];
            var count=0;
            console.log("herehere");
           timeArr.forEach(element =>{
               count++;
               row_markup[count]='<button  formaction="book_appointment.php" name="time_slot" value="'+element+'"class="btn btn-success">'+element+'</button>';
               console.log("Time Array"+element);
           });
          
               
            // $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+JSON.stringify(timeArr, null, 4));
             $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+row_markup);
             $('.date-picker-2').popover('show');
                       
        },
                
        //beforeShowDay: disableSpecificDaysAndWeekends    
        beforeShowDay: function(date){
     
            var m = date.getMonth();
            var d = date.getDate();
            var y = date.getFullYear();
      
            for (var i = 0; i < data.length; i++) {
           // console.log("day :"+data[i].day+" at iteration:"+i);
            
            switch(date.getDay()){
                case 0:
                    day = "Sun";
                    break;
                case 1:
                    day = "Mon";
                    break;
                case 2:
                    day = "Tue";
                    break;
                case 3:
                    day = "Wed";
                    break;
                case 4:
                    day = "Thu";
                    break;
                case 5:
                    day = "Fri";
                    break;
                case 6:
                    day = "Sat";
                    break;
                default:
                    break;
            }
    
            

            /*
               if ( day!=dataClone[i].day || new Date() > date ) {
                    return [false];
                }
            */    
                if ($.inArray(day, enableDays) == -1 || new Date() > date ) {
                    return [false];
                }
                                        
                
                //return [(date.getDay() == day)  ? true : false];
            }

            var noWeekend = $.datepicker.noWeekends(date);
            return !noWeekend[0] ? noWeekend : [true];
       
     }        
    });

   
   // console.log("len of jason: "+len);
    
}
});
} ; //end of getSchedule


$('.date-picker-2').popover({
    html : true, 
    content: function() {
      return $("#example-popover-2-content").html();
    },
    title: function() {
      return $("#example-popover-2-title").html();
    }
});


/*

$(".date-picker-2").datepicker({
    onSelect: function(dateText) { 
        $('#example-popover-2-title').html('<b>Avialable Appiontments</b>');
        var html = '<button  class="btn btn-success">8:00 am – 9:00 am</button><br><button  class="btn btn-success">10:00 am – 12:00 pm</button><br><button  class="btn btn-success">12:00 pm – 2:00 pm</button>';
        $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+html);
        $('.date-picker-2').popover('show');
    },
    beforeShowDay: disableSpecificDaysAndWeekends     
});

*/




</script>

<!--

-->

</body>
</html>