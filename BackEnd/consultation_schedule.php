<?php
    require_once 'Connect.php';
    session_start();
   // $_headID=$_GET['headID'];
    $_headID=$_SESSION["id"];
    
    $stmt = $DBcon->prepare("select dept_id from doctor where dr_id=:head_ID");
    $stmt->bindParam(':head_ID',$_headID, PDO::PARAM_STR);
    $stmt->execute();
                        
    $stmt_data=$stmt->fetch();
                        
    $dept_ID=$stmt_data['dept_id'];
    
    
    
    if (isset($_POST["delete"])){
       
        $docs=$_POST["docs"];
       
       $count= count($docs);
       
       //echo "count:$count";
        echo "<br/>";
        
      //  echo "docs:$docs";
     // print_r($docs);
     
   /*   echo "<br/>";
      for ($x = 0; $x < $count; $x++) {
           echo "docs:$docs[$x]";
           echo "<br/>";
           $docID=substr($docs[$x],0,5);
           $day=substr($docs[$x],5,3);
           $time=substr($docs[$x],8);
           echo "docID:$docID"." "."$day"." "."$time";
           
      }
        echo "<br/>";
    */    
        
       
       for ($x = 0; $x < $count; $x++) {
           $docID=substr($docs[$x],0,5);
           $day=substr($docs[$x],5,3);
           $time=substr($docs[$x],8);
           
            $stmt = $DBcon->prepare("delete from consultation_schedule where dr_id=:id and Time=:time and day=:day");            
            $stmt->bindparam(':id', $docID);
            $stmt->bindparam(':day', $day);
            $stmt->bindparam(':time', $time);
            $stmt->execute();
        }
  
    }
     if (isset($_POST["insert"])){
          echo "id: $dept_ID" ;
         header("location:allocate_schedule.php?dept_ID=$dept_ID"); 
     }
     
?>


<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
    
<table border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
              <tr>
                <th><b>TIME</b></th>
                <th><b>Monday</b></th>
                <th><b>Tuesday</b></th>
                <th><b>Wednesday</b></th>
                <th><b>Thursday</b></th>
                <th><b>Friday</b></th>
              </tr>
            <tbody>

                <?php
                   
                    
                        
                        
                        
                        
                        
                        $stmt = $DBcon->prepare("select DISTINCT (Time) as Time from consultation_schedule Natural join doctor where dept_ID=:dept_ID");
                        $stmt->bindParam(':dept_ID',$dept_ID, PDO::PARAM_STR);
                        $stmt->execute();
                        
                       
                        foreach ($stmt->fetchAll() as $row) {
                            
                        $stmt1 = $DBcon->prepare("select * from consultation_schedule Natural join doctor where dept_ID=:dept_ID AND Time =:Time");
                        $stmt1->bindParam(':dept_ID',$dept_ID, PDO::PARAM_STR);
                        $stmt1->bindParam(':Time',$row['Time'], PDO::PARAM_STR);
                        $stmt1->execute();
                       
                        ?>
                        <tr>
                            <td><?php echo $row['Time'] ?></td>
                        <?php
                        $week_days = array('Monday','Tuesday','Wednesday','Thurshday','Friday');
                        $doctor = array();
                        
                        foreach ($stmt1->fetchAll() as $row1) {    
                            $doctor[$row1['day']] = $row1;
                        }
                        foreach ($week_days as $day) {
                            $day=substr($day,0,3);
                        ?>
                            <?php if (array_key_exists($day, $doctor)) { $row1 = $doctor[$day]; ?>
                            <td>
                                <?php echo $row1['dr_id']; ?>
                                
                                <input type=checkbox  name=docs[] value=<?php echo "$row1[dr_id]". "$day". "$row[Time]";?> />
                            
                            </td>
                            <?php } else { ?>
                            <td>    </td>
                            <?php } ?>
                        <?php    
                        }
                        ?>
                        </tr>
                             <?php
                    }    
                ?>
                </tbody>
</table>   
    
    <div style="text-align:center;">
    <input type="submit" name="delete" value="DEALLOCATE DOCTOR"/>
    <input type="submit" name="insert" value="ALLOCATE DOCTOR"/>
    </div>
    
</form>

<div id="time">
    
</div>
