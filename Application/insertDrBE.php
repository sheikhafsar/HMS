<?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from staff,doctor where staff_id=dr_id");
    $stmt->execute();
    
    
   $count=$stmt->rowCount(); //total count of users
    
   // echo $count;
 
?>