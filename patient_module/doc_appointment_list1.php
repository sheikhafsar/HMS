  
 <?php

    require_once 'Connect.php';
    echo "Appointment";
    
    session_start();   
    $doc_id=$_SESSION["id"];

    $stmt = $DBcon->prepare("select * from appointment where dr_id=:doc_id");
    $stmt->bindparam(':doc_id', $doc_id, PDO::PARAM_STR);
    $stmt->execute();
    
    
   $count=$stmt->rowCount(); //total count of tuples
    
   // echo $count;
   
   if($count)
   {
   
    echo "</br>";
    
    echo  "<table width=400px border=1>";
    
            echo "<tr>";
        
            echo  "<th>";
        echo "ID ";
            echo  "</th>";  
           
            echo  "<th>";
        echo "Patient ID";
            echo  "</th>";  
    
            echo  "<th>";
        echo "Date";
            echo  "</th>"; 
            
           echo  "<th>";
        echo "Time";
            echo  "</th>"; 
            
        echo "<tr/>";
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
        
            echo  "<td>";
      //  echo "<input type=checkbox  name=docs[] value=$row[dr_id] />";
        echo $row["app_id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["pat_id"];
            echo  "</td>";
            
            echo  "<td>";
        echo $row["date"];
            echo  "</td>";
            
            echo  "<td>";
        echo $row["time"];
            echo  "</td>";
            
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";
   }
   else
   {
       echo '</br>';
       echo "No appoinments";
       echo '</br>';
   }
   
  
?>
<br/>

<br/>



