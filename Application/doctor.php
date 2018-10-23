
<?php

        $error="";
        require_once 'Connect.php';

        echo "Doctor";
        
        

?>
<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
  
    <?php
/*
    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from doctor");
    $stmt->execute();
    
   // echo count($stmt);
    
   // $count=$stmt->rowCount(); //total count of users
    
    //echo $count;
    
    echo "</br>";

    echo  "<table width=400px border=1>";
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
        
            echo  "<td>";
        echo $row["dr_id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dept_id"];
        echo "<input type=checkbox  name=dept[] value=$row[dept_id] />";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dr_type"];
        echo "<input type=checkbox  name=dept[] value=$row[dept_id] />";
            echo  "</td>";
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";
*/
    ?>
   
  
    
    <input type="submit" name="delete" value="DELETE"/>
    <input type="submit" name="insert" value="ADD DEPARTMENT"/>
  
</form>

<div> <?php echo $error; ?></div>



