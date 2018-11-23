<?php
		require('account.php');
        $error="";
        require_once 'Connect.php';

        //echo "ADD DEPARTMENT";
        
        if (isset($_POST["submit"])) {
            
            $stmt = $DBcon->prepare("select * from department where dept_name=:dnm");
             $stmt->bindParam(':dnm',$_POST["dnm"], PDO::PARAM_STR);
             
            $stmt->execute();
            
            if($stmt->rowCount())
            {	
                $error = "Department already exists";
            }
            else {
                
            $stmt = $DBcon->prepare("insert into department(dept_name) VALUES(:n)");
           
            $stmt->bindparam(':n', $_POST["dnm"]);
 
            $stmt->execute();
            
             header("location:department.php");
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
                            <a class="js-arrow" href="department.php">
                                <i class="fas fa-tachometer-alt"></i>Department
                            </a>
                        </li>
                        <li>
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="nurse.php">
                                <i class="fas fa-shopping-basket"></i>Nurse</a>
                        </li>
                        <li>
                            <a href="reception.php">
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
                            <a class="js-arrow" href="department.php">
                                <i class="fas fa-tachometer-alt"></i>Department
                            </a>
                        </li>
                        <li>
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="nurse.php">
                                <i class="fas fa-shopping-basket"></i>Nurse</a>
                        </li>
						
                        <li>
                        <a href="reception.php">
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
												<a href="department.php">Department</a>
											</li>
											<li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
											<li class="list-inline-item">
												<a href="insert_dept.php">Add Department</a>
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
			
			<section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <!--ADD DEPT MODAL-->
                                  <div class="container">
									<div class="login-wrap">
										<div class="login-content">
											<div class="login-logo">
												<h2>ADD DEPARTMENT</h2>
											</div>
											<div class="login-form">
												<form action="" method="POST">
													<div class="form-group">
														<label>Enter Department Name: </label>
														<input class="au-input au-input--full" type="text" name="dnm" placeholder="Department Name">
													</div>
													
													<button class="au-btn au-btn--green m-b-20" type="submit" name="submit">Add</button>
												</form>
												<?php echo "$error" ?>
												
											</div>
										</div>
									</div>
								  </div>
								<!--END ADD DEPT MODAL-->
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
                            <p>©2018,HMS. All Rights Reserved.</p>
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
