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
      
          header('location:head_doc.php');
           
       }
       else {
           //echo "assistant";
       }
       
   }
?>
<!--appoinment -->
       <a href="doc_appointment_list.php">Appoinment</a>
       
       
<!--medical history -->

<a href="logout_staff.php">Logout</a>
</br>


