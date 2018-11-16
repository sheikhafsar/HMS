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
    <title>Admin Dashboard</title>

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
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

<?php
		require('account.php');
        require_once 'Connect.php';
		
        $error="";
		$prefix="DOC";
		
        echo "ADD DOCTOR";
        
        if (isset($_POST["submit"])) {
            /*echo  json_encode($_POST);
			check if user exist*/
			
			$docID="DOC".$_POST["ID"];
			
            $stmt = $DBcon->prepare("select * from staff where staff_id=:ID");
             $stmt->bindParam(':ID',$docID, PDO::PARAM_STR);
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
            $stmt->bindparam(':id',$docID, PDO::PARAM_STR);
         
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
           
            $stmt1->bindparam(':dr_id', $docID,PDO::PARAM_STR);
            $stmt1->bindparam(':dr_type', $_POST["dr_type"],PDO::PARAM_STR);
            $stmt1->bindparam(':dept', $_POST["dept"],PDO::PARAM_STR);
 
            $stmt1->execute();
            
            
            $tarPOST_dir = "docPics/";
            $tarPOST_file = $tarPOST_dir . basename($_FILES["fileToUpload"]["name"]);
            
            $imageFileType = strtolower(pathinfo($tarPOST_file,PATHINFO_EXTENSION));
            
            $tarPOST_file = $tarPOST_dir . $docID . ".jpg";
            $uploadOk = 1;
            

            echo "<br/><br/>";
            echo $imageFileType;
            echo "<br/><br/>";

            
            $check = POSTimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists
            if (file_exists($tarPOST_file)) {
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
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tarPOST_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
             header("location:insert_dr.php");
            }
        }

