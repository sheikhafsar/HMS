<?php
        $error="";
        require_once 'Connect.php';

        echo "ADD DEPARTMENT";
        
        if (isset($_POST["submit1"])) {
            //echo  json_encode($_POST);
     
               //check if user exist
     
            $stmt = $DBcon->prepare("select * from department where dept_name=:dnm");
             $stmt->bindParam(':dnm',$_POST["dnm"], PDO::PARAM_STR);
             //$stmt->bindParam(':pwd',$_POST["passwd"], PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount())
            {
                $error = "Department alreday exists";
            }
            else {
                
            $stmt = $DBcon->prepare("insert into department(dept_name) VALUES(:n)");
           // $stmt->bindparam(':id', $_POST["nm"]);
         
            $stmt->bindparam(':n', $_POST["dnm"]);
 
            $stmt->execute();
            
             header("location:dept.php");
            }
        }
?>

<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
    
                Department Name : <input type="text" name="dnm"/>
                <br/><br/>
                
                <input type="submit" name="submit1"/>
</form>

<div> <?php echo $error; ?></div>

