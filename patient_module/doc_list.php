<?php
require_once 'Connect.php';
    echo "dept selected";
        if(isset($_POST["dept_id"]))
        {
            $stmt = $DBcon->prepare("select * from staff,doctor where staff_id=dr_id and dept_id=:selected_dept");
            $stmt->bindParam(':selected_dept',$_POST["dept_id"], PDO::PARAM_STR);
            $stmt->execute();
                    
            $count=$stmt->rowCount();
                //echo "<option>count:".$count."</option>";
                echo "<option>NULL</option>";
                foreach ($stmt->fetchAll() as $row) {
            ?>                                       
            <option value=<?php echo $row["staff_id"]?> > <?php echo "$row[first_name] $row[last_name]"?> </option>
<?php
    }}
?>
