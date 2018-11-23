

<?php
    require_once 'Connect.php';
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
                
               <?php 
                   /*  $selected_dept="<div id=Dept_list> </div>";
                     $flag="<div id=Dept_list> </div>";
                     //$flag="";
                     //$selected_dept=1;
                     echo "selected_deptId=$selected_dept";
                    
                    */
               ?>
                
                
                <br/>
                
                Doctor Name : 
                <select id="dr_ID" name="dr">
                    <option> NULL</option>
                    <!-- Output of doc_list.php is listed here -->
                </select>
    
                <br/>
                <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
                <input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
                    
                <br/>
                
                <input type="submit" name="submit"/>
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
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

<script> function getDoctor(val) { $.ajax({
type: "POST",
url: "doc_list.php",
data:'dept_id='+val,
success: function(data){
    $("#dr_ID").html(data);
    //console.log(val);
}
});} </script>

