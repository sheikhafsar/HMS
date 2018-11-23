<?php
        $error="";
        require_once 'Connect.php';

        echo "Patient Registeration";
        
        if (isset($_POST["register"])) {
            
     
               //check if user exist
     
            $stmt = $DBcon->prepare("select * from patient where username=:unm");
             $stmt->bindParam(':unm',$_POST["unm"], PDO::PARAM_STR);
             
            $stmt->execute();
            
             $stmt1 = $DBcon->prepare("select * from patient where password=:pwd");
             $stmt1->bindParam(':pwd',$_POST["pwd"], PDO::PARAM_STR);
             
            $stmt1->execute();
            
            if($stmt->rowCount())
            {
                $error = "Username already exists";
            }
            elseif ($stmt1->rowCount()) {
                $error = "Password already exists";
        }
            else {
            /*   
                echo "</br>";
                echo "$_POST[ID] $_POST[phone] $_POST[emailID] $_POST[shift]";
                echo "</br>";
             */   
            $stmt = $DBcon->prepare("insert into patient(first_name,last_name,gender,phone,email,address,dob,username,password) "
                    . "VALUES(:fnm,:lnm,:sex,:phone,:emailID,:address,:bday,:unm,:pwd)");
            
         
            $stmt->bindparam(':fnm', $_POST["fnm"], PDO::PARAM_STR);
            $stmt->bindparam(':lnm', $_POST["lnm"], PDO::PARAM_STR);
            $stmt->bindparam(':sex', $_POST["gender"], PDO::PARAM_STR);
            $stmt->bindparam(':phone', $_POST["phone"], PDO::PARAM_STR);
            $stmt->bindparam(':emailID', $_POST["email"], PDO::PARAM_STR);
            $stmt->bindparam(':address', $_POST["address"], PDO::PARAM_STR);
            $stmt->bindparam(':bday', $_POST["bday"], PDO::PARAM_STR);
            $stmt->bindparam(':unm', $_POST["unm"], PDO::PARAM_STR);
            $stmt->bindparam(':pwd', $_POST["pwd"], PDO::PARAM_STR);

            $stmt->execute();
         
        
             header("location:patient_login.php");
            }
        }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<!--php-->

<!--end php-->

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                           <h1>HMS</h1>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Register</button>
                               
								<div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="patient_login.php">Sign In</a>
                                </p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
