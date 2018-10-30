
<?php

        $error="";
        require_once 'Connect.php';

        echo "Nurse";

   if (isset($_POST["delete"])){
       //echo "hi";
       $nurse=$_POST["nurse"];
       
       $count= count($nurse);
       echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from staff where staff_id=:id");
        echo $nurse[$x];
        echo "</br>";
        $stmt->bindparam(':id', $nurse[$x]);
        $stmt->execute();
    } 
       
   }
 
  if (isset($_POST["insert"])){
       header("location:insert_nurse.php");
      
    
   }
        

?>


<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
  
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from staff,nurse where staff_id=nurse_id");
    $stmt->execute();
    
    
   //$count=$stmt->rowCount(); //total count of users
    
   // echo $count;
    
    echo "</br>";

    
    echo  "<table width=400px border=1>";
    
            echo "<tr>";
        
            echo  "<th>";
        echo "ID ";
            echo  "</th>";  
           
            echo  "<th>";
        echo "Name";
            echo  "</th>";  
   
        echo "<tr/>";
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
        
            echo  "<td>";
        echo "<input type=checkbox  name=nurse[] value=$row[nurse_id] />";
        echo $row["nurse_id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["first_name"];
        echo " ";
        echo $row["last_name"];
            echo  "</td>";
            
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";

    ?>
   
  
    
    <input type="submit" name="delete" value="DELETE NURSE"/>
    <input type="submit" name="insert" value="ADD NURSE"/>
  
</form>

<div> <?php echo $error; ?></div>



