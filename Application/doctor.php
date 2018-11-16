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
    <title>Doctor Details</title>

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
	
		require_once 'Connect.php';
		require('account.php');
		echo "Doctor";
		
		require('insertDrBE.php');
		$error="";
        
        echo "Doctor";

   if (isset($_POST["delete"])){
       //echo "hi";
       $docs=$_POST["docs"];
       
       $count= count($docs);
       echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from staff where staff_id=:id");
        echo $docs[$x];
        echo "</br>";
        $stmt->bindparam(':id', $docs[$x]);
        $stmt->execute();
    } 
     header('location:doctor.php');  
   }
?>
 <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2"> 
                    <div class="image img-cir img-120">
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
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
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
                        <li class="active">
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="insert_nur.php">
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
			<!-- Checked -->
			
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
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
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
                        <li class="active">
                            <a href="doctor.php">
                                <i class="fas fa-chart-bar"></i>Doctor</a>
                        </li>
                        <li>
                            <a href="insert_nur.php">
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
                                            <li class="list-inline-item active">
                                                <a href="home.php">Home</a>
                                            </li>
											<li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">
												<a href="doctor.php">Doctor</a>
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
			<!-- START OF TABLE-->
			<section>
                <div class="section__content section__content--p70">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                            <div class="col-xl-12">
                                <!-- DATA TABLE -->
								<br>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                         <h3 class="title-5 m-b-35">Doctor Details</h3>
                                    </div>
                                    <div class="table-data__tool-right">
									<form name="delete" action="doctor.php" method="POST">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i><a href="insert_dr.php">add Doctor</a>
										</button>
										<button type="submit" name="delete" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Delete Doctor
										</button>
									</div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
								 
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <!--<th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>-->
												<th></th>
                                                <th>Doc_id</th>
                                                <th>Name</th>
                                                <th>Dept_id</th>
                                                <th>Doc_type</th>
                                                <th></th>
                                            </tr>
                                        </thead>
										
										<!--working portion-->
                                        <tbody>
										<?php  foreach ($stmt->fetchAll() as $row) {?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" name="docs[]" value="<?php echo "$row[dr_id]" ?>" />
														<span class="au-checkmark"></span>
													</label>
												</td>
                                                <td><?php echo $row["dr_id"];?></td>
                                                <td>
                                                    <!--<span class="block-email">lori@example.com</span>-->
													<?php
														echo $row["first_name"];
														echo " ";
														echo $row["last_name"];
													?>
                                                </td>
                                           
                                                <td>
                                                    <?php echo $row["dept_id"];?>
                                                </td>
                                                <td><?php echo $row["dr_type"];?></td>
                                                <td>
                                                    <div class="table-data-feature">
														<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <!--<button class="item" data-toggle="tooltip" data-placement="top" name="delete" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
										<?php } ?>
                                        </tbody>
										<!--END WORKING PORTION-->
                                    </table>
                                </div>
								</form>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
			<!-- END OF TABLE-->
			
			
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
<!-- end document-->