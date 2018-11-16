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
            
            
            $target_dir = "docPics/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $target_file = $target_dir . $_POST["ID"] . ".jpg";
            $uploadOk = 1;
            

            echo "<br/><br/>";
            echo $imageFileType;
            echo "<br/><br/>";

            
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
             header("location:doctor.php");
            }
        }
?>