<?php

    $error="";
    require_once 'Connect.php';

    echo "Departments";
    
   if (isset($_POST["delete"])){
       //echo "hi";
       $dept=$_POST["dept"];
       
       $count= count($dept);
       //echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from department where dept_id=:id");
      
        $stmt->bindparam(':id', $dept[$x]);
        $stmt->execute();
    } 
       
   }
   
  if (isset($_POST["insert"])){
       header("location:insert_dept.php");
      //echo "Hello";
    
   }
 
 
?>

<form action="dept.php" method="post">
    
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from department");
    $stmt->execute();
    
   // $count=$stmt->rowCount(); //total count of users
    
    //echo $count;
    
    echo "</br>";

    echo  "<table width=400px border=1>";
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
        
            echo  "<td>";
        echo $row["dept_id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["dept_name"];
        echo "<input type=checkbox  name=dept[] value=$row[dept_id] />";
            echo  "</td>";
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";

    ?>
    
    <input type="submit" name="delete" value="DELETE"/>
    <input type="submit" name="insert" value="ADD DEPARTMENT"/>
</form>

