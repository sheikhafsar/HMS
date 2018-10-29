
<?php

$DB_host = "localhost";
<<<<<<< 5e1c718115fda36a4c200cf0666dc8bfc1d5c462:Application/Connect.php
$DB_user = "afsar";
<<<<<<< HEAD:template/Connect.php
$DB_pass = "afsar";
=======
$DB_user = "root";
$DB_pass = "";
>>>>>>> Template:template/Connect.php
=======
$DB_pass = "afsar123";
>>>>>>> 1a86b0fb65bf8f8f15196409ce84211ece02d74f:Application/Connect.php
$DB_name = "hms";

 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass); 
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

 ?>



