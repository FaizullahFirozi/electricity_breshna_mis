<?php ob_start();  if(!isset($_SESSION)) { session_start();  }   ?>

<?php
        if(isset($_SESSION["lang"])){
                 require_once($_SESSION["lang"]);
              }
              else {
                  require_once("local/en.php");

              }

?>

<!--if you add connection.php it take error because this page is also on login form section -->

<!DOCTYPE html>
<html>

<head>
    <title>Breshna </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <link  rel="stylesheet" type="text/css" href="cal/calendar-blue2.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="cal/calendar.js"></script>
    <script type="text/javascript" src="cal/calendar-en.js"></script>
    <script type="text/javascript" src="cal/calendar-setup.js"></script>
    <script type="text/javascript" src="js/script.js"></script>



    <link rel="icon" href="images/icon.jpg">

    <!-- slider links -->
    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
    <!-- End of slider links firozi 0780002528 -->
    

    <!-- styel banner for login -->

    <?php if (!isset($_SESSION["login"])) {  ?>
    <style type="text/css">
    #banner {
        margin-top: 0;
        background-color:rgba(5, 222, 55,0.2);
        }#bannerh1 {
            color:rgb(2, 5, 255);
        }
        body {
            background-image: url("images/logo/firozi_flower.jpg");
        }
    </style>

    <?php } ?>

<!--  coding for pashto or dari direction faizullah firozi wardak -->

    <?php if(isset($_SESSION["lang"]) && $_SESSION["lang"] != "local/en.php") { ?>
         <style type="text/css">



             nav.navbar {
                 direction: rtl;
             }
             div.navbar-collapse ul {
                 margin-left: 45%;
             }
             div.navbar-collapse form input{
                 margin-left: 10px;
             }
             ul.navbar-nav a span{
                 margin-right: 4px;
             }

             div#nav-bar {
                 float: right;
             }
             div#nav-bar a {
                 text-align: right;

             }
             div#nav-bar a span{
                 margin-left: 15px;
             }


              </style>
      <?php }  ?>


</head>

<body>

    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <span id="gotop"> <!-- this is id to come top --> </span>



        <!-- header -->
        <div id="banner" class="row">


            <!--for login photo of users-->
            <?php if(isset($_SESSION["login"])) { ?>

                <?php

                /*mysql connection by faizullah firozi wardak 0780002528*/


                $server = "localhost";
                $username = "root";
                $password = "";
                $database = "breshna";

                $con = mysqli_connect($server, $username, $password);
                mysqli_select_db($con,$database);



                $photo = mysqli_query($con, "SELECT photo, firstname, lastname FROM employee WHERE employee_id=". $_SESSION["login"]);
                $row_photo = mysqli_fetch_assoc($photo);

                ?>
                <div class="mx-5 m-4"  >
    <span class="badge badge-dark" >
    <big ><b ><?php echo $row_photo["firstname"]; ?></b></big>
    <i ><?php echo $row_photo["lastname"]; ?></i>
</span>
                    <img class="rounded-circle col-lg-1 co-md-3 col-sm-2 col-xs-3 " src="<?php echo $row_photo["photo"]; ?>"  alt="د برښنا شرکت ویب سایټ ته ښه راغلاست">

                </div>
            <?php } ?>

            <!--   end of login photo -->



            <img class="fade "  src="images/logo/b.png" alt="د برښنا شرکت ویب سایټ">
