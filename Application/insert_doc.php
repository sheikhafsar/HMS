<?php
        $error="";
        require_once 'Connect.php';

        echo "ADD DOCTOR";
        
        if (isset($_POST["submit1"])) {
            //echo  json_encode($_POST);
     
               //check if user exist
     
            $stmt = $DBcon->prepare("select * from staff where staff_id=:ID");
             $stmt->bindParam(':ID',$_POST["ID"], PDO::PARAM_STR);
             //$stmt->bindParam(':pwd',$_POST["passwd"], PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount())
            {
                $error = "Doctor already exists";
            }
            else {
            /*   
                echo "</br>";
                echo "$_POST[ID] $_POST[phone] $_POST[emailID] $_POST[shift]";
                echo "</br>";
             */   
            $stmt = $DBcon->prepare("insert into staff(staff_id,first_name,last_name,gender,designation,salary,phone,email,address,DOB,shift_id,username,password) "
                    . "VALUES(:id,:fnm,:lnm,:sex,:designation,:salary,:phone,:emailID,:address,:bday,:shift,:unm,:pwd)");
            $stmt->bindparam(':id', $_POST["ID"], PDO::PARAM_STR);
         
            $stmt->bindparam(':fnm', $_POST["fnm"], PDO::PARAM_STR);
            $stmt->bindparam(':lnm', $_POST["lnm"], PDO::PARAM_STR);
            $stmt->bindparam(':sex', $_POST["gender"], PDO::PARAM_STR);
            $stmt->bindparam(':designation', $_POST["designation"], PDO::PARAM_STR);
            $stmt->bindparam(':salary', $_POST["salary"], PDO::PARAM_STR);
            $stmt->bindparam(':phone', $_POST["phone"], PDO::PARAM_STR);
            $stmt->bindparam(':emailID', $_POST["emailID"], PDO::PARAM_STR);
            $stmt->bindparam(':address', $_POST["address"], PDO::PARAM_STR);
            $stmt->bindparam(':bday', $_POST["bday"], PDO::PARAM_STR);
            //$stmt->bindparam(':dept', $_POST["dept"], PDO::PARAM_STR);
            $stmt->bindparam(':shift', $_POST["shift"], PDO::PARAM_STR);
            $stmt->bindparam(':unm', $_POST["unm"], PDO::PARAM_STR);
            $stmt->bindparam(':pwd', $_POST["pwd"], PDO::PARAM_STR);

            $stmt->execute();
           /* 
            echo "</br>";
            echo "$_POST[ID] $_POST[dr_type] $_POST[dept]";
            echo "</br>";
           */ 
            $stmt1 = $DBcon->prepare("insert into doctor(dr_id,dr_type,dept_id) VALUES(:dr_id,:dr_type,:dept)");
           
            $stmt1->bindparam(':dr_id', $_POST["ID"],PDO::PARAM_STR);
            $stmt1->bindparam(':dr_type', $_POST["dr_type"],PDO::PARAM_STR);
            $stmt1->bindparam(':dept', $_POST["dept"],PDO::PARAM_STR);
 
            $stmt1->execute();
            
            echo "success insertion";
            
             header("location:doctor.php");
            }
        }
?>

<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
    
                ID : <input type="text" name="ID"/>
                <br/>
                First Name : <input type="text" name="fnm"/>
                <br/>
                Last Name : <input type="text" name="lnm"/>
                <br/>
                Gender :<br>
                <input type="radio" name="gender" value="male" checked> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other  
                <br/>
                
                Designation : <input type="text" name="designation"/>
                <br/>
                
                Doctor Type : <input type="text" name="dr_type"/>
                <br/>
                
                Salary : <input type="number" name="salary"/>
                <br/>
                
                Phone: <input name="phone" type="tel" size="10">
                <br/>
                
                Email: <input type="email" name="emailID">
                <br/>
                
                Address: <input type="text" name="address"/>
                <br/>
                
                Birthday: <input type="date" name="bday">
                <br/>
                
                Department Name : 
                <select name="dept">
                    <?php
                     //require_once 'Connect.php';

                     $stmt = $DBcon->prepare("select * from department");
                     $stmt->execute();
                     foreach ($stmt->fetchAll() as $row) {
                    ?>                                       
                     <option value=<?php echo $row["dept_id"]?> > <?php echo "$row[dept_name]"?> </option>
                    <?php
                    }
                    ?>
                </select>
                
                <br/>
                
                Shift : <br/>
                <select name="shift">
                    <?php
                     //require_once 'Connect.php';

                     $stmt = $DBcon->prepare("select * from shift");
                     $stmt->execute();
                     foreach ($stmt->fetchAll() as $row) {
                    ?>                                       
                     <option value=<?php echo $row["shift_id"] ?> > <?php echo "$row[start_time] to $row[end_time]"?> </option>
                    <?php
                    }
                    ?>
                </select>
                
                <br/>
                
                User Name : <input type="text" name="unm"/>
                <br/>
                
                Password : <input type="text" name="pwd"/>
                <br/>
                
                <br/><br/>
                
                <input type="submit" name="submit1"/>
</form>

<div> <?php echo $error; ?></div>



