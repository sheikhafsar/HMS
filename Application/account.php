<?php
	session_start();  
   
	   if (!isset($_SESSION["id"]))
	   {
		 header('location:index.php'); 
	   }
	   else 
	   {
		   //echo '</br>';
		   
	   }
?>


