<?php
session_start();  
   
   if (!isset($_SESSION["id"]))
   {
     header('location:login.php'); 
   }
   else 
   {
        echo "<img src=adminPics/$_SESSION[name].jpg  alt=$_SESSION[name] height=100 weight=100>";
        echo " "; 
       echo "Welcome  $_SESSION[name]";
       
       echo '</br>';
       
   }
?>

<a href="dept.php">Departments</a>
</br>

<a href="doctor.php">Doctor</a>
</br>

<a href="nurse.php">Nurse</a>
</br>

<a href="receptionist.php">Receptionist</a>
</br>

<a href="logout.php">Logout</a>
</br>


