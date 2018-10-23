<?php

        $error="";
        require_once 'Connect.php';

        echo "register user";
        
        

?>
<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
                Name : <input type="text" name="nm"/>
                <br/><br/>
              
                Password : <input type="text" name="passwd"/>
                <br/><br/>
                
                
                Photo : <input type="file" name="fileToUpload" id="fileToUpload"/>
                <br/><br/>
                
                <input type="submit" name="submit1"/>
</form>

<div> <?php echo $error; ?></div>
