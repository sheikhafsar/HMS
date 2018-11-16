
<?php

        $error="";
        require_once 'Connect.php';

        echo "Doctor";

   if (isset($_POST["delete"])){
       //echo "hi";
       $docs=$_POST["docs"];
       
       $count= count($docs);
       echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from staff where staff_id=:id");
        echo $docs[$x];
        echo "</br>";
        $stmt->bindparam(':id', $docs[$x]);
        $stmt->execute();
    } 
       
   }
  
  if (isset($_POST["insert"])){
       header("location:insert_doc.php");
      //echo "Hello";
    
   }
        

?>


<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
  
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from staff,doctor where staff_id=dr_id");
    $stmt->execute();
    
    
   //$count=$stmt->rowCount(); //total count of users
    
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
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
        
            echo  "<td>";
        echo "<input type=checkbox  name=docs[] value=$row[dr_id] />";
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
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dr_type"];
            echo  "</td>";
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";

    ?>
   
  
    
    <input type="submit" name="delete" value="DELETE DOCTOR"/>
    <input type="submit" name="insert" value="ADD DOCTOR"/>
  
</form>

<div> <?php echo $error; ?></div>



