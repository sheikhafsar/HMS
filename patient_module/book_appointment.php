<?php
    
    require_once 'Connect.php';
    
    session_start(); 
    
    if (isset($_POST["submit"])){
        
    }
    
    if (isset($_POST["time_slot"])){
        
        echo"booking";
         echo "<br/>";
         echo "pat:".$_SESSION["id"].$_SESSION["name"];
         echo "<br/>";
         echo "dept: $_POST[dept]";
          echo "<br/>";
         
           echo "doc : $_POST[dr]";
          echo "<br/>";
          
             echo "time_slot : $_POST[time_slot]";
             
          echo "<br/>";
          
          echo "appoin_date : $_POST[appoin_date]";
             
          echo "<br/>";
          
          $stmt = $DBcon->prepare("insert into appointment(date,time,pat_id,dr_id) VALUES(:date,:time,:pat_id,:doc_id)");
          $stmt->bindParam(':doc_id',$_POST["dr"], PDO::PARAM_STR);
          $stmt->bindParam(':pat_id',$_SESSION["id"], PDO::PARAM_STR);
          $stmt->bindParam(':time',$_POST["time_slot"], PDO::PARAM_STR);
          $stmt->bindParam(':date',$_POST["appoin_date"], PDO::PARAM_STR);
            
          $stmt->execute();
          
          header("location:appointment_list.php");
          
        
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
    <title>Patient Dashboard</title>

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
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <!--<script src="disableSpecificDays.js"></script>-->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>   for onChange getDoctor(val) -->
    <style>
        .popover {
            left: 40% !important;
        }
        .btn {
            margin: 1%;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="active">
                                <a href="book_appointment.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>

                            <li>
                                <a href="appointment_list.php">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Appointment</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
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
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
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
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/avatar-04.jpg" alt="<?php echo "$_SESSION[name]" ?>" />
                                </div>
                                <div class="content">
                                    <!--<a class="js-acc-btn" href="#">--><?php echo "$_SESSION[name]" ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/avatar-04.jpg" alt="<?php echo "$_SESSION[name]" ?> " />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo "$_SESSION[name]" ?></a>
                                            </h5>
                                            <!--<span class="email">johndoe@example.com</span>-->
                                        </div>
                                    </div>
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
                                    <div class="account-dropdown__footer">
                                        <a href="logout_pat.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h1>HMS</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="book_appointment.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                        <li>
                        <li class="has-sub">
                            <a class="js-arrow" href="appointment_list.php">
                                <i class="fas fa-tachometer-alt"></i>Appointment</a>
                            </li>
                        <li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Account</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="header-button-item has-noti js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
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
                        <div class="notifi__item">
                            <div class="bg-c3 img-cir img-40">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="content">
                                <p>You got a new file</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__footer">
                            <a href="#">All notifications</a>
                        </div>
                    </div>
                </div>
                <div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-settings"></i>
                    <div class="setting-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-globe"></i>Language</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-pin"></i>Location</a>
                            </div>
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
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                       <!-- <div class="image">
                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>-->
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo "$_SESSION[name]" ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <!--<a href="#">
                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>-->
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo "$_SESSION[name]" ?></a>
                                    </h5>
                                    <!--<span class="email">johndoe@example.com</span>-->
                                </div>
                            </div>
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
                            <div class="account-dropdown__footer">
                                <a href="logout_pat.php">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="patient_dashboard.php">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
          
            <!-- WELCOME MESSAGE-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo "$_SESSION[name]" ?></span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- APPOINTMENT -->
            <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h2>Book Your Appointment</h2>
                        </div>
                        <div class="login-form">
                            <form name="frm1" action="patient_dashboard.php" method="POST">
                            <div class="au-input--full">
                                    <label for="select" class=" form-control-label">Department Name</label>
                            </div> 
                            
                            <select id="dept_ID" name="dept" onChange="getDoctor(this.value);">
                                <option> NULL</option>
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
                        
                <br>
                <br>
               <!-- onChange="getSchedule(this.value);" -->
               <div class="au-input--full">
                    <label for="select" class=" form-control-label">Doctor Name</label>
                </div> 
                <select id="dr_ID" name="dr" onChange="getSchedule(this.value);"> 
                    <option> NULL</option>
                    <!-- Output of doc_list.php is listed here -->
                </select>
                <br><br>

                <div class="au-input--full">
                     <label for="select" class=" form-control-label">Appointment Date</label>
                </div> 
                <div id="schedule">
                   <!-- Output of get_schedule.php is listed here -->
                </div>
    
                
                
                <br/>
            <!--    <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script> 
                <input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
            -->
            <!--
                <div class=" col-md-4">
                <div  class="date-picker-2" placeholder="Recipient's username" id="ttry" aria-describedby="basic-addon2"></div>
                <span class="" id="example-popover-2"></span> 
                
                
                </div>
            -->
            <input  class="date-picker-2" id="appoin_date" name="appoin_date">
              
             <!--   
                <input type="text" id="datepicker" class="date-picker-2">
             -->
                  
              <div id="example-popover-2-content" class="hidden"> </div>
              <div id="example-popover-2-title" class="hidden"> </div>
                <br/>
                
            <!--       <div type="hidden" id="app_date" name="app_date"> </div> -->
                
                <div id="testTime">
                    
                </div>
                
               
               
             <!--   
                <input type="submit" name="submit" value="Book Appoinment"/> submit is via button name="time_slot" below
             -->
                </form>
                         <?php echo "$error" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- END APPOINTMENT -->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!--To get Doctor Name-->
    <script> 
    function getDoctor(val) { $.ajax({
    type: "POST",
    url: "doc_list.php",
    data:'dept_id='+val,
    success: function(data){
        $("#dr_ID").html(data);
        //console.log(val);
    }
    });} ;

    function getSchedule(val) { $.ajax({
    type: "POST",
    url: "get_schedule.php",

    data:'doc_id='+val,
    //dataType: "json",
    success: function(data){
        $("#schedule").html(data);
        console.log(data);
        
        data=JSON.parse(data);
        var len = data.length;
        for(var i = 0; i<len; i++) {
            var day = data[i].day;
            var time = data[i].time;
            var doc = data[i].doc;
            console.log(day+" "+time+" "+doc);

    }//end for  
    
            console.log("before datepicker");
            for(var i = 0; i<len; i++) {
            var day = data[i].day;
            var time = data[i].time;
            var doc = data[i].doc;
            console.log(day+" "+time+" "+doc);

    }//end for 
    
            //var dataClone = data.slice();
            var enableDays=[];
            //console.log("Cloned data");
            for(var i = 0; i<data.length; i++) {
            var day = data[i].day;
            var time = data[i].time;
            var doc = data[i].doc;
            console.log(day+" "+time+" "+doc);
            enableDays[i]=data[i].day;
            console.log("enableDays[i]"+enableDays[i]);

    }//end for 
            
            $(".date-picker-2").datepicker({
            changeMonth: true,
            changeYear: true,    
            onSelect: function(dateText,inst) { 
                $('#app_date').html(dateText);
                $('#example-popover-2-title').html('<b>Avialable Appiontments</b>');
            // console.log("date selected");
            // var html = '<button  class="btn btn-success">8:00 am – 9:00 am</button><br><button  class="btn btn-success">10:00 am – 12:00 pm</button><br><button  class="btn btn-success">12:00 pm – 2:00 pm</button>';
                
                
                var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
                var dateText = $.datepicker.formatDate("DD", date, inst.settings);
                //$("#dayName").html( "Day Name= " + dateText ); // Just the day of week
                var dayName=dateText.substring(0,3);
                
                var timeArr=[];
                var j=0;
                for(var i = 0; i<len; i++) {
                    
                    if(data[i].day==dayName){
                        
                        timeArr[j++]=data[i].time;
                        
                    }   
                
                // console.log("hi Time of selected date"+timeArr[j]);
        
            }//end for 
            
                var row_markup = [];
                var count=0;
                console.log("herehere");
            timeArr.forEach(element =>{
                count++;
                row_markup[count]='<button  formaction="book_appointment.php" name="time_slot" value="'+element+'"class="btn btn-success">'+element+'</button>';
                console.log("Time Array"+element);
            });
            
                
                // $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+JSON.stringify(timeArr, null, 4));
                $('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+row_markup);
                $('.date-picker-2').popover('show');
                        
            },
                    
            //beforeShowDay: disableSpecificDaysAndWeekends    
            beforeShowDay: function(date){
        
                var m = date.getMonth();
                var d = date.getDate();
                var y = date.getFullYear();
        
                for (var i = 0; i < data.length; i++) {
            // console.log("day :"+data[i].day+" at iteration:"+i);
                
                switch(date.getDay()){
                    case 0:
                        day = "Sun";
                        break;
                    case 1:
                        day = "Mon";
                        break;
                    case 2:
                        day = "Tue";
                        break;
                    case 3:
                        day = "Wed";
                        break;
                    case 4:
                        day = "Thu";
                        break;
                    case 5:
                        day = "Fri";
                        break;
                    case 6:
                        day = "Sat";
                        break;
                    default:
                        break;
                }
        
            if ($.inArray(day, enableDays) == -1 || new Date() > date ) {
                        return [false];
                    }
                                            
                    
                    //return [(date.getDay() == day)  ? true : false];
                }

                var noWeekend = $.datepicker.noWeekends(date);
                return !noWeekend[0] ? noWeekend : [true];
        
        }        
        });

    
    // console.log("len of jason: "+len);
        
    }
    });
    } ; //end of getSchedule


    $('.date-picker-2').popover({
        html : true, 
        content: function() {
        return $("#example-popover-2-content").html();
        },
        title: function() {
        return $("#example-popover-2-title").html();
        }
    });
</script>
   <!--END of Patient Dashboard JS-->
    <!-- Jquery JS-->
   <!-- <script src="vendor/jquery-3.2.1.min.js"></script>-->
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