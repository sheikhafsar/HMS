<?php
session_start();  
   
   if (!isset($_SESSION["id"]))
   {
     header('location:login_pat.php'); 
   }
   else 
   {
      
       echo "Welcome  $_SESSION[name]";
       
       echo '</br>';
       
   }
?>

<a href="logout_pat.php">Logout</a>
</br>
