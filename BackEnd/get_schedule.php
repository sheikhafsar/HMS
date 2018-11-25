<?php
    require_once 'Connect.php';
    //echo "doctor selected";
    if(isset($_POST["doc_id"]))
    {
                    
                       
    $stmt = $DBcon->prepare("select * from consultation_schedule where dr_id=:doc_id");
    $stmt->bindParam(':doc_id',$_POST["doc_id"], PDO::PARAM_STR);
    $stmt->execute();
                    
    $count=$stmt->rowCount();
    //echo "<option>count:".$count."</option>";
    
    foreach ($stmt->fetchAll() as $row) {
        //echo "$row[day] $row[Time]";
        $day=$row["day"];
        $time=$row["Time"];
        $doc=$row["dr_id"];
        $result[]=array(
            "day"=> $day,
            "time"=>$time,
            "doc"=>$doc
            );
      
    }
    
  //  $result = $stmt->fetchAll();
   // print_r($result);
    echo json_encode($result);
    }
   
?>

