
<?php

        $error="";
        require_once 'Connect.php';

        echo "Receptionist";

   if (isset($_POST["delete"])){
       //echo "hi";
       $receptionist=$_POST["receptionist"];
       
       $count= count($receptionist);
       echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from staff where staff_id=:id");
        echo $receptionist[$x];
        echo "</br>";
        $stmt->bindparam(':id', $receptionist[$x]);
        $stmt->execute();
    } 
       
   }
 
  if (isset($_POST["insert"])){
       header("location:insert_recep.php");
      
    
   }
        

?>


<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
  
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from staff,receptionist where staff_id=rec_id");
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
        echo "<input type=checkbox  name=receptionist[] value=$row[rec_id] />";
        echo $row["rec_id"];
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
   
  
    
    <input type="submit" name="delete" value="DELETE RECEPTIONIST"/>
    <input type="submit" name="insert" value="ADD RECEPTIONIST"/>
  
</form>

<div> <?php echo $error; ?></div>




