
  
 <?php

    require_once 'Connect.php';
    echo "Appointment";
    
    session_start();   
    $pat_id=$_SESSION["id"];

    $stmt = $DBcon->prepare("select * from appointment NATURAL JOIN patient where pat_id=:pat_id");
    $stmt->bindparam(':pat_id', $pat_id, PDO::PARAM_STR);
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
        echo "DR. ID";
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
        echo $row["dr_id"];
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
 <a href="book_appointment.php">Book Appoinment</a>
<br/>