<!--    text title banner     -->
            <h3 id="bannerh1" class="col-lg-8  col-md-7 col-sm-7 col-xs-12" ><marquee <?php if (isset($_SESSION["lang"]) && $_SESSION["lang"] != "local/en.php"){ echo 'direction="right"';  }; ?> > <?php echo $banner_title; ?> </marquee></h3>



    </div>



       <!-- this is All Menu  -->

       <div id="menu" class="row fixed-top">




       <?php  if(isset($_SESSION["login"])) {  ?>
<!--*******************-->








           <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark col-lg-12 ">

               <a  class="navbar-brand mx-4" href="#">Navbar</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="home.php"><?php echo $menu_home; ?><span class="sr-only">(current)</span></a>
                       </li>

                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php echo $menu_employee; ?>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="employee_add.php"><?php echo $menu_register_new; ?></a>
                             <a class="dropdown-item" href="contract_add.php"><?php echo $menu_new_contract; ?></a>
                             <a class="dropdown-item" href="employee_list.php"><?php echo $menu_employee_list; ?></a>
                             <a class="dropdown-item" href="employee_attendance.php"><?php echo $menu_attendance; ?></a>
                             <a class="dropdown-item" href="employee_overtime.php"><?php echo $menu_overtime; ?></a>
                         <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php echo $menu_customer; ?>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="customer_add.php"><?php echo $menu_register_new; ?></a>
                               <a class="dropdown-item" href="customer_list.php"><?php echo $menu_customer_information; ?></a>
                               <a class="dropdown-item" href="invoice_add.php"><?php echo $menu_customer_invoice; ?></a>
                               <a class="dropdown-item" href="customer_balance.php"><?php echo $menu_customer_balance; ?></a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php echo $menu_finance; ?>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="salary.php"> <?php echo $menu_salary_payment; ?></a>
                               <a class="dropdown-item" href="income_add.php"> <?php echo $menu_new_income; ?></a>
                               <a class="dropdown-item" href="income_report.php"> <?php echo $menu_income_report; ?> </a>
                               <a class="dropdown-item" href="expense_add.php"> <?php echo $menu_add_new_expense; ?></a>
                               <a class="dropdown-item" href="expense_report.php"> <?php echo $menu_expense_report; ?></a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php echo $menu_setting; ?>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="province_manage.php"> <?php echo $menu_provence_management; ?></a>
                               <a class="dropdown-item" href="bank_management.php"> <?php echo $menu_bank_management; ?></a>
                               <a class="dropdown-item" href="account_management.php"> <?php echo $menu_account_management; ?></a>
                               <a class="dropdown-item" href="change_password.php"> <?php echo $menu_change_password; ?></a>
                               <a class="dropdown-item" href="expense_report.php"> <?php echo $menu_expense_report; ?></a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="logout.php" ><?php echo $menu_logout; ?></a>
                       </li>



                   </ul>


                       <span class="nav-item text-light mr-5">
                           <a href="switch.php?lang=en" class="badge badge-danger"> <?php echo $menu_lang_english; ?> </a> |
                           <a href="switch.php?lang=dr" class="badge badge-info"> <?php echo $menu_lang_dari; ?> </a> |
                           <a href="switch.php?lang=ps" class="badge badge-primary"> <?php echo $menu_lang_pashto; ?> </a>
                       </span>

                   <form class="form-inline my-2 my-lg-0">
                       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                       <button class="btn btn-outline-success my-1 my-sm-0" type="submit">Search</button>
                   </form>

               </div>

           </nav>



           <!--*****************-->
        <?php  } ?>

    </div>





    <div id="body" class="row">

        <?php if (isset($_SESSION["login"])) { ?>

        <div id="nav-bar" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

            <br>
            <a class="btn btn-primary" href="employee_list.php"><span class="glyphicon glyphicon-th-list"></span> <?php echo $menu_employee_list; ?></a>
            <a class="btn btn-primary" href="employee_attendance.php"><span class="glyphicon glyphicon-calendar"></span> <?php echo $menu_attendance; ?></a>
            <a class="btn btn-primary" href="employee_overtime.php"><span class="glyphicon glyphicon-time"></span><?php echo $menu_overtime; ?> </a>
            <a class="btn btn-primary" href="customer_list.php"><span class="glyphicon glyphicon-user"></span><?php echo $menu_customer_list; ?></a>
            <a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $menu_income; ?></a>
            <a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-chevron-left"></span> <?php echo $menu_expense_report; ?></a>
            <a id="btn" class="btn btn-primary" href="change_password.php"><span class="glyphicon glyphicon-lock"></span> <?php echo $menu_change_password; ?> </a>
            <a id="btn" class="btn btn-primary" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> <?php echo $menu_logout; ?> </a>
            <a class="btn btn-success" href="pic.php"><span class="glyphicon glyphicon-picture"></span> picture </a>


        </div>



        <?php }  ?>

        <?php if (isset($_SESSION["login"])) { ?>

        <div id="content" class="col-lg-9 col-md-9 col-sm-8 col-xs-12">


    <!-- if you dont have authorize  -->

    <?php if(isset($_GET["authorize"])){ ?>

        <div class="alert alert-warning alert-dismissible col-lg-4 col-lg-offset-4" style="font-size:25px; color:red; text-align:center; margin-top:1.8%">

            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            تاسو ددی اجازه نه لرئ ، منـنـــــه
        </div>
    <?php } ?>     <!-- end-->




<?php } else { ?>

            <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php  } ?>