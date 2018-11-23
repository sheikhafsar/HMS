<?php

session_start();     
      session_destroy(); 
      header('location:patient_login.php');
      
?>