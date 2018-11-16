
<?php

        $error="";
        require_once 'Connect.php';

        echo "Doctor";
        
        

?>
<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
  
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from staff,doctor where staff_id=dr_id");
    $stmt->execute();
    
    
   $count=$stmt->rowCount(); //total count of users
    
   // echo $count;
    
    echo "</br>";

    
    echo  "<table width=400px border=1>";
    
            echo "<tr>";
        
            echo  "<th>";
        echo "dr_ID ";
            echo  "</th>";  
           
            echo  "<th>";
        echo "Name";
            echo  "</th>";  
    
            echo  "<th>";
        echo "dept_id";
            echo  "</th>"; 
            
           echo  "<th>";
        echo "dr_type";
            echo  "</th>"; 
            
        echo "<tr/>";
    
    foreach ($stmt->fetchAll() as $row) {   <!--What this statement-->
        echo "<tr>";
        
            echo  "<td>";
        echo $row["dr_id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["first_name"];
        echo " ";
        echo $row["last_name"];
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dept_id"];
        echo "<input type=checkbox  name=dept[] value=$row[dept_id] />";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dr_type"];
            echo  "</td>";
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";

    ?>
   
  
    
    <input type="submit" name="delete" value="DELETE"/>
    <input type="submit" name="insert" value="ADD DEPARTMENT"/>
  
</form>

<div> <?php echo $error; ?></div>



