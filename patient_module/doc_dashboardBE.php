<?php
session_start();  
   
   if (!isset($_SESSION["id"]))
   {
     header('location:login_staff.php'); 
   }
   else 
   {
      
       echo "Welcome  $_SESSION[name]";
     
       echo '</br>';
       
       if($_SESSION["designation"]=="head")
       {
          // echo "head";
           
         echo "<a href=app_schedule.php?headID=$_SESSION[id]>Consultation Schedule</a>";
           
         
           
       }
       else {
           echo "assistant";
       }
       
   }
?>
<!--appoinment -->
       <a href="appointment_list.php">Appoinment</a>
       
       
<!--medical history -->

<a href="logout_staff.php">Logout</a>
</br>


