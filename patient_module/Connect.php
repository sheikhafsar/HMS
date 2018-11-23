
<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "root";
$DB_name = "hms";

 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass); 
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }
	//echo "Success";
?>



