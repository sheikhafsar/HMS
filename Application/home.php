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
<!--
<a href="register.php">Register User</a>
</br>
<a href="viewUser.php">Veiw User</a>
</br>
-->
<a href="logout.php">Logout</a>
</br>