?>
	
	 <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <!--<img src="images/icon/avatar-big-01.jpg" alt="John Doe" />-->
						<?php 
							echo "<img src=adminPics/$_SESSION[name].jpg  alt=$_SESSION[name] />";
						?>
					</div>
                    <h4 class="name"><?php echo "Welcome  $_SESSION[name]";?></h4>
                    <a href="login.php">Sign out</a>
                </div>
				<!-- Navbar -->
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
						<li>
                            <a class="js-arrow" href="home.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Department
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="active">
                                    <a href="insert_dept.php">
                                        <i class="fas fa-tachometer-alt"></i>Add Department</a>
                                </li>
                                <li>
                                    <a href="##">
                                        <i class="fas fa-tachometer-alt"></i>Delete Dapartment</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Update Department</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="#nurse_details">
                                <i class="fas fa-shopping-basket"></i>Nurse</a>
                        </li>
                        <li>
                            <a href="rec_details">
                                <i class="fas fa-copy"></i>Receptionist
                            </a>
                        </li>  
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
		
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
          <!--Checked-->
				
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
						<?php 
							echo "<img src=adminPics/$_SESSION[name].jpg  alt=$_SESSION[name] />";
						?>
						</div>
						<h4 class="name"><?php echo "Welcome  $_SESSION[name]";?></h4>
						<a href="login.php">Sign out</a>
                    </div>  <!-- END OF ACCOUNT2-->
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
						<li>
                            <a class="js-arrow" href="home.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow">
                                <i class="fas fa-tachometer-alt"></i>Department
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="insert_dept.php">
                                        <i class="fas fa-tachometer-alt"></i>Add Department</a>
                                </li>
                                <li>
                                    <a href="##">
                                        <i class="fas fa-tachometer-alt"></i>Delete Dapartment</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Update Department</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="#nurse_details">
                                <i class="fas fa-shopping-basket"></i>Nurse</a>
                        </li>
						
                        <li>
                            <a href="rec_details">
                                <i class="fas fa-copy"></i>Receptionist
                            </a>
                        </li>
                    </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
			
			<!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-70">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item">
                                                <a href="home.php">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">
												<a href="#">Doctor</a>
											</li>
											<li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
											<li class="list-inline-item">
												<a href="insert_dept.php">Add Doctor</a>
											</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
			<br>
			<section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <!--ADD DOCTOR INFO FORM-->
                                  <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Doctor Info</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form name="frm1" action="insert_dr.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
											<!--Doctor Id-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label class=" form-control-label">Doctor Id</label>
                                                </div>
                                                <div class="col-3 col-md-2">
                                                    <p class="form-control-static">DOC</p>
                                                </div>
												<div class="col-6 col-md-2">
                                                    <input type="text" id="ID" name="ID" placeholder="Doctor Id" class="form-control">
                                                </div>
												
												<!--Shift-->
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Shift</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <select name="shift" id="shift" class="form-control">
                                                        <option value="">Select</option>
														<?php
															$stmt = $DBcon->prepare("select * from shift");
															$stmt->execute();
															foreach ($stmt->fetchAll() as $row) {
														?>
                                                        <option value=<?php echo $row["shift_id"] ?>><?php echo "$row[start_time] to $row[end_time]"?></option>
                                                        <?php
															}
														?>
                                                    </select>
                                                </div>
                                            </div>
											
											<!--Doctor Name-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">First Name</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="fnm" name="fnm" placeholder="First Name" class="form-control">
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Last Name</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="lnm" name="lnm" placeholder="Last Name" class="form-control">
                                                </div>
                                            </div>
											
											<!--Doctor Gender-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label class=" form-control-label" name="gender">Gender</label>
                                                </div>
                                                <div class="col col-md-10">
                                                    <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label spacer">
                                                            <input type="radio" id="male" name="gender" value="male" class="form-check-input">Male
                                                        </label>
														&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            <input type="radio" id="female" name="gender" value="female" class="form-check-input">Female
                                                        </label>
														&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label for="inline-radio3" class="form-check-label ">
                                                            <input type="radio" id="others" name="gender" value="others" class="form-check-input">Others
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
											
											<!--Phone and Email id-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Phone</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="phone" name="phone" size=10 placeholder="Phone" class="form-control">
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="email-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="email" id="emailID" name="emailID" placeholder="Enter Email" class="form-control">
                                                </div>
											</div>
											
											<!--Address-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="address" name="address" placeholder="Address" class="form-control">
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">BOD</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="date" id="bday" name="bday" placeholder="Enter Email" class="form-control">
                                                </div>
											</div>
											
											<!--Username and pwd-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="unm" name="unm" placeholder="Username" class="form-control">
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="password-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="password" id="pwd" name="pwd" placeholder="Password" class="form-control">
                                                </div>
											</div>
											<!--Doctor Designation and Type-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Designation</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="designation" name="designation" placeholder="Designation" class="form-control">
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                   <input type="text" id="dr_type" name="dr_type" placeholder="Type" class="form-control">
                                                </div>
											</div>
											
											<!--Doctor Salary and Dept name -->
											 <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Dapartment</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <select name="dept" id="dept" class="form-control">
													<option value="">Select</option>
													<?php
														$stmt = $DBcon->prepare("select * from department");
														$stmt->execute();
														foreach ($stmt->fetchAll() as $row) {
													?>  
														<option value=<?php echo $row["dept_id"]?>><?php echo "$row[dept_name]"?></option>
                                                    <?php
														}
													?>
                                                    </select>
                                                </div>
												
												<div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Salary</label>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" id="salary" name="salary" placeholder="Salary" class="form-control">
                                                </div>
											</div>
											<!--File/Image Upload-->
											<div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="file-input" class=" form-control-label">File input</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="fileToupload" name="fileToupload" class="form-control-file">
                                                </div>
                                            </div>
											
											
											<div class="card-footer">
												<button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
											</div>
											</form>
											<div> <?php echo $error; ?></div>
										<!--END DOCTOR INFO FORM-->
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
			
			<section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			   <!-- END PAGE CONTAINER-->
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
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
